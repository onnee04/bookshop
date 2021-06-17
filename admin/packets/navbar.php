
<?php
 include('../config/constants.php');
if(!isset($_SESSION['success']))
{
    $_SESSION['fail']="<div class='text-center delete-msg'>Need to login.</div>";
    header("location:".SITURL."admin/login.php");
}

?>

<html>
    <head>
        <title>Book order website</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    
                    <li>
                    <a href="<?php echo SITURL; ?>admin/index.php">Home</a>
                    <a href="<?php echo SITURL; ?>admin/admin.php">Admin</a>
                    <a href="<?php echo SITURL; ?>admin/catagory.php">Catagory</a>
                    <a href="<?php echo SITURL; ?>admin/books.php">Books</a>
                    <a href="<?php echo SITURL; ?>admin/order.php">Order</a>
                    <a href="<?php echo SITURL; ?>admin/logout.php">Logout</a>
                    </li>
                    
                </ul>
            
            
            </div>
        </div>