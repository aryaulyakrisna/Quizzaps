<?php

session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["id_admin"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"]) && isset($_GET["result_id"]) && is_numeric((int)$_GET["result_id"])) {
  $quizId = (int)$_GET["quiz_id"];
  $resultId = (int)$_GET["result_id"];

  try {
    include_once "../db/config.php";

    $query1 = "DELETE FROM tb_hasil WHERE id_hasil = $resultId";

    $sql1 = mysqli_query($conn, $query1);

    $query2 = "UPDATE tb_kuis SET jumlah_hasil = jumlah_hasil - 1 WHERE id_kuis = $quizId";

    $sql2 = mysqli_query($conn, $query2);

    $query3 = "SELECT nama_kuis FROM tb_kuis WHERE id_kuis = $quizId";

    $sql3 = mysqli_query($conn, $query3);

    $namaKuis = mysqli_fetch_assoc($sql3);

    mysqli_close($conn);

    header('Location: user-result.php?quiz_id=$quizId&quiz_name=$namaKuis["nama_kuis]');
    exit;
  }

  catch (Exception $e) {
    echo "Error: " . $e->getMessage();

    // header("Location: 404.php");
    // exit;
  }
}


