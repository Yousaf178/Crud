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
//echo "SELECT * FROM `tblusers` WHERE ID = '".$_GET['delid']."'";
$select_query = mysqli_query($con ,"SELECT * FROM `tblusers` WHERE ID = '".$_GET['delid']."'	");
$row=mysqli_fetch_array($select_query);

// print_r($row);

 //echo "insert into backupusers(ID,FirstName,LastName, MobileNumber, Email,password,confirm_password,profile_pic, Address) value('".$_GET['delid']."','".$row['FirstName']."','".$row['LastName']."', '".$row['MobileNumber']."', '".$row['Email']."', '".$row['password']."', '".$row['confirm_password']."','".$row['profile_pic']."', '".$row['Address']."' )";exit();

$query=mysqli_query($con, "insert into backupusers(ID,FirstName,LastName, MobileNumber, Email,password,confirm_password,profile_pic, Address) value('".$_GET['delid']."','".$row['FirstName']."','".$row['LastName']."', '".$row['MobileNumber']."', '".$row['Email']."', '".$row['password']."', '".$row['confirm_password']."','".$row['profile_pic']."', '".$row['Address']."' )");

$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from tblusers where ID=$rid");
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'admin_index.php'</script>";     
}?>
?>