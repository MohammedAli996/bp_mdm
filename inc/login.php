<?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        $_SESSION['login']=$_POST['email'];
        $_SESSION['fname']=$results->FullName;
        $currentpage=$_SERVER['REQUEST_URI'];
        echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
    } else{

        echo "<script>alert('Invalid Details');</script>";

    }

}

?>
<!-- login -->
<div id="loginform" class="modal-style-2 dark modal">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!-- dont forget to add action and action method  -->
                <form action="" method="post" class="mt-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="email" placeholder="Enter your Email" required="required" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" required="required" autocomplete="on" />
                        </div>
                    </div>
                    <div class="row pl-1 pr-1">
                        <div class="col text-right hint-text pt-0">
                            <a href="#forgotpassword" data-toggle="modal" data-dismiss="modal" class="text-danger">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="form-group text-center mt-2 mb-0">
                        <button type="submit" name="login" class="btn btn-primary btn-sm">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                Don't have an account? <a href="#registerform" data-dismiss="modal" data-toggle="modal"> Register</a>
            </div>
        </div>
    </div>
</div>
   