<?php
declare(strict_types=1);

$a = 10;
$b = 20;
$maks = $a > $b ? $a : $b; /* operator ternary jika a lebih dari b maka isi dengan a dan jika a tidak lebih dari b maka isi dengan b */
echo "Maksimum: $maks<br>";

$nilai = 80;
$status = $nilai >= 75 ? 'Lulus' : 'Tidak Lulus';
echo "Status : $status<br>";

$input = "0";
echo "ELvis ?:".($input ?: 'default')."<br>"; /* menggunakan operator elvis */
echo "Null ??:".($input ?? 'default')."<br>"; /* null coalescing   */

$umur = $_GET['umur'] ?? 21;
echo "Umur: $umur: $umur<br>";