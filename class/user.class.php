<?php
class User
{
    // Refer to database connection
    private $db;

    // Instantiate object with database connection
    public function __construct($db_conn)
    {
        $this->db = $db_conn;
    }

    // Register new users
    public function register($FullName, $EmailId, $Password, $ContactNo)
    {
        try {
            // Hash password
            $user_hashed_password = password_hash($Password, PASSWORD_DEFAULT);

            // Define query to insert values into the users table
            $sql = "INSERT INTO tblusers(FullName, EmailId, Password, ContactNo) VALUES(:FullName, :EmailId, :Password, :ContactNo)";

            // Prepare the statement
            $query = $this->db->prepare($sql);

            // Bind parameters
            $query->bindParam(":FullName", $FullName);
            $query->bindParam(":EmailId", $EmailId);
            $query->bindParam(":Password", $user_hashed_password);
            $query->bindParam(":ContactNo", $ContactNo);

            // Execute the query
            $query->execute();
        }
        catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }

    // Log in registered users with either their username or email and their password
    public function login($EmailId, $Password)
    {
        try {
            // Define query to insert values into the users table
            $sql = "SELECT * FROM tblusers WHERE EmailId=:EmailId LIMIT 1";

            // Prepare the statement
            $query = $this->db->prepare($sql);

            // Bind parameters
            $query->bindParam(":EmailId", $EmailId);

            // Execute the query
            $query->execute();

            // Return row as an array indexed by both column name
            $returned_row = $query->fetch(PDO::FETCH_ASSOC);

            // Check if row is actually returned
            if ($query->rowCount() > 0) {
                // Verify hashed password against entered password
                if (password_verify($Password, $returned_row['Password'])) {
                    // Define session on successful login
                    $_SESSION['user_session'] = $returned_row['user_id'];
                    return true;
                } else {
                    // Define failure
                    return false;
                }
            }
        }
        catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }
    public function updatee($FullName, $EmailId, $Password, $ContactNo, $dob, $Address, $City, $Country)
    {
        try {
            // Hash password
            $user_hashed_password = password_hash($Password, PASSWORD_DEFAULT);

            // Define query to insert values into the users table
            $sql = "INSERT INTO tblusers(FullName, EmailId, Password, ContactNo, dob, Address, City, Country) VALUES(:FullName, :EmailId, :Password, :ContactNo, :dob, :Address, :City, :Country,)";

            // Prepare the statement
            $query = $this->db->prepare($sql);

            // Bind parameters
            $query->bindParam(":FullName", $FullName);
            $query->bindParam(":EmailId", $EmailId);
            $query->bindParam(":Password", $user_hashed_password);
            $query->bindParam(":ContactNo", $ContactNo);
            $query->bindParam(":dob", $dob);
            $query->bindParam(":Address", $Address);
            $query->bindParam(":City", $City);
            $query->bindParam(":Country", $Country);

            // Execute the query
            $query->execute();
        }
        catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
        try {
            // Hash password
            $user_hashed_password = password_hash($Password, PASSWORD_DEFAULT);

            // Define query to insert values into the users table
            $sql = "update tblusers(FullName, EmailId, Password, ContactNo, dob, Address, City, Country) VALUES(:FullName, :EmailId, :Password, :ContactNo, :dob, :Address, :City, :Country,)";

            // Prepare the statement
            $query = $this->db->prepare($sql);

            // Bind parameters
            $query->bindParam(":FullName", $FullName);
            $query->bindParam(":EmailId", $EmailId);
            $query->bindParam(":Password", $user_hashed_password);
            $query->bindParam(":ContactNo", $ContactNo);
            $query->bindParam(":dob", $dob);
            $query->bindParam(":Address", $Address);
            $query->bindParam(":City", $City);
            $query->bindParam(":Country", $Country);

            // Execute the query
            $query->execute();
        }
        catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }
    // Check if the user is already logged in
    public function is_logged_in() {
        // Check if user session has been set
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }
    public function update() {
        // Check if user session has been set
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }
    // Redirect user
    public function redirect($url) {
        header("Location: $url");
    }

    // Log out user
    public function log_out() {
        // Destroy and unset active session
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
}