<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["id_admin"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"]) && isset($_GET["question_id"]) && is_numeric((int)$_GET["question_id"])) {
  $quizId = (int)$_GET["quiz_id"];
  $questionId = (int)$_GET["question_id"];

  try {
    include_once "../db/config.php";

    $query1 = "DELETE FROM tb_soal WHERE id_soal = $questionId AND id_kuis = $quizId";

    $sql1 = mysqli_query($conn, $query1);

    $query2 = "UPDATE tb_kuis SET jumlah_soal = jumlah_soal - 1 WHERE id_kuis = $quizId";

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


