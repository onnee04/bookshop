<?php
 include('../config/constants.php');
 $id=$_GET['id'];
 $sql="DELETE FROM order_table WHERE id=$id AND status='Delivered'";
 $res=mysqli_query($conn,$sql);
 if($res==TRUE)
 {
     $_SESSION['delete']="<div class='delete-msg'>Order deleted successfully</div>";
     header('location:'.SITURL.'admin/order.php');
 }
 else{
    $_SESSION['delete']="Failed to delete admin";
    header('location:'.SITURL.'admin/order.php');
 }

?>