<?php
declare(strict_types=1);
$i = 10;
do {
  echo "Dijalankan sekali walau i = $i<br>";
  $i++;
} while ($i <= 5);

$percobaan = 0;
do {
  $percobaan++;
  $nilai = 30 + $percobaan * 20; 
} while ($nilai < 80); /* berapa kali percobaan sampai menemukan hasil pas 80 atau lebih */
echo "Diperoleh nilai $nilai setelah $percobaan percobaan<br>";