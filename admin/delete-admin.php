<?php
 include('../config/constants.php');
 $id=$_GET['id'];
 $sql="DELETE FROM admin_table WHERE id=$id";
 $res=mysqli_query($conn,$sql);
 if($res==TRUE)
 {
     $_SESSION['delete']="<div class='delete-msg'>Admin deleted successfully</div>";
     header('location:'.SITURL.'admin/admin.php');
 }
 else{
    $_SESSION['delete']="Failed to delete admin";
    header('location:'.SITURL.'admin/admin.php');
 }

?>