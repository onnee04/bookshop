<?php
include('packet-front/up.php');

?>

<?php

if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    $sql="SELECT * FROM book WHERE id=$order_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $price=$row['price'];
        $image=$row['photo'];

    }
}
else{
    header("location:".SITURL."index.php");
}
?>



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="order_back">
        <div class="container">
            
            <h2 class="text-center ">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Book</legend>
                    <?php
                    if($image!=""){
                        ?>


                          <div class="food-menu-img">
                         <img src="<?php echo SITURL; ?>images/books/<?php echo $image;?>"  class="img-responsive img-curve">
                         </div>
                         <?php
                    }
                    else{
                        echo "no image";
                    }
                    ?>
    
                    <div class="food-menu-desc">
                        <h3><?php echo  $title;?></h3>
                        <input type="hidden" name="book" value="<?php echo $title; ?>">
                        <p class="food-price"><?php echo  $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                 </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Onnee" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 01xxxxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                     <textarea name="address" rows="10" placeholder="E.g. House no,Street,City" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

<?php
include('packet-front/bottom.php');?>
<?php
if(isset($_POST['submit']))
{
     $book=$_POST['book'];
     $price=$_POST['price'];
     $qty=$_POST['qty'];
     $total=$qty*$price;
     $order_date=date('Y-m-d h:i:s');
     $status="ordered";
     $cus_name=$_POST['full-name'];
     $phone=$_POST['contact'];
     $mail=$_POST['email'];
     $address=$_POST['address'];


     $sql1= "INSERT INTO order_table SET
     book='$book',
     price=$price,
     quantity=$qty,
     total=$total,
     order_date='$order_date',
     status='$status',
     cus_name='$cus_name',
     phone='$phone',
     mail='$mail',
     address='$address'";
     


    
     $res1 = mysqli_query($conn,$sql1);

     if($res1==TRUE)
     {
       $_SESSION['order']="<h2 class='text-center text-green' >Order confirmed</h2>";
       ?>
        <script>
            window.location.href='http://localhost/BookShop/';

        </script>
        <?php
     }
     else{
        $_SESSION['order']="<h2 class='text-center text-red' >Failed to confirm order</h2>";
        ?>
        <script>
            window.location.href='http://localhost/BookShop/';

        </script>
        <?php
     }

     
     
}

?>