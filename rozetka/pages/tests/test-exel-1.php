<?php



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

// $spreadsheet = new Spreadsheet();
$spreadsheet = IOFactory::load('data/products-1.xlsx');
$sheet = $spreadsheet->getActiveSheet();



$products = db_query("SELECT * FROM products LIMIT 200,200 ");

foreach ($products as $key => $product) {
$row = $key + 2;
$sheet->setCellValue("A$row", $product['id']); // id
$sheet->setCellValue("B$row", $product['title']); // title
$sheet->setCellValue("C$row", $product['price']); // price
$sheet->setCellValue("D$row", $product['brand_name']); // brand
$sheet->setCellValue("E$row", $product['sell_status']); // sell status
$sheet->setCellValue("F$row", $product['reviews']); // reviews
$sheet->setCellValue("G$row", $product['url']); // url

}

// $writer = IOFactory::createWriter($spreadsheet, 'Xls');
$writer = new Xlsx($spreadsheet);
$writer->save('data/products-3.xlsx');