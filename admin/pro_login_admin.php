<?php
session_start();
include 'config.php'; // Pastikan Anda telah mengatur koneksi database di file config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    try {
        // Buat koneksi menggunakan PDO
        $pdo = new PDO($dsn, $db_username, $db_password, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query SQL menggunakan prepared statements
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Login sukses, simpan data user di sesi
            $_SESSION['user'] = $user;
            header("Location: admin_dashboard.php"); // Ganti dengan halaman dashboard admin Anda
            exit();
        } else {
            // Login gagal, kembali ke halaman login
            header("Location: login_admin.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: login_admin.php");
    exit();
}
?>
