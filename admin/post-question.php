<?php

session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["id_admin"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"])) {
  $quizId = (int)$_GET["quiz_id"];

  $soal = htmlspecialchars($_POST["soal"]);
  $jawaban1 = htmlspecialchars($_POST["jawaban1"]);
  $jawaban2 = htmlspecialchars($_POST["jawaban2"]);
  $jawaban3 = htmlspecialchars($_POST["jawaban3"]);
  $jawabanBenar = (int)$_POST["jawaban_benar"];

  if ( $soal == "" || $jawaban1 == "" || $jawaban2 == "" || $jawaban3 == "" || $jawabanBenar <= 0) {
    header("Location: quiz.php?quiz_id=$quizID&added_status=failed");
    exit;
  }

  try {
    include_once "../db/config.php";

    $query1 = "INSERT INTO tb_soal (id_kuis, soal, jawaban1, jawaban2, jawaban3, jawaban_benar) VALUES ('$quizId', '$soal', '$jawaban1', '$jawaban2', '$jawaban3', '$jawabanBenar')";

    $sql1 = mysqli_query($conn, $query1);

    $query2 = "UPDATE tb_kuis SET jumlah_soal = jumlah_soal + 1 WHERE id_kuis = $quizId";

    $sql2 = mysqli_query($conn, $query2);

    mysqli_close($conn);

    header("Location: quiz.php?quiz_id=$quizId");
    exit;
  }

  catch (Exception $e) {
    echo "Error: " . $e->getMessage();

    // header("Location: 404.php");
    // exit;
  }
}


