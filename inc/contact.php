
<?php
session_start();
error_reporting(0);
include('./class/dbh.class.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,Subject,Message) VALUES(:name,:email,:subject,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Query Sent. We will contact you shortly";
}
else
{
$error="Something went wrong. Please try again";
}

}
?>  
<div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
            <?php if($error){?><div class="errorWrap">
                <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
            </div><?php }
                  else if($msg){?><div class="succWrap">
                <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
            </div><?php }?>

          <div class="row justify-content-center">
            <div class="col-md-6">
              
              <h3 class="heading mb-4">Let's talk about everything!</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas debitis, fugit natus?</p>

              <p><img src="./assets/img/undraw-contact.svg" alt="Image" class="img-fluid"></p>


            </div>
            <div class="col-md-6">
              
              <form class="mb-5" method="post" id="contactForm">
                <div class="row">
                  <div class="col-md-12 form-group">
                      <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Your name" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="email" id="emailaddress" placeholder="Email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                      <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Write your message"></textarea>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-12">
                      <button type="submit" name="send" class="btn btn-primary rounded-0 py-2 px-4">
                          Send Message <span class="angle_arrow">
                              <i class="fa fa-angle-right" aria-hidden="true"></i>
                          </span>
                      </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>