 <?php
session_start();
error_reporting(0);
include('config.php');
 if(isset($_POST['signup']))
 {
     $fname=$_POST['fullname'];
     $email=$_POST['emailid'];
     $mobile=$_POST['mobileno'];
     $password=md5($_POST['password']);
     $sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
     $query = $dbh->prepare($sql);
     $query->bindParam(':fname',$fname,PDO::PARAM_STR);
     $query->bindParam(':email',$email,PDO::PARAM_STR);
     $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
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
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
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
    <!-- register-->
    <div id="registerform" class="modal-style-2 dark modal" id="register">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <h4 class="modal-title">Register</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="signup" method="post" class="mt-3" onsubmit="return valid();">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" name="fullname" placeholder="Enter your name" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" class="form-control" name="emailid" id="emailid" onblur="checkAvailability()" placeholder="Enter email address" required="required" />
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
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Retype password" required="required" autocomplete="on" />
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button name="signup" id="submit" type="submit" class="btn btn-primary btn-sm">Register</button>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    Already have an account? <a href="#loginform" data-dismiss="modal" data-toggle="modal"> Login</a>
                </div>
            </div>
        </div>
    </div>
    <!--modal style 2 end -->