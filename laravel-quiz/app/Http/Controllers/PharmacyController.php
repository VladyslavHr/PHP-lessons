<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\CategoryMark;
use App\Models\PharmacyImage;
use App\Models\PharmacyLocation;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;


class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pharmacy.index', [
            'pharmacies' => Pharmacy::paginate(20),
            // 'pharmacies' => [],
            'query' => '',
            // 'pzs_kodes' => Pharmacy::all('pzs_kod'),
            // 'addresses' => Pharmacy::all('address'),
            // 'cites' => Pharmacy::all('city'),
        ]);
    }

    public function search(Request $request)
    {
        // dd($request->get('query'));
        $query = $request->get('query');
        return view('pharmacy.index', [
            'pharmacies' => Pharmacy::where('pzs_kod', 'like', "%$query%")->orwhere('city', 'like', "%$query%")->orwhere('address', 'like', "%$query%")->paginate(20),
            'query' => $query,
            // 'pzs_kodes' => Pharmacy::all('pzs_kod'),
            // 'addresses' => Pharmacy::all('address'),
            // 'cites' => Pharmacy::all('city'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show_($pharmacy_id)
    {
        return view('pharmacy.show', [
            'categories' => Category::all(),
            'pharmacy_id' => $pharmacy_id,
        ]);
    }

    public function show(Pharmacy $pharmacy)
    {
        return view('pharmacy.show', [
            'categories' => Category::all(),
            'pharmacy' => $pharmacy,
        ]);
    }

    public function change_location(Request $request)
    {
        $pharmacy_id = $request->get('pharmacy_id');

        $pharmacy = Pharmacy::find($pharmacy_id);

        if($pharmacy){
            $pharmacy->location = $request->get('location');
            $pharmacy->save();

            return redirect()->back()->with('status', 'Location updated!');
        }else{
            return redirect()->back()->withErrors(['message' => 'Pharmacy not found!']);
        }



    }


    public function estimate_category(Request $request)
    {
        $category_id = $request->get('category_id');
        $pharmacy_id = $request->get('pharmacy_id');
        $user_id = auth()->user()->id;

        $category_data = $request->validate([
            'category_id' => 'required',
            'pharmacy_id' => 'required',
            'mark_1' => 'required|integer|min:0|max:100',
        ],[
            'mark_1.required' => '"Počet Face-kategóry celkem" is required!',
            'mark_1.min' => '"Počet Face-kategóry celkem" between 0 and 100 !',
            'mark_1.max' => '"Počet Face-kategóry celkem" between 0 and 100!',
        ]);

        $category_data['user_id'] = $user_id;

        $category_mark = CategoryMark::where('category_id', $category_id)
            ->where('pharmacy_id', $pharmacy_id)
                ->where('user_id', $user_id)->first();
        if($category_mark){
            $category_mark->update($category_data);
        }else{
            CategoryMark::create($category_data);
        }
        return redirect()->back()->with('status', 'Updated!');

    }

    public function load_images(Request $request)
    {
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image'
    ]);

        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $key => $file)
            {

                $name = time().'-'.($key+1).'.'.$file->extension();
                $file->move(public_path('pharmacy-images'), $name);
                $pharmacy_image= new PharmacyImage();
                $pharmacy_image->url = $name;
                $pharmacy_image->pharmacy_id = $request->get('pharmacy_id');
                $pharmacy_image->save();

            }
        }

        return back()->with('status', 'Data Your files has been successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        //
    }

    public function read_excel_pharmacies()
    {

        // $inputFileName = __DIR__ . '/sampleData/example1.xls';
        $inputFileName = resource_path('excel1/1.xlsx');
        // $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        echo "<pre>";
        print_r(count($sheetData));
        print_r($sheetData);
        // print_r(scandir(resource_path('excel')));
        echo "<pre>";



        $pharm_arr = [];
        foreach ($sheetData as $key => $row) {
            // if ($key > 5) {
            //    breake;
            // }
            Pharmacy::firstOrCreate(['pzs_kod' => trim($row['A'])], [
                'pzs_kod' => trim($row['A']),
                'address' => trim($row['B']),
                'city' => trim($row['C']),
                'location' => trim($row['D']),
            ]);
        }

        // return 'Hello exel';
    }

    public function read_excel_pharmacies_copies()
    {

        // $inputFileName = __DIR__ . '/sampleData/example1.xls';
        $inputFileName = resource_path('excel1/1.xlsx');
        // $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        echo "<pre>";
        print_r(count($sheetData));
        // print_r($sheetData);
        // print_r(scandir(resource_path('excel')));
        echo "<pre>";



        $pharm_arr = [];
        foreach ($sheetData as $key => $row) {
            // if ($key > 5) {
            //    breake;
            // }
            $pzs_kod = trim($row['A']);
            @$pharm_arr[$pzs_kod]++;
            // Pharmacy::firstOrCreate(['pzs_kod' => trim($row['A'])], [
            //     'pzs_kod' => trim($row['A']),
            //     'address' => trim($row['B']),
            //     'city' => trim($row['C']),
            // ]);
        }
        arsort($pharm_arr);
        echo "<pre>";
        print_r(count($pharm_arr));
        echo '<hr>';
        print_r($pharm_arr);
        // print_r($sheetData);
        // print_r(scandir(resource_path('excel')));
        echo "<pre>";

        // return 'Hello exel';
    }

    public function read_excel_categories()
    {

        // $inputFileName = __DIR__ . '/sampleData/example1.xls';
        $inputFileName = resource_path('excel1/3.xlsx');
        // $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        echo "<pre>";
        print_r($sheetData);
        // print_r(scandir(resource_path('excel')));
        echo "<pre>";

        foreach ($sheetData as $key => $row) {
            // if ($key > 5) {
            //    breake;
            // }
            if(trim($row['A'])){
                Category::firstOrCreate(['name' => trim($row['A'])]);
            }

        }

        // return 'Hello exel';
    }

    public function read_excel_products()
    {

        // $inputFileName = __DIR__ . '/sampleData/example1.xls';
        $inputFileName = resource_path('excel1/3.xlsx');
        // $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        echo "<pre>";
        // print_r($sheetData);
        // print_r(scandir(resource_path('excel')));
        echo "<pre>";

        $category_name = null;
        $category_id = 0;
        foreach ($sheetData as $key => $row) {
            if (trim($row['A'])) {
                $category_name = trim($row['A']);
                $category_id = Category::where('name', $category_name)->first()->id;
            }
            $product_name = trim($row['B']);
            echo '<div>' . $category_name . '|' . $product_name . '|' . $category_id;

            $brand = '';
            $title_arr = explode(' ', $product_name);
            if ($title_arr) $brand = $title_arr[0];

            unset($title_arr[0]);
            $info = implode(' ', $title_arr);

            Product::firstOrCreate(['title' => $product_name], [
                'brand' => $brand,
                'info' => $info,
                'category_id' => $category_id,
            ]);

            // if(trim($row['A'])){
            //     Category::firstOrCreate(['name' => trim($row['A'])], [
            //         'name' => trim($row['A']),
            //     ]);
            // }

        }

        // return 'Hello exel';
    }
}
