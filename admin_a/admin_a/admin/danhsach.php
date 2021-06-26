<?php
include('upload.php'); 
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   
      </div>
     
      <form action="code.php" method="POST" enctype = "multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="txtName" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="txtPhone" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="txtPassword" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="txtCpass" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <input type="file" name="image" class="browse btn btn-primary">
                <div class="form-group">
                    <img src="https://placehold.it/80x80" height='80' width='80' id="preview" class="img-thumbnail">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="insert_admin_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="container-fluid">
<div class="card shadow mb-4">
<?php
if(isset($_SESSION['success']) && $_SESSION['success']!='')
    {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success'];unset($_SESSION['success']);?>                                       
        </div>
        
    <?php 
    }
    
    if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
        ?>
        <div class="alert alert-warning" role="alert">
        <?php
            echo $_SESSION['status'];
            unset($_SESSION['status']);
        ?>
        </div>
        <?php
    }
?>
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Username </th>
            <th>Password</th>
            <th>Avatar </th>
            <th>Email </th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
              include "connect.php";
              $result = mysqli_query($con, 'SELECT count(Phone) as total from admin');
              $row = mysqli_fetch_assoc($result);
              $total_records = $row['total'];
              $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
              $limit = 5;
              $total_page = ceil($total_records / $limit);
              if ($current_page > $total_page){
                  $current_page = $total_page;
              }
              else if ($current_page < 1){
                  $current_page = 1;
              }
              $start = ($current_page - 1) * $limit;
              $result = mysqli_query($con, "SELECT * FROM admin LIMIT $start, $limit");
              while ( $data = mysqli_fetch_array($result) )
              {
                  ?>    
              <tr>
                  <td><?php echo  $data['UserName'];?></td>
                  <td><?php echo $data['PassWord'];?></td>
                  <td><img height='70' width='70' src='img/<?php echo $data['Link'];?>'/></td>                             
                  <td ><?php echo $data['Phone'];?></td>
                  <td class="center">
                      <form action="code.php" method="POST">
                          <input type="hidden" name="delete_id" value="<?php echo $data['Phone'];?>">
                          <button type="submit" name="delete_admin_btn" class="btn btn-danger">DELETE</button>
                      </form>
                      </td>
                      <td class='center'>
                      <form action="index.php?trang=adminedit" enctype = "multipart/form-data" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $data['Phone'];?>">
                          <button type="submit" name="edit_admin_btn" class="btn btn-primary">EDIT</button>
                      </form>
                  </td>
              </tr>
              <?php
              }
              ?>       
        </tbody>
      </table>

    </div>
  </div>
  <div class="pagination">
           <?php 
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?trang=admin&page='.($current_page-1).'">Prev</a> | ';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?trang=admin&page='.$i.'">'.$i.'</a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?trang=admin&page='.($current_page+1).'">Next</a> | ';
            }
           ?>
</div> 

