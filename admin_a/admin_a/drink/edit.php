<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Update products
    </h6>
  </div>
  <div class="card-body">
        <div class="table-responsive">
        <?php
            include "upload.php";
            include "connect.php";
            if(isset($_POST['edit_btn']))
            {
                $id=$_POST['edit_id'];
                $sql="SELECT * from drink where ID='$id'";
                $query = mysqli_query($con,$sql);
               foreach($query as $row)
                {
                    ?>
            <form action="code.php" method="POST" enctype = "multipart/form-data">
                <input type="hidden" name="edit_id" value="<?php echo $row['ID']?>">
                <div class="form-group">
                    <label>Tên đồ uống</label>
                    <input class="form-control" name="txtName" placeholder="nhap ten san pham" value="<?php echo $row['Name']?>" />
                </div>
                <div class="form-group">
                    <label>Tên đồ uống</label>
                    <input class="form-control" name="txtName" placeholder="nhap ten san pham" value="<?php echo $row['Name']?>" />
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input class="form-control" name="txtPrice" placeholder="nhap gia" value="<?php echo $row['Price']?>" />
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="browse btn btn-primary" value="<?php echo $row['Link']?>"/>
                    <div class="form-group">
                        <img src="img/<?php echo $row['Link']?>" height='80' width='80' id="preview" class="img-thumbnail">
                    </div>
                </div>
                <input type="hidden" name="edit_link" value="<?php echo $row['Link'];?>">
                <button type="submit" name="update_btn" class="btn btn-success">Update</button>
                <a href="index.php?trang=drink"  class="btn btn-danger"> CANCEL</a>
            <form>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- /.row -->
</div>

