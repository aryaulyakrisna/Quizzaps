<?php
  session_start();

  $title = "Login";
  $flaticon = "../assets/icons/flaticon.png";

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
<body class="w-full  min-h-screen flex justify-center items-center overflow-hidden">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="fixed -bottom-[20%]"><path fill="#6A75F1" fill-opacity="1" d="M0,96L34.3,96C68.6,96,137,96,206,85.3C274.3,75,343,53,411,37.3C480,21,549,11,617,37.3C685.7,64,754,128,823,138.7C891.4,149,960,107,1029,85.3C1097.1,64,1166,64,1234,69.3C1302.9,75,1371,85,1406,90.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>  
  <header class="px-20 h-[100px] flex fixed top-0 w-full justify-between items-center">
    <a href="../" class="text-nowrap"><span class="text-2xl text-[#6A75F1] mr-2 poppins-bold tracking-wide">Quizzaps</span> by Kelompok 4</a>
  </header>
  
  <main class="max-w-md w-full text-center flex-col justify-center mb-4 px-8 py-20 bg-[#6A75F1]/10 backdrop-blur-sm shadow-xl rounded-3xl mx-4">
    <form id="login-form" action="./check-login.php" method="post" class="w-full flex flex-col items-start gap-4">

      <span class="label-text ml-1">Username:</span>
      <input id="username" type="text" class="input w-full" placeholder="Username" name="username">
      
      <span class="label-text ml-1">Password:</span>
      <input id="password" type="password" class="input w-full" placeholder="Password" name="password">

      <div class="w-full mt-6 flex gap-2 justify-between items-start">
        <span class="w-full text-start ml-1">Login as admin</span>
        <div>
          <input id="btn-submit" type="submit" value="Login" class="btn btn-primary poppins-semibold tracking-wide px-8 mb-4 " disabled>
        </div>
      </div>

    </form>
  </main>

  <script>
    letSubmit();
    document.getElementById("username").addEventListener("keyup", letSubmit);
    document.getElementById("password").addEventListener("keyup", letSubmit);

    function letSubmit() {

      if (document.getElementById("username").value && document.getElementById("password").value && document.getElementById("username").value != " " && document.getElementById("password").value != " " && document.getElementById("btn-submit").hasAttribute("disabled")) {
        document.getElementById("btn-submit").removeAttribute("disabled");
      }
    }

  </script>
</body>
</html>