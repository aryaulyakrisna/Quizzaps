<?php

  $title = "Quizzaps | Form";
  $flaticon = "./assets/icons/flaticon.png";
  $display = 0;
  
  if (isset($_GET["quiz_id"])) {
    if (is_int((int)$_GET["quiz_id"])) {
      $quizID = (int)$_GET["quiz_id"];
    }
  } else {
    header("Location: index.php");
    exit;
  }

  try {
    include_once "db/config.php";
    $rowindex = 0;
    $query = "SELECT soal, jawaban1, jawaban2, jawaban3 from tb_soal_" . $quizID;
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
  } 

  catch (Exception $e) {
    // echo "Error: " . $e->getMessage();

    header("Location: ./404.php");
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

  <link rel="stylesheet" href="./output.css">

  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.4/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <script defer src="./js/main.js"></script>

</head>
<body class="w-full min-h-screen flex justify-center items-center">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="fixed max-md:bottom-0 -bottom-[20%] max-lg:-bottom-[12.5%]"><path fill="#6A75F1" fill-opacity="1" d="M0,96L34.3,96C68.6,96,137,96,206,85.3C274.3,75,343,53,411,37.3C480,21,549,11,617,37.3C685.7,64,754,128,823,138.7C891.4,149,960,107,1029,85.3C1097.1,64,1166,64,1234,69.3C1302.9,75,1371,85,1406,90.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
  <header class="px-20 h-[100px] flex fixed top-0 w-full justify-between items-center">
    <a href="./" class="text-nowrap"><span class="text-2xl text-[#6A75F1] mr-2 poppins-bold tracking-wide">Quizzaps</span> by Kelompok 4</a>
  </header>

  <main class="max-w-md w-full text-center flex-col justify-center mb-4 px-8 py-10 bg-[#6A75F1]/10 backdrop-blur-sm shadow-xl rounded-3xl mx-4">
    <form action="./score.php?quiz_id=<?= $quizID ?>" method="post" class="w-full flex flex-col items-start gap-4">

      <div id="step-container" class="w-full">
        <div id="step" class="w-full flex flex-col items-start gap-4 ">
          <span class="label-text ml-1">Nama:</span>
          <input id="nama" type="text" class="input w-full" placeholder="Nama" name="nama">
          
          <span class="label-text ml-1">NPM:</span>
          <input id="npm" type="number" class="input w-full [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" placeholder="NPM" name="npm">
          
          <span class="label-text ml-1">Kelas:</span>
          <input id="kelas" type="text" class="input w-full" placeholder="Kelas" name="kelas">
        </div>

        <?php
          while ($row = mysqli_fetch_assoc($sql)) { 
            $rowindex++;    
        ?>

          <div id="step" class="w-full flex flex-col items-start gap-4 hidden">
            <h1 class="rounded-lg bg-[#1D232A] w-full p-4 min-h-24 flex items-center justify-center"><?= $rowindex .". ". $row["soal"] ?></h1>

            <input type="radio" name="jawaban<?= $rowindex ?>" id="jawaban" data-value="0" value="0" class="scale-0 hidden" checked>
            <div class="w-full flex flex-col items-start gap-4 ">
              <div
                id="radio-container"
                class="w-full flex items-center gap-6 p-4 rounded-lg bg-[#1D232A] hover:text-[#1D232A] hover:bg-[#6A75F1] group"
              >
                <input
                  id="jawaban"
                  data-value="1"
                  name="jawaban<?= $rowindex ?>"
                  type="radio"
                  value="1"
                  class="radio radio-sm checked:bg-[#6A75F1] group-hover:bg-[#1D232A] group-hover:checked:bg-[#6A75F1]"
                />
                <span class="text-start"><?= $row["jawaban1"] ?></span>
              </div>

              <div
                id="radio-container"
                class="w-full flex items-center gap-6 p-4 rounded-lg bg-[#1D232A] hover:text-[#1D232A] hover:bg-[#6A75F1] group"
              >
                <input
                  id="jawaban"
                  data-value="2"
                  name="jawaban<?= $rowindex ?>"
                  type="radio"
                  value="2"
                  class="radio radio-sm checked:bg-[#6A75F1] group-hover:bg-[#1D232A] group-hover:checked:bg-[#6A75F1]"
                />
                <span class=" text-start"><?= $row["jawaban2"] ?></span>
              </div>

              <div
                id="radio-container"
                class="w-full flex items-center gap-6 p-4 rounded-lg bg-[#1D232A] hover:text-[#1D232A] hover:bg-[#6A75F1] group"
              >
                <input
                  id="jawaban"
                  data-value="3"
                  name="jawaban<?= $rowindex ?>"
                  type="radio"
                  value="3"
                  class="radio radio-sm checked:bg-[#6A75F1] group-hover:bg-[#1D232A] group-hover:checked:bg-[#6A75F1]"
                />
                <span class="text-start"><?= $row["jawaban3"] ?></span>
              </div>
            </div>
          </div>
        
        <?php } ?>

        <div id="step" class="w-full hidden">
          <h1 class="rounded-lg bg-[#1D232A] w-full p-4 min-h-24 flex items-center justify-center px-8">Anda berada di ujung perjalanan! Apakah anda yakin untuk melakukan submit?</h1>
        </div>
      </div>

      
      <div class="w-full mt-6">
        <div id="btn-prev" class="btn btn-primary font-bold tracking-wide w-[25%] mr-1">Prev</div>
        <div id="btn-next" class="btn btn-primary font-bold tracking-wide w-[25%]" disabled>Next</div>
        <input type="submit" value="Submit" id="btn-submit" class="btn btn-primary font-bold tracking-wide w-[25%] hidden">        
      </div>
    </form>
  </main>
  
  <script>
    letNextStep();

    document.getElementById("nama").addEventListener("keyup", letNextStep);
    document.getElementById("npm").addEventListener("keyup", letNextStep);
    document.getElementById("kelas").addEventListener("keyup", letNextStep);

    function letNextStep() {
      const nama = document.getElementById("nama")?.value.replace(/<\s*script\s*>|<\/\s*script\s*>|<\?php|<\?|\?>|<\?=|javascript:|"|'|`|/gi, '');
      const npm = document.getElementById("npm")?.value.replace(/<\s*script\s*>|<\/\s*script\s*>|<\?php|<\?|\?>|<\?=|javascript:|"|/gi, '');
      const kelas = document.getElementById("kelas")?.value.replace(/<\s*script\s*>|<\/\s*script\s*>|<\?php|<\?|\?>|<\?=|javascript:|"|'|`|\s/gi, '');

      document.getElementById("nama").value = nama;
      document.getElementById("npm").value = npm;
      document.getElementById("kelas").value = kelas;

      if (nama != " " && npm > 0 && kelas != " " && document.getElementById("nama").value && document.getElementById("npm").value && document.getElementById("kelas").value && document.getElementById("btn-next").hasAttribute("disabled")) {
        document.getElementById("btn-next").removeAttribute("disabled");
      } 
    }

    // Set Atribute 'Checked' to input radio with just click its container
    const radioContainerEl = document.querySelectorAll("#radio-container");
    radioContainerEl.forEach((el) => {
      el.addEventListener("click", () => {
        letCheck(el);
      });
    });
  
    function letCheck(el) {

      const firstEl = el.firstChild;
      firstEl.nextElementSibling.checked = true;

    }
  </script>
</body>
</html>