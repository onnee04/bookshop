<?php include('packets/navbar.php');
?>
<div class="main">
    <div class="wrapper">
        <h1 class="text-center"> Add Books</h1><br> <br>

        <?php
            if(isset($_SESSION['add-book']))
            {
                echo $_SESSION['add-book'];
                unset($_SESSION['add-book']);
               
            }
            ?>
        <br> <br>

        <form action="" method="post" enctype="multipart/form-data">
            <table class="add">
                <tr>
                    <td>Title: <br> <br> </td>
                    <td><input type="text" name="Title" placeholder="Enter Title" id="input"> <br><br></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                    <textarea name="description" placeholder="write Description here " cols="30" rows="5"></textarea>
                    <br><br></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="taka"  id="input"> <br><br></td>
                </tr>

                <tr>
                  <td>Category:</td>
                  <td>
                  <select name="catagory" >
                  <?php

                   $sql6= "SELECT * FROM catagory WHERE active='Yes'";
                   $res6=mysqli_query($conn,$sql6);
                   $count=mysqli_num_rows($res6);
                   if($count>0)
                   {
                       while($row=mysqli_fetch_assoc($res6))
                       {
                           $title=$row['title'];
                           $id=$row['id'];
                           ?>
                            <option value="<?php echo $id;?>"><?php echo $title;?></option>
                           <?php
                       }

                   }
                   else{
                       ?>
                       <option value="0">No catagory</option>
                       <?php

                   }

                  ?>
                  </select>
                  </td>
                </tr>

                <tr>
                    <td>Image:</td>
                    <td><input type="file" name="image"><br><br></td>

                </tr>




                <tr>
                    <td>Featured: </td>
                    <td><input type="radio" name="feature" value="Yes">Yes
                        <input type="radio" name="feature" value="No">No <br><br></td>
                </tr>
               
                <tr>
                    <td>Active: </td>
                    <td><input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No <br><br></td>
                </tr>


                
                
                <tr >
                    <td colspan="3" > <input type="submit" name="submit" value="Add" class="btn-primary"> </td>
                </tr>

            </table>
        </form>




        </div>

</div>
<?php include('packets/footer.php')?>
<?php
if(isset($_POST['submit']))
{
    $title=$_POST['Title'];
   $description=$_POST['description'];
   $taka=$_POST['taka'];
   $catagory=$_POST['catagory'];
   if(isset($_POST['feature']))
    {
       $feature=$_POST['feature'];
     }
  else{
    $feature="NO";
   }
   if(isset($_POST['active']))
   {
    $active=$_POST['active'];
   }
   else{
    $active="NO";
   }

   if(isset($_FILES['image']['name']))
  {
    $image_name=$_FILES['image']['name'];
    if($image_name!=""){ 
        $ext=end(explode(".",$image_name));
    $image_name="Food_name".rand(000,100).".".$ext;
    $source=$_FILES['image']['tmp_name'];
    $destination="../images/books/".$image_name;
    $upload=move_uploaded_file($source,$destination);
    if($upload==FALSE)
    {
        $_SESSION['upload']="<div class='text-center delete-msg'>Failed to upload.</div>";
        header("location:".SITURL."admin/add-catagory.php");
        die();
    }
        
 }
else{
    //$_SESSION['add-book']="<div class='text-center delete-msg'>Image uploaded successfully.</div>";
    //header("location:".SITURL."admin/books.php");
}
}
else{
    $image_name="";
}

  
        
  
   $sql2= "INSERT INTO book SET 
   title='$title',
   des='$description',
   price=$taka,
   feature='$feature',
   active='$active',
   catagory_id=$catagory,
   photo='$image_name'
   
   
   ";
   $res=mysqli_query($conn,$sql2);
   if($res==TRUE)
   {
    
    $_SESSION['add-book']="<div class='text-center delete-msg'>Book Added.</div>";
    header("location:".SITURL."admin/books.php");
    
}
else{
   $_SESSION['add-book']="<div class='text-center delete-msg'>Failed to add book.</div>";
   header("location:".SITURL."admin/add-books.php");
}

}
?>