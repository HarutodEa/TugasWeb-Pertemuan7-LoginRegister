<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($nama) || empty($email) || empty($password)) {
        $error = "Semua field wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid!";
    } elseif (strlen($password) < 6) {
        $error = "Password minimal 6 karakter!";
    } else {
        $nama = htmlspecialchars($nama);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $file = 'users.json';
        
        if (!file_exists($file)) {
            file_put_contents($file, '[]');
        }
        $json = file_get_contents($file);
        $users = json_decode($json, true);
        if (!is_array($users)) {
            $users = [];
        }

        $emailTerdaftar = false;
        foreach ($users as $u) {
            if (isset($u['email']) && $u['email'] === $email) {
                $emailTerdaftar = true;
                break;
            }
        }

        if ($emailTerdaftar) {
            $error = "Email sudah terdaftar! Silakan gunakan email lain.";
        } else {
            $newUser = [
                'id' => count($users) + 1,
                'nama' => $nama,
                'email' => $email,
                'password' => $hashedPassword,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $users[] = $newUser;
            
            file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
            header('Location: login.php?msg=registered');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun</title>
</head>
<body>
    <h2>Halaman Registrasi</h2>
    
    <?php if ($error): ?>
        <p style="color: red;"><strong>Error:</strong> <?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div style="margin-bottom: 10px;">
            <label for="nama">Nama Lengkap:</label><br>
            <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Minimal 6 karakter" required>
        </div>
        <button type="submit">Daftar Sekarang</button>
    </form>
    
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>
</html>