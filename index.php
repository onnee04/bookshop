<?php
include('packet-front/up.php');
?>

    <!-- sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITURL; ?>book-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Book.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
     <br> <br> <br>
    <?php
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
       
    }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Books</h2>

            <?php
                  $sql="SELECT * FROM catagory  WHERE feature='Yes' AND active='Yes' LIMIT 3  ";
                  $res=mysqli_query($conn,$sql);
                  $sn=1;
                  if($res==TRUE)
                  {
                      $count=mysqli_num_rows($res);
                      if($count>0)
                      {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['id'];
                            $image=$rows['photo'];
                            $title=$rows['title'];
                           

                            if($image!="")
                        {
                            ?>
                            <a href="<?php echo SITURL; ?>category-book.php?catagory_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                            <img src="<?php echo SITURL; ?>images/catagory/<?php echo $image;?>" height="350px" width="250px"  >

                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                            </a>
                            <?php
                        }
                    }
                }
            }
            ?>






            

            


            <div class="clearfix"></div>
        </div>
        <p class="text-center">
          <a href="<?php echo SITURL; ?>categories.php">See All Categories</a>
        </p>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Popular books</h2>
        

            

            <?php
                  $sql1="SELECT * FROM book WHERE feature='Yes' AND active='Yes' LIMIT 4  ";
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
                             <img src="<?php echo SITURL; ?>images/books/<?php echo $image;?>"  alt="" class="img-responsive img-curve">
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

        <p class="text-center">
          <a href="<?php echo SITURL; ?>book.php">See All Books</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php
    include('packet-front/bottom.php');
    ?>