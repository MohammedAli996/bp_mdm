<?php
require_once('dbh.class.php');

class UserData extends dbh
{
    public function getRegister($FullName, $EmailId, $password, $ContactNo)
    {
        try {
            $newPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO tbluser(FullName, EmailId, Password, ContactNo
                VALUES(:fullname, :emailid, :mobileno, :password";
            $stmt=$this->connect();
            $stmt = $stmt->query($sql);
            $stmt->bindParam(":fullname", $FullName);
            $stmt->bindParam(":emailid", $EmailId);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":confirmpassword", $password);
            $stmt->bindParam(":email", $EmailId);
            $stmt->bindParam(":mobileno", $ContactNo);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>