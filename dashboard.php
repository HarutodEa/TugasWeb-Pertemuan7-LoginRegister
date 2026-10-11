<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pengguna</title>
</head>
<body>
    <h1>Dashboard</h1>
    <div style="border: 1px solid #ccc; padding: 15px; max-width: 400px;">
        <p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</p>
        <p>Email Anda: <em><?= htmlspecialchars($_SESSION['email']) ?></em></p>
    </div>
    <br>
    <a href="logout.php" style="color: red; text-decoration: none;">[ Logout dari Sistem ]</a>
</body>
</html>