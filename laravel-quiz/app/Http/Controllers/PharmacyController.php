<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
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
        return view('pharmacy.index');
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

    public function read_exel()
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
}
