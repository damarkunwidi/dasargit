<?php
session_start();
$host = 'cloud.hypercloudhost.com';
$db = 'ppexbjum_smk08';
$user = ' ppexbjum_damarkun';
$pass = 'eH{*v=-%gJ*9';

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal</title>
    <link rel="stylesheet" href="style.css"></link>
</head>
<body>
    <h2>Jurnal kelas XI PPlG</h2>

    <form class="jurnal" method="POST" action="jurnal.php">
        <input type="text" name="kode_guru" value="<?php echo $student['kode_guru'];?>">
        <label><input type="radio"name="status" value="1">sakit</label><br>
        <label><input type="radio"name="status" value="2">izin</label><br>
        <label><input type="radio"name="status" value="3">alpa</label><br>
        <button type="submit">submit</button>
</form>
</body>
</html>