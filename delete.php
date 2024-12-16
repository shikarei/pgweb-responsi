<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsipgweb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];
    $sql_hapus = "DELETE FROM batik WHERE id = $id_hapus";

    if ($conn->query($sql_hapus) === TRUE) {
        header("Location: index.php?message=Data berhasil dihapus.");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
