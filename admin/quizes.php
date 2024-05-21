<?php
  session_start();

  if (!isset($_SESSION["username"]) && !isset($_SESSION["id_admin"])) {
    header("Location: index.php");
    exit;
  }

  
  $title = "Quiz List";
  $flaticon = "../assets/icons/flaticon.png";
  $output = "../output.css";
  
  try {
    $adminId = (int)$_SESSION["id_admin"];

    include_once "../db/config.php";
    $query = "SELECT * from tb_kuis WHERE id_admin = $adminId";
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
    mysqli_close($conn);
  } 

  catch (Exception $e) {
    header("Location: 404.php");
    exit;
  }


  include_once "../template/header.php";

?>

<body class="overflow-hidden">
  
  <main class="max-w-3xl w-full flex flex-col gap-2 px-8 pt-36 mx-auto">


    <?php if (mysqli_num_rows($sql) > 0) {?>

    <div class="overflow-x-auto h-[500px] no-scrollbar">
      <table class="table">
        <!-- head -->
        <thead class="h-20 sticky top-0 bg-[#1D232A] shadow-md text-[#6A75F1]">
          <tr>
            <th></th>
            <th>Kuis</th>
            <th>Soal</th>
            <th>Edit</th>
            <th>Hapus</th>
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
              <td><?= $row["nama_kuis"]?></td>
              <td><?= $row["jumlah_soal"]?></td>
              <td><a href="./quiz.php?quiz_id=<?= $row["id_kuis"] ?>" class="btn btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#A6ADBB" viewBox="0 0 256 256"><path d="M224.49,136.49l-72,72a12,12,0,0,1-17-17L187,140H40a12,12,0,0,1,0-24H187L135.51,64.48a12,12,0,0,1,17-17l72,72A12,12,0,0,1,224.49,136.49Z"></path></svg>
              </a></td>
              <td><a href="./delete-quiz.php?quiz_id=<?= $row["id_kuis"] ?>" class="btn btn-active btn-warning poppins-semibold tracking-wide">
                Hapus
              </a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <?php } else {?>
      <div>Upps! There is no quiz yet! <a href="./add-quiz.php">Make Quiz</a></div>
    <?php } ?>
  </main>

  <?php include_once "../template/navbar.php" ?> 

</body>
