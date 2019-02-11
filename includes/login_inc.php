<?php

session_start();

if(isset($_POST['submit'])){
  include_once 'dbh_inc.php';

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  if(empty($uid) || empty($pwd)){
    header("Location: ../index.php?login=error0");
    exit();
  }else{
    $sql="SELECT * FROM users WHERE '$uid' = user_uid OR '$email' = user_email;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0){
      header("Location: ../index.php?login=error1");
      exit();
    }
      if($row = mysqli_fetch_assoc($result)){
        $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
        if($hashedPwdCheck == false){
          header("Location: ../index.php?login=error2");
          exit();
        }elseif($hashedPwdCheck == true){
            $_SESSION['s_id'] = $row['user_id'];
            $_SESSION['s_name'] = $row['user_name'];
            $_SESSION['s_email'] = $row['user_email'];
            $_SESSION['s_uid'] = $row['user_uid'];
          header("Location: ../?login=success");
          exit();
        }
      }
  }

}else{
  header("Location: ../index.php?login=error3");
  exit();
}


?>
