<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use App\Models\Mark;
use App\Models\CategoryMark;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $marks = Mark::with(['pharmacy:id,pzs_kod', 'product:id,title,brand,category_id', 'user:id,name', 'product.category:id,name'])->get();
        return view('statistics.products', [
            'marks' => $marks,
        ]);
    }

    public function categories()
    {
        $marks = CategoryMark::with(['pharmacy', 'user', 'category'])->get();
        return view('statistics.categories', [
            'marks' => $marks,
        ]);
    }

    public function excel_export()
    {
        $marks = Mark::with(['pharmacy:id,pzs_kod', 'product:id,title,brand,category_id', 'user:id,name', 'product.category:id,name'])->get();



        // $spreadsheet = new Spreadsheet();
        $spreadsheet = IOFactory::load(public_path('excel/products-template.xlsx'));
        $sheet = $spreadsheet->getActiveSheet();

        foreach ($marks as $key => $mark) {
        $row = $key + 2;
         $sheet->setCellValue("A{$row}", $mark->user->name );
         $sheet->setCellValue("B{$row}", $mark->pharmacy->pzs_kod );
         $sheet->setCellValue("C{$row}", $mark->product->category->name );
         $sheet->setCellValue("D{$row}", $mark->product->title );
         $sheet->setCellValue("E{$row}", $mark->product->brand );
         $sheet->setCellValue("F{$row}", $mark->mark_1 );
         $sheet->setCellValue("G{$row}", $mark->mark_2 );
         $sheet->setCellValue("H{$row}", $mark->mark_3 );
         $sheet->setCellValue("I{$row}", $mark->mark_4 );

        }

        // $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer = new Xlsx($spreadsheet);
        $writer->save(public_path('excel/products.xlsx'));

        return [
           'status' => 'ok',
       ];
    }

    public function excel_export_cat()
    {
        $marks = CategoryMark::with(['pharmacy', 'user', 'category'])->get();



        // $spreadsheet = new Spreadsheet();
        $spreadsheet = IOFactory::load(public_path('excel/cat-template.xlsx'));
        $sheet = $spreadsheet->getActiveSheet();

        foreach ($marks as $key => $mark) {
        $row = $key + 2;
         $sheet->setCellValue("A{$row}", $mark->user->name );
         $sheet->setCellValue("B{$row}", $mark->pharmacy->pzs_kod );
         $sheet->setCellValue("C{$row}", $mark->pharmacy->location );
         $sheet->setCellValue("D{$row}", $mark->category->name );
         $sheet->setCellValue("E{$row}", $mark->mark_1 );
        //  $sheet->setCellValue("E{$row}", $mark->mark_2 );
        //  $sheet->setCellValue("F{$row}", $mark->mark_3 );
        //  $sheet->setCellValue("G{$row}", $mark->mark_4 );

        }

        // $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer = new Xlsx($spreadsheet);
        $writer->save(public_path('excel/cat.xlsx'));

        return [
           'status' => 'ok',
       ];
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
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistic $statistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        //
    }
}
