<?php

$title = "Quizzaps | Choose Your Quiz";
$flaticon = "./assets/icons/flaticon.png";
$output = "./output.css";

  try {
    include_once "db/config.php";
    $query = "SELECT * from tb_kuis";
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
    mysqli_close($conn);
  } 

  catch (Exception $e) {
    echo $e->getMessage();
    // header("Location: ./404.php");
    // exit;
  }

  include_once "./template/header.php";
?>
<body class="overflow-x-hidden">
  <header class="lg:px-20 px-8 text-sm h-[100px] flex fixed top-0 right-0 w-full justify-between items-center shadow-md z-1000 bg-[#1D232A]">
      <h1 class="text-2xl max-md:text-lg text-[#6A75F1] poppins-semibold">Choose Your Quiz!</h1>
      <a href="./" class="btn btn-primary poppins-semibold tracking-wide">Go Back!</a>
  </header>

  <main class="max-w-2xl w-full flex flex-col gap-2 px-8 pt-48 mx-auto">
    <?php
    if (mysqli_num_rows($sql) > 0) {
      while ($row = mysqli_fetch_assoc($sql)) {
          if ($row['jumlah_soal'] != 0 && $row['jumlah_soal'] != "0") { 
    ?>
        <a href='./quiz.php?quiz_id=<?= $row["id_kuis"] ?>' class='w-full poppins-semibold px-4 py-4 text-nowrap overflow-hidden border-2 transition-all flex border-gray-900 group hover:text-[#1D232A] hover:bg-[#6A75F1] rounded-lg justify-center items-center gap-4 active:scale-[0.975] shadow-lg' title="jumlah soal">
          <?= $row["nama_kuis"] ?>
          <span class="min-w-10 text-sm py-1 px-2 group-hover:bg-[#1D232A] group-hover:text-[#6A75F1] bg-[#6A75F1] text-[#1D232A] flex justify-center items-center rounded-full"><?= $row["jumlah_soal"] ?></span>
        </a>

    <?php }}} 
    else {
    ?>

      <div class="px-8 max-sm:px-4 poppins-bold tracking-wide mx-auto">No quiz were added here!</div>

    <?php } ?>
  </main>
</body>
