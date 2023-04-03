<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) 
{
$email = $_POST['username'];
$password = md5($_POST['password']);
$sql = "SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    $_SESSION['alogin'] = $_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else {

    echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title> Admin Login </title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body{
            background-image: url(img/bg.svg);
        }
    </style>
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
    <div class="login-box">
  <h2>Login</h2>
  <form class="login-form" method="post">
    <div class="user-box">
      <input type="text"placeholder="Username" name="username">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" placeholder="Password" name="password">
      <label>Password</label>
    </div>
    <button name="login" type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      logIn
    </button>
  </form>
</div>
</body>
<script src="js/main.js"></script>
</html>