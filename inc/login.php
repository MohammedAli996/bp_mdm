<?php
// Include necessary file
require_once('./class/dbh.class.php');

// Check if user is already logged in
if ($user->is_logged_in()) {
    // Redirect logged in user to their home page
    $user->redirect('index.php');
}

// Check if log-in form is submitted
if (isset($_POST['log_in'])) {
    // Retrieve form input
    $EmailId = trim($_POST['EmailId']);
    $Password = trim($_POST['Password']);

    // Check for empty and invalid inputs
    if (empty($EmailId) || empty($EmailId)) {
        array_push($errors, "Please enter a valid username or e-mail address");
    } elseif (empty($Password)) {
        array_push($errors, "Please enter a valid password.");
    } else {
        // Check if the user may be logged in
        if ($user->login($EmailId, $Password)) {
            // Redirect if logged in successfully
            $user->redirect('index.php');
        } else {
            array_push($errors, "Incorrect log-in credentials.");
        }
    }
}
?>
<!-- login -->
<div id="loginform" class="modal-style-2 dark modal">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!-- dont forget to add action and action method  -->
                <form action="home.php" method="post" class="mt-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="EmailId" placeholder="Enter your Email" required="required" />
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
                    <div class="row pl-1 pr-1">
                        <div class="col text-right hint-text pt-0">
                            <a href="#forgotpassword" data-toggle="modal" data-dismiss="modal" class="text-danger">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="form-group text-center mt-2 mb-0">
                        <button type="submit" name="log_in" class="btn btn-primary btn-sm">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                Don't have an account? <a href="#registerform" data-dismiss="modal" data-toggle="modal"> Register</a>
            </div>
        </div>
    </div>
</div>
   