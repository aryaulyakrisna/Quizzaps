<?php

session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["id_admin"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"])) {
  $quizId = (int)$_GET["quiz_id"];

  try {
    include_once "../db/config.php";

    $query1 = "DELETE FROM tb_kuis WHERE id_kuis = ?";

    $stmt1 = mysqli_prepare($conn, $query1);

    mysqli_stmt_bind_param($stmt1, "i", $quizId);

    mysqli_stmt_execute($stmt1);

    mysqli_stmt_close($stmt1);


    $query2 = "DELETE FROM tb_soal WHERE id_kuis = ?";

    $stmt2 = mysqli_prepare($conn, $query2);

    mysqli_stmt_bind_param($stmt2, "i", $quizId);

    mysqli_stmt_execute($stmt2);

    mysqli_stmt_close($stmt2);


    $query3 = "DELETE FROM tb_hasil WHERE id_kuis = ?";

    $stmt3 = mysqli_prepare($conn, $query3);

    mysqli_stmt_bind_param($stmt3, "i", $quizId);

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


