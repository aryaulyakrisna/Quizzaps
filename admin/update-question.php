<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["id_admin"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"]) && isset($_GET["question_id"]) && is_numeric((int)$_GET["question_id"])) {
  $questionId = (int)$_GET["question_id"];
  $quizId = (int)$_GET["quiz_id"];

  $soal = htmlspecialchars($_POST["soal"]);
  $jawaban1 = htmlspecialchars($_POST["jawaban1"]);
  $jawaban2 = htmlspecialchars($_POST["jawaban2"]);
  $jawaban3 = htmlspecialchars($_POST["jawaban3"]);
  $jawabanBenar = (int)$_POST["jawaban_benar$questionId"];

  try {
    include_once "../db/config.php";

    $query1 = "UPDATE tb_soal SET soal = '$soal', jawaban1 = '$jawaban1', jawaban2 = '$jawaban2', jawaban3 = '$jawaban3', jawaban_benar = '$jawabanBenar'  WHERE id_soal = $questionId AND id_kuis = $quizId";

    $sql1 = mysqli_query($conn, $query1);;

    mysqli_close($conn);

    header("Location: quiz.php?quiz_id=$quizId");
    exit;
  }

  catch (Exception $e) {
    // echo "Error: " . $e->getMessage();

    header("Location: 404.php");
    exit;
  }
}