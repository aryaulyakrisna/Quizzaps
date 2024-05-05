<?php
$emote = "🔥";

$nama = "Arya Ulya Krisna Musdatullah";
$score = 90;
// $npm = (int)htmlspecialchars($_POST['npm']);
// $kelas = htmlspecialchars($_POST['kelas']);
// $isFull = 0;


// if ($nama && $npm && $kelas && $score && is_string($nama) && is_int($npm) && is_string($kelas) && $is_int($score)){
  //    $isFull = 1;
  //   };
if ($score <= 75) $emote = "😭";

$title = "Quizzaps | Your Score!! $emote";
$flaticon = "flaticon.png";
  
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
	<!--===============================================================================================-->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.4/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="w-full min-h-screen flex justify-center items-center">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="fixed max-md:bottom-0 -bottom-[20%]"><path fill="#6A75F1" fill-opacity="1" d="M0,96L34.3,96C68.6,96,137,96,206,85.3C274.3,75,343,53,411,37.3C480,21,549,11,617,37.3C685.7,64,754,128,823,138.7C891.4,149,960,107,1029,85.3C1097.1,64,1166,64,1234,69.3C1302.9,75,1371,85,1406,90.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
  <header class="px-20 h-[100px] flex fixed top-0 w-full justify-between items-center">
    <a href="./" class="text-nowrap"><span class="text-2xl text-[#6A75F1] mr-2">Quizzaps</span> by Kelompok 4</a>
  </header>

  <main class="relative max-w-md w-full text-center flex-col justify-center mb-4 px-8 py-10 bg-[#6A75F1]/10 backdrop-blur-sm shadow-xl rounded-3xl mx-4 scale-0 transition-all duration-500">
    <div class="absolute -top-6 right-0 w-full flex justify-center">
      <div class="h-12 px-6 w-[75%] bg-[#6A75F1] text-[#1D232A] poppins-semibold text-xl text-nowrap overflow-hidden flex items-center justify-center rounded-full text-center">Your Score!!&#160;<?= $emote ?></div>
    </div>
    <div class="flex w-full justify-center my-10">
      <div class="h-screen w-full max-h-[220px] max-w-[220px] rounded-full border-[16px] border-[#6A75F1] flex justify-center items-center shadow-lg">
        <span class="text-5xl poppins-bold">334</span>
      </div>
    </div>
    <div class="flex w-full">
      <div class="grid h-20 flex-grow card bg-base-300 rounded-box place-items-center"><span class="text-green-500 poppins-bold text-xl">45</span></div>
      <div class="divider divider-horizontal"></div>
      <div class="grid h-20 flex-grow card bg-base-300 rounded-box place-items-center"><span class="text-red-500 poppins-bold text-xl">5</span></div>
    </div>
  </main>

  <script>

    const intersectionObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if(entry.isIntersecting) {
          document.querySelector("main").classList.remove("scale-0");
        }
      });
    });
    // start observing
    intersectionObserver.observe(document.querySelector("main"));
  </script>
</body>
</html>

