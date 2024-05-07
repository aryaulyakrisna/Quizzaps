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
    <div class="w-full max-w-3xl flex justify-center gap-4 items-center mx-auto h-48 bg-base-300 rounded-box">
      <input type="text" placeholder="Quiz Title here" class="input input-bordered w-full max-w-xs" />
      <button class="btn btn-primary">Make Quiz!</button>
    </div>
    <div class="divider"></div>
  </main>

  <?php include_once "./header.php" ?>
</body>
</html>