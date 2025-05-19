<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jangan bang</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
</body>
</html>
<?php
session_start();
$host='cloud.hypercloudhost.com';
$db ='ppexbjum_smk08';
$user='ppexbjum_damarkun';
$pass='eH{*v=-%gJ*9';
$conn = new mysqli ($host,$user,$pass,$db);

function getHariIndonesia($tanggal) {
  $hariInggris = date('l', strtotime($tanggal)); // Nama hari dalam bahasa Inggris
  $hariIndonesia = [
      'Monday' => 'Senin',
      'Tuesday' => 'Selasa',
      'Wednesday' => 'Rabu',
      'Thursday' => 'Kamis',
      'Friday' => 'Jumat',
      'Saturday' => 'Sabtu',
      'Sunday' => 'Minggu',
  ];
  return $hariIndonesia[$hariInggris];
}
$query=$conn->query(
  "SELECT absensi.nisn,absensi.id_absen,siswa.nama_siswa,tipe_absen.nama_absen,absensi.tanggal_absensi
FROM absensi JOIN siswa ON absensi.nisn=siswa.nisn
JOIN tipe_absen ON absensi.id_absen=tipe_absen.id_absen 
WHERE tanggal_absensi=curdate();");

if($query->num_rows> 0 )
echo "<h2>daftar absen siswa</h2>";
  echo "<table border='1'>
  <th>nama siswa</th>
  <th>nisn</th>
  <th>keterangan</th>
  <th>hari</th>
  <th>tanggal absen</th>";

  while($row=$query->fetch_assoc()){
  $tanggal=$row['tanggal_absensi'];
  $hari=$tanggal ? getHariIndonesia($tanggal):'-';

  echo" <tr>
  <td>{$row['nama_siswa']}</td>
  <td>{$row['nisn']}</td>
  <td>{$row['nama_absen']}</td>
  <td>".getHariIndonesia($row['tanggal_absensi'])."</td>
  <td>{$row['tanggal_absensi']}</td>
  </tr>";
  }

   echo" </table>";
  

?>