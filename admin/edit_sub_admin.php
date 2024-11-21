<?php 
//Database Connection
// include('dbconnection.php');

$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

if(isset($_POST['submit']))
  {
  	$eid=$_GET['editid'];
  	//Getting Post Values
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    // $profile=$_POST['profile_pic'];
    $add=$_POST['address'];


    $filename = $_FILES["profile_pic"]["name"];
    $tempname = $_FILES["profile_pic"]["tmp_name"];
    $folder = "../SubAdmin_pic/" . $filename;
// echo $filename."show"."<br>";
// echo $folder;exit();

   // echo"update  admin set FirstName='$fname',LastName='$lname', MobileNumber='$contno', Email='$email', password='$password',confirm_password = '$confirm_password', profile_pic ='$filename', Address='$add' where ID='$eid'";exit();
  // Query for data insertion by yousaf
     $query=mysqli_query($con, "update  admin set FirstName='$fname',LastName='$lname', MobileNumber='$contno', Email='$email', password='$password',confirm_password = '$confirm_password', profile_pic ='$filename', Address='$add' where ID='$eid'");


    //Query for data updation
     //$query=mysqli_query($con, "update  tblusers set FirstName='$fname',LastName='$lname', MobileNumber='$contno', Email='$email', profile_pic ='$profile', Address='$add' where ID='$eid'");
     
    if ($query) {
    	if(move_uploaded_file($tempname, $folder)){

    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin_index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 750px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data">
 <?php
$eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from admin where ID='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update your info.</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="fname" value="<?php  echo $row['FirstName'];?>" required="true"></div>
				<div class="col"><input type="text" class="form-control" name="lname" value="<?php  echo $row['LastName'];?>" required="true"></div>
			</div>        	
        </div>

        <div class="form-group">
        	<div class="row">
        <div class="col"><input type="email" class="form-control" pattern=".+@gmail.com" name="email" value="<?php  echo $row['Email'];?>" required></div>
        <div class="col"><input type="text" class="form-control" name="contactno" value="<?php  echo $row['MobileNumber'];?>" required="true" maxlength="10" pattern="[0-9]+"></div>
        
        	<!-- email validation from yousaf -->
        	
        	
        </div>
        <label for="email" style="color: red;">Example of email (Only gmail accepted)</label>
        <!-- <label for="email" style="color: red; width: 100px	;">Mobile No:</label> -->
      </div>
        <!-- password creation by yousaf -->
        <div class="form-group">
        	<div class="row">
				<div class="col"><input type="password" class="form-control"  name="password" value="<?php  echo $row['password'];?>" required></div>
				<div class="col"><input type="password" class="form-control"  name="confirm_password" value="<?php  echo $row['confirm_password'];?>" required></div>
			</div>
			<label for="pass" style="color: red; width: 50%;">Match your Password  :</label>
			</div>

		 <div class="form-group">
        	<input type="file" class="form-control" name="profile_pic" value="<?php  echo $row['profile_pic'];?>" >
        	<img src="../SubAdmin_pic/<?php echo $row['profile_pic']; ?> " style="height: 100px;">
        </div>
		<div class="form-group">
            <textarea class="form-control" name="address" required="true"><?php  echo $row['Address'];?></textarea>
        </div>        
      <?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
            </div>
        <button class="btn btn-secondary" onclick="history.back()"><a href="admin_index.php"> Go Back</button>
    </div>
        </div>

    </form>


</div>
</body>
</html>