<?php include('packets/navbar.php')?>
<div class="main">
    <div class="wrapper">
        <h1 class="text-center"> Add Admin</h1>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
           
        }

        ?>
        <form action="" method="post">
            <table class="add">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="Full-name" placeholder="Enter your name" id="input"></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="User-name" placeholder="Enter your user name" id="input"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter your password" id="input"></td>
                </tr>
                <tr >
                    <td colspan="3"> <input type="submit" name="submit" value="Submit" class="btn-primary"> </td>
                </tr>
            </table>
        </form>

    </div>

</div>


<?php include('packets/footer.php')?>


<?php
if(isset($_POST['submit']))
{
     $fullname=$_POST['Full-name'];
     $username=$_POST['User-name'];
     $password=md5($_POST['password']);

     $sql= "INSERT INTO admin_table SET
     full_name='$fullname',
     user_name='$username',
     password='$password'
     ";
     $res = mysqli_query($conn,$sql) or die(mysqli_error());

     if($res==TRUE)
     {
         $_SESSION['add']="Admin added successfully";
         header("location:".SITURL."admin/admin.php");
     }
     else{
        $_SESSION['add']="Failed to add admin";
        header("location:".SITURL."admin/add-admin.php");
     }

     
     
}



?>