<?php
error_reporting(0);
//database conection  file
include('dbconnection.php');
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
                        <?php $user_id = $_GET['userid'];
                        // echo "SELECT * FROM `user_registration` where id $user_id";exit();
                        $user_id_query = mysqli_query($con ,"SELECT * FROM `user_registration` where id = $user_id");
                        $user_row=mysqli_fetch_array($user_id_query);
                        // print_r($user_row);exit();
                        $full_name = $user_row['fname'] . " " .$user_row['lname'] ;
                        echo  "<b>Welcome</b>"?> <img style="border-width: 10px; width: 52px;" src="./user_image/<?php echo $user_row['profile_pic']; ?> "><?php echo "<h1> $full_name </h1>";?>

                    <h2><b>Products List </b></h2>
                    </div>
                    <div class="col-sm-7" align="right">
                        <!-- <a href="user_signIn.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Log Out</span></a> -->

                        </div>
        
                    </div>
                       <div class="col-sm-13" align="right">
                        <a href="view_order_list.php?orderid=<?php echo $user_id; ?>" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>My Order List</span></a>
                        <a href="total_payment.php?orderid=<?php echo $user_id; ?>" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Cart</span></a>
                        <a href="user_signIn.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Log Out</span></a>
<!-- // *********search code by yousaf********** -->
<div class="container">
  <form class="form-inline" method="post" action="search_product.php?userid=<?php echo $user_id; ?>">
    <input type="text" name="name" class="form-control" placeholder="Search Product Name..">
    <button type="submit" name="save" class="btn btn-primary">Search</button>
  </form>
</div>
<!-- // ********* END search code ************** -->
                                        
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="background-color: darkgray";>
                    <tr>
                        <th>S.no</th>
                        <th>Product.ID</th>
                        <th></th>
                        <th>Name</th>                       
                        <th>image</th>                       
                        <th>Made</th>                       
                        <th>Price</th>                   
                        <th>10% Discount Price</th>                   
                        
                        <!-- <th>Profile</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                     $userid = $_GET['userid'];
$ret=mysqli_query($con,"select * from products");
$cnt=1;
$row=mysqli_num_rows($ret);
if($row>0){
while ($row=mysqli_fetch_array($ret)) {
// print_r($row);exit();
?>
<!--Fetch the Records -->
                    <tr style="background-color: ";>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['P_Id'];?></td>
                        <td><input type="checkbox" name="checkbox[]" value="[]"></td>
                        <td><?php  echo $row['name'];?></td>
                        <td><a href="product_detail.php?viewid=<?php echo $row['id']."&"."userid=$userid";?>"><img style="border-width: 10px; width: 52px;" src="./product_image/<?php echo $row['image']; ?> "></a> </td>
                        <td><?php  echo $row['made'];?></td>                        
                        <td><?php  echo $row['price'];?></td>
                        <td><?php  //echo $row['price']; ?>
                            
                            <?php
                            if ($row['price'] > 1000) {
                                echo $row['price'] - $row['price'] /100 * 10 ;  
                            }else{
                              echo $row['price'];  
                            }
                            $userid = $_GET['userid'];
                              ?>
                        </td>
                          
                        <td ><a href="product_cart.php?viewid=<?php echo $row['id']."&"."userid=$userid" ;?>" class="btn btn-secondary" style="width: 130px";><i class="material-icons">&#xE147;</i> <span>Add to Cart</span></a></td>


                       <!--  <td>
  <a href="read.php?viewid=<?php //echo htmlentities ($row['ID']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="edit.php?editid=<?php //echo htmlentities ($row['ID']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

                            <a href="delete.php?delid=<?php //echo ($row['ID']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                        </td> -->
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