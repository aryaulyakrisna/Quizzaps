<?php
  session_start();

  if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
  }

  $title = "Dashboard";
  $flaticon = "../assets/icons/flaticon.png";
  $jumlahSoal = 0;
  $soalTerjawab = 0;
  $username = $_SESSION["username"];

  try {
    include_once "../db/config.php";
    $query = "SELECT jumlah_hasil FROM tb_daftar_kuis";
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($sql)) {
      $jumlahSoal++;
      if ($row["jumlah_hasil"] > 0) {
        $soalTerjawab++;
      }
    }
  }

  catch (Exception $e) {
    header("Location: 404.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <link
    rel="icon"
    href="<?= $flaticon ?>"
    type="image/x-icon"
  />

  <link rel="stylesheet" href="../output.css">
  
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.4/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="w-full min-h-screen overflow-hidden poppins-regular px-4">
  
  <main class="max-w-3xl w-full flex-col px-8 pt-48 mx-auto">
    <div class="w-full">
      <div class="poppins-semibold  text-2xl mb-2">Hi! <?= $username ?> 👋</div>
      
      <div class="flex flex-col w-full mb-4">
        <div class="divider"></div>
      </div>
      
      <div class="flex flex-col w-full lg:flex-row mb-4">
        <div class="grid flex-grow h-32 card bg-base-300 rounded-box px-8 py-6 shadow-md">
          <span class="mb-2 text-center">Jumlah soal:</span>
          <div class="w-full text-center poppins-semibold text-3xl"><?= $jumlahSoal ?></div>
        </div> 
        <div class="divider lg:divider-horizontal"></div> 
        <div class="grid flex-grow h-32 card bg-base-300 rounded-box p-8 py-6 shadow-md">
          <span class="mb-2 text-center">Soal terjawab:</span>
          <div class="w-full text-center poppins-semibold text-3xl"><?= $soalTerjawab ?></div>
        </div>
      </div>
    </div>
  </main>
  <?php include "header.php"?>  
  
  <script>
    document.getElementById("#btn-yes").addEventListener("click", () => {
      window.location = "logout.php";
    })
  </script>
</body>
</html>