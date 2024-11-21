<?php
error_reporting(0);
//Databse Connection file
//include('dbconnection.php');
$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
if(isset($_GET['delid']))
{
 // echo "SELECT * FROM `backupproduct` WHERE p_id = '".$_GET['delid']."' ";
$select_query = mysqli_query($con ,"SELECT * FROM `backupproduct` WHERE p_id = '".$_GET['delid']."'	");
$row=mysqli_fetch_array($select_query);

// print_r($row);
// echo "delete from backupproduct where p_id = '".$_GET['delid']."'";exit();
  // echo "insert into products(id,name,image, made, price,quantity,from_date,to_date) value('".$_GET['delid']."','".$row['name']."','".$row['image']."', '".$row['made']."', '".$row['price']."', '".$row['quantity']."', '".$row['from_date']."' ,'".$row['from_date']."' )";
$query=mysqli_query($con, "insert into products(id,name,image, made, price,quantity,from_date,to_date) value('".$_GET['delid']."','".$row['name']."','".$row['image']."', '".$row['made']."', '".$row['price']."', '".$row['quantity']."', '".$row['from_date']."' ,'".$row['from_date']."' )");
// print_r($query);
$rid=intval($_GET['delid']);
// echo "string";
 // echo "delete * from backupproduct where id = '".$_GET['delid']."'";exit();
 $sql=mysqli_query($con,"delete from backupproduct where p_id = '".$_GET['delid']."' ");
echo "<script>alert('Recover product');</script>"; 
echo "<script>window.location.href = 'product_index.php'</script>";     
}
?>