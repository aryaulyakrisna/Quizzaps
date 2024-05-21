<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"]) && isset($_POST["nama_kuis"])) {
  $quizID = (int)$_GET["quiz_id"];
  $namaKuis = htmlspecialchars($_POST["nama_kuis"]);

  echo $namaKuis;

  try {
    include_once "../db/config.php";

    $query1 = "UPDATE tb_daftar_kuis SET nama_kuis = '$namaKuis' WHERE quiz_id = $quizID";

    $sql1 = mysqli_query($conn, $query1);;

    mysqli_close($conn);

    header("Location: quiz.php?quiz_id=$quizID");
    exit;
  }

  catch (Exception $e) {
    // echo "Error: " . $e->getMessage();

    header("Location: quiz.php?quiz_id=$quizID&status=failed");
    exit;
  }
}


