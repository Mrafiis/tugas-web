<?php
declare(strict_types=1);

$sudahLogin =true;
$peran = 'admin';

if($sudahLogin ){
  if ($peran === 'admin'){
    echo "Selamat datang, admin. akses penuh. \n";
  } elseif ($peran === 'operator'){
    echo "Selamat datang, Operator. Akses terbatas. \n";
  } else {
    echo "Peran tidak dikenal. \n";
  }
}

$terverifikasi = true;
$saldo = 120000;
if($sudahLogin && $terverifikasi && $saldo >= 100000){
  echo "Transaksi besar diizinkan";
}