<?php
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','mdm_db');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
//error_reporting(0);
if(isset($_POST['signup']))
{
$uname=$_POST['username'];
$name=$_POST['name'];
$password=md5($_POST['password']);
$sql="INSERT INTO admin(UserName,Name,Password) VALUES(:uname,:name,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Flower Power| Admin Change Password</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
        <?php include('includes/leftbar.php'); ?>
        <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu" ></i>
            <span class="text">Add a new Admin</span>
        </div>
    </section>
    <div class="login">
        <div class="avatar">
            <img src="./img/avatar.png" />
        </div>
        <h2>Add a new Admin</h2>
        <br>
    <form class="login-form" method="post"  onSubmit="return valid();">
        <div class="textbox">
            <input type="text" name="name" placeholder="Full Name" required="required" />
            <span class="material-symbols-outlined"> person </span>
        </div>
        <div class="textbox">
            <input type="text" name="username" placeholder="User Name" required="required"/>
            <span class="material-symbols-outlined"> person </span>
        </div>
        <div class="textbox">
            <input type="password" name="password" placeholder="Password" required="required">
            <span class="material-symbols-outlined"> lock </span>
        </div>
        <button type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">Signup</button>
</body>
<script src="js/main.js"></script>
</html>
