<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/project/php/conn.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/project/php/main.php";



use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
  if($_POST["user-login"]){
    echo "login-send";
    exit;
  }
}

$mail=new PHPMailer(true);
$email="";
$password="";
$username="";
$name="";
$email_found="";
if (isset($_POST["send"])) {
if(isset($_POST["email"]) || isset($_POST["password"]) || isset($_POST["username"]) || isset($_POST["name"])){
$email=mysqli_real_escape_string($conn,$_POST["email"]);
$password=mysqli_real_escape_string($conn,$_POST["password"]);
$username=mysqli_real_escape_string($conn,$_POST["username"]);
$name=mysqli_real_escape_string($conn,$_POST["name"]); 
}

   try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aboakr5643@gmail.com';
        $mail->Password   = 'mpvs mxpx aatb biso';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('aboakr5643@gmail.com',"bakr");
        $mail->addAddress($email,$name);
        $mail->isHTML(true);

  $inser="INSERT INTO clint (username,`name`,`password`,email) values ('$username','$name','$password','$email')";
  $id="SELECT id from clint where email = '$email'";
  $q="SELECT * FROM clint where email='$email'";
 $res= mysqli_query($conn,$q);  
  if(mysqli_num_rows($res) >0 ){
$_SESSION["email_found"]=true;
header("Location: index.php");
exit;
  }
  
  $res=mysqli_query($conn,$id);
  $row=mysqli_fetch_assoc($res);
  $user_id=$row["id"];
        $user_id.= rand(1000, 9999999);
        $mail->Subject = 'holle welcome to resutarnt ';
        $mail->Body    = "holle $name". 'your code is '. " ".$user_id;
        $mail->send();
        $_SESSION["data"]=true;
        $_SESSION["key"]=$user_id;
      $_SESSION["account"]=$inser;
        header("Location: /project/php/cor.php");
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}

?>


