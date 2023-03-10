<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from postproducer WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Flower deleted successfully";

}
 ?>
<!doctype html>
<html>

<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Flower Power| Admin Post Producer</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0" />
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- Admin Stye -->
    <link rel="stylesheet" href="css/brand.css">
    <link rel="stylesheet" href="css/header.css">
    <style>
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
</head>
<body>
        <!-- navigation menu start  -->
        <?php include('includes/leftbar.php'); ?>
    <!-- navigation menu end  -->
    <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu" ></i>
            <span class="text">Manage Flower</span>
        </div>
<div class="ts-main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <h2 class="page-title">Manage Flower</h2>
                                <div class="panel-default">
							<div class="panel-body">
                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb"  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Brand </th>                                                        
                                                        <th>Price</th>
                                                        <th>Aantal</th>
                                                        <th>omschrijven</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Brand </th>                                                        
                                                        <th>Price</th>
                                                        <th>Aantal</th>
                                                        <th>omschrijven</th>
                                                        <th>Action</th>
										            </tr>
									            </tfoot>
									            <tbody>
                                                <?php $sql = "SELECT tblbrands.BrandName,postproducer.Price,postproducer.aantal,postproducer.FlowerOverview,postproducer.id from postproducer join tblbrands on tblbrands.id=postproducer.FlowerBrand";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {				
                                                ?>
                                                <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->BrandName);?></td>
                                            <td><?php echo htmlentities($result->Price);?></td>
                                            <td><?php echo htmlentities($result->aantal);?></td>
                                            <td><?php echo htmlentities($result->FlowerOverview);?></td>
                                            <td><?php echo htmlentities($result->CreationDate);?></td>
                                                    <td><a href="edit-producer.php?id=<?php echo $result->id;?>" class="btn btn-info">Edit</a>&nbsp;&nbsp;
                                                    <a onclick="return confirm('Do you want to delete?')" href="manage-producer.php?del=<?= $result->id ?>" class='btn btn-danger'>Delete</a>
										        <?php $cnt=$cnt+1; }} ?>
									            </tbody>
                                            </table>
                                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="js/main.js"></script>
</html>
<?php } ?>
