<?php
$title = "Quizzaps | 404 😭";
$flaticon = "./assets/icons/flaticon.png";
$output = "./output.css";

include_once "./template/header.php";
?>

<body class="flex justify-center items-center overflow-hidden px-8 max-sm:px-4">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" fixed w-[120%] -bottom-[30%] max-lg:-bottom-[5%]"><path fill="#6A75F1" fill-opacity="1" d="M0,96L34.3,96C68.6,96,137,96,206,85.3C274.3,75,343,53,411,37.3C480,21,549,11,617,37.3C685.7,64,754,128,823,138.7C891.4,149,960,107,1029,85.3C1097.1,64,1166,64,1234,69.3C1302.9,75,1371,85,1406,90.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
  
  <main class="max-w-xl text-center mx-4 scale-0 transition-all duration-500">
    <h1 class=" text-9xl poppins-bold mb-4 flex justify-center items-center"><span class=" z-20 translate-x-[20%]">4</span><span class="z-10">0</span><span class="-translate-x-[25%] z-20">4</span></h1></h1>
    <h2 class=" text-3xl poppins-semibold mb-4">Opps!, we can't find your page 😭.</h2>
    <p class=" text-md poppins-regular mb-4">The page your looking for does not exist or not enough resources, If you think there's a problem, feel free to contact us. We're here to help <a href="https://github.com/aryaulyakrisna" class="link">github.com</a>.</p>
    <a href="index.php" class="btn btn-primary poppins-semibold tracking-wide">Go Back!</a>
  </main>

  <script src="./js/style.js"></script>
  <script>
    setIntersection();
    console.log(setIntersection);
  </script>
</body>
