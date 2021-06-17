<?php include('packets/navbar.php')?>


<div class="main">
    <div class="wrapper">
        <h1 class="text-center"> Update order</h1>

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
            $sql="SELECT * FROM order_table WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            if($res==TRUE)
            {
                
                $count=mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $id=$row['id'];
                    $book=$row['book'];
                    $price=$row['price'];
                    $quantity=$row['quantity'];
                    $total=$row['total'];
                    $order_date=$row['order_date'];
                    $status=$row['status'];
                    $cus_name=$row['cus_name'];
                    $phone=$row['phone'];
                    $mail=$row['mail'];
                    $address=$row['address'];
                    

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

           
   
        <form action="" method="post">
            <table class="add">
            <tr>
                  <td>Book Name: <br> <br> </td>
                  <td>
                  <select name="book"  >
                  <?php

                   $sql1= "SELECT * FROM book WHERE active='Yes' AND feature='Yes'";
                   $res1=mysqli_query($conn,$sql1);
                   $count1=mysqli_num_rows($res1);
                   if($count1>0)
                   {
                       while($row1=mysqli_fetch_assoc($res1))
                       {
                           $title=$row1['title'];
                           $id1=$row1['id'];
                           ?>
                            <option <?php 
                            if($title==$book)
                            {
                                echo "selected";
                            }
                            ?>
                            value="<?php echo $title;?>"><?php echo $title;?></option>
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
                  <br> <br>
                  </td>
            </tr>
            <tr>
                    <td>Quantity: <br> <br></td>
                    <td><input type="number" name="quantity"  id="input" value="<?php echo $quantity;?>"> <br><br></td>
            </tr>
           
               

                  
                <tr>
                    <td>Customer Name: <br> <br> </td>
                    <td><input type="text" name="cus_name"  id="input" value=" <?php echo $cus_name;?>"> <br><br></td>
                </tr>
                <tr>
                    <td>Phone no:  <br> <br></td>
                    <td><input type="tel" name="phone"  id="input" value="<?php echo $phone;?>"> <br><br></td>
                </tr>
                <tr>
                    <td>Email: <br> <br> </td>
                    <td><input type="email" name="email"  id="input" value="<?php echo $mail;?>"> <br><br></td>
                </tr>

                <tr>
                    <td>Address: <br> <br> </td>
                    <td > 
                       <textarea name="address" cols="30" rows="5" ><?php echo $address;?></textarea> 
                    </td>
                
               
               
                <tr>
                  <td>Status: <br> <br> </td>
                  <td>
                  <select name="status"  >
                   <option <?php if($status=="Ordered") { echo "selected";} ?> value="Ordered">Ordered</option>
                   <option <?php if($status=="On delivery") { echo "selected";} ?> value="On delivery">On delivery</option>
                   <option <?php if($status=="Delivered") { echo "selected";} ?> value="Delivered">Delivered</option>
                   <option <?php if($status=="Cancel") { echo "selected";} ?> value="Cancel">Cancel</option>
                  </select>
                  <br> <br>
                  </td>
                </tr>


               
                  
                       
                        
                
               
               
                <tr >
                    <input type="hidden"  name="id" value="<?php echo $id;?>">
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
     $identity=$_POST['id'];
     $name=$_POST['book'];
     $quantity1=$_POST['quantity'];
     $customer_name=$_POST['cus_name'];
     $email=$_POST['email'];
     $phone1=$_POST['phone'];
     $address1=$_POST['address'];
     $status1=$_POST['status'];
     $sql4="SELECT price FROM book WHERE title='$name'";
     $res4=mysqli_query($conn,$sql4);
     if($res4==TRUE)
     {
         $row4=mysqli_fetch_assoc($res4);
         $taka=$row4['price'];

     }
     else{
        
     }
     $total1=$quantity1 * $taka;


     $sql5="UPDATE order_table SET 
     book='$name',
     price=$taka,
     quantity=$quantity1,
     total=$total1,
     order_date='$order_date',
     cus_name='$customer_name',
     phone='$phone1',
     mail='$email',
     address='$address1',
     status='$status1'
     WHERE id=$identity";
     $res5=mysqli_query($conn,$sql5);
     if($res5==TRUE)
     {
         $_SESSION['order']="<h2 class='text-center text-green'>Order updated successfully</h2>";
         ?>
        <script>
            window.location.href='http://localhost/BookShop/admin/order.php';

        </script>
        <?php
     }
     else{
         echo "not ok";
     }

     
    

}


?>

