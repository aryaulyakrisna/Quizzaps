<?php

session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["user_id"])) {
  header("Location: index.php");
  exit;
}
  
if (isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"]) && isset($_GET["result_id"]) && is_numeric((int)$_GET["result_id"])) {
  $quizID = (int)$_GET["quiz_id"];
  $resultID = (int)$_GET["result_id"];

  try {
    include_once "../db/config.php";

    $query1 = "DELETE FROM tb_hasil_$quizID where id = $resultID";

    $sql1 = mysqli_query($conn, $query1);

    $query2 = "UPDATE tb_daftar_kuis SET jumlah_hasil = jumlah_hasil - 1 WHERE quiz_id = $quizID";

    $sql2 = mysqli_query($conn, $query2);

    $query3 = "SELECT nama_kuis FROM tb_daftar_kuis WHERE quiz_id = $quizID";

    $sql3 = mysqli_query($conn, $query3);

    $namaKuis = mysqli_fetch_assoc($sql3);

    mysqli_close($conn);

    header("Location: user-result.php?quiz_id=$quizID&nama_kuis=$namaKuis");
    exit;
  }

  catch (Exception $e) {
    echo "Error: " . $e->getMessage();

    // header("Location: 404.php");
    // exit;
  }
}


