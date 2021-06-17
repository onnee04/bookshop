<?php include('packets/navbar.php')?>
            
        
        <div class="main">
        <div class="wrapper">
            <h1 class="text-center h1">Manage Orders</h1>

            <?php
               if(isset($_SESSION['order']))
                  {
                    echo $_SESSION['order'];
                    unset($_SESSION['order']);
       
                   }
                   if(isset($_SESSION['delete']))
                  {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
       
                   }
            ?>
            <table class="header">

                <tr >
                    <th>Sl. No</th>
                    <th>Book</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql="SELECT * FROM order_table ORDER BY id DESC";
                $res=mysqli_query($conn,$sql);
                $sn=1;
                if($res==TRUE)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $id=$rows['id'];
                        $book=$rows['book'];
                        $price=$rows['price'];
                        $quantity=$rows['quantity'];
                        $total=$rows['total'];
                        $order_date=$rows['order_date'];
                        $status=$rows['status'];
                        $cus_name=$rows['cus_name'];
                        $phone=$rows['phone'];
                        $mail=$rows['mail'];
                        $address=$rows['address'];
                        ?>
                        <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $book ?></td>
                        <td><?php echo $price ?></td>
                        <td><?php echo $quantity ?></td>
                        <td><?php echo $total ?></td>
                        <td><?php echo $order_date ?></td>
                        <td><?php echo $status ?></td>
                        <td><?php echo $cus_name ?></td>
                        <td><?php echo $phone ?></td>
                        <td><?php echo $mail ?></td>
                        <td><?php echo $address ?></td>
                        <td> 
                    <a href="<?php echo SITURL; ?>/admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Update</a>
                    <a href="<?php echo SITURL; ?>/admin/delete-order.php?id=<?php echo $id;?>" class="btn-dark">Delete</a>
                        </tr>

                        <?php
                        
                    }
                }


                ?>
                
                
               
            </table>
        </div>
       </div>
        <?php include('packets/footer.php')?>