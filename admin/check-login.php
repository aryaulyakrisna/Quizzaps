<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../db/config.php";

    if ($_POST["username"] && $_POST["password"]) {

      $username = $_POST["username"];
      $password = $_POST["password"];
      $email = $_POST["username"];

      try {

        $query = "SELECT * FROM tb_admin WHERE username = ? OR email = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        
        $sql = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        if (mysqli_num_rows($sql) > 0) {

            $row = mysqli_fetch_assoc($sql);

            $verifyPassword = password_verify($password, $row['psw']);

            if ($verifyPassword == 0) {
              header("Location: index.php?status=failed");
              exit;
            }
            
            $_SESSION["id_admin"] = $row["id_admin"];
            $_SESSION["username"] = $row["username"];
            
            header("Location: dashboard.php");
            exit;
          } 
          
          else {
              header("Location: index.php?status=failed");
              exit;
            }


      } catch (Exception $e) {
        // echo $e->getMessage();

        header("Location: index.php?status=failed");
        exit;
      }
      
    } else {
      // echo $e->getMessage();

      header("Location: 404.php");
      exit;
    }
  }