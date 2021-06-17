<?php include('packets/navbar.php')?>
            
        
        <div class="main">
        <div class="wrapper">
            <h1 class="text-center h1">Manage Admin</h1>

            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }
            if(isset($_SESSION['password']))
            {
                echo $_SESSION['password'];
                unset($_SESSION['password']);
            }
            


            
            
            ?>
            <br> <br> <br>
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <table class="header">

                <tr >
                    <th>Sl. No</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>

                <?php
                  $sql="SELECT * FROM admin_table";
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
                              $full_name=$rows['full_name'];
                              $user_name=$rows['user_name'];

                              ?>
                              <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $full_name ?></td>
                    <td><?php echo $user_name ?></td>
                    <td> 
                    <a href="<?php echo SITURL; ?>/admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Update Password</a>
                        <a href="<?php echo SITURL; ?>/admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                        <a href="<?php echo SITURL;?>/admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-dark">Delete Admin</a>
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