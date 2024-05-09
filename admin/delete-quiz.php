<?php

session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["user_id"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"])) {
  $quizID = (int)$_GET["quiz_id"];

  try {
    include_once "../db/config.php";

    $query1 = "DROP TABLE IF EXISTS tb_soal_$quizID";

    $sql1 = mysqli_query($conn, $query1);

    $query2 = "DROP TABLE IF EXISTS tb_hasil_$quizID";

    $sql2 = mysqli_query($conn, $query2);

    $query3 = "DELETE FROM tb_daftar_kuis WHERE quiz_id = ?";

    $stmt3 = mysqli_prepare($conn, $query3);

    mysqli_stmt_bind_param($stmt3, "i", $quizID);

    mysqli_stmt_execute($stmt3);

    mysqli_stmt_close($stmt3);

    mysqli_close($conn);

    header("Location: quizes.php");
    exit;
  }

  catch (Exception $e) {
    // echo "Error: " . $e->getMessage();

    header("Location: 404.php");
    exit;
  }
}


