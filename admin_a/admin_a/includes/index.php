<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
    
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Đơn hàng hoàn thành</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

               <h4><?php
                       $result =mysqli_query($con,"SELECT count(OrderId) as total from .order where OrderStatus=3");
                       $row = mysqli_fetch_assoc($result);
                       $total_records = $row['total'];
                       echo $total_records;
                    ?>
               *</h4>
               <h4><?php
                       $result =mysqli_query($con,"SELECT sum(OrderPrice) as total from .order where OrderStatus=3");
                       $row = mysqli_fetch_assoc($result);
                       $total_records = $row['total'];
                       echo $total_records;
                    ?>
               $</h4>


              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Đơn hàng mới</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><h4><?php
                       $result =mysqli_query($con,"SELECT count(OrderId) as total from .order where OrderStatus=0");
                       $row = mysqli_fetch_assoc($result);
                       $total_records = $row['total'];
                       echo $total_records;
                    ?>*</h4></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php
                       $result =mysqli_query($con,"SELECT sum(OrderPrice) as total from .order where OrderStatus=0");
                       $row = mysqli_fetch_assoc($result);
                       $total_records = $row['total'];
                       echo $total_records;
                    ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn hàng đang xử lý</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                  <h4><?php
                       $result =mysqli_query($con,"SELECT count(OrderId) as total from .order where OrderStatus=1");
                       $row = mysqli_fetch_assoc($result);
                       $total_records = $row['total'];
                       echo $total_records;
                    ?>*</h4> </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php
                       $result =mysqli_query($con,"SELECT sum(OrderPrice) as total from .order where OrderStatus=1");
                       $row = mysqli_fetch_assoc($result);
                       $total_records = $row['total'];
                       echo $total_records;
                    ?></div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Đơn hàng bị hủy</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <h4><?php
                       $result =mysqli_query($con,"SELECT count(OrderId) as total from .order where OrderStatus=-1");
                       $row = mysqli_fetch_assoc($result);
                       $total_records = $row['total'];
                       echo $total_records;
                    ?>*</h4> </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php
                       $result =mysqli_query($con,"SELECT sum(OrderPrice) as total from .order where OrderStatus=-1");
                       $row = mysqli_fetch_assoc($result);
                       $total_records = $row['total'];
                       echo $total_records;
                    ?>$</div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>