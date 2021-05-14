<?php
  // memanggil library yg akan digunakan
  require 'vendor/autoload.php';
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  // membuat konstruktor
  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet -> getActiveSheet();

  // menuliskan hello world! pada kolom A1
  $sheet -> setCellValue('A1','Hello World!');

  // memunculkan file excel
  $writer = new Xlsx($spreadsheet);
  $writer -> save ('hello world.xlsx');
?>