<?php
include_once "db/config.php";

$title = "Quizzaps | Choose Your Quiz";
$flaticon = "flaticon.png";

try {
  $geget = 'asdjsjhdajksh asjahdjshdk';
  $query = "SELECT * from tb_daftar_kuis";
  $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
} 

catch (Exception $e) {
  header("Location: ./404.php");
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
    href="./assets/icons/<?= $flaticon ?>"
    type="image/x-icon"
  />

  <link rel="stylesheet" href="./output.css">
  
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.4/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="w-full min-h-screen overflow-x-hidden poppins-regular">
  <header class="px-20 h-[100px] flex fixed top-0 right-0 w-full justify-between items-center shadow-md z-1000">
      <h1 class="text-2xl max-md:text-lg text-[#6A75F1] poppins-semibold">Choose Your Quiz!</h1>
      <a href="./" class="btn btn-primary poppins-semibold tracking-wide">Go Back!</a>
  </header>

  <main class="max-w-xl translate-y-[200px] border-1 flex flex-col items-center gap-1 mx-auto px-4">
    <?php
			while ($value = mysqli_fetch_array($sql)) { ?>

      <a href="./quiz.php?nama_kuis=<?= $value["nama_kuis"] ?>" class="w-full poppins-semibold px-4 py-4 text-nowrap overflow-hidden border-2 transition-all flex border-gray-900 group hover:text-[#1D232A] hover:bg-[#6A75F1] rounded-lg justify-center items-center gap-4 active:scale-[0.975] shadow-lg" title="jumlah soal"><?= $value["nama_kuis"] ?>
        <span class="min-w-10 text-sm py-1 px-2 group-hover:bg-[#1D232A] group-hover:text-[#6A75F1] bg-[#6A75F1] text-[#1D232A] flex justify-center items-center rounded-full"><?= $value['jumlah_soal'] ?></span>
      </a>

    <?php
      }
    ?>
  </main>

</html>