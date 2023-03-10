<section class="home-section">
    <div class="home-content">
        <i class="bx bx-menu"></i>
        <span class="text">Dashboard</span>
    </div>
    <div class="blocks wrapper">
        <div class="block">
            <div class="heading">
                Reg Users
            </div>
            <div>
                <?php
                $sql = "SELECT id from tblusers ";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $regusers = $query->rowCount();
                ?>
            </div>
            <div class="num">
                <?php echo htmlentities($regusers); ?>
            </div>
            <a href="regusers.php" class="arrow">
                Full Detail <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="block">
            <div class="heading">
                Listed Brands
            </div>
            <div>
                <?php
                $sql3 = "SELECT id from tblusers ";
                $query3 = $dbh->prepare($sql3);
                $query3->execute();
                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                $brands = $query3->rowCount();
                ?>
            </div>
            <div class="num">
                <?php echo htmlentities($brands); ?>
            </div>
            <a href="manage-brands.php" class="arrow">
                Full Detail <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="block">
            <div class="heading">
                Listed orders
            </div>
            <div>
                <?php
                $sql3 = "SELECT id from tblusers ";
                $query3 = $dbh->prepare($sql3);
                $query3->execute();
                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                $brands = $query3->rowCount();
                ?>
            </div>
            <div class="num">
                <?php echo htmlentities($brands); ?>
            </div>
            <a href="manage-brands.php" class="arrow">
                Full Detail <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="blocks wrapper">
            <div class="block">
                <div class="heading">
                    contact  Users
                </div>
                <div>
                    <?php
                    $sql = "SELECT id from tblusers ";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $regusers = $query->rowCount();
                    ?>
                </div>
                <div class="num">
                    <?php echo htmlentities($regusers); ?>
                </div>
                <a href="contactus.php" class="arrow">
                    Full Detail <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
</section>