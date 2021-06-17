<?php include('packets/navbar.php')?>
<div class="main">
    <div class="wrapper">
        <h1 class="text-center"> Update Catagory</h1>
        <?php
        if(isset($_SESSION['add-catagory']))
        {
            echo $_SESSION['add-catagory'];
            unset($_SESSION['add-catagory']);
           
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
           
        }

        ?>

           <?php
            if(isset($_GET['id']))
            {
            $id=$_GET['id'];
            $sql="SELECT * FROM catagory WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            if($res==TRUE)
            {
                
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $title=$row['title'];
                    $current=$row['photo'];
                    $feature=$row['feature'];
                    $active=$row['active'];

                }
                else{
                    $_SESSION['delete-catagory']="catagory not found";
                    header('location:'.SITURL.'admin/catagory.php');
                    

                }
            }
        } 
        else{
            
             header('location:'.SITURL.'admin/catagory.php');

        }

          ?>
   
        <form action="" method="post" enctype="multipart/form-data">
            <table class="add">
                <tr>
                    <td>Title: <br> <br> </td>
                    <td><input type="text" name="Title"  id="input" value="<?php echo $title;?>"><br> <br></td>
                </tr>
                
                <tr>
                    <td>Reset Image: <br> <br> </td>
                    <td><input type="file" name="reset-image"><br><br></td>

                </tr>
                <td >Current Image: <br> <br> </td>

                
                <td>
                        <?php
                        if($current!="")
                        {
                            ?>
                            <img src="<?php echo SITURL; ?>images/catagory/<?php echo $current?>" width="100px"  >
                            <?php

                        }
                        else{
                            echo "Give image"; 
                        }
                         
                         ?> <br> <br></td>


                <tr>
                    <td>Featured:  <br> <br>  </td>
                    <td><input 
                    <?php
                    if($feature=="Yes")
                    {
                        echo "checked";
                    }
                    ?>
                  
                         type="radio" name="feature" value="Yes"  >Yes
                        <input 
                        <?php
                    if($feature=="No")
                    {
                        echo "checked";
                    }
                    ?>
                        
                        type="radio" name="feature" value="No">No <br> <br>  </td>
                </tr>
               
                <tr>
                    <td>Active:  <br> <br></td>
                    <td><input
                    <?php
                    if($active=="Yes")
                    {
                        echo "checked";
                    }
                    ?> 
                    type="radio" name="active" value="Yes" >Yes
                        <input
                        <?php
                    if($active=="No")
                    {
                        echo "checked";
                    }
                    ?>
                        
                        type="radio" name="active" value="No">No <br><br></td>
                </tr>
                <tr >
                    <input type="hidden"  name="id" value="<?php echo $id;?>">
                    <input type="hidden"  name="current" value="<?php echo $current;?>">
                    <td colspan="3" > <input type="submit" name="submit" value="Update" class="btn-primary"> </td>
                </tr>
            </table>
        </form>

    </div>

</div>


<?php include('packets/footer.php')?>
<?php
   if(isset($_POST['submit']))
{
   $id=$_POST['id'];
   $title=$_POST['Title'];
   $current=$_POST['current'];
   $feature=$_POST['feature'];
   $active=$_POST['active'];

   if(isset($_FILES['reset-image']['name']))
{
    $image_name=$_FILES['reset-image']['name'];
    if($image_name!=""){

        if($current!="")
       {
         $path="../images/catagory/".$current;
         $remove=unlink($path);
         if($remove==FALSE)
       {
        echo "age thekei image nai";
       }
      }  
        $ext=end(explode(".",$image_name));
    $image_name="Food_catagory".rand(000,100).".".$ext;
    $source=$_FILES['reset-image']['tmp_name'];
    $destination="../images/catagory/".$image_name;
    $upload=move_uploaded_file($source,$destination);
    if($upload==FALSE)
    {
         echo "update korte pari na";
        die();
    }
    
}
    else{
        $image_name=$current;
    }

}
else{
    $image_name=$current;
}

 $sql1="UPDATE catagory SET 
 title='$title',
 photo='$image_name',
 feature='$feature',
 active='$active'
 WHERE id=$id";

 $res1=mysqli_query($conn,$sql1);
 if($res1==TRUE)
 {
   $_SESSION['update-catagory']="<div class='delete-msg'>Updated Successfully</div>";
   header("location:".SITURL."admin/catagory.php");
 }
 else{
    $_SESSION['update-catagory']="Failed to update";
    header("location:".SITURL."admin/catagory.php");

 }


 }


?>