<?php
  session_start();

  if (!isset($_SESSION["username"]) || !isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
  }

  $title = "Dashboard";
  $flaticon = "../assets/icons/flaticon.png";
  $output = "../output.css";
  $jumlahSoal = 0;
  $soalTerjawab = 0;
  $username = ucfirst($_SESSION["username"]);

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

    mysqli_close($conn);
  }

  catch (Exception $e) {
    header("Location: 404.php");
    exit;
  }

  include_once "../template/header.php";
  include_once "../template/navbar.php";


?>
<body class="overflow-hidden px-4">
  
  <main class="max-w-3xl w-full flex-col px-8 pt-48 mx-auto">
    <div class="w-full">
      <div class="poppins-semibold  text-2xl mb-2">Hi! <?= $username ?> 👋</div>
      
      <div class="divider"></div>
      
      <div class="flex flex-col w-full lg:flex-row mb-4">
        <div class="grid flex-grow h-32 card bg-base-300 rounded-box px-8 py-6 shadow-md">
          <span class="mb-2 text-center">Jumlah Kuis:</span>
          <div class="w-full text-center poppins-semibold text-3xl"><?= $jumlahSoal ?></div>
        </div> 
        <div class="divider lg:divider-horizontal"></div> 
        <div class="grid flex-grow h-32 card bg-base-300 rounded-box p-8 py-6 shadow-md">
          <span class="mb-2 text-center">Kuis terjawab:</span>
          <div class="w-full text-center poppins-semibold text-3xl"><?= $soalTerjawab ?></div>
        </div>
      </div>

      <div class="divider"></div>
      <div>©2024, made by kelompok 8</div>

    </div>
  </main>
  
</body>
