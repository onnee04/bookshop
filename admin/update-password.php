<?php include('packets/navbar.php')?>
<div class="main">
    <div class="wrapper">
        <h1 class="text-center"> Update Password</h1>
        <br>
          <br>
          <br>
          <?php
           if(isset($_GET['id']))
           {
               $id=$_GET['id'];
           }
           else{
            header('location:'.SITURL."admin/admin.php");
           }

          ?>
          <?php
          if(isset($_SESSION['password']))
          {
              echo $_SESSION['password'];
              unset($_SESSION['password']);
          }

          ?>

          
         <form action="" method="POST">
            <table class="add">
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current"  id="input" placeholder="Current password" ></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new"  id="input" placeholder="New password" ></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm"  id="input" placeholder="Confirm password" ></td>
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
  $current=md5($_POST['current']);
  $new=md5($_POST['new']);
  $confirm=md5($_POST['confirm']);  

  $sql="SELECT * FROM admin_table WHERE id=$id AND password='$current'";
  $res=mysqli_query($conn,$sql);
  if($res==TRUE)
  {
      $count=mysqli_num_rows($res);
      if($count==1)
      {
         if($new == $confirm)
          {
            $sql1="UPDATE admin_table SET
            password='$new' WHERE id=$id";
            $res1=mysqli_query($conn,$sql1);
            if($res1==TRUE){
                $_SESSION['password']="password updated";
                header("location:".SITURL."admin/admin.php");
            }
            else{
                $_SESSION['password']="failed to update password";
                header("location:".SITURL."admin/admin.php");
            }
            
            

          }
          else{
            $_SESSION['password']="<div class='delete-msg'>password not matched <br><br> </dv>";
            header("location:".SITURL."admin/update-password.php");
            

          }

      }
      else{
          
          $_SESSION['password']="user not found";
          header("location:".SITURL."admin/admin.php");
      }
  }

 }
 

?>
