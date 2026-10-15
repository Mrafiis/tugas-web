<?php

// Mengamankan output dari HTML / XSS
function e(String $value): string 
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Format angka menjadi Rupiah
function rupiah(String $value): string
{
    return 'Rp ' . number_format((float)$value, 0, ',', '.');
}

// Membuat URL aplikasi
function base_url(string $path = ''): string
{
    return BASEURL . '/' . ltrim($path, '/');
}

// Mengambil pesan flash dari session
function take_flash(): ?array
{
    if (empty($_SESSION['flash'])) {
        return null;
    }
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}