<?php
$nama_kuis = htmlspecialchars($_GET["nama_kuis"]);
$title = "Quizzaps | Form";
$flaticon = "flaticon.png";
$display = 0;
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
<body class="w-full min-h-screen flex justify-center items-center">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="fixed max-md:bottom-0 -bottom-[20%]"><path fill="#6A75F1" fill-opacity="1" d="M0,96L34.3,96C68.6,96,137,96,206,85.3C274.3,75,343,53,411,37.3C480,21,549,11,617,37.3C685.7,64,754,128,823,138.7C891.4,149,960,107,1029,85.3C1097.1,64,1166,64,1234,69.3C1302.9,75,1371,85,1406,90.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
  <header class="px-20 h-[100px] flex fixed top-0 w-full justify-between items-center">
    <a href="./" class="text-nowrap"><span class="text-2xl text-[#6A75F1] mr-2">Quizzaps</span> by Kelompok 4</a>
  </header>

  <main class="max-w-md w-full text-center flex-col justify-center mb-4 px-8 py-10 bg-[#6A75F1]/10 backdrop-blur-sm shadow-xl rounded-3xl mx-4">
    <form action="./choose-your-quiz.php" method="post" class="w-full flex flex-col items-start gap-4">
      <div id="steps" class="w-full flex flex-col items-start gap-4 hidden">
        <span class="label-text ml-1">Nama:</span>
        <input id="nama" type="text" class="input w-full" placeholder="Nama" name="nama">
        
        <span class="label-text ml-1">NPM:</span>
        <input id="npm" type="number" class="input w-full [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="NPM" name="npm">
        
        <span class="label-text ml-1">Kelas:</span>
        <input id="kelas" type="text" class="input w-full" placeholder="Kelas" name="kelas">
      </div>

      <div id="steps" class="w-full flex flex-col items-start gap-4 ">
        <h1 class="rounded-lg bg-[#1D232A] w-full p-4 min-h-fit">Apa yang kamu tidak sukai dalam pemrograman?</h1>

        <div
          id="input-container"
          class="w-full flex gap-4 p-4 rounded-lg bg-[#1D232A] hover:text-[#1D232A] hover:bg-[#6A75F1]"
        >
          <input
            data-value=""
            name=""
            type="radio"
            value=""
            class="scale-0"
          />
          <span>P</span>
        </div>

        <div
          id="input-container"
          class="w-full flex gap-4 p-4 rounded-lg bg-[#1D232A] hover:text-[#1D232A] hover:bg-[#6A75F1]"
        >
          <input
            data-value=""
            name=""
            type="radio"
            value=""
            class="scale-0"
          />
          <span>o</span>
        </div>

        <div
          id="input-container"
          class="w-full flex gap-4 p-4 rounded-lg bg-[#1D232A] hover:text-[#1D232A] hover:bg-[#6A75F1]"
        >
          <input
            data-value=""
            name=""
            type="radio"
            value=""
            class="scale-0"
          />
          <span>h</span>
        </div>
      </div>

      
      <div class="w-full mt-6">
        <button id="btn-prev" class="btn btn-primary font-bold tracking-wide w-[25%] mr-1">Prev</button>
        <button id="btn-next" class="btn btn-primary font-bold tracking-wide w-[25%]" disabled>Next</button>
      </div>
    </form>
  </main>
  
  <script>
    setSubmit();

    document.getElementById("nama").addEventListener("keyup", setSubmit);
    document.getElementById("npm").addEventListener("keyup", setSubmit);
    document.getElementById("kelas").addEventListener("keyup", setSubmit);

    function setSubmit() {
      const nama = document.getElementById("nama")?.value.replace(/<\s*script\s*>|<\/\s*script\s*>|<\?php|<\?|\?>|<\?=|javascript:|"|'|`|/gi, '');
      const npm = document.getElementById("npm")?.value.replace(/<\s*script\s*>|<\/\s*script\s*>|<\?php|<\?|\?>|<\?=|javascript:|"|/gi, '');
      const kelas = document.getElementById("kelas")?.value.replace(/<\s*script\s*>|<\/\s*script\s*>|<\?php|<\?|\?>|<\?=|javascript:|"|'|`|\s/gi, '');

      document.getElementById("nama").value = nama;
      document.getElementById("npm").value = npm;
      document.getElementById("kelas").value = kelas;

      if (nama && npm && kelas && document.getElementById("nama").value && document.getElementById("npm").value && document.getElementById("kelas").value) {
        document.getElementById("btn-next").removeAttribute("disabled");
      } else if (!document.getElementById("btn-next").hasAttribute("disabled")) {
        document.getElementById("btn-next").setAttribute("disabled", "disabled");
      }
    }

  </script>
</body>
</html>