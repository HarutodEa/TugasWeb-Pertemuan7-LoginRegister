<?php
session_start();
$error = '';

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $file = 'users.json';

    if (!file_exists($file)) {
        file_put_contents($file, '[]');
    }
    
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    if (!is_array($users)) {
        $users = [];
    }

    $foundUser = null;
    foreach ($users as $user) {
        if (isset($user['email']) && $user['email'] === $email) {
            $foundUser = $user;
            break;
        }
    }

    if ($foundUser && password_verify($password, $foundUser['password'])) {
        $_SESSION['user_id'] = $foundUser['id'];
        $_SESSION['username'] = $foundUser['nama'];
        $_SESSION['email'] = $foundUser['email'];
        
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>
</head>
<body>
    <h2>Halaman Login</h2>
    
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'registered'): ?>
        <p style="color: green;">Registrasi berhasil! Silakan login.</p>
    <?php endif; ?>
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'logged_out'): ?>
        <p style="color: green;">Anda telah berhasil logout.</p>
    <?php endif; ?>

    <?php if ($error): ?>
        <p style="color: red;"><strong>Error:</strong> <?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div style="margin-bottom: 10px;">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</body>
</html>