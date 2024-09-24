<?php
include "dbconnect.php";
$id=$_GET['id'];
    $sql = "DELETE FROM `student` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Record Deleted";
    }else{
        echo "Faild to deleted";
    }
?>
  <meta http-equiv = "refresh" content="0; url = http://localhost/CRUD/table.php"/>
