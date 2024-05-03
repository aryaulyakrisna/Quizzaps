<?php
$nama = $_POST['nama'];
$npm = $_POST['npm'];
$kelas = $_POST['kelas'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p><?= $nama ?></p>
  <p><?= $npm ?> </p>
  <p><?= $kelas ?></p>
</body>
</html>