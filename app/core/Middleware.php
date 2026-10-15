
<?php

class Middleware
{
    public static function handle(array $url): void
    {
        $segments = array_values(
            array_filter($url, fn($part) => $part !== '')
        );
        $controller = strtolower($segments[0] ?? '');
        $method = strtolower($segments[1] ?? 'index');
        // Halaman yang boleh dibuka tanpa login
        $publicRoutes = [
            'auth/login',
            'auth/authenticate'
        ];
        $currentRoute = $controller . '/' . $method;
        // Kalau belum login, arahkan ke halaman login
        if (
            !in_array($currentRoute, $publicRoutes, true) &&
            empty($_SESSION['user'])
        ) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
        // Kalau udah login, jangan tampilin halaman login lagi
        if (
            !empty($_SESSION['user']) &&
            in_array($currentRoute, $publicRoutes, true)
        ) {
            header('Location: ' . BASEURL . '/');
            exit;
        }
        // Cuma admin yang boleh mengakses pengelolaan User
        if (
            $controller === 'users' &&
            ($_SESSION['user']['role'] ?? '') !== 'admin'
        ) {
            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'Kamu tidak memiliki izin mengakses menu Users.'
            ];
            header('Location: ' . BASEURL . '/');
            exit;
        }
    }
}
