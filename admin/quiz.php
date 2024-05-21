<?php
  session_start();

  if (!isset($_SESSION["username"]) || !isset($_SESSION["id_admin"])) {
    header("Location: index.php");
    exit;
  }

  $title = "Dashboard";
  $flaticon = "../assets/icons/flaticon.png";
  $output = "../output.css";

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

    $quizId = (int)$_GET["quiz_id"];

    $query1 = "SELECT * FROM tb_soal WHERE id_kuis = $quizId";
    $sql1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));

    $query2 = "SELECT nama_kuis from tb_kuis WHERE id_kuis = $quizId";
    $sql2 = mysqli_query($conn, $query2);

    $quiz = mysqli_fetch_assoc($sql2);

    mysqli_close($conn);
  }

  catch (Exception $e) {
    // echo "error: " . $e->getMessage();

    header("Location: 404.php");
    exit;
  }

  include_once "../template/header.php";

?>

<body class="overflow-x-hidden px-8 flex justify-center">
  
  <main class="max-w-3xl w-full flex-col pt-40">
    <div class="w-full">
      <?= isset($status)? $status : "" ?>
      <form action="update-quiz-title.php?quiz_id=<?= $quizId ?>" method="post" class="flex items-center gap-4">
        <input type="text"class="input input-bordered input-lg gap-2 px-6 w-full" value="<?= $quiz["nama_kuis"]?>" name="quiz_name"/> 
        <input type="submit" value="Change title" class="btn btn-active btn-primary poppins-bold tracking-wide max-md:text-xs">
        <a href="delete-all-question.php?quiz_id=<?= $quizId ?>" class="btn btn-active btn-warning poppins-semibold tracking-wide max-md:text-xs">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256"><path d="M216,48H180V36A28,28,0,0,0,152,8H104A28,28,0,0,0,76,36V48H40a12,12,0,0,0,0,24h4V208a20,20,0,0,0,20,20H192a20,20,0,0,0,20-20V72h4a12,12,0,0,0,0-24ZM100,36a4,4,0,0,1,4-4h48a4,4,0,0,1,4,4V48H100Zm88,168H68V72H188ZM116,104v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Zm48,0v64a12,12,0,0,1-24,0V104a12,12,0,0,1,24,0Z"></path></svg>
          All
        </a>
      </form>
    </div>

    <div class="divider"></div>
    
    <div id="container-questions" class="w-full">

    <?php 
    $rowIndex = 0;
    while ($row = mysqli_fetch_assoc($sql1)) {
      $rowIndex++; 
    ?>

      <form action="update-question.php?question_id=<?= $row["id_soal"]?>&quiz_id=<?= $quizId?>" method="post" class=" rounded-3xl w-full border border-[#2B3039] p-8 flex flex-col gap-4 mb-6">
        <input type="text" class="input input-bordered input-lg gap-2 w-full" name="soal" placeholder="Type the question here" value="<?= $row["soal"]?>"/>

        <div class="input input-bordered w-full flex items-center input-lg gap-2">
          <input id="jawaban1" type="text" class="w-full" placeholder="Type the answer here" name="jawaban1" value="<?= $row["jawaban1"] ?>">
          <input
            id="jawaban_benar<?= $row["id_soal"]?>"
            data-value="1"
            name="jawaban_benar<?= $row["id_soal"]?>"
            type="radio"
            value="1"
            class="radio radio-sm checked:bg-[#6A75F1]"
            <?php echo ($row["jawaban_benar"] == 1)? "checked='checked'" : "" ; ?>
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg gap-2">
          <input id="jawaban2" type="text" class="w-full" placeholder="Type the aswer here" name="jawaban2" value="<?= $row["jawaban2"] ?>">
          <input
            id="jawaban_benar<?= $row["id_soal"]?>"
            data-value="2"
            name="jawaban_benar<?= $row["id_soal"]?>"
            type="radio"
            value="2"
            class="radio radio-sm checked:bg-[#6A75F1]"
            <?php echo ($row["jawaban_benar"] == 2)? "checked='checked'" : "" ; ?>
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg gap-2">
          <input id="jawaban3" type="text" class="w-full" placeholder="Type the answer here" name="jawaban3" value="<?= $row["jawaban3"] ?>">
          <input
            id="jawaban_benar<?= $row["id_soal"]?>"
            data-value="1"
            name="jawaban_benar<?= $row["id_soal"]?>"
            type="radio"
            value="3"
            class="radio radio-sm checked:bg-[#6A75F1]"
            <?php echo ($row["jawaban_benar"] == 3)? "checked='checked'" : "" ; ?>

          />
        </div>
        <div class="w-full flex gap-4 justify-end mt-2">
          <input type="submit" class="btn btn-active btn-primary poppins-semibold tracking-wide max-md:text-xs" value="Update">
          <a href="delete-question.php?question_id=<?= $row["id_soal"]?>&quiz_id=<?= $quizId ?>" class="btn btn-active btn-warning poppins-semibold tracking-wide max-md:text-xs">Delete</a>
        </div>
      </form>

    <?php } ?>

    <?php if (mysqli_num_rows($sql1) == 0) { ?>
      <form id="add-question-form" action="post-question.php?quiz_id=<?= $quizId ?>" method="post" class=" rounded-3xl w-full border border-[#2B3039] p-8 flex flex-col gap-4 mb-6">
        <input type="text" class="input input-bordered input-lg gap-2 w-full" name="soal" placeholder="Type the question here"/>

        <div class="input input-bordered w-full flex items-center input-lg gap-2">
          <input id="jawaban1" type="text" class="w-full" placeholder="Type the answer here" name="jawaban1">
          <input
            id="jawaban_benar"
            data-value="1"
            name="jawaban_benar"
            type="radio"
            value="1"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg gap-2">
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
        <div class="input input-bordered w-full flex items-center input-lg gap-2">
          <input id="jawaban3" type="text" class="w-full" placeholder="Type the answer here" name="jawaban3">
          <input
            id="jawaban_benar"
            data-value="1"
            name="jawaban_benar"
            type="radio"
            value="3"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="w-full flex gap-4 justify-end mt-2 max-md:text-xs">
          <input type="submit" value="Add" class="btn btn-active btn-primary poppins-semibold tracking-wide">
        </div>
      </form>

    <?php } ?>
    </div>

    <?= isset($addedStatus)? $addedStatus : "" ?>

    <div class="divider"></div>

    <div class="w-full mb-20 flex justify-end items-center gap-6 max-md:text-xs">
      <div>Please add question one by one!</div>
      <div id="btn-add" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H140v76a12,12,0,0,1-24,0V140H40a12,12,0,0,1,0-24h76V40a12,12,0,0,1,24,0v76h76A12,12,0,0,1,228,128Z"></path></svg>
      </div>
    </div>
  </main>

  <?php include_once "../template/navbar.php" ?> 
  
  <script defer>

    if (document.getElementById("add-question-form")) {
      document.getElementById("btn-add").setAttribute("disabled", "disabled");
    }

    document.getElementById("btn-add").addEventListener("click", () => {
      HTML = `
      <form id="add-question-form" action="post-question.php?quiz_id=<?= $quizId ?>" method="post" class=" rounded-3xl w-full border border-[#2B3039] p-8 flex flex-col gap-4 mb-6">
        <input type="text" class="input input-bordered input-lg gap-2 w-full" name="soal" placeholder="Type the question here"/>

        <div class="input input-bordered w-full flex items-center input-lg gap-2">
          <input id="jawaban1" type="text" class="w-full" placeholder="Type the answer here" name="jawaban1">
          <input
            id="jawaban_benar"
            data-value="1"
            name="jawaban_benar"
            type="radio"
            value="1"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="input input-bordered w-full flex items-center input-lg gap-2">
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
        <div class="input input-bordered w-full flex items-center input-lg gap-2">
          <input id="jawaban3" type="text" class="w-full" placeholder="Type the answer here" name="jawaban3">
          <input
            id="jawaban_benar"
            data-value="1"
            name="jawaban_benar"
            type="radio"
            value="3"
            class="radio radio-sm checked:bg-[#6A75F1] "
          />
        </div>
        <div class="w-full flex gap-4 justify-end mt-2 max-md:text-xs">
          <input type="submit" value="Add" class="btn btn-active btn-primary poppins-semibold tracking-wide">
        </div>
      </form>
      `;

      document.getElementById("container-questions").innerHTML += HTML;
      if (document.getElementById("add-question-form")) {
        document.getElementById("btn-add").setAttribute("disabled", "disabled");
      }
    });
  </script>
  
</body>
