<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}
else{

    if(isset($_POST['submit']))
    {
        $casestitle=$_POST['CasesTitle'];
        $casesbrand=$_POST['CasesBrand'];
        $brand=$_POST['BrandName'];
        $overview=$_POST['CasesOverview'];
        $pricee=$_POST['Price'];
        $vimage1=$_FILES["img1"]["name"];
        move_uploaded_file($_FILES["img1"]["tmp_name"],"img/casesimages/".$_FILES["img1"]["name"]);

        $sql="INSERT INTO tblcase(CasesTitle,CasesBrand,CasesOverview,Price,Vimage1) VALUES(:casestitle,:casesbrand,:brand,:overview,:pricee,:vimage1)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':casestitle',$casestitle,PDO::PARAM_STR);
        $query->bindParam(':casesbrand',$casesbrand,PDO::PARAM_STR);
        $query->bindParam(':brand',$brand,PDO::PARAM_STR);
        $query->bindParam(':overview',$overview,PDO::PARAM_STR);
        $query->bindParam(':pricee',$pricee,PDO::PARAM_STR);
        $query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            $msg="Vehicle posted successfully";
        }
        else
        {
            $error="Something went wrong. Please try again";
        }

    }


?>
<!doctype html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Post Producer</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
.wrapper{
  max-width: 450px;
  width: 100%;
  margin: 30px auto 0;
  padding: 10px;
}
.wrapper .form_container{
  background: #fff;
  padding: 30px;
  box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.15);
  border-radius: 3px;
}
.heading{
  background: #015a80;
  margin: -30px;
  text-align: center;
  color: white;
  font-size: 19px;
  margin-bottom: 35px;
  padding: 10px;
}
.wrapper .form_container .form_item{
  margin-bottom: 25px;
}
.form_wrap.fullname,
.form_wrap.select_box{
  display: flex;
}

.form_wrap.fullname .form_item,
.form_wrap.select_box .form_item{
  width: 50%;
}

.form_wrap.fullname .form_item:first-child,
.form_wrap.select_box .form_item:first-child{
  margin-right: 4%;
}

.wrapper .form_container .form_item label{
  display: block;
  margin-bottom: 5px;
}

.form_item input[type="text"],
.form_item select{
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #dadce0;
  border-radius: 3px;
}

.form_item input[type="text"]:focus{
  border-color: #6271f0;
}
label{
    color: black;
}
.btn input[type="submit"]{
  background: #1598d4;
  border: 1px solid #1598d4;
  padding: 10px;
  width: 100%;
  font-size: 16px;
  letter-spacing: 1px;
  border-radius: 3px;
  cursor: pointer;
  color: #fff;
}
.omscrijf{
  width: 100%;
}
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/brand.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <!-- navigation menu start  -->
	<?php include('includes/leftbar.php'); ?>
    <!-- navigation menu end  -->
    <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu" ></i>
            <span class="text">Post A New Cases</span>
        </div>
        <div class="wrapper">
            <div class="form_container">
                <div class="heading">
                    <h2>Basic Info</h2>
                </div>
                <form  method="post" name="form" enctype="multipart/form-data">
                <div class="form_wrap">
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
						else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <div class="form_item">
                        <label>Select Brand</label>
                        <div class="col-sm-4">
                        <select class="selectpicker" name="brandname" required>
                            <option value=""> Select </option>
                            <?php $ret="select id,BrandName from tblbrands";
                            $query= $dbh -> prepare($ret);
                            $query->bindParam(':id',$id, PDO::PARAM_STR);
                            $query-> execute();
                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                            if($query -> rowCount() > 0)
                            {
                            foreach($results as $result)
                            {
                            ?>
                            <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
                            <?php }
                            } ?>

                            </select>
                        </div>
                    </div>
                    <div class="form_wrap">
                        <div class="form_item">
                            <label>Cases Title</label>
                            <textarea class="omscrijf" type="text" name="casestitle" rows="1"  required></textarea>
                        </div>
                    </div>
                    <div class="form_wrap">
                        <div class="form_item">
                            <label>omschrijven</label>
                            <textarea class="omscrijf" type="text" name="overview" rows="3"  required></textarea>
                        </div>
                    </div>
                    <div class="form_wrap">
                        <div class="form_item">
                            <label>Price(in Euro)</label>
                            <input type="text" name="pricee" required>
                        </div>
                    </div>
                    <div class="form_wrap">
                    <label>Upload Images</label>
                      <div class="form_item">
                      <label>Images<input type="file" name="img1" required></label>
                        </div>
                    </div>

                        <div class="btn">
                            <button class="btn btn-default" type="reset">Cancel</button>
                            <button class="btn btn-primary" name="submit" type="submit">Save changes</button>                        
                        </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
<script src="js/main.js"></script>
<?php } ?>
