<?php
session_start();
include('config.php');
error_reporting(0);

?>
<main class="cd__main">
        <!-- Start DEMO HTML (Use the following code into your project)-->
        <div class="container py-5">
<div class="row justify-content-center">
<div class="col-12 col-lg-4">
    <?php
                $select_products = $dbh->prepare("SELECT * FROM tblcases");
                $select_products->execute();
                if($select_products->rowCount() > 0){
                    while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){

    ?>
    <div class="card box-shadow mx-auto my-5" style="width: 18rem;">
        <div class="car-info-box">
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>">
                <img src="admin/img/casesimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" />
            </a>
            <div class="card-body">
                <h5 class="card-title"><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>">
    <?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->CasesTitle);?>
</a></h5>
                <hr />
                <p class="card-text">€<?php echo htmlentities($result->Price);?> /Day</p>
                <hr />
                <p class="card-text">
                    <?php echo substr($result->CasesOverview,0,70);?>
                </p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,192C384,171,480,117,576,90.7C672,64,768,64,864,85.3C960,107,1056,149,1152,186.7C1248,224,1344,256,1392,272L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div><?php }
}?>
</div>
</div>
</div>
</main>
