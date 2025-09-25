<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/project/php/conn.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <link rel="stylesheet" href="../css/style.css">
</head>
</head>
<body>
<div class="cor">

    <form action="" method="post">
        <input type="text" id="key" name="key">
        <label for="key">enter your code </label>
        <button name="send_key">sned</button>
</form>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html>
<?php
$key=null;

session_start();
 if(isset($_SESSION["key"])){
  $key=$_SESSION["key"];
 } 
if($_SERVER["REQUEST_METHOD"] === "POST"){
if($_POST["key"]){
  $keyPost=$_POST["key"];

  if($key== $keyPost){
    $insert=$_SESSION["account"];
    mysqli_query($conn,$insert);
    unset($_SESSION["key"]);
unset($_SESSION["account"]);
    header("Location: /project/php/prod.php");
    exit;
  }else{
?>
<div
style="position: absolute;
top: 60px;"  
class="alert alert-warning alert-dismissible fade show animate__animated animate__fadeInDownBig" role="alert">
<span style="font-weight: bold;"> check your number in email </span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
}
}
?>


