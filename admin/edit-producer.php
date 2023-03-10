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
$brand=$_POST['brandname'];
$omschrijf=$_POST['omschrijven'];
$priceflower=$_POST['priceflower'];
$aantal=$_POST['aantal'];
$id=intval($_GET['id']);

$sql="update postproducer set FlowerBrand=:brand,FlowerOverview=:omschrijf,Price=:priceflower,aantal=:aantal where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':omschrijf',$omschrijf,PDO::PARAM_STR);
$query->bindParam(':priceflower',$priceflower,PDO::PARAM_STR);
$query->bindParam(':aantal',$aantal,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";
}

?>
<!doctype html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Flower Power| Admin Post Producer</title>
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
            <span class="text">New Flower</span>
        </div>
        <div class="wrapper">
            <div class="form_container">
                <div class="heading">
                    <h2>Basic Info</h2>
                </div>
                <?php
                $id=intval($_GET['id']);
                $sql ="SELECT postproducer.*,tblbrands.BrandName,tblbrands.id as bid from postproducer join tblbrands on tblbrands.id=postproducer.FlowerBrand where postproducer.id=:id";
                $query = $dbh -> prepare($sql);
                $query-> bindParam(':id', $id, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {	?>

                <form  method="post" name="form" enctype="multipart/form-data">
                <div class="form_wrap">
                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                    <div class="form_item">
                        <label>Select Brand</label>
                        <div class="col-sm-4">
                            <select class="selectpicker" name="brandname" required>
                            <option value=""> Select </option>
                            <option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->BrandName); ?> </option>
                            <?php $ret="select id,BrandName from tblbrands";
                            $query= $dbh -> prepare($ret);
                            //$query->bindParam(':id',$id, PDO::PARAM_STR);
                            $query-> execute();
                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                            if($query -> rowCount() > 0)
                            {
                                foreach($resultss as $results)
                                {
                                if($results->BrandName==$bdname)
                                {
                                continue;
                                } else{
                                ?>
                                <option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->BrandName);?></option>
                                <?php }}} ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="form_wrap">
                        <div class="form_item">
                            <label>omschrijven</label>
                            <textarea class="omscrijf" type="text" name="omschrijven" rows="3"  required><?php echo htmlentities($result->FlowerOverview);?></textarea>
                        </div>
                    </div>
                    <div class="form_wrap">
                        <div class="form_item">
                            <label>Price(in Euro)</label>
                            <input type="text" name="priceflower" value="<?php echo htmlentities($result->Price);?>" required>
                        </div>
                    </div>
                    <div class="form_wrap">
                        <div class="form_item">
                            <label>Aantal</label>
                            <input type="text" name="aantal" value="<?php echo htmlentities($result->aantal);?>" required>
                        </div>
                    </div>
                    <div class="form_wrap">
                    <label>Upload Images</label>
                      <div class="form_item">
                      Image 1 <img src="img/flowerimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
                      <a href="changeimage.php?imgid=<?php echo htmlentities($result->id)?>">Change Image</a>
                      <?php } ?> 
                      <?php } ?>
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
