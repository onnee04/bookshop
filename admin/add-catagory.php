<?php include('packets/navbar.php')?>
<div class="main">
    <div class="wrapper">
        <h1 class="text-center"> Add Catagory</h1>
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
        <form action="" method="post" enctype="multipart/form-data">
            <table class="add">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="Title" placeholder="Enter Title" id="input"> <br><br></td>
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
    $image_name="book_catagory".rand(000,100).".".$ext;
    $source=$_FILES['image']['tmp_name'];
    $destination="../images/catagory/".$image_name;
    $upload=move_uploaded_file($source,$destination);
    if($upload==FALSE)
    {
        $_SESSION['upload']="<div class='text-center delete-msg'>Failed to upload.</div>";
        header("location:".SITURL."admin/add-catagory.php");
        die();
    }
    
}
    else{
        $_SESSION['upload']="<div class='text-center delete-msg'>Image uploaded successfully.</div>";
        header("location:".SITURL."admin/catagory.php");
    }

}
else{
    $image_name="";
}

//print_r($_FILES['image']);
//die();

 $sql="INSERT INTO catagory SET 
 title='$title',
 feature='$feature',
 active='$active',
 photo='$image_name'
 ";
 $res=mysqli_query($conn,$sql);
 if($res==TRUE)
 {
     $_SESSION['add-catagory']="<div class='text-center delete-msg'>Catagory Added.</div>";
     header("location:".SITURL."admin/catagory.php");
 }
 else{
    $_SESSION['add-catagory']="<div class='text-center delete-msg'>Failed to add catagory.</div>";
    header("location:".SITURL."admin/add-catagory.php");
 }
}

?>


