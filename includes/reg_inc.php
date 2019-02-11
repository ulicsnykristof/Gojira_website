<?php

if(isset($_POST['submit'])){
  include_once 'dbh_inc.php';

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  //Error handling
  if(empty($name) || empty($email) || empty($uid) || empty($pwd)){
    header("Location: ../registration.php?reg=empty");
    exit();

  }else{


    if(!preg_match("/^[a-zA-Z]*$/", $name)){
      header("Location: ../registration.php?reg=ivname");
      exit();

    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      header("Location: ../registration.php?reg=ivemail");
      exit();

    }else{
      $sql = "SELECT * FROM users WHERE user_uid='$uid';";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) > 0){
        header("Location: ../registration.php?reg=ivuid");
        exit();

      }else{
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql="INSERT INTO users (user_name, user_email, user_uid, user_pwd) VALUES (?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($stmt, $sql)){
          echo "adsfasfadsfdadf";
        }

        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $uid, $hashedPwd);
        mysqli_stmt_execute($stmt);

        header("Location: ../registration.php?reg=success");
        exit();

      }
    }
  }
}else{
  header("Location: ../registration.php?reg=error");
  exit();
}



?>
