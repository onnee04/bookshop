<?php include('packets/navbar.php')?>


<div class="main">
    <div class="wrapper">
        <h1 class="text-center"> Update Book</h1>

        <?php
        if(isset($_SESSION['update-book']))
        {
            echo $_SESSION['update-book'];
            unset($_SESSION['update-book']);
           
        }
        ?>

<?php
            if(isset($_GET['id']))
            {
            $id=$_GET['id'];
            $sql="SELECT * FROM book WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            if($res==TRUE)
            {
                
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row1=mysqli_fetch_assoc($res);
                    $title=$row1['title'];
                    $current=$row1['photo'];
                    $description=$row1['des'];
                    $feature=$row1['feature'];
                    $active=$row1['active'];
                    $price=$row1['price'];
                    $current_catagory=$row1['catagory_id'];
                    

                }
                else{
                    $_SESSION['delete-catagory']="book not found";
                    header('location:'.SITURL.'admin/books.php');
                    

                }
            }
        } 
        else{
            
             header('location:'.SITURL.'admin/books.php');

        }

          ?>

           
   
        <form action="" method="post" enctype="multipart/form-data">
            <table class="add">
                <tr>
                    <td>Title: <br> <br> </td>
                    <td><input type="text" name="Title"  id="input" value="<?php echo $title;?>"><br> <br></td>
                </tr>
                <tr>
                    <td>Description: <br> <br> </td>
                    <td > 
                       <textarea name="description" cols="30" rows="5" ><?php echo $description;?></textarea> 
                    </td>
                
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
                            <img src="<?php echo SITURL; ?>images/books/<?php echo $current?>" width="100px"  >
                            <?php

                        }
                        else{
                            echo "Give image"; 
                        }
                         
                         ?> <br> <br></td>

                 <tr>
                    <td>Price:</td>
                    <td><input type="number" name="taka"  id="input" value="<?php echo $price;?>"> <br><br></td>
                </tr>
                <tr>
                  <td>Category:</td>
                  <td>
                  <select name="catagory"  >
                  <?php

                   $sql6= "SELECT * FROM catagory WHERE active='Yes'";
                   $res6=mysqli_query($conn,$sql6);
                   $count=mysqli_num_rows($res6);
                   if($count>0)
                   {
                       while($row=mysqli_fetch_assoc($res6))
                       {
                           $catagory_title=$row['title'];
                           $catagory_id=$row['id'];
                           ?>
                            <option <?php 
                            if($current_catagory==$catagory_id)
                            {
                                echo "selected";
                            }
                            ?>
                            value="<?php echo $catagory_id;?>"><?php echo $catagory_title;?></option>
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
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="current" value="<?php echo $current;?>">
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
     $description=$_POST['description'];
     $current=$_POST['current'];
     $feature=$_POST['feature'];
     $active=$_POST['active'];
     $price=$_POST['taka'];
     $catagory=$_POST['catagory'];

     if(isset($_FILES['reset-image']['name']))
     {
        $image_name=$_FILES['reset-image']['name'];
        if($image_name!="")
        {
            $ext=end(explode(".",$image_name));
            
            $image_name="book_item".rand(000,100).".".$ext;
            $source=$_FILES['reset-image']['tmp_name'];
            $destination="../images/books/".$image_name;
            $upload=move_uploaded_file($source,$destination); 
            if($upload==FALSE)
            {
                echo "pari nai";
                die();
            }
            if($current!="")
            {
                $path="../images/books/".$current;
                $remove=unlink($path);
                if($remove==FALSE)
                {
                    echo "age thekei nai";
                }

            }

    

        }
        else{
            $image_name=$current;
        }


     }
     else{
        $image_name=$current;
         }


         $sql9="UPDATE book SET 
     title='$title',
     des='$description',
     feature='$feature',
     active='$active',
     price=$price,
     catagory_id=$catagory,
     photo='$image_name'
     WHERE id=$id";
     $res9=mysqli_query($conn,$sql9);
     if($res9==TRUE)
     {
         $_SESSION['update-book']="<h2 class='text-center text-green'>Book updated successfully</h2>";
         ?>
        <script>
            window.location.href='http://localhost/BookShop/admin/books.php';

        </script>
        <?php
     }
     else{
         echo "not updated";
     }
    }?>
    