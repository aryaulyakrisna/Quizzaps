<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["id_admin"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"]) && isset($_POST["quiz_name"])) {
  $quizName = htmlspecialchars($_POST["quiz_name"]);
  $quizId = (int)$_GET["quiz_id"];

  try {
    include_once "../db/config.php";

    $query = "UPDATE tb_kuis SET nama_kuis = ? WHERE id_kuis = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "si", $quizName, $quizId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


    header("Location: quiz.php?quiz_id=$quizId");
    exit;
  }

  catch (Exception $e) {
    // echo "Error: " . $e->getMessage();

    header("Location: quiz.php?quiz_id=$quizId&status=failed");
    exit;
  }
}


