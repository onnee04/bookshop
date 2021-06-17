<?php
 include('../config/constants.php');?>
<html>
    <head>
        <title>Book order website</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['fail']))
        {
            echo $_SESSION['fail'];
            unset($_SESSION['fail']);
        }
       


        ?>
        <form action="" method="POST">
            <table class="add">
                <tr>
                    <td > User Name: <br><br></td> 
                    
                    <td><input type="text" name="user-name"  id="input" placeholder="Enter your user name"><br><br></td>
                </tr>
                <tr>
                    <td>Password: <br> <br> </td>
                    <td><input type="password" name="password"  id="input" placeholder="Enter your password" ><br> <br></td>
                </tr>
                
                
                
                <tr class="text-center"  >
                <td colspan="3">
                    
                     <input   type="submit" name="submit" value="Login" class="btn-primary"> </td>
                </tr>
            </table>
        </form>
        </div>
        </body>
        </html>

<?php
if(isset($_POST['submit']))
{
      $username=$_POST['user-name'];
      $password=md5($_POST['password']);
     
     $sql= "SELECT * FROM admin_table WHERE user_name='$username' AND password='$password'";
     $res=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($res);
     if($count==1)
     {
        $_SESSION['login']="<div class='text-center delete-msg'>login successfully</div>";
        $_SESSION['success']=$username;
        header("location:".SITURL."admin");
        

     }
     else{
         $_SESSION['login']="<div class='text-center delete-msg'>User not found</div>";
         header("location:".SITURL."admin/login.php");
     }
}
?>
