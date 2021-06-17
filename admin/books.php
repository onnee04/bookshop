<?php include('packets/navbar.php')?>
            
        
        <div class="main">
        <div class="wrapper">
            <h1 class="text-center h1">Manage Books</h1>
            <a href="add-books.php" class="btn-primary">Add Books</a>
            <br> <br> <br>

            <?php
            if(isset($_SESSION['add-book']))
            {
                echo $_SESSION['add-book'];
                unset($_SESSION['add-book']);
               
            }
            if(isset($_SESSION['delete-book']))
            {
                echo $_SESSION['delete-book'];
                unset($_SESSION['delete-book']);
               
            }
            if(isset($_SESSION['update-book']))
            {
                echo $_SESSION['update-book'];
                unset($_SESSION['update-book']);
               
            }
            ?>
            


            <table class="header">

                <tr >
                    <th>Sl. No</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <?php
                  $sql="SELECT * FROM book";
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
                              $title=$rows['title'];
                              $image=$rows['photo'];
                              $feature=$rows['feature'];
                              $active=$rows['active'];
                              $price=$rows['price'];

                              ?>
                              <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $title ?></td>
                    <td><?php echo $price ?></td>
                    <td>
                        <?php
                        if($image!="")
                        {
                            ?>
                            <img src="<?php echo SITURL; ?>images/books/<?php echo $image?>" width="100px"  >
                            <?php

                        }
                        else{
                            echo "Give image"; 
                        }
                         
                         ?></td>
                    <td><?php echo $feature ?></td>
                    <td><?php echo $active ?></td>
                    <td> 
                    
                        <a href="<?php echo SITURL; ?>/admin/update-book.php?id=<?php echo $id;?>&image_name=<?php echo $image;?>" class="btn-secondary">Update book</a>
                        <a href="<?php echo SITURL;?>/admin/delete-book.php?id=<?php echo $id; ?>&image_name=<?php echo $image;?>" class="btn-dark">Delete book</a>
                    </td>

                </tr>
                <?php




                          }

                      }
                      else{

                      }
                  }


                ?>
                
                
            </table>
        </div>
       </div>
        <?php include('packets/footer.php')?>