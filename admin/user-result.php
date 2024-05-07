<?php
  session_start();

  if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
  }

  if (isset($_GET["nama_quiz"])) {
      $namaQuiz = htmlspecialchars($_GET["nama_quiz"]);
  } else {
    header("Location: 404.php");
    exit;
  }

  if (isset($_GET["quiz_id"])) {
    if (is_int((int)$_GET["quiz_id"])) {
      $quizID = (int)$_GET["quiz_id"];
    }
  } else {
    header("Location: 404.php");
    exit;
  }

  $title = "List " . $namaQuiz;
  $flaticon = "../assets/icons/flaticon.png";

  try {
    include_once "../db/config.php";
    $query = "SELECT * from tb_hasil_" . $quizID;
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
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
<body class="w-full min-h-screen overflow-hidden">
  
  <main class="max-w-5xl w-full flex flex-col gap-2 px-8 pt-36 mx-auto">

    <div class="overflow-x-auto h-[500px] no-scrollbar">
      <table class="table">
        <!-- head -->
        <thead class="h-20 sticky top-0 bg-[#1D232A]">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Benar</th>
            <th>Salah</th>
            <th>Skor</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rowIndex = 0;
          while ($row = mysqli_fetch_assoc($sql)) { 
            $rowIndex++;
          ?>
            <tr class="hover">
              <th><?= $rowIndex ?></th>
              <td><?= $row["nama"]?></td>
              <td><?= $row["npm"]?></td>
              <td><?= $row["kelas"]?></td>
              <td><?= $row["jawaban_salah"]?></td>
              <td><?= $row["jawaban_benar"]?></td>
              <td><?= $row["skor"]?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </main>
  <?php include_once "./header.php" ?>
</body>
</html>