<?php session_start()?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="pictures/icon.jpg">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Gojira - Official</title>
  </head>
  <body>

    <!-- Navigation bar -->
    <div class="w3-top my-navbar">
      <div class="w3-bar w3-theme w3-left-align">
        <a class="w3-bar-item w3-button w3-teal w3-hover-purple" href="index.php"><i class="fa fa-home w3-margin-right"></i>Home</a>
        <a class="w3-bar-item w3-button" href="#ln">News</a>
        <a class="w3-bar-item w3-button" href="#">Band</a>
        <a class="w3-bar-item w3-button" href="#">Tour</a>
        <a class="w3-bar-item w3-button" href="#">Music</a>
        <a class="w3-bar-item w3-button" href="#">Media</a>
        <a class="w3-bar-item w3-button" href="#">Shop</a>
        <a class="w3-bar-item w3-button w3-teal w3-hover-purple w3-right" href="#"><i class="fa fa-bars"></i></a>

        <?php
          if(isset($_SESSION['s_uid'])){
            $asd = $_SESSION['s_uid'];
            echo '<a onClick=open_modal_out() class="w3-bar-item w3-right my-login" href="#">Logout</a>';
            echo '<a class="w3-bar-item w3-right my-login" href="account.php">My account</a>';
          }else{
            echo '<a onClick=open_modal_in() class="w3-bar-item w3-right my-login" href="#">Login</a>';
          }
        ?>


      </div>
    </div>

    <!--Login Modal-->
    <div id="id_modal_login" class="w3-modal my-modal">
      <div class="w3-modal-content">
        <div class="w3-container">
          <span onClick=close_modal_in() class="w3-button w3-display-topright">&times;</span>
           <h3>Login</h3><br>
           <form class="my-modal-form" action="includes/login_inc.php" method="POST">
             <input type="text" name="uid" placeholder="Username/Email"></input>
             <input type="password" name="pwd" placeholder="Password"></input>
             <button type="submit" name="submit">Login</button>
           </form>
        </div>
      </div>
    </div>

    <!--Logout Modal-->
    <div id="id_modal_logout" class="w3-modal my-modal">
      <div class="w3-modal-content">
        <div class="w3-container">
          <span onClick=close_modal_out() class="w3-button w3-display-topright">&times;</span>
           <h3>Logout</h3><br>
           <form class="my-modal-form" action="includes/logout_inc.php" method="POST">
             <p class="w3-center">You are loggin' out. Are you sure?</p>
             <br><br>
             <button type="submit" name="submit">Logout</button>
           </form>
        </div>
      </div>
    </div>

    <!--Script-->
    <script>
      var modal_in = document.getElementById('id_modal_login');
      var modal_out =document.getElementById('id_modal_logout');
      function open_modal_in(){
        modal_in.style.display='block';
      }
      function close_modal_in(){
        modal_in.style.display='none';
      }
      function open_modal_out(){
        modal_out.style.display='block';
      }
      function close_modal_out(){
        modal_out.style.display='none';
      }
    </script>
