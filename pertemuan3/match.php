<?php
declare(strict_types=1);

$huruf = 'B';

$predikat = match ($huruf){
  'A'  => 'Istimewa',
  'B'  => 'Sangat Baik',
  'C'  => 'Baik',
  'D'  => 'Cukup',
  default => 'Kurang',
};
echo "Hutuf $huruf -> $predikat\n";

$hari = 'Minggu';
$jenis = match ($hari){
  'Sabtu','Minggu' => 'Akhir pekan',
  default  => 'Hari kerja',
};

$kode = 0;
$hasil = match ($kode){
  0  => 'Nol (Int)',
  '0'  => 'Nol (String)',
  default => 'lain',
};

echo "Kode 0 -> $hasil\n";