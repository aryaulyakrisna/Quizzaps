<?php
  session_start();

  if (!isset($_SESSION["username"]) && !isset($_SESSION["id_admin"])) {
    header("Location: index.php");
    exit;
  }

  if (isset($_GET["quiz_name"])) {
      $namaKuis = htmlspecialchars($_GET["quiz_name"]);
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

  $title = "List " . $namaKuis;
  $flaticon = "../assets/icons/flaticon.png";
  $output = "../output.css";

  try {
    include_once "../db/config.php";
    $query = "SELECT * from tb_hasil WHERE id_kuis = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $quizID);
    mysqli_stmt_execute($stmt);
    
    $sql = mysqli_stmt_get_result($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if (mysqli_num_rows($sql) == 0) {
      header("Location: quiz-results.php");
      exit;
    }
  } 

  catch (Exception $e) {
    header("Location: 404.php");
    exit;
  }

  include_once "../template/header.php";
  include_once "../template/navbar.php";
?>
<body class="overflow-hidden">
  
  <main class="max-w-6xl w-full flex flex-col gap-2 px-8 pt-36 mx-auto">

    <div class="overflow-x-auto h-[500px] no-scrollbar">
      <table class="table">
        <!-- head -->
        <thead class="h-20 sticky top-0 bg-[#1D232A] shadow-md text-[#6A75F1]">
          <tr>
            <th></th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Salah</th>
            <th>Benar</th>
            <th>Skor</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rowIndex = 0;
          while ($row = mysqli_fetch_assoc($sql)) { 
            $rowIndex++;
          ?>
            <tr class="hover ">
              <th><?= $rowIndex ?></th>
              <td><?= $row["nama"]?></td>
              <td><?= $row["npm"]?></td>
              <td><?= $row["kelas"]?></td>
              <td><?= $row["jumlah_salah"]?></td>
              <td><?= $row["jumlah_benar"]?></td>
              <td><?= $row["skor"]?></td>
              <td><a href='./delete-user-result.php?quiz_id=<?= $quizID ?>&result_id=<?= $row["id_hasil"] ?>' class="btn btn-active btn-warning">
                Hapus
              </a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </main>
</body>