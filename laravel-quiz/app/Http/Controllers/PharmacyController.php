<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
            'pharmes' => Pharmacy::all(),
            'user' => User::all(),
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
    public function show(Pharmacy $pharmacy)
    {
        //
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

    public function read_exel_pharmacy()
    {

        // $inputFileName = __DIR__ . '/sampleData/example1.xls';
        $inputFileName = resource_path('excel1/1.xlsx');
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
            Pharmacy::firstOrCreate(['pzs_kod' => trim($row['A'])], [
                'pzs_kod' => trim($row['A']),
                'address' => trim($row['B']),
                'city' => trim($row['C']),
            ]);
        }

        // return 'Hello exel';
    }

    public function read_excel_category()
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
