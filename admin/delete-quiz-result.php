<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"])) {
  $quizID = (int)$_GET["quiz_id"];

  try {
    include_once "../db/config.php";

    $query = "DELETE FROM tb_hasil_$quizID";
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $query1 = "UPDATE tb_daftar_kuis SET jumlah_hasil = 0 WHERE quiz_id = $quizID";

    mysqli_close($conn);
  }
  
  catch (Exception $e) {
    header("Location: 404.php");
    exit;
  }
  
  finally {
    header("Location: quiz-results.php");
    exit;
  }
}

