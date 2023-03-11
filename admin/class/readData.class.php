<?php
require_once('dbh.class.php');

class ReadData extends dbh
{
    public function getContactUs()
    {
        $sql="select * from tblcontactusquery";
        $stmt=$this->connect();
        $stmt = $stmt->query($sql);
        $stmt->execute();

        while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr><td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['EmailId']."</td>";
            echo "<td>".$row['Subject']."</td>";
            echo "<td>".$row['Message']."</td>";
            echo "<td>".$row['PostingDate']."</td>";
        }
    }
    public function gettblUsers()
    {
        $sql="select * from tblusers";
        $stmt=$this->connect();
        $stmt = $stmt->query($sql);
        $stmt->execute();

        while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr><td>".$row['id']."</td>";
            echo "<td>".$row['FullName']."</td>";
            echo "<td>".$row['EmailId']."</td>";
            echo "<td>".$row['ContactNo']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['Address']."</td>";
            echo "<td>".$row['City']."</td>";
            echo "<td>".$row['Country']."</td>";
            echo "<td>".$row['RegDate']."</td>";
            echo "<td>".$row['UpdationDate']."</td>";
        }
    }
}
?>