<?php
  session_start();

  if (!$_SESSION["username"] && !$_SESSION["user_id"]) {
    header("Location: index.php");
    exit;
  }

  $status = "";
  
  $title = "Add Quiz";
  $flaticon = "../assets/icons/flaticon.png";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    try {
      include_once "../db/config.php";

      if (isset($_POST["nama_kuis"])) {
        $namaKuis = htmlspecialchars($_POST["nama_kuis"]);
      } else {
        header("Location: 404.php");
        exit;
      }

      $query = "INSERT INTO tb_daftar_kuis (nama_kuis) VALUES (?)";
      $stmt = mysqli_prepare($conn, $query);

      if (!$stmt) {
          throw new Exception(mysqli_error($conn));
      }

      mysqli_stmt_bind_param($stmt, "s", $namaKuis);

      if (!mysqli_stmt_execute($stmt)) {
          throw new Exception(mysqli_stmt_error($stmt));
      }

      $status = '<div class="text-4xl poppins-semibold tracking-wide text-center">Success!</div>';
    } 
      
    catch (Exception $e) {
      // echo "Error: " . $e->getMessage();
      header("Location: 404.php"); 
      exit;
    }
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
<body class="w-full min-h-screen overflow-hidden flex justify-center items-center">
  
  <main class="max-w-5xl w-full px-8">
    <form action="add-quiz.php" method="post" class="w-full max-w-3xl flex justify-center gap-4 items-center mx-auto h-48 bg-base-300 rounded-box">
      <input type="text" placeholder="Quiz Title here" class="input input-bordered w-full max-w-xs" name="nama_kuis"/>
      <button class="btn btn-primary">Make Quiz!</button>
    </form>
    <div class="divider"></div>
    <?= $status ?>
  </main>

  <?php include_once "./header.php" ?>
</body>
</html>