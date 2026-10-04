<?php
declare(strict_types=1);

$pilihan = 2;

switch ($pilihan){
  case 1;
    echo "Lihat Produk\n";
    break;
  case 2;
  echo "Transfer\n";
  break;
  case 3;
  echo "Bayar Tagihan\n";
  break;
  default:
  echo "Pilihan tidak valid\n";
}

$jawab = 'y';
switch ($jawab){
  case 'y':
  case 'Y':
    echo "anda menjawab YA\n";
    break;
  case 'n':
  case 'N':
    echo "Anda menjawab Tidak\n";
    break;
  default:
    echo "Jawaban tidak dikenal\n";
}

$k = 1;
echo "tanpa break : ";
switch ($k){
  case 1: echo "Satu";
  case 2: echo "Dua";
  case 3: echo "Tiga";
}
echo "\n";