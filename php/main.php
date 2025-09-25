<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resturant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" 
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
      <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container">
<div class="form">
<div class="login face">
    <div class="text">
        <h3>login </h3>
    </div>
<form action="" method="post"  autocomplete="off">
<div class="mb-3">
    <label for="email">email or username</label>
  <input type="text"  id="email" autofocus name="user-login">
</div>
<div class="mb-3">
    <label for="password">password</label>
  <input type="password"  id="password">
</div>
<div class="button">
<button type="submit" class="btn" name="login-send">send data</button>
<br>
<button type="button" class="btn flip">sign in</button>
</div>
</form>
</div>
<div class="account face" id="account">
    <div class="textAccount">
        <h3>sign in</h3>
    </div>
<form action="/project/index.php" method="post">
<?php 

if(isset($_SESSION["email_found"])===true  ):?>
    <p style="text-align: center; color: #f00; font-weight: bold; text-transform: capitalize;"> the email is alredy exites</p>
<?php endif;
unset($_SESSION["email_found"]);
?>
<div class="mb-3">
    <label for="name">enter your name</label>
  <input type="text"  id="name" name="name">
</div>
<div class="mb-3">
    <label for="username">enter your username</label>
  <input type="text"  id="username" name="username">
</div>
<div class="mb-3">
    <label for="emailAccount" >enter your email</label>
  <input type="email" required id="emailAccount" name="email">
</div>
<div class="mb-3">
    <label for="passwordAccount">enter your password</label>
  <input type="password"  id="passwordAccount" required name="password">  
<div class="passwordList d-none">
  <ul>
    <li id="textPassword"> يجب ان تحتوي كلمة السر على 8 خانات</li>
    <li><span>o</span> Must contain at least one letter (A–Z and a–z)</li>
    <li><span>o</span> Must contain at least one number (0–9)</li>
    <li><span>o</span> Must contain at least one special character (!*%$)</li>
  </ul>
</div>
</div>
<div class="mb-3">
    <label for="rPasswordAccount">enter your password</label>
  <input type="password"  required id="rPasswordAccount">
</div>
<div class="button">
    <button type="submit" name="send" class="btn" id="btn_sned">send data</button>
    <br>
    <button type="button" class="btn flip" name="login">login</button>
</div>
</form>

</div>


</div>




</div>    
<script src="./js/jquery-3.1.1.min.js"></script>
<script src="./js/main.js"></script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html>