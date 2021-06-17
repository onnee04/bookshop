<?php
include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET['image_name'])) 
{
 $id=$_GET['id'];
 $image_name=$_GET['image_name'];
 if($image_name!="")
 {
     $path="../images/catagory/".$image_name;
     $remove=unlink($path);
     if($remove==FALSE)
     {
        $_SESSION['delete-catagory']="<div class='delete-msg'>catagory deleted successfully</div>";
        header('location:'.SITURL.'admin/catagory.php');
     }
 }
 $sql="DELETE FROM catagory WHERE id=$id ";
 $res=mysqli_query($conn,$sql);
 if($res==TRUE)
 {
     $_SESSION['delete-catagory']="<div class='delete-msg'>catagory deleted successfully</div>";
     header('location:'.SITURL.'admin/catagory.php');
 }
 else{
    $_SESSION['delete-catagory']="Failed to delete catagory";
    header('location:'.SITURL.'admin/catagory.php');
 }


}
else{

}

?>