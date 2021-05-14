<?php

  // membuka koneksi ke database
  require "koneksi.php";

  // memanggil library
  require 'vendor/autoload.php';
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  // menuliskan nama kolom
  $spreadsheet = new spreadsheet();
  $sheet = $spreadsheet -> getActiveSheet();
  $sheet -> setCellValue('A1','No');
  $sheet -> setCellValue('B1','Nama');
  $sheet -> setCellValue('C1','Kelas');
  $sheet -> setCellValue('D1','Alamat');

  // mengambil data pada database dan menuliskan di excel
  $sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
  $i = 2;
  $no = 1;
  while ($row = mysqli_fetch_array($sql)) {
    $sheet -> setCellValue('A'.$i, $no++);
    $sheet -> setCellValue('B'.$i, $row['nama']);
    $sheet -> setCellValue('C'.$i, $row['kelas']);
    $sheet -> setCellValue('D'.$i, $row['alamat']);
    $i++;
  }

  // style
  $styleArray = [
          'borders' => [
            'allBorders' => [
              'borderStyle' => PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
          ],
  ];

  // memunculkan file excel
  $i = $i-1;
  $sheet -> getStyle('A1:D'.$i) -> applyFromArray($styleArray);
  $writer = new Xlsx($spreadsheet);
  $writer -> save('Report Data Siswa.xlsx');

?>