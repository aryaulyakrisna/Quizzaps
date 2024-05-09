<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"]) && isset($_GET["id"]) && is_numeric((int)$_GET["id"])) {
  $quizID = (int)$_GET["quiz_id"];
  $ID = (int)$_GET["id"];

  try {
    include_once "../db/config.php";

    $query1 = "DELETE FROM tb_soal_$quizID WHERE id = $ID";

    $sql1 = mysqli_query($conn, $query1);

    $query2 = "UPDATE tb_daftar_kuis SET jumlah_soal = jumlah_soal - 1 WHERE quiz_id = $quizID";

    $sql2 = mysqli_query($conn, $query2);

    mysqli_close($conn);

    header("Location: quiz.php?quiz_id=$quizID");
    exit;
  }

  catch (Exception $e) {
    // echo "Error: " . $e->getMessage();

    header("Location: 404.php");
    exit;
  }
}


