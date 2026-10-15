
<?php
$flash = take_flash();
$_SESSION['csrf_token'] ??= bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - <?= e(APP_NAME) ?></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f4f9;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 32px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .login-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: #e7efff;
            color: #0d6efd;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center fw-bold">Inventory System</h3>
        <p class="text-center text-muted mb-4">
            Silakan login untuk masuk ke halaman dsahboard
        </p>
        <?php if ($flash): ?>
            <div class="alert alert-<?= e($flash['type']) ?>">
                <?= e($flash['message']) ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?= base_url('auth/authenticate') ?>">
            <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>">
            <div class="mb-3">
                <label for="username" class="form-label">
                    Username
                </label>
                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Masukkan username" maxlength="50" autocomplete="username" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">
                    Password
                </label>
                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Masukkan password" autocomplete="current-password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">
                Login
            </button>
        </form>
    </div>
</body>
</html>
