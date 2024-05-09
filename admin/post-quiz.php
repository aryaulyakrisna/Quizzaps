<?php

session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nama_kuis"])) {
    try {
        include_once "../db/config.php";

        $namaKuis = htmlspecialchars($_POST["nama_kuis"]);

        $query1 = "INSERT INTO tb_daftar_kuis (nama_kuis) VALUES (?)";
        $stmt1 = mysqli_prepare($conn, $query1);
        mysqli_stmt_bind_param($stmt1, "s", $namaKuis);
        mysqli_stmt_execute($stmt1);
        $insertedId = mysqli_insert_id($conn);

        $query2 = "CREATE TABLE `tb_hasil_$insertedId` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `npm` int(11) NOT NULL UNIQUE KEY,
            `nama` varchar(30) NOT NULL,
            `kelas` varchar(5) NOT NULL,
            `jawaban_benar` int(11) NOT NULL,
            `jawaban_salah` int(11) NOT NULL,
            `skor` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
        $sql2 = mysqli_query($conn, $query2);

        $query3 = "CREATE TABLE `tb_soal_$insertedId` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `soal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
            `jawaban1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
            `jawaban2` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
            `jawaban3` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
            `jawaban_benar` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;";
        $sql3 = mysqli_query($conn, $query3);

        mysqli_close($conn);

        header("Location: add-quiz.php?status=successful&id=$insertedId");
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
