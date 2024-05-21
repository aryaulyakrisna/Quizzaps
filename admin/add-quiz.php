<?php
  session_start();

  if (!isset($_SESSION["username"]) && !isset($_SESSION["id_admin"])) {
    header("Location: index.php");
    exit;
  }

  $title = "Add Quiz";
  $flaticon = "../assets/icons/flaticon.png";
  $output = "../output.css";

  $status = "";
  
  if (isset($_GET["status"]) && isset($_GET["quiz_id"]) && is_numeric((int)$_GET["quiz_id"])) {
    $quizId = (int)$_GET["quiz_id"];

    if ($_GET["status"] == "successful" && is_int((int)$_GET["quiz_id"])) {
      $status = "<div class='max-lg:text-2xl text-4xl poppins-semibold tracking-wide text-center flex items-center justify-center'><span class='mr-6'>Success!</span> <a href='quiz.php?quiz_id=$quizId' class='btn btn-primary'>Edit</a></div>";
    }
  }

  else if (isset($_GET["status"])) {
    if ($_GET["status"] == "failed") {
      $status = '<div class="max-lg:text-2xl text-4xl poppins-semibold tracking-wide text-center mb-2"><span>Failed!</span></div> <div class="text-center w-full max-md:text-sm">The name of the quiz can not be the same. Please try again!</div>';
    }
  }

  include_once "../template/header.php";
?>

<body class="overflow-hidden flex justify-center">
  
  <main class="max-w-5xl w-full px-8 pt-48">
    <form action="post-quiz.php" method="post" class="w-full max-w-3xl flex justify-center gap-4 items-center mx-auto h-48 bg-base-300 rounded-box px-8">
      <input type="text" placeholder="Quiz Title here" class="input input-bordered w-full max-w-xs max-lg:text-xs" name="quiz_name"/>
      <button class="btn btn-primary poppins-semibold tracking-wide max-lg:text-xs">Make Quiz!</button>
    </form>
    <div class="divider"></div>
    <?= $status ?>
  </main>

  <?php include_once "../template/navbar.php" ?> 

</body>