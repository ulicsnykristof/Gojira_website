<?php include 'header.php'?>

<div class="w3-container w3-theme-l4">
  <br><br>
  <h2>Account settings</h2>
  <h4>Your data:</h4>
  <?php
    if(isset($_SESSION['s_uid'])){
      $name = $_SESSION['s_name'];
      $email = $_SESSION['s_email'];
      $uid = $_SESSION['s_uid'];
      echo "Name: " . $name . "<br>";
      echo "E-mail: " . $email . "<br>";
      echo "User ID: " . $uid . "<br>";
    }


  ?>
</div>


















<?php include 'footer.php'?>
