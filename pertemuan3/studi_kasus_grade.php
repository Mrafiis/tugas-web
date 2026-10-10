<?php
declare(strict_types=1);
$mahasiswa = [
  'Andi' => 88,
  'Budi' => 72,
  'Citra' => 45,
  'Dewi' => 91,
  'Eka' => 65,
];
$total = 0;
$maks = 0;
$min = 100;
$lulus = 0;
echo str_pad("Nama", 8) . str_pad("Nilai", 7) . str_pad("Huruf", 7) . "Status<br>";
echo str_repeat("-", 40) . "<br>"; /* membuat tanda - 40 kali */
foreach ($mahasiswa as $nama => $akhir) {
  if ($akhir >= 85) $huruf = 'A';
  elseif ($akhir >= 75) $huruf = 'B';
  elseif ($akhir >= 65) $huruf = 'C';
  elseif ($akhir >= 50) $huruf = 'D';
  else $huruf = 'E';

  $status = $akhir >= 50 ? 'Lulus' : 'Tidak Lulus';

  echo str_pad($nama, 8) . str_pad((string) $akhir, 7) . str_pad($huruf, 7) . $status . "<br>";
  $total += $akhir;
  $maks = max($maks, $akhir);
  $min = min($min, $akhir);
  if ($akhir >= 50) {
    $lulus++;
  }
}
$rata = $total / count($mahasiswa);
echo str_repeat("-", 40) . "<br>";
echo "Rata-rata : " . number_format($rata, 2) . "<br>";
echo "Tertinggi : $maks<br>";
echo "Terendah : $min<br>";
echo "Lulus : $lulus dari " . count($mahasiswa) . "<br>";