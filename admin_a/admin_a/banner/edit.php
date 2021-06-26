
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Update Banner
    </h6>
  </div>
  <div class="card-body">
        <div class="table-responsive">
        <?php
            include "upload.php";
            include "connect.php";
            if(isset($_POST['edit_banner_btn']))
            {
                $id=$_POST['edit_id'];
                $sql="SELECT * from banner where ID='$id'";
                $query = mysqli_query($con,$sql);
               foreach($query as $row)
                {
                    ?>
                     <form method="POST" action="code.php" enctype = "multipart/form-data">
                     <input type="hidden" name="edit_id" value="<?php echo $row['ID']?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tên banner</label>
                            <input type="text" name ='txtName' value="<?php echo $row['Name']?>" class="form-control" id="exampleFormControlInput1" placeholder="Ten admin">
                        </div>
                        <div class="form-group">                 
                    <input type="file" name="image" class="browse btn btn-primary" value="<?php echo $row['Link']?>"/>
                    <div class="form-group">
                        <img src="img/<?php echo $row['Link']?>" height='80' width='80' id="preview" class="img-thumbnail">
                    </div>
                </div>
                        <div class="modal-footer">
                        <input type="hidden" name="edit_link" value="<?php echo $row['Link'];?>">
                            <button type="submit" name="edit_banner_btn" class="btn btn-success">Update</button>
                            <a href="index.php?trang=banner"  class="btn btn-danger"> CANCEL</a>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->