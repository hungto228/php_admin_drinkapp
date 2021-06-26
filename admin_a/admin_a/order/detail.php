<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh sách Order
        <form action="code.php" enctype = "multipart/form-data"  method="POST">
            <input type="hidden" name="order_id" value="<?php $id=$_GET["id"]; echo $id;?>">
            <button type="submit" name="export_btn" class="btn btn-primary">Xuất excel</button>
            </form>
    </h6>
  </div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Hình ảnh</th>
                <th>Size</th>
                <th>Giá</th>
                <th>Sugar</th>
                <th>Topping</th>
                <th>Ice</th>
            </tr>
        </thead>
        <tbody>
                <?php
                
                $result=mysqli_query($con,"SELECT OrderDetail from .order where OrderId='$id'");                          
                foreach($result as $row)
                {
                    $vd=json_encode($row);
                    $new = json_decode($vd, true);
                    $j= $new["OrderDetail"] ;
                    $j = preg_replace('/[[:cntrl:]]/', '', $j);
                    $a=json_decode($j,true);
                    for($i=0;$i<count((array)$a);$i++)
                    {
                        $names=$a[$i]['name'];
                        $amount=$a[$i]['amount'];
                        $link=$a[$i]['link'];
                        $size=$a[$i]['size'];
                        if($size==0)
                        {
                            $size="M";
                        }else{
                            $size="L";
                        }
                        $price=$a[$i]['price'];
                        $sugar=$a[$i]['sugar'];
                        $topping=$a[$i]['toppingExtras'];
                        $ice=$a[$i]['ice'];
                        ?>
                        <tr>
                            <td><?php echo $names;?></td>
                            <td><?php echo $amount;?></td>
                            <td><img height="70" width="100" src="../img/<?php echo $link;?>"/></td>
                            <td><?php echo $size;?></td>
                            <td><?php echo $price;?>.vnd</td>
                            <td><?php echo $sugar;?>.%</td>
                            <td><?php echo $topping;?></td>
                            <td><?php echo $ice;?>.%</td>
                        </tr>
                        <?php                                                    
                    } 
                }                                                  
            
        ?>                           
        </tbody>
    </table>
</div>



