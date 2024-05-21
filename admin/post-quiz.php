<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["id_admin"])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["quiz_name"])) {
    try {
        include_once "../db/config.php";

        $quizName = htmlspecialchars($_POST["quiz_name"]);
        $adminId = (int)$_SESSION["id_admin"];

        $query = "INSERT INTO tb_kuis (id_admin, nama_kuis) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "is", $adminId, $quizName);
        mysqli_stmt_execute($stmt);
        $insertedId = mysqli_insert_id($conn);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header("Location: add-quiz.php?status=successful&quiz_id=$insertedId");
        exit;
    } catch (Exception $e) {
        // echo "Error: ".$e->getMessage();

        header("Location: add-quiz.php?status=failed");
        exit;
    }
} else {

    header("Location: 404.php");
    exit;
}
