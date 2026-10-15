<!-- # file ini berfungsi agar php tahu cara membaca file .env -->

<?php
define('ROOT_PATH', dirname(__DIR__, 2)); /* sebuah konstanta agar bisa naik ke folder utama proyek, dir, 2 naik 2 folder */
function loadEnv(string $file): void { /* membuat fungsi untuk membaca .env , string $file artinya parameter menerima alamat file */
if (!file_exists($file)) return; /* jika file tidak ada maka berhenti */
foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) { /* membaca isi file .env */
    $line = trim($line); /* memberishkan spasi */
    if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) continue; /* membiarkan baris yang tidak penting, '' apakah kosong?, # apakah sebbuah kmentar?, = apakah tidak punya tanda sama dengan */
    [$name, $value] = array_map('trim', explode('=', $line, 2)); /* memisahkan nama dan nilai */
    $_ENV[$name] = trim($value, "\"'");  /* meyimpan ke $_ENV */
    putenv("$name=$value"); /* menyimpan ke sistem environment */
  }
}
loadEnv(ROOT_PATH . '/.env'); /* menjalankan fungsi loadENV */
function env(string $key, $default = null) { /* mengambil nialai dari .env */
  $value = $_ENV[$key] ?? getenv($key); /* mengambil nilai, operator ?? kalau yang pertaama ga ada gunakan yang kedua, jadi getenv */
  return ($value === false || $value === null || $value === '') ? $default : $value;
}
define('APP_NAME', env('APP_NAME', 'Inventory System')); /* membuat konfigurasi aplikasi, artinya buat app_name ambil dari app_name kalau tidak ada gunakan inventory sistem */
define('APP_ENV', env('APP_ENV', 'production'));
define('APP_DEBUG', filter_var(env('APP_DEBUG', false), FILTER_VALIDATE_BOOLEAN));
define('BASEURL', rtrim(env('BASE_URL', 'http://localhost:8000'), '/'));
date_default_timezone_set(env('APP_TIMEZONE', 'Asia/Jakarta'));
define('DB_HOST', env('DB_HOST', 'localhost')); /* konfigurasi database, artinya buat konstanta db_host isinya localhost */
define('DB_PORT', env('DB_PORT', '3306'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASS', env('DB_PASS', ''));
define('DB_NAME', env('DB_NAME', 'db_inventory'));