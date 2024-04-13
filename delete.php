<?php
include 'config.php';
$delete_id=$_GET['deleteid'];
$sql = "DELETE FROM `products` where id=$delete_id";
$result = mysqli_query($conn,$sql);
if($result){
    // echo " Data Deleted succesfully";
    header('location:viewproduct.php');
    exit();
}else{
    die(mysqli_error($conn));
}
?>