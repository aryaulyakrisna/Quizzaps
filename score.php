<?php
  include_once "db/config.php";

  if (isset($_GET["quiz_id"])) {
    if (is_int((int)$_GET["quiz_id"])) {
      $quizID = (int)$_GET["quiz_id"];
    }
  } else {
    header("Location: index.php");
    exit;
  }

  $emote = "🔥";
  $skor = 0;
  $jawaban_benar = 0;
  $jawaban_salah = 0;

  $title = "Quizzaps | Your skor!! $emote";
  $flaticon = "./assets/icons/flaticon.png";
  
  if (isset($_POST["nama"]) && isset($_POST["npm"]) && (int)$_POST["npm"] && isset($_POST["kelas"])) {
    $nama = htmlspecialchars($_POST['nama']);
    $npm = (int)$_POST['npm'];
    $kelas = htmlspecialchars($_POST['kelas']);
  }

  else {
    header("Location: index.php");
    exit;
  }

  try {
    include_once "./db/config.php";

    $rowindex = 0;
    $query = "SELECT jawaban_benar from tb_soal_" . $quizID;
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($sql)) {
      $rowindex++;
      if ($row["jawaban_benar"] == $_POST["jawaban" . $rowindex]) {
          $jawaban_benar++;
      } else {
          $jawaban_salah++;
      }
    }

    $skor = round(($jawaban_benar / $rowindex) * 100);

    if (!($nama && $npm && $kelas && $skor >= 0 && $jawaban_benar >= 0 && $jawaban_salah >= 0)) {
      throw new Exception("Invalid data or calculation error");
    }

    if ($skor <= 75) {
        $emote = "😭";
    }

    $queryInsert = "INSERT INTO tb_hasil_$quizID (npm, nama, kelas, jawaban_benar, jawaban_salah, skor) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtInsert = mysqli_prepare($conn, $queryInsert);
    mysqli_stmt_bind_param($stmtInsert, "sssiii", $npm, $nama, $kelas, $jawaban_benar, $jawaban_salah, $skor);
    mysqli_stmt_execute($stmtInsert);
    mysqli_stmt_close($stmtInsert);

    $queryUpdate = "UPDATE tb_daftar_kuis SET jumlah_hasil = jumlah_hasil + 1 WHERE quiz_id = ?";
    $stmtUpdate = mysqli_prepare($conn, $queryUpdate);
    mysqli_stmt_bind_param($stmtUpdate, "i", $quizID);
    mysqli_stmt_execute($stmtUpdate);
    mysqli_stmt_close($stmtUpdate);

    mysqli_close($conn);
  } 
    
  catch (Exception $e) {
    // echo "Error: " . $e->getMessage();

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

  <link rel="stylesheet" href="./output.css">

  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.4/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <script src="./js/style.js"></script>

</head>
<body class="w-full min-h-screen flex justify-center items-center">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" fixed w-[120%] -bottom-[30%] max-lg:-bottom-[5%]"><path fill="#6A75F1" fill-opacity="1" d="M0,96L34.3,96C68.6,96,137,96,206,85.3C274.3,75,343,53,411,37.3C480,21,549,11,617,37.3C685.7,64,754,128,823,138.7C891.4,149,960,107,1029,85.3C1097.1,64,1166,64,1234,69.3C1302.9,75,1371,85,1406,90.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
  <header class="lg:px-20 px-8 h-[100px] flex fixed top-0 w-full justify-between items-center max-lg:text-sm">
    <a href="./" class="text-nowrap"><span class="text-2xl text-[#6A75F1] mr-2 poppins-bold tracking-wide">Quizzaps</span> by Kelompok 4</a>
  </header>

  <main class="relative max-w-md w-full text-center flex-col justify-center mb-4 px-8 py-10 bg-[#6A75F1]/10 backdrop-blur-sm shadow-xl rounded-3xl mx-4 scale-0 transition-all duration-500">
    <div class="absolute -top-6 right-0 w-full flex justify-center">
      <div class="h-12 px-6 w-[75%] bg-[#6A75F1] text-[#1D232A] poppins-semibold text-xl glass text-nowrap overflow-hidden flex items-center justify-center rounded-full text-center">Your skor!!&#160;<?= $emote ?></div>
    </div>
    <div class="flex w-full justify-center my-10">
      <div class="w-full rounded-full max-w-[220px] max-h-[220px] h-screen  p-[16px] bg-[#6A75F1] shadow-lg glass">
        <span class="text-5xl poppins-bold rounded-full bg-[#1D232A] w-full h-full flex justify-center items-center"><?= $skor ?></span>
      </div>
    </div>
    <div class="flex w-full">
      <div class="grid h-20 flex-grow card bg-base-300 rounded-box place-items-center"><span class="text-green-500 poppins-bold text-xl"><?= $jawaban_benar ?></span></div>
      <div class="divider divider-horizontal"></div>
      <div class="grid h-20 flex-grow card bg-base-300 rounded-box place-items-center"><span class="text-red-500 poppins-bold text-xl"><?= $jawaban_salah ?></span></div>
    </div>
  </main>

  <script>
    setIntersection();
  </script>
</body>
</html>

