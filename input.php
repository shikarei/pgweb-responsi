<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data</title>
    <style>
        /* Gaya Umum */
        body {
            font-family: monospace;
            background-color: #2b0066;
            color: #3f008d;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        /* Gaya Keterangan */
        #keterangan {
            background-color: #d9edf7;
            color: #0035e4;
            padding: 12px;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
            text-align: center;
            margin-bottom: 15px;
            font-size: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Gaya Formulir */
        h1 {
            color: #d9edf7;
            text-align: center;
        }

        form {
            background-color: #bddcff;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        label {
            font-weight: bold;
            color: #250065;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #110054;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 12px;
        }

        input[type="submit"] {
            background-color: #330078;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: monospace;
            font-size: 14px;
            font-weight: bold;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0fefff;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $toko = $_POST['toko'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $kategori = $_POST['kategori'];

        if (!is_numeric($longitude) || !is_numeric($latitude)) {
            echo "<p>Error: Longitude dan Latitude harus berupa angka.</p>";
            exit();
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "responsipgweb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $stmt = $conn->prepare("INSERT INTO batik (toko, longitude, latitude, kategori) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdds", $toko, $longitude, $latitude, $kategori);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit(); 
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <div id="keterangan">Masukkan data toko, longitude, latitude, dan kategori dengan benar. Pastikan data sesuai dengan format yang telah ditentukan.</div>

    <h1>Form Input</h1>
    <form action="" onsubmit="return validateForm()" method="post">
        <label for="toko">Toko:</label>
        <input type="text" id="toko" name="toko" value="" required>

        <label for="longitude">Longitude:</label>
        <input type="number" id="longitude" name="longitude" step="any" value="" required>

        <label for="latitude">Latitude:</label>
        <input type="number" id="latitude" name="latitude" step="any" value="" required>

        <label for="kategori">Kategori:</label>
        <input type="text" id="kategori" name="kategori" value="" required>

        <input type="submit" value="Submit">
    </form>

    <script>
        function validateForm() {
            const longitude = document.getElementById("longitude").value;
            const latitude = document.getElementById("latitude").value;

            if (isNaN(longitude) || isNaN(latitude)) {
                alert("Longitude dan Latitude harus berupa angka.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
