<?php
include 'conn.php';
$id=$_GET['id'];
$delete=mysqli_query($connect,"DELETE from users where id=$id");
if($delete){
    header("location:attendance.php");
}


?>