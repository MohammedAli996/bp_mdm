<?php
// Include necessary file
require_once('./class/dbh.class.php');

// Check if register form is submitted
if (isset($_POST['register'])) {
    // Retrieve form input
    $FullName = trim($_POST['FullName']);
    $EmailId = trim($_POST['EmailId']);
    $Password = trim($_POST['Password']);
    $ContactNo = trim($_POST['ContactNo']);

    // Check for empty and invalid inputs
    if (empty($FullName)) {
        array_push($errors, "Please enter a valid username.");
    } elseif (empty($EmailId)) {
        array_push($errors, "Please enter a valid e-mail address.");
    } elseif (empty($ContactNo)) {
        array_push($errors, "Please enter a valid ContactNo.");
    } elseif (!filter_var($EmailId, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Please enter a valid e-mail address.");
    } else {
        try {
            // Define query to select matching values
            $sql = "SELECT FullName, EmailId FROM tblusers WHERE FullName=:FullName OR EmailId=:EmailId";

            // Prepare the statement
            $query = $db_conn->prepare($sql);

            // Bind parameters
            $query->bindParam(':FullName', $FullName);
            $query->bindParam(':EmailId', $EmailId);

            // Execute the query
            $query->execute();

            // Return clashes row as an array indexed by both column name
            $returned_clashes_row = $query->fetch(PDO::FETCH_ASSOC);

            // Check for usernames or e-mail addresses that have already been used
            if ($returned_clashes_row['FullName'] == $FullName) {
                array_push($errors, "That username is taken. Please choose something different.");
            } elseif ($returned_clashes_row['EmailId'] == $EmailId) {
                array_push($errors, "That e-mail address is taken. Please choose something different.");
            } else {
                // Check if the user may be registered
                if ($user->register($FullName, $EmailId, $Password, $ContactNo)) {
                    echo "Registered";
                }
            }
        } catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }
}
?>
    <!-- register-->
    <div id="registerform" class="modal-style-2 dark modal">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <h4 class="modal-title">Register</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form name="signup" method="post" class="mt-3" action="index.php" onsubmit="return valid();">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" name="FullName" placeholder="Enter your name" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input type="text" class="form-control" name="ContactNo" placeholder="Mobile Number" maxlength="10" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" class="form-control" name="EmailId" id="emailid" onblur="checkAvailability()" placeholder="Enter email address" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="Password" placeholder="Enter password" required="required" autocomplete="on" />
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button name="register" id="submit" type="submit" class="btn btn-primary btn-sm">Register</button>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    Already have an account? <a href="#loginform" data-dismiss="modal" data-toggle="modal"> Login</a>
                </div>
            </div>
        </div>
    </div>
    <!--registeren end -->