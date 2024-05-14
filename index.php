<?php
$title = "Quizzaps";
$flaticon = "./assets/icons/flaticon.png";
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

  <link rel="stylesheet" href="./output.css">

  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.4/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <script src="./js//style.js"></script>

</head>
<body class="w-full min-h-screen flex justify-center items-center overflow-hidden poppins-regular px-8">
  <div class="w-[546px] fixed bottom-0 right-[5%] max-lg:hidden"><img id="landing-page-img" src="./assets/icons/landing-page-img.svg" class=" w-full h-full min-lg:-translate-x-10 min-lg:translate-y-10 transition-all duration-500 delay-150"></div>
  <svg id="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" fixed w-[120%] -bottom-[30%] max-lg:-bottom-[5%] min-lg:translate-x-24 transition-all duration-500 delay-150"><path fill="#6A75F1" fill-opacity="1" d="M0,96L34.3,96C68.6,96,137,96,206,85.3C274.3,75,343,53,411,37.3C480,21,549,11,617,37.3C685.7,64,754,128,823,138.7C891.4,149,960,107,1029,85.3C1097.1,64,1166,64,1234,69.3C1302.9,75,1371,85,1406,90.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>

  <header class="px-20 h-[100px] flex fixed top-0 w-full justify-between items-center max-lg:px-8 max-sm:text-sm">
    <a href="./" class="flex items-center max-lg:text-xs"><img src="<?= $flaticon ?>" class="w-12" alt="Quizzaps-Logo"> Made by Kelompok 4 😊</a>
    <a href="./admin/" class="poppins-bold tracking-wide btn btn-primary">Login</a>
  </header>
  
  <main id="guest-action" class="max-w-7xl w-full text-start mx-4 min-lg:-translate-x-10 min-lg:translate-y-10 min-lg:opacity-0 transition-all duration-500 delay-150 z-1000">
    <h1 class="text-3xl poppins-bold mb-6">Tugas Kel 4, <span class="text-[#6A75F1]">Quizzaps</span></h1>
    <p class="max-w-[550px] w-full text-lg max-sm:text-sm">Dive into a world of knowledge and fun with our interactive quiz app, challenging your mind with endless trivia questions! Gain valuable insight to your programming knoledge.</p>
    <a href="./quizes.php" class="btn btn-primary mt-6 poppins-semibold tracking-wide">Start Quiz!</a>
  </main>

  <script>
    landingPageImgIntersection();
    wavesIntersection();
    guestActionIntersection();

    
  </script>
</html>