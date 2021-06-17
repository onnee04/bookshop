<?php
include('packet-front/up.php');

?>

    <!-- book sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
          <form action="<?php echo SITURL; ?>book-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Book.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- book sEARCH Section Ends Here -->



    <!-- book MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Available Books</h2>
            <?php
             if(isset($_GET['catagory_id']))
             {
                 $catagory_id=$_GET['catagory_id'];
                 $sql2="SELECT * FROM book WHERE catagory_id=$catagory_id";
                 $res2=mysqli_query($conn,$sql2);
                 $count2=mysqli_num_rows($res2);
                 if($count2>0)
                 {
                    while($rows2=mysqli_fetch_assoc($res2))
                    {
                        $id1=$rows2['id'];
                        $image1=$rows2['photo'];
                        $title1=$rows2['title'];
                        $price1=$rows2['price'];
                        $description1=$rows2['des'];
                        if($image1!="")
                        {
                            ?>
                            <div class="food-menu-box">
                             <div class="food-menu-img">
                             <img src="<?php echo SITURL; ?>images/books/<?php echo $image1;?>"  alt="" class="img-responsive img-curve" width="300px" height="194px">
                             </div>

                            <div class="food-menu-desc">
                            <h4><?php echo $title1;?></h4>
                            <p class="food-price"><?php echo $price1;?></p>
                            <p class="food-detail">
                            <?php echo $description1; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITURL; ?>order.php?order_id=<?php echo $id1;?> " class="btn btn-primary">Order Now</a>
                            </div>
                            </div>
                            <?php
                        }
                    }
                 }
             }
             else{
                 echo "not";
             }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- book Menu Section Ends Here -->
    <?php
include('packet-front/bottom.php');

?>
