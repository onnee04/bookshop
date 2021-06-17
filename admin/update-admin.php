<?php include('packets/navbar.php')?>
<div class="main">
    <div class="wrapper">
        <h1 class="text-center"> Update admin</h1>
        <br>
          <br>
          <br>

          <?php
          if(isset($_GET['id']))
          {
            $id=$_GET['id'];
            $sql="SELECT * FROM admin_table WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            if($res==TRUE)
            {
                
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $full_name=$row['full_name'];
                    $user_name=$row['user_name'];
                }
                else{
                    header('location:'.SITURL."admin/admin.php");
                }
            }
          }
        else{
            header('location:'.SITURL."admin/admin.php");
        }

          ?>
   
          <form action="" method="POST">
            <table class="add">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="Full-name"  id="input" value=<?php echo $full_name;?>></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="User-name"  id="input" value=<?php echo $user_name; ?>></td>
                </tr>
                
                
                <tr >
                <td colspan="3">
                    <input type="hidden"  name="id" value="<?php echo $id;?>">
                     <input type="submit" name="submit" value="Submit" class="btn-primary"> </td>
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
   $username=$_POST['User-name'];
   $fullname=$_POST['Full-name'];

 $sql1="UPDATE admin_table SET 
 user_name='$username',
 full_name='$fullname'
 WHERE id=$id";

 $res1=mysqli_query($conn,$sql1);
 if($res1==TRUE)
 {
  $_SESSION['update']="<div class='delete-msg'>Updated Successfully</div>";
  header("location:".SITURL."admin/admin.php");
 }
 else{
    $_SESSION['update']="Failed to update";
    header("location:".SITURL."admin/admin.php");

 }


 }


?>