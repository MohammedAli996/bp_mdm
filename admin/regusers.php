<?php
require 'includes/config.php';
$sql = 'SELECT * FROM users';
$statement = $dbh->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
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
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/header.css">

</head>
<body>
<?php include('includes/leftbar.php'); ?>
    <section class="home-section">
        <div class="home-content">
            <i class="bx bx-menu" ></i>
            <span class="text">Reg Users</span>
        </div>
        <div class="ts-main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                <h2 class="page-title">All people</h2>
                                        <div class="panel-body">
                                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>FullName</th>
                                                        <th>Email</th>
                                                        <th>T-Nummer</th>
                                                        <th>Address</th>
                                                        <th>City</th>
                                                        <th>Country</th>
                                                        <th>RegDate</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>FullName</th>
                                                        <th>Email</th>
                                                        <th>T-Nummer</th>
                                                        <th>Address</th>
                                                        <th>City</th>
                                                        <th>Country</th>
                                                        <th>RegDate</th>
										            </tr>
									            </tfoot>
									            <tbody>
                                                <?php foreach($people as $person): ?>
                                                <tr>
                                                    <td><?= $person->id; ?></td>
                                                    <td><?= $person->FullName; ?></td>
                                                    <td><?= $person->EmailId; ?></td>
                                                    <td><?= $person->ContactNo; ?></td>
                                                    <td><?= $person->Address; ?></td>
                                                    <td><?= $person->City; ?></td>
                                                    <td><?= $person->Country; ?></td>
                                                    <td><?= $person->RegDate; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
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