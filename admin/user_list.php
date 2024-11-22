<?php
error_reporting(0);
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
max-width: 1240px;
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
                        <?php //$user_id = $_GET['userid'];
                        // echo "SELECT * FROM `user_registration` where id $user_id";exit();
                        $user_id_query = mysqli_query($con ,"SELECT * FROM `admin` where status = 1");
                        $user_row=mysqli_fetch_array($user_id_query);
                        // print_r($user_row);exit();
                        $full_name = $user_row['FirstName'] . " " .$user_row['LastName'] ;
                        echo  "<b>Welcome</b>"?> <img style="border-width: 10px; width: 52px;" src="../persnol_image/<?php echo $user_row['profile_pic']; ?> "><?php echo "<h1> $full_name </h1>";?>

                    <h2><b>All User List </b></h2>
                    </div>
                       <div class="col-sm-7" align="right">
                        
                        <!-- <a href="insert_user.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Admin</span></a> -->
                        <!-- <a href="product_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Product Detail</span></a> -->
                        <a href="add_user.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                        <a href="admin_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Back</span></a>
                        <!-- <a href="index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Log Out</span></a> -->

                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="background-color: darkgray";>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>                       
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Date of Birth</th>
                        <th>Password</th>
                        <th>Profile</th>
                        <th>Address</th>
                        <th>Created Date</th>
                        <th>Order Product</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
$ret=mysqli_query($con,"select * from user_registration");
$cnt=1;
$row=mysqli_num_rows($ret);
if($row>0){
while ($row=mysqli_fetch_array($ret)) {
$userid = $row['id'];
?>

<!--Fetch the Records -->
                    <tr style="background-color: ";>
                        <td><?php echo $row['id'];?></td>
                        <td><?php  echo $row['fname'];?> <?php  echo $row['lname'];?></td>
                        <td><?php  echo $row['email'];?></td>                        
                        <td><?php  echo $row['mobile_no'];?></td>
                        <td> <?php  echo $row['D_O_B'];?></td>
                        <td> <?php  echo $row['password'];?></td>
                       <td> <img style="border-width: 10px; width: 52px;" src="../user_image/<?php echo $row['profile_pic']; ?> "></td>
                        
                        <td> <?php  echo $row['address'];?></td>
                        <td> <?php  echo $row['creation_date'];?></td>
                        <td>
                            <?php
                            // echo "SELECT * FROM `buy_product` where userid = $userid";
                            $buy_product_query=mysqli_query($con,"SELECT * FROM `buy_product` where userid = $userid");
$cnt=1;
$buy_product_query_fetch=mysqli_num_rows($buy_product_query);
$buy_product_query_fetch=mysqli_fetch_array($buy_product_query);
        // echo $buy_product_query_fetch['ID'];
$user_id = $buy_product_query_fetch['userid'];
if ($user_id == $userid) {
    // code...                            ?>
                        <a href="read_user_list.php?viewid=<?php echo htmlentities ($row['id']);?>" class="view" title="View" data-toggle="tooltip">Order Product<i class="material-icons">&#xE417;</i></a>
                    <?php }else{ echo "No Order Product"; } ?>
                        </td>
                            <td>
                            <a href="edit_user_list.php?editid=<?php echo htmlentities ($row['id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

                            <a href="delete_user_list.php?delid=<?php echo ($row['id']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
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