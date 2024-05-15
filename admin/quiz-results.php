<?php
  session_start();

  if (!$_SESSION["username"] && !$_SESSION["user_id"]) {
    header("Location: index.php");
    exit;
  }

  
  $title = "Result List";
  $flaticon = "../assets/icons/flaticon.png";
  
  try {
    include_once "../db/config.php";
    $query = "SELECT * from tb_daftar_kuis";
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
    mysqli_close($conn);
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
  
  <main class="max-w-3xl w-full flex flex-col gap-2 px-8 pt-36 mx-auto">
    
    <div class="overflow-auto h-[500px] no-scrollbar">
      <table class="table">
        <!-- head -->
        <thead class="h-20 sticky top-0 bg-[#1D232A] shadow-md text-[#6A75F1]">
          <tr>
            <th></th>
            <th>Kuis</th>
            <th>Hasil</th>
            <th>Lihat</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rowIndex = 0;
          while ($row = mysqli_fetch_assoc($sql)) { 
            $rowIndex++;
            if ($row["jumlah_hasil"] > 0) {
            ?>
            <tr class="hover">
              <td><?= $rowIndex ?></td>
              <td><?= $row["nama_kuis"]?></td>
              <td><?= $row["jumlah_hasil"]?></td>
              <td>
                <a href="user-result.php?quiz_id=<?= $row["quiz_id"] ?>&nama_kuis=<?= $row["nama_kuis"] ?>" class="btn btn-ghost">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#A6ADBB" viewBox="0 0 256 256"><path d="M224.49,136.49l-72,72a12,12,0,0,1-17-17L187,140H40a12,12,0,0,1,0-24H187L135.51,64.48a12,12,0,0,1,17-17l72,72A12,12,0,0,1,224.49,136.49Z"></path></svg>
                </a>
              </td>
              <td>
                <a href="./delete-quiz-result.php?quiz_id=<?= $row["quiz_id"] ?>" class="btn btn-active btn-warning poppins-semibold tracking-wide">
                Hapus
                </a>
              </td>
            </tr>
            <?php 
            } else {?>
            <tr class="hover">
              <td><?= $rowIndex ?></td>
              <td><?= $row["nama_kuis"]?></td>
              <td><?= $row["jumlah_hasil"]?></td>
              <td>
                <span class="p-4">-</span>
              </td>
              <td>
                <div class="p-4">-</div>
              </td>
            </tr>

            <?php }}?>
          </tbody>
        </table>
      </div>
    </main>
    <?php include "header.php" ?>
</body>
</html>