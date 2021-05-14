<?php

  require "koneksi1.php";

  // memanggil library
  require 'vendor/autoload.php';
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  // menuliskan nama kolom
  $spreadsheet = new spreadsheet();
  $sheet = $spreadsheet -> getActiveSheet();
  $sheet -> setCellValue('A1', 'Id Peserta');
  $sheet -> setCellValue('B1', 'Jenis Pendaftaran');
  $sheet -> setCellValue('C1', 'Tanggal Masuk');
  $sheet -> setCellValue('D1', 'NIS');
  $sheet -> setCellValue('E1', 'Nomor Peserta Ujian');
  $sheet -> setCellValue('F1', 'PAUD');
  $sheet -> setCellValue('G1', 'TK');
  $sheet -> setCellValue('H1', 'No SKHUN');
  $sheet -> setCellValue('I1', 'No Ijazah');
  $sheet -> setCellValue('J1', 'Hobi');
  $sheet -> setCellValue('K1', 'Cita-cita');
  $sheet -> setCellValue('L1', 'Nama Lengkap');
  $sheet -> setCellValue('M1', 'Jenis Kelamin');
  $sheet -> setCellValue('N1', 'No NISN');
  $sheet -> setCellValue('O1', 'No NIK');
  $sheet -> setCellValue('P1', 'Tempat Lahir');
  $sheet -> setCellValue('Q1', 'Tanggal Lahir');
  $sheet -> setCellValue('R1', 'Agama');
  $sheet -> setCellValue('S1', 'Berkebutuhan Khusus');
  $sheet -> setCellValue('T1', 'Alamat');
  $sheet -> setCellValue('U1', 'RT');
  $sheet -> setCellValue('V1', 'RW');
  $sheet -> setCellValue('W1', 'Dusun');
  $sheet -> setCellValue('X1', 'Kelurahan/Desa');
  $sheet -> setCellValue('Y1', 'Kecamatan');
  $sheet -> setCellValue('Z1', 'Kode Pos');
  $sheet -> setCellValue('AA1', 'Tempat Tinggal');
  $sheet -> setCellValue('AB1', 'Moda Transportasi');
  $sheet -> setCellValue('AC1', 'No HP');
  $sheet -> setCellValue('AD1', 'No Telepon');
  $sheet -> setCellValue('AE1', 'Email Pribadi');
  $sheet -> setCellValue('AF1', 'Penerima KPS/PKH/KIP');
  $sheet -> setCellValue('AG1', 'Nomor KPS/PKH/KIP');
  $sheet -> setCellValue('AH1', 'Kewarganegaraan');

  // Mengambil data dari database dan di export ke excel
  $sql = mysqli_query($koneksi, "SELECT * FROM formulir_peserta");
  $i = 2;
  $no = 1;
  while ($row = mysqli_fetch_array($sql)) {
    $sheet -> setCellValue('A'.$i, $no++);
    $sheet -> setCellValue('B'.$i, $row['jenis_daftar']);
    $sheet -> setCellValue('C'.$i, $row['tanggal_masuk']);
    $sheet -> setCellValue('D'.$i, $row['NIS']);
    $sheet -> setCellValue('E'.$i, $row['nomor_peserta']);
    $sheet -> setCellValue('F'.$i, $row['PAUD']);
    $sheet -> setCellValue('G'.$i, $row['TK']);
    $sheet -> setCellValue('H'.$i, $row['nomor_SKHUN']);
    $sheet -> setCellValue('I'.$i, $row['nomor_ijazah']);
    $sheet -> setCellValue('J'.$i, $row['hobi']);
    $sheet -> setCellValue('K'.$i, $row['cita_cita']);
    $sheet -> setCellValue('L'.$i, $row['nama_lengkap']);
    $sheet -> setCellValue('M'.$i, $row['jenis_kelamin']);
    $sheet -> setCellValue('N'.$i, $row['NISN']);
    $sheet -> setCellValue('O'.$i, $row['NIK']);
    $sheet -> setCellValue('P'.$i, $row['tempat_lahir']);
    $sheet -> setCellValue('Q'.$i, $row['tgl_lahir']);
    $sheet -> setCellValue('R'.$i, $row['agama']);
    $sheet -> setCellValue('S'.$i, $row['khusus']);
    $sheet -> setCellValue('T'.$i, $row['alamat']);
    $sheet -> setCellValue('U'.$i, $row['RT']);
    $sheet -> setCellValue('V'.$i, $row['RW']);
    $sheet -> setCellValue('W'.$i, $row['dusun']);
    $sheet -> setCellValue('X'.$i, $row['kelurahan']);
    $sheet -> setCellValue('Y'.$i, $row['kecamatan']);
    $sheet -> setCellValue('Z'.$i, $row['kode_pos']);
    $sheet -> setCellValue('AA'.$i, $row['tempat_tinggal']);
    $sheet -> setCellValue('AB'.$i, $row['transportasi']);
    $sheet -> setCellValue('AC'.$i, $row['nomor_hp']);
    $sheet -> setCellValue('AD'.$i, $row['nomor_telepon']);
    $sheet -> setCellValue('AE'.$i, $row['email_pribadi']);
    $sheet -> setCellValue('AF'.$i, $row['penerima_KPS']);
    $sheet -> setCellValue('AG'.$i, $row['nomor_KPS']);
    $sheet -> setCellValue('AH'.$i, $row['kwn']);
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
  $sheet -> getStyle('A1:AH'.$i) -> applyFromArray($styleArray);
  $writer = new Xlsx($spreadsheet);
  $writer -> save('Report Pendaftaran Siswa.xlsx');

?>