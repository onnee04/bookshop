<?php
include('packet-front/up.php');

?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Books</h2>

            <?php
                  $sql="SELECT * FROM catagory  WHERE feature='Yes'";
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
                            <img src="<?php echo SITURL; ?>images/catagory/<?php echo $image;?>" height="400px" width="300px"  >

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
    </section>
    <!-- Categories Section Ends Here -->


<?php
include('packet-front/bottom.php');

?>
