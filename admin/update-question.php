<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"]) && isset($_GET["id"]) && is_numeric((int)$_GET["id"])) {
  $quizID = (int)$_GET["quiz_id"];
  $ID = (int)$_GET["id"];

  $soal = htmlspecialchars($_POST["soal"]);
  $jawaban1 = htmlspecialchars($_POST["jawaban1"]);
  $jawaban2 = htmlspecialchars($_POST["jawaban2"]);
  $jawaban3 = htmlspecialchars($_POST["jawaban3"]);
  $jawabanBenar = (int)$_POST["jawaban_benar$ID"];

  try {
    include_once "../db/config.php";

    $query1 = "UPDATE tb_soal_$quizID SET soal = '$soal', jawaban1 = '$jawaban1', jawaban2 = '$jawaban2', jawaban3 = '$jawaban3', jawaban_benar = '$jawabanBenar'  WHERE id = $ID";

    $sql1 = mysqli_query($conn, $query1);;

    mysqli_close($conn);

    header("Location: quiz.php?quiz_id=$quizID");
    exit;
  }

  catch (Exception $e) {
    echo "Error: " . $e->getMessage();

    // header("Location: 404.php");
    // exit;
  }
}