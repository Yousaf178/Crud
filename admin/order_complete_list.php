<?php
$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>

<?php
//database conection  file
//include('dbconnection.php');
//Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from tblusers where ID=$rid");
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'admin_index.php'</script>";     
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My First Project</title>
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
.container-xl{
max-width: 1440px;
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
                        <h2>All Order Complete <b>List</b></h2>
                    </div>
                       <div class="col-sm-7" align="right">
                        Search:<input type="search" name="search">
                        <a href="user_list.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>All User</span></a>
                        <!-- <a href="insert_user.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Admin</span></a> -->
                        <!-- <a href="product_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Product Detail</span></a> -->
                         <!-- <button class="btn btn-secondary" onclick="history.back()"><a href="admin_index.php"> Go Back</button> -->
                        <!-- <a href="order_complete_list.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Order Detail</span></a> -->
                        <a href="admin_index.php" class="btn btn-secondary"><i class="material-icons"></i> <span>Go Back</span></a> 
                        <a href="index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Log Out</span></a>

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
                        <th>User Name </th>
                        <th>Email </th>
                        <th>Mobile </th>
                        <th>Tax </th>
                        <th>ToTal Price </th>
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
                      // echo "SELECT buy_product.ID,buy_product.productid, user_registration.fname,user_registration.lname,user_registration.profile_pic,user_registration.email,user_registration.mobile_no, buy_product.tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location,buy_product.status FROM buy_product INNER JOIN user_registration ON buy_product.userid=user_registration.id " ;exit();
$ret=mysqli_query($con,"SELECT buy_product.ID,buy_product.productid,user_registration.id, user_registration.fname,user_registration.lname,user_registration.profile_pic,user_registration.email,user_registration.mobile_no, buy_product.tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location,buy_product.status FROM buy_product INNER JOIN user_registration ON buy_product.userid=user_registration.id ");
$cnt=1;
$row=mysqli_num_rows($ret);
if($row>0){
while ($row=mysqli_fetch_array($ret)) {

// echo "SELECT buy_product.productid, user_registration.fname,user_registration.lname,user_registration.profile_pic,user_registration.email,user_registration.mobile_no, buy_product.tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location FROM buy_product INNER JOIN user_registration ON buy_product.userid=user_registration.id ";exit();
//$product_buy_product_join_query=mysqli_query($con,"SELECT buy_product.productid, user_registration.fname,user_registration.lname,user_registration.profile_pic,user_registration.email,user_registration.mobile_no, buy_product.tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location FROM buy_product INNER JOIN user_registration ON buy_product.userid=user_registration.id ");
$p_id = $row['productid'];
$S_No_id = $row['ID'];
$StaTus = $row['status'];
//echo $StaTus ;
$userid = $row['id'];
// print_r($S_No_id);
?>
<!--Fetch the Records -->
                    <tr style="background-color: ";>
                        <td><?php echo $row['productid'];?></td>
                       
                        <?php
                            // echo "SELECT buy_product.ID, buy_product.productid, products.name,products.image,products.made, buy_product.tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location,buy_product.status FROM buy_product INNER JOIN products ON buy_product.productid=products.id where productid = $p_id" ;exit;
                        $product_buy_product_join_query=mysqli_query($con,"SELECT buy_product.ID, buy_product.productid, products.name,products.image,products.made, buy_product.tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location,buy_product.status FROM buy_product INNER JOIN products ON buy_product.productid=products.id where productid = $p_id ");
                        $row_pro=mysqli_fetch_array($product_buy_product_join_query);
                        //$row_pro_total_data=mysqli_num_rows($ret);
                        $product_Sno = $row['ID'];
                        // print_r($row_pro);exit();
                         ?>
                         <td hidden><?php echo $product_Sno;?></td>
                    <td><img style="border-width: 10px; width: 52px;" src="../product_image/<?php echo $row_pro['image']; ?> "> </td>
                     <td><?php echo $row_pro['made'];?></td>
                     <td><?php echo $row['fname']." ".$row['lname'];?></td>

                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['mobile_no'];?></td>
                        <td><?php echo $row['tax'];?></td>
                        <td><?php echo $row['total_price'];?></td>
                        <td><?php echo $row['sub_total'];?></td>
                        <td><?php  echo $row['bank_number'];?> </td>
                        <td><?php  echo $row['location'];?></td>     
                        <!-- <td> <?php  //echo $row['creation_time'];?></td> -->
                        <!-- <td> <a href="order_recived.php?viewid=<?php //echo htmlentities ($p_id);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> -->
                                
                               <td> <?php 
                              
                               if($StaTus == 1) {
                                    echo "<p style='color:green'><b> This Product Approved And Recived!!</b></p>";
                                }else{
                                 ?>
                               

                            
                            <a href="order_recived.php?viewid=<?php echo htmlentities ($product_Sno)."&"."userid=$userid";?> "class="btn btn-secondary"> <span>Order Recived To Admin</span></a>
                        </td>
                    <?php } ?>
                        <td>
  <a href="read_order.php?viewid=<?php echo htmlentities ($row['productid']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="edit_order.php?editid=<?php echo htmlentities ($row['productid']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

                            <a href="delete_order.php?delid=<?php echo ($row['productid']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
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