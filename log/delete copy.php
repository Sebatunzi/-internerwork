<?php
include 'connection.php';
$id=$_GET['id'];
$delete=mysqli_query($connect,"DELETE from trainee where id=$id");
if($delete){
    header("location:formin.php");
}


?>