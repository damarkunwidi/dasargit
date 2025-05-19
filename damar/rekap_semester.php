<?php
session_start();
$host = 'cloud.hypercloudhost.com';
$db = 'ppexbjum_smk08';
$user = 'ppexbjum_damarkun';
$pass = 'eH{*v=-%gJ*9';

$conn = new mysqli($host, $user, $pass, $db);

If ($conn->connect_error) {
    Die("Connection failed: " . $conn->connect_error);
}

$query=$conn->query(
    "SELECT
        siswa.nisn,
        siswa.nama_siswa,
        COUNT(CASE WHEN tipe_absen.nama_absen = 'Sakit' THEN 1 END) AS sakit,
        COUNT(CASE WHEN tipe_absen.nama_absen = 'Izin' THEN 1 END) AS izin,
        COUNT(CASE WHEN tipe_absen.nama_absen = 'Alpa' THEN 1 END) AS alpa
    FROM absensi
    JOIN siswa ON absensi.nisn = siswa.nisn
    JOIN tipe_absen ON absensi.id_absen = tipe_absen.id_absen
    WHERE
        absensi.tanggal_absensi BETWEEN '2025-01-01' AND '2025-12-31'
    GROUP BY siswa.nisn, siswa.nama_siswa;"

);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>ydk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Absensi Siswa</h2>
<form method="GET" action="rekap_semester.php">
    <input type="text" name="search" placeholder="cari nama siswa">
    <button type="submit">cari</button> 
</form>

<table border="1">
    <tr>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th>Sakit</th>
        <th>Izin</th>
        <th>Alpa</th>
    </tr>

    <?php
    while($row = $query->fetch_assoc()) {
        echo "<tr>
            <td>{$row['nisn']}</td>
            <td>{$row['nama_siswa']}</td>
            <td>{$row['sakit']}</td>
            <td>{$row['izin']}</td>
            <td>{$row['alpa']}</td>
        </tr>";
    }
    ?>
</table>
    
</body>
</html>