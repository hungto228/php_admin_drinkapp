<?php
include('upload.php'); 
?>
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
    <h6 class="m-0 font-weight-bold text-primary">Order
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Đơn hàng đã bị hủy
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Ngày order</th>
            <th>Tổng tiền</th>
            <th>Bình luận</th>
            <th>Địa chỉ nhận</th>
            <th>Phone</th>
            <th>Tình trạng</th>
            <th>Event</th>
        </tr>
        </thead>
        <tbody id="myTable">
        <?php
            include "connect.php";
            $result = mysqli_query($con, "SELECT count(OrderId) as total from .order where OrderStatus =-1");
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
            if($total_records==0)
            {
              $_SESSION['status']="Chưa có bản ghi nào";
              unset($_SESSION['status']);
            }else{
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
              $result = mysqli_query($con, "SELECT * FROM .order where OrderStatus =-1 LIMIT $start, $limit");
              while ($row = mysqli_fetch_array($result))
              {
                $id=$row["OrderId"];
                  ?>
                <tr>
                    <td><?php echo $row['OrderDate'];?></td>
                    <td><?php echo $row['OrderPrice'];?>.vnd</td> 
                    <td><?php echo $row['OrderComment'];?></td>
                    <td><?php echo $row['OrderAddress'];?></td>          
                    <td><?php echo $row['UserPhone'];?></td>
                    <td class="text-danger">Đã Hủy</td>                   
                    <td class='center'>
                    <a href="index.php?trang=orderDetail&id=<?php echo $id?>">View</a>
                    </td>
                </tr>
                <?php            
            }
          }
            ?>       
              
        </tbody>
      </table>

    </div>
  </div>
  <div class="pagination">
           <?php 
            if($total_records==0)
            {

            }
            else {
              if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?trang=dahuy&page='.($current_page-1).'">Prev</a> | ';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?trang=dahuy&page='.$i.'">'.$i.'</a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?trang=dahuy&page='.($current_page+1).'">Next</a> | ';
            }
          }
            
           ?>
</div> 

