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
            <h2 class="text-center">Books Available</h2>

     

            <?php
                  $sql1="SELECT * FROM book WHERE feature='Yes' AND active='Yes'   ";
                  $res1=mysqli_query($conn,$sql1);
                  $sn1=1;
                  if($res1==TRUE)
                  {
                      $count1=mysqli_num_rows($res1);
                      if($count1>0)
                      {
                        while($rows1=mysqli_fetch_assoc($res1))
                        {
                            $id=$rows1['id'];
                            $image=$rows1['photo'];
                            $title=$rows1['title'];
                            $price=$rows1['price'];
                            $description=$rows1['des'];
                            if($image!="")
                        {
                            ?>
                             <div class="food-menu-box">
                             <div class="food-menu-img">
                             <img src="<?php echo SITURL; ?>images/books/<?php echo $image;?>"  alt="" class="img-responsive img-curve" width="300px" height="194px">
                             </div>

                            <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price"><?php echo $price;?></p>
                            <p class="food-detail">
                            <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITURL; ?>order.php?order_id=<?php echo $id;?> " class="btn btn-primary">Order Now</a>
                            </div>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>



            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- book Menu Section Ends Here -->
    <?php
include('packet-front/bottom.php');

?>
