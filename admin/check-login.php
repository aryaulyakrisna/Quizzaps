<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "../db/config.php";

    if ($_POST["username"] && $_POST["password"]) {
      $username = htmlspecialchars($_POST["username"]);
      $username = htmlspecialchars($_POST["password"]);

      try {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) == 1) {

            $row = mysqli_fetch_assoc($res);

            $verifyPassword = password_verify($password, $row['password']);

            if ($verifyPassword == 0) {
              header("Location: index.php?status=failed");
              exit;
            }

            $_SESSION["user_id"] = $row["user_id"]; 
            $_SESSION["username"] = $row["username"];
            header("Location: dashboard.php");
            exit;
        } 
        
        else {
          header("Location: index.php?status=failed");
          exit;
        }
      } catch (Exception $e) {
        header("Location: index.php?status=failed");
        exit;
      }

      finally {
        mysqli_close($conn);
      }
      
    } else {
      header("Location: 404.php");
      exit;
    }
  }