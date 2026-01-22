<?php
session_start();
require_once 'config.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Hapus semua data terkait user
// 1. Hapus histori pemesanan
$stmt = $conn->prepare("DELETE FROM histori WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();

// 2. Hapus user
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    $stmt->close();
    
    // Hapus session
    session_destroy();
    
    // Redirect ke login dengan pesan
    header("Location: login.php?msg=account_deleted");
    exit();
} else {
    $stmt->close();
    
    // Jika gagal, redirect ke profil dengan pesan error
    header("Location: profil.php?error=delete_failed");
    exit();
}
?>