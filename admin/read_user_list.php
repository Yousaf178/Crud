<?php
//include('dbconnection.php');

$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Crud Operation Using PHP and MySQLi</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    font-size: 15px;
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-height: 45px;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title select {
    border-color: #ddd;
    border-width: 0 0 1px 0;
    padding: 3px 10px 3px 5px;
    margin: 0 5px;
}
.table-title .show-entries {
    margin-top: 7px;
}
.search-box {
    position: relative;
    float: right;
}
.search-box .input-group {
    min-width: 200px;
    position: absolute;
    right: 0;
}
.search-box .input-group-addon, .search-box input {
    border-color: #ddd;
    border-radius: 0;
}
.search-box .input-group-addon {
    border: none;
    border: none;
    background: transparent;
    position: absolute;
    z-index: 9;
}
.search-box input {
    height: 34px;
    padding-left: 28px;     
    box-shadow: none !important;
    border-width: 0 0 1px 0;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    font-size: 19px;
    position: relative;
    top: 8px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    padding: 0 10px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
}
.pagination li a:hover {
    color: #666;
}   
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>User <b>Details</b></h2>
                    </div>
                    
                     
                </div>
            </div>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<?php
$vid_user=$_GET['viewid'];
$ret=mysqli_query($con,"select * from user_registration where ID =$vid_user");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<!-- image show by yousaf  -->
<tr>
    <th colspan="3" style="border:none;">profile pic</th>
    <td><img style="border-width: 10px; width: 82px;" src="../user_image/<?php echo $row['profile_pic']; ?> "></td>
</tr>
 <tr>
    <th>Fll Name</th>
    <td><?php  echo $row['fname']." ".$row['lname'];?></td>
    <th>Date Of Birth</th>
    <td><?php  echo $row['D_O_B'];?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php  echo $row['email'];?></td>
    <th>Mobile Number</th>
    <td><?php  echo $row['mobile_no'];?></td>
  </tr>
  <tr>
    <th>Address</th>
    <td><?php  echo $row['address'];?></td>
    <th>Creation Date</th>
    <td><?php  echo $row['creation_date'];?></td>
  </tr>
<?php 
$cnt=$cnt+1;
}?>

                 
</tbody>
</table>
       
        </div>
        <a href="admin_index.php" class="btn btn-secondary"><i class="material-icons"></i> <span>Go Back</span></a>
    </div>
</div>     

<!-- ////////////////////Total order List Against User//////////////////////// -->

<!DOCTYPE html>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-7">
                        <?php
                        $vid_user=$_GET['viewid'];
$view_order_list_name=mysqli_query($con,"select * from user_registration where ID =$vid_user");
$fetch_view_order_list_name=mysqli_fetch_array($view_order_list_name);
                        ?>
                        <h2>All Order Complete List Against <b><?php echo $fetch_view_order_list_name['fname']." ".$fetch_view_order_list_name['lname']; ?></b></h2>
                    </div>
                       <div class="col-sm-12" align="right">
                        Search:<input type="search" name="search">
                        <!-- <a href="user_list.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>All User</span></a> -->
                        

                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="background-color: darkgray";>
                    <tr>
                        <th>Product ID </th>
                        <th hidden> ID </th>
                        <th>Product </th>
                        <th>Made </th>
                        <th>Name </th>
                        <th>Bank Number </th>
                        <th>Tax </th>
                        <th>ToTal Price </th>
                        <!-- <th>ToTal Price </th> -->
                        <th>SubToTal Price </th>
                        <th>Bank NO</th>                       
                        <th>Location</th>
                        <!-- <th>Created Date</th> -->
                        <!-- <th>Profile</th> -->
                        <th>Order Recieved</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                     // echo "SELECT * FROM `buy_product` where userid = $vid";exit;
$buy_product_query=mysqli_query($con,"SELECT * FROM `buy_product` where userid = $vid_user");
$cnt=1;
$buy_product_query_fetch=mysqli_num_rows($buy_product_query);
if($buy_product_query_fetch>0){
while ($buy_product_query_fetch=mysqli_fetch_array($buy_product_query)) {

$p_id = $buy_product_query_fetch['productid'];
$S_No_id = $buy_product_query_fetch['ID'];
$StaTus = $buy_product_query_fetch['status'];
//echo $StaTus ;

// print_r($S_No_id);
?>
<!--Fetch the Records -->
                    <tr style="background-color: ";>
                        <td><?php echo $buy_product_query_fetch['productid'];?></td>
                       
                        <?php
                            // echo "SELECT buy_product.ID, buy_product.productid, products.name,products.image,products.made, buy_product.tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location,buy_product.status FROM buy_product INNER JOIN products ON buy_product.productid=products.id where productid = $p_id " ;
                        $product_buy_product_join_query=mysqli_query($con,"SELECT buy_product.ID, buy_product.productid, products.name,products.image,products.made, buy_product.tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location,buy_product.status FROM buy_product INNER JOIN products ON buy_product.productid=products.id where productid = $p_id ");
                        $row_pro=mysqli_fetch_array($product_buy_product_join_query);
                        //$row_pro_total_data=mysqli_num_rows($ret);
                        $product_Sno = $buy_product_query_fetch['ID'];
                         // print_r($row_pro);exit();
                         ?>
                         <td hidden><?php echo $product_Sno;?></td>
                    <td><img style="border-width: 10px; width: 52px;" src="../product_image/<?php echo $row_pro['image']; ?> "> </td>
                     <td><?php echo $row_pro['made'];?></td>
                     <td><?php echo $row_pro['name'];?></td>

                        <td><?php echo $buy_product_query_fetch['bank_number'];?></td>
                        <td><?php echo $buy_product_query_fetch['Tax'];?></td>
                        <td><?php echo $buy_product_query_fetch['total_price'];?></td>
                        <!-- <td><?php //echo $buy_product_query_fetch['total_price'];?></td> -->
                        <td><?php echo $buy_product_query_fetch['sub_total'];?></td>
                        <td><?php  echo $buy_product_query_fetch['bank_number'];?> </td>
                        <td><?php  echo $buy_product_query_fetch['location'];?></td>     
                        <!-- <td> <?php  //echo $row['creation_time'];?></td> -->
                        <!-- <td> <a href="order_recived.php?viewid=<?php //echo htmlentities ($p_id);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> -->
                                
                               <td> <?php 
                              
                               if($StaTus == 1) {
                                    echo "<p style='color:green'><b> This Product Approved And Recived!!</b></p>";
                                }else{
                                 ?>
                            
                            <a href="order_recived.php?viewid=<?php echo $product_Sno."&"."userid=$vid_user";?> "class="btn btn-secondary"> <span>Order Recived To Admin</span></a>
                        </td>
                    <?php } ?>
                        <td>
  <a href="read_order.php?viewid=<?php echo htmlentities ($buy_product_query_fetch['productid']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="edit_order.php?editid=<?php echo htmlentities ($buy_product_query_fetch['productid']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

                            <a href="delete_order.php?delid=<?php echo ($buy_product_query_fetch['productid']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php 
$cnt=$cnt+1;
} } else {?>
<tr>
    <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
</tr>
<?php } ?>                 
                
                </tbody>
            </table>
       
        </div>
    </div>
</div>     
</body>
</html>

<!-- ////////////////////End//////////////////////// -->