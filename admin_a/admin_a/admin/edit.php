
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Update Admin
    </h6>
  </div>
  <div class="card-body">
        <div class="table-responsive">
        <?php
            include "upload.php";
            include "connect.php";
            if(isset($_POST['edit_admin_btn']))
            {
                $phone=$_POST['edit_id'];
                $sql="SELECT * from admin where Phone='$phone'";
                $query = mysqli_query($con,$sql);
               foreach($query as $row)
                {
                    ?>
                     <form method="POST" action="code.php" enctype = "multipart/form-data">
                     <input type="hidden" name="edit_id" value="<?php echo $row['Phone']?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tên admin</label>
                            <input type="text" name ='txtName' value="<?php echo $row['UserName']?>" class="form-control" id="exampleFormControlInput1" placeholder="Ten admin">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Mật khẩu</label>
                            <input type="password" name='txtPassword' value="<?php echo $row['PassWord']?>"  class="form-control" id="exampleFormControlInput1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Điện thoại</label>
                            <input type="text" name='txtPhone' value="<?php echo $row['Phone']?>"  class="form-control" id="exampleFormControlInput1" placeholder="Dien thoai">
                        </div>
                        <div class="form-group">                 
                    <input type="file" name="image" class="browse btn btn-primary" value="<?php echo $row['Link']?>"/>
                    <div class="form-group">
                        <img src="img/<?php echo $row['Link']?>" height='80' width='80' id="preview" class="img-thumbnail">
                    </div>
                </div>
                        <div class="modal-footer">
                            <input type="hidden" name="edit_link" value="<?php echo $row['Link'];?>">
                            <button type="submit" name="edit_admin_btn" class="btn btn-success">Update</button>
                            <a href="index.php?trang=admin"  class="btn btn-danger"> CANCEL</a>

                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- /.row -->
</div>
