<?php include('packets/navbar.php')?>
            
        
        <div class="main">
        <div class="wrapper">
            <h1>Dashboard</h1>

           <?php
           if(isset($_SESSION['login']))
           {
           echo $_SESSION['login'];
           unset($_SESSION['login']);
           }
       
           ?>
        

            <div class="column text-center">
                <?php
                $sql="SELECT * FROM catagory";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                ?>
                <h1><?php echo $count; ?></h1>
                 Categories
            </div>
            <div class="column text-center">
            <?php
                $sql1="SELECT * FROM book WHERE active='Yes'";
                $res1=mysqli_query($conn,$sql1);
                $count1=mysqli_num_rows($res1);
                ?>
                <h1><?php echo $count1; ?></h1>
                Books
            </div>
            <div class="column text-center">
            <?php
                $sql2="SELECT * FROM order_table";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2; ?></h1>
                Total Orders
            </div>
            <div class="column text-center">
                <?php
                $sql3="SELECT SUM(total) AS Total FROM order_table WHERE status='Delivered'";
                $res3=mysqli_query($conn,$sql3);
                $row=mysqli_fetch_assoc($res3);
                $total_revenue=$row['Total'];
                ?>
                <h1><?php echo $total_revenue; ?></h1>
                Revenue Generated
            </div>
            <div class="clearfix"></div>
            
            </div>
        <?php include('packets/footer.php')?>