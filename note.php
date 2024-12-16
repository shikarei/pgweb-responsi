<?php
// Tangkap data dari formulir
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $kritik = htmlspecialchars($_POST['kritik']);
    $saran = htmlspecialchars($_POST['saran']);

    // Format data yang akan disimpan
    $data = "Nama: $nama\nEmail: $email\nKritik: $kritik\nSaran: $saran\n--------------------------------------------\n";

    // Tulis ke file kritik_saran.txt
    file_put_contents('kritik_saran.txt', $data, FILE_APPEND);

    // Redirect ke halaman sukses
    header('Location: note.html');
    exit;
}
?>
