<?php 
error_reporting(0);
//Databse Connection file
// include('dbconnection.php');
$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

if(isset($_POST['submit'])) {
	$email = $_POST["email"];
	$newpass = $_POST["password"];
	$confpass = $_POST["new_password"];
	// echo "SELECT * from admin WHERE email='" . $email . "'";exit();
$result = mysqli_query($con,"SELECT * from admin WHERE email='" . $email . "'");
$row=mysqli_fetch_array($result);
// print_r($row);
if($_POST["email"] == $row["Email"] ) {
	 // echo "UPDATE student set password='" . $newpass . "' , confirm_password='" . $confpass . "' WHERE email='" . $row["Email"] . "'";exit;
$query = mysqli_query($con,"UPDATE admin set password='" . $newpass . "' , confirm_password='" . $confpass . "' WHERE email='" . $row["Email"] . "'");
}
if ($query) {

    	echo "<script>alert('You have successfully Updated password');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Email is Wrong. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>My First Project</title>
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
<div><?php if(isset($message)) { echo $message; } ?></div>


<div class="signup-form">
    <form  method="POST" action="" enctype="multipart/form-data">
		<h2>Change Password</h2>
		<p class="hint-text">Fill below form.</p>

		
        <div class="form-group">
            <div class="row">
				
      
        	<!-- Email validation by yousaf 2/7/2024-->
        	
        	<div class="col"><input type="email" class="form-control" pattern=".+@gmail.com" name="email" placeholder="Enter your Email id" required></div>	
        	
        </div>
        </div>

        <div class="form-group">
			<div class="row">
				<div class="col"><input type="password" class="form-control"  name="password" placeholder="Enter your password" required></div>
				
			</div>     
			</div>
 <div class="form-group">
			<div class="row">
				<div class="col"><input type="password" class="form-control"  name="new_password" placeholder="Enter your New password" required></div>
				
			</div>     
			</div>
		

		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>

<!-- <span><a href="password_change.php" class=""><i class="material-icons"> Forgot Password</i></a></span> -->
<!-- <span><a href="user_registration.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Register Here</span></a></span> -->
        </div>
</html>