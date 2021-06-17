<?php include('packets/navbar.php')?>
            
        
        <div class="main">
        <div class="wrapper">
            <h1 class="text-center h1">Manage Catagory</h1>
            <?php
            if(isset($_SESSION['add-catagory']))
            {
                echo $_SESSION['add-catagory'];
                unset($_SESSION['add-catagory']);
               
            }
            if(isset($_SESSION['upload']))
            {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
           
            }
            if(isset($_SESSION['delete-catagory']))
            {
            echo $_SESSION['delete-catagory'];
            unset($_SESSION['delete-catagory']);
           
            }
            if(isset($_SESSION['update-catagory']))
            {
            echo $_SESSION['update-catagory'];
            unset($_SESSION['update-catagory']);
           
            }

            ?>
            <br><br>
            <a href="add-catagory.php" class="btn-primary">Add catagory</a>
           
           
            <table class="header">

                <tr >
                    <th>Sl. No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Featured</th>
                    <th>Actions</th>

                </tr>
                
                <?php
                  $sql="SELECT * FROM catagory";
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

                              ?>
                              <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $title ?></td>
                    <td>
                        <?php
                        if($image!="")
                        {
                            ?>
                            <img src="<?php echo SITURL; ?>images/catagory/<?php echo $image?>" width="100px"  >
                            <?php

                        }
                        else{
                            echo "Give image"; 
                        }
                         
                         ?></td>
                    <td><?php echo $active ?></td>
                    <td><?php echo $feature ?></td>
                    <td> 
                    
                        <a href="<?php echo SITURL; ?>/admin/update-catagory.php?id=<?php echo $id;?>&image_name=<?php echo $image;?>" class="btn-secondary">Update catagory</a>
                        <a href="<?php echo SITURL;?>/admin/delete-catagory.php?id=<?php echo $id; ?>&image_name=<?php echo $image;?>" class="btn-dark">Delete catagory</a>
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