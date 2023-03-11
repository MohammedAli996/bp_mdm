    <?php
session_start();
error_reporting(0);
include('config.php');
if(isset($_POST['update']))
  {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>";
}
}

    ?>
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
    <!-- forgot Password-->
    <div id="forgotpassword" class="modal-style-2 dark modal">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h4 class="modal-title">forgot password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form name="signup" method="post" class="mt-3" onsubmit="return valid();">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" name="email" id="emailid" onblur="checkAvailability()" placeholder="Your Email address*" required="required" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" class="form-control" name="mobile" placeholder="Your Reg. Mobile*" maxlength="10" required="required" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="newpassword" placeholder="New Password*" required="required" autocomplete="on" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-eye-slash"></i>
                            </span>
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password*" required="required" autocomplete="on" />
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button name="update" id="submit" type="submit" class="btn btn-primary btn-sm">Register</button>

                    </div>
                </form>

            </div>
            <div class="text-center">
                <p class="gray_text">For security reasons we don't store your password. Your password will be reset and a new one will be send.</p>
                <p>
                    <a href="#loginform" data-toggle="modal" data-dismiss="modal">
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
    <!--forgot Password -->