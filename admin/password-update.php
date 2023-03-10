<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
// Code for change password
if(isset($_POST['submit']))
	{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
$sql ="SELECT Password FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where UserName=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is not valid.";
}
}
?>

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
    <!-- navigation menu start  -->
    <?php include('includes/leftbar.php'); ?>
    <!-- navigation menu end  -->
    <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu" ></i>
            <span class="text">Change Password</span>
        </div>
    </section>
<div class="login">
        <div class="avatar">
            <img src="./img/avatar.png" />
        </div>
        <h2>Change Password</h2>
        <br>
        <form class="login-form" method="post" name="chngpwd" onSubmit="return valid();">
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
            <div class="textbox">
            <label>Current Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
            <span class="material-symbols-outlined"> lock </span>
            </div>
            <div class="textbox">
            <label>New Password</label>
            <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                <span class="material-symbols-outlined"> lock </span>
            </div>
            <div class="textbox">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
                <span class="material-symbols-outlined"> lock </span>
            </div>
            <button name="submit" type="submit">Save changes</button>
        </form>
    </div>
</body>
<script src="js/main.js"></script>
</html>
<?php } ?>
