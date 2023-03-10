<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}
else{
    if(isset($_REQUEST['eid']))
	{
        $eid=intval($_GET['eid']);
        $status="canceled";
        $sql = "UPDATE orders SET status=:status WHERE  id=:eid";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':status',$status, PDO::PARAM_STR);
        $query-> bindParam(':eid',$eid, PDO::PARAM_STR);
        $query -> execute();

        $msg="orders Successfully Cancelled";
    }


    if(isset($_REQUEST['aeid']))
	{
        $aeid=intval($_GET['aeid']);
        $status="delivered";

        $sql = "UPDATE orders SET status=:status WHERE  id=:aeid";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':status',$status, PDO::PARAM_STR);
        $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
        $query -> execute();

        $msg="Order Successfully Confirmed";
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
<?php include('includes/leftbar.php'); ?>
    <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu" ></i>
            <span class="text">Orders</span>
        </div>
        <div class="ts-main-content">
            <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                                <h2 class="page-title">All people</h2>
                                        <div class="panel-body">
                                             <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				                                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
										                <th>#</th>
										                <th>Name</th>
											            <th>Number</th>
											            <th>Email</th>
											            <th>Address</th>
											            <th>Method</th>
											            <th>Price</th>
											            <th>qty</th>
											            <th>date</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                       <tr>
										                <th>#</th>
										                <th>Name</th>
											            <th>Number</th>
											            <th>Email</th>
											            <th>Address</th>
											            <th>Method</th>
											            <th>Price</th>
											            <th>qty</th>
											            <th>date</th>
                                                    </tr>
									            </tfoot>
									             <?php $sql = "SELECT * from  orders ";
                                                       $query = $dbh -> prepare($sql);
                                                       $query->execute();
                                                       $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                       $cnt=1;
                                                       if($query->rowCount() > 0)
                                                       {
                                                           foreach($results as $result)
                                                           {				?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt);?></td>
                                                    <td><?php echo htmlentities($result->name);?></td>
                                                <td><?php echo htmlentities($result->number);?></td>
                                                <td><?php echo htmlentities($result->email);?></td>
                                                <td><?php echo htmlentities($result->address);?></td>
                                                <td><?php echo htmlentities($result->method);?></td>
                                                <td><?php echo htmlentities($result->Price);?></td>
                                                <td><?php echo htmlentities($result->qty);?></td>
                                                <td><?php echo htmlentities($result->date);?></td>
                                                    <td><?php
                                                               if($result->status==0)
                                                               {
                                                                   echo htmlentities('Not delivered yet');
                                                               } else if ($result->status=="delivered") {
                                                                   echo htmlentities('delivered');
                                                               }
                                                               else{
                                                                   echo htmlentities('canceled');
                                                               }
                                                        ?></td>
										<td><a href="manage-orders.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm this booking')"> delivered</a> /


                                            <a href="manage-orders.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Cancel this Booking')"> canceled</a>
                                        </td>

										</tr>
										<?php $cnt=$cnt+1;
                                                           }
                                                       } ?>
                                            </table>
                                        </div>
                                </div>
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