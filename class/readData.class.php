<?php
require_once('dbh.class.php');

class ReadData extends dbh
{
    public function getContactUs()
    {
        $sql="select * from tblcontactusquery";
        $stmt=$this->connect();
        $stmt = $stmt->query($sql);

        while ($row=$stmt->fetch())
        {
            echo $row['id'] ;
            echo $row['name'];
        }
    }
}
?>