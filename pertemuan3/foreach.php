<?php
declare(strict_types=1);
$buah = ['Apel', 'Jeruk', 'Mangga'];
foreach ($buah as $b) {
echo "- $b<br>";
}

$ipk = [
  'Andi' => 3.8, 
  'Budi' => 3.2, 
  'Citra' => 2.9];
foreach ($ipk as $nama => $nilai) {
echo "$nama: $nilai<br>";
}

$total = 0;
foreach ($ipk as $nilai) {
$total += $nilai;
}
echo "Rata-rata IPK: " . number_format($total / count($ipk), 2) . "<br>"; /* angka 2 itu fungsi jumlah angka di belakang koma */