<?php
  session_start();

  if (!isset($_SESSION["username"]) || !isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
  }

  $title = "Dashboard";
  $flaticon = "../assets/icons/flaticon.png";

  if (!isset($_GET["quiz_id"]) || !is_numeric((int)$_GET["quiz_id"])) {

    header("Location: 404.php");
    exit;
  }

  if (isset($_GET["status"]) && $_GET["status"] == "failed") {
    $status = "<div class='mb-4'>Failed! please try different names</div>";
  }

    if (isset($_GET["added_status"]) && $_GET["added_status"] == "failed") {
    $addedStatus = "<div class='w-full text-center'>Failed! please fill all the input field</div>";
  }

  try {
    include_once "../db/config.php";

    $quizID = (int)$_GET["quiz_id"];

    $query = "SELECT * FROM tb_soal_$quizID";
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $query1 = "SELECT nama_kuis from tb_daftar_kuis WHERE quiz_id = $quizID";
    $sql1 = mysqli_query($conn, $query1);

    $quiz = mysqli_fetch_assoc($sql1);

    mysqli_close($conn);
  }

  catch (Exception $e) {
    // echo "error: " . $e->getMessage();

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
<body class="w-full min-h-screen overflow-x-hidden poppins-regular px-4">
  
  <main class="max-w-3xl w-full flex-col px-8 pt-40 mx-auto">
    <div class="w-full">
      <?= isset($status)? $status : "" ?>
      <form action="update-quiz-title.php?quiz_id=<?= $quizID ?>" method="post" class="flex items-center gap-4">
        <input type="text"class="input input-bordered input-lg px-6 w-full" value="<?= $quiz["nama_kuis"]?>" name="nama_kuis"/> 
        <input type="submit" value="Change quiz title" class="btn btn-active btn-primary poppins-bold tracking-wide">
        <a href="delete-all-question.php?quiz_id=<?= $quizID ?>" class="btn btn-active btn-primary poppins-semibold tracking-wide">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,48H180V36A28,28,0,0,0,152,8H104A28,28,0,0,0,76,36V48H40a12,12,0,0,0,0,24h4V208a20,20,0,0,0,20,20H192a20,20,0,0,0,20-20V72h4a12,12,0,0,0,0-24ZM100,36a4,4,0,0,1,4-4h48a4,4,0,0,1,4,4V48H100Zm88,168H68V72H188ZM116,104v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Zm48,0v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Z"></path></svg>
          All
        </a>
      </form>
    </div>

    <div class="divider"></div>
    
    <div id="container-questions" class="w-full">

    <?php 
    $rowIndex = 0;
    while ($row = mysqli_fetch_assoc($sql)) {
      $rowIndex++; 
    ?>

      <form action="update-question.php?id=<?= $row["id"]?>&quiz_id=<?= $quizID?>" method="post" class=" rounded-3xl w-full border border-[#2B3039] p-10 flex flex-col gap-4 mb-6">
        <input type="text" class="input input-bordered input-lg w-full" name="soal" placeholder="Type the question here" value="<?= $row["soal"]?>"/>

        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban1" type="text" class="w-full" placeholder="Type here" name="jawaban1" value="<?= $row["jawaban1"] ?>">
          <input
            id="jawaban_benar<?= $row["id"]?>"
            data-value="1"
            name="jawaban-benar<?= $row["id"]?>"
            type="radio"
            value="1"
            class="radio radio-sm checked:bg-[#6A75F1]"
            <?php echo (1 == $row["jawaban_benar"])? "checked='checked'" : "" ; ?>
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban2" type="text" class="w-full" placeholder="Type the aswer here" name="jawaban2" value="<?= $row["jawaban2"] ?>">
          <input
            id="jawaban-benar<?= $row["id"]?>"
            data-value="2"
            name="jawaban_benar<?= $row["id"]?>"
            type="radio"
            value="2"
            class="radio radio-sm checked:bg-[#6A75F1]"
            <?php echo (2 == $row["jawaban_benar"])? "checked='checked'" : "" ; ?>
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban3" type="text" class="w-full" placeholder="Type the answer here" name="jawaban3" value="<?= $row["jawaban2"] ?>">
          <input
            id="jawaban-benar<?= $row["id"]?>"
            data-value="1"
            name="jawaban_benar<?= $row["id"]?>"
            type="radio"
            value="3"
            class="radio radio-sm checked:bg-[#6A75F1]"
            <?php echo (3 == $row["jawaban_benar"])? "checked='checked'" : "" ; ?>

          />
        </div>
        <div class="w-full flex gap-4 justify-end mt-2">
          <input type="submit" class="btn btn-active btn-primary poppins-semibold tracking-wide" value="Update">
          <a href="delete-question.php?id=<?= $row["id"]?>&quiz_id=<?= $quizID?>" class="btn btn-active btn-primary poppins-semibold tracking-wide">Delete</a>
        </div>
      </form>

    <?php } ?>

    <?php if (mysqli_num_rows($sql) == 0) { ?>
      <form action="post-question.php?quiz_id=<?= $quizID ?>" method="post" class=" rounded-3xl w-full border border-[#2B3039] p-10 flex flex-col gap-4 mb-6">
        <input type="text" class="input input-bordered input-lg w-full" name="soal" placeholder="Type the question here"/>

        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban1" type="text" class="w-full" placeholder="Type the answer here" name="jawaban1">
          <input
            id="jawaban-benar"
            data-value="1"
            name="jawaban_benar"
            type="radio"
            value="1"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban2" type="text" class="w-full" placeholder="Type the answer here" name="jawaban2">
          <input
            id="jawaban_benar"
            data-value="2"
            name="jawaban_benar"
            type="radio"
            value="2"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban3" type="text" class="w-full" placeholder="Type the answer here" name="jawaban3">
          <input
            id="jawaban_benar"
            data-value="1"
            name="jawaban-benar"
            type="radio"
            value="3"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="w-full flex gap-4 justify-end mt-2">
          <input type="submit" value="Add" class="btn btn-active btn-primary poppins-semibold tracking-wide">
        </div>
      </form>

    <?php } ?>
    </div>

    <?= isset($addedStatus)? $addedStatus : "" ?>

    <div class="divider"></div>

    <div class="w-full mb-20 flex justify-end items-center gap-6">
      <div>Please add question one by one!</div>
      <div id="btn-add" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
      </div>
    </div>
  </main>

  <?php include "header.php"?>  
  
  <script defer>

    document.getElementById("btn-add").addEventListener("click", () => {
      HTML = `
      <form action="post-question.php?quiz_id=<?= $quizID ?>" method="post" class=" rounded-3xl w-full border border-[#2B3039] p-10 flex flex-col gap-4 mb-6">
        <input type="text" class="input input-bordered input-lg w-full" name="soal"/>

        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban1" type="text" class="w-full" placeholder="Type here" name="jawaban1">
          <input
            id="jawaban_benar"
            data-value="1"
            name="jawaban_benar"
            type="radio"
            value="1"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban2" type="text" class="w-full" placeholder="Type here" name="jawaban2">
          <input
            id="jawaban_benar"
            data-value="2"
            name="jawaban_benar"
            type="radio"
            value="2"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg">
          <input id="jawaban3" type="text" class="w-full" placeholder="Type here" name="jawaban3">
          <input
            id="jawaban_benar"
            data-value="1"
            name="jawaban-benar"
            type="radio"
            value="3"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="w-full flex gap-4 justify-end mt-2">
          <input type="submit" value="Add" class="btn btn-active btn-primary poppins-semibold tracking-wide">
        </div>
      </form>
      `;

      document.getElementById("container-questions").innerHTML += HTML;
    });
  </script>
  
</body>
</html>