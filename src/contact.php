<!doctype html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Portfolio</title>
  <style type="text/css">
  body{
    background-color: #3a3772;
    color: white;
    font-size: 2em;
    text-align:center;
    font-family:georgia;
  }

  p{
    margin:10% auto;
    margin-bottom:0;
  }
  </style>
</head>

<body>

<?php
// define variables and set to empty values
$name = $email = $message = "";
$error = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["url"]) && $_POST["url"] == "") {
   
    if (empty($_POST["name"])) {
      echo "<p>You did not specify your name.</p>";
      $error++;
    }
    else{
      $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        echo "<p>Your name must include letters only.</p>";
        $error++;
      }
    }

  
    if (empty($_POST["email"])) {
      echo "<p>You did not specify your email.</p>";
      $error++;
    }
    else{
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>You have entered invalid email address.</p>";
        $error++;
      }
    }
  
    if (empty($_POST["message"])) {
      echo "<p>You did not enter any message.</p>";
      $error++;
    }
    else{
      $message = test_input($_POST["message"]);
      if (!preg_match("/^[a-zA-Z0-9,.!? ]*$/",$message)) {
       echo "<p>Your message is invalid.</p>";
       $error++;
      }
    }
  }
  else{
    die();
  }
}
  
if($error !== 0)
{
  $error = 0;
  die();
}

  $to = 'kingatok11@gmail.com';
  $subject = 'Contact Me - Portfolio';
  $msg = "Name : $name \n". 
  "Email : $email \n". 
  "Description: $message";

  mail($to, $subject, $msg, 'From:' . $email);
  
  echo "<p>Your message has been sent.<br />
  I will get back to you as soon as possible.</p>";
  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>