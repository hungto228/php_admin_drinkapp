<div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">User
    </h5>
  </div>

<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Số điện thoại</th>
                                <th>Avatar</th>
                                <th>Tên người dùng</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "connect.php";
                            $result = mysqli_query($con, 'SELECT count(Phone) as total from user');
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
                            $result = mysqli_query($con, "SELECT * FROM user LIMIT $start, $limit");
                            while ( $data = mysqli_fetch_array($result) )
                            {
                            ?>
                            <tr>
                                <td><?php echo $data['Phone']?></td>
                                <td><img height='70' width='70' src="images/<?php echo $data['avatarUrl']?>"/></td>
                                <td><?php echo $data['Name']?></td>
                                <td ><?php echo $data['Birthdate']?></td>
                                <td ><?php echo $data['Address']?></td>

                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
        </div>
        <div class="pagination">
           <?php 
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?trang=user&page='.($current_page-1).'">Prev</a> | ';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?trang=user&page='.$i.'">'.$i.'</a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?trang=user&page='.($current_page+1).'">Next</a> | ';
            }
           ?>
</div> 