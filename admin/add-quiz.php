<?php
  session_start();

  if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
  }

  $title = "Add Quiz";
  $flaticon = "../assets/icons/flaticon.png";

  $status = "";
  
  if (isset($_GET["status"]) && isset($_GET["id"]) && is_numeric((int)$_GET["id"])) {
    $quizID = (int)$_GET["id"];

    if ($_GET["status"] == "successful" && is_int((int)$_GET["id"])) {
      $status = "<div class='text-4xl poppins-semibold tracking-wide text-center flex items-center justify-center'><span class='mr-6'>Success!</span> <a href='quiz.php?quiz_id=$quizID' class='btn btn-primary'>Edit</a></div>";
    }
  }

  else if (isset($_GET["status"])) {
    if ($_GET["status"] == "failed") {
      $status = '<div class="text-4xl poppins-semibold tracking-wide text-center mb-2"><span>Failed!</span></div> <div class="text-center w-full">The name of the quiz can not be the same. Please try again!</div>';
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
    <form action="post-quiz.php" method="post" class="w-full max-w-3xl flex justify-center gap-4 items-center mx-auto h-48 bg-base-300 rounded-box">
      <input type="text" placeholder="Quiz Title here" class="input input-bordered w-full max-w-xs" name="nama_kuis"/>
      <button class="btn btn-primary poppins-semibold tracking-wide">Make Quiz!</button>
    </form>
    <div class="divider"></div>
    <?= $status ?>
  </main>

  <?php include_once "./header.php" ?>
</body>
</html>