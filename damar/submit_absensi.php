<?php
// submit_absensi.php
$host = 'cloud.hypercloudhost.com';
$db = 'ppexbjum_smk08';
$user = 'ppexbjum_damarkun';
$pass = 'eH{*v=-%gJ*9';
$conn = new mysqli($host, $user, $pass, $db);
If ($conn->connect_error) {
 Die("Connection failed: " . $conn->connect_error);}
$nisn = $_POST['nisn'];
$status = $_POST['status'];
$date = date('Y-m-d'); // tanggal saat ini
$sql = "INSERT INTO absensi (nisn, id_absen, tanggal_absensi) VALUES ('$nisn', $status, 
'$date')";

if($conn->query($sql)===TRUE){
    $_SESSION['submit'] = "siswa bernama ".$siswa['nama_siswa']." berhasil absen";
    header("location:index.php");
}else{
    echo"error:".$sql."<br>".$conn->eror;
    $conn->close();
}

?>