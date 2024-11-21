<?php 
error_reporting(0);
//Databse Connection file
include('dbconnection.php');

// if buttun submit is click by yousaf than below
if(isset($_POST['submit']))
  {
  	//getting the post values
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $gender=$_POST['gender'];
    $add=$_POST['address'];
    $d_o_b=$_POST['D_O_B'];
    // $add=$_POST['profile_pic'];

    // If upload button is clicked ...



// $select_query_check_mail used for mail check is this mail is already exist or not // by yousaf
    $select_query_check_mail = mysqli_query($con ,"SELECT `Email` FROM `user_registration` WHERE Email = '$email'	");
    // chech password and confirm password are match than query executed by yousaF
if ($_POST["password"] === $_POST["confirm_password"]){

	// if mail is match in database then show error
if (mysqli_num_rows($select_query_check_mail) > 0) {

    	echo "<script>alert(' Email already exist please try from different Email thank you');</script>";
    	echo "<script type='text/javascript'> document.location ='user_registration.php'; </script>";
    }else{
    	// image upload code by yousaf 21/6/2024
	  $filename = $_FILES["profile_pic"]["name"];
    $tempname = $_FILES["profile_pic"]["tmp_name"];
    $folder = "./persnol_image/" . $filename;
// print_r($folder);exit();
//end 
  // Query for data insertion by yousaf
    // echo "insert into user_registration(fname,lname, mobile_no, email,password,confirm_password,gender,profile_pic, address,D_O_B) value('$fname','$lname', '$contno', '$email', '$password', '$confirm_password','$gender','$filename', '$add','$d_o_b' )";exit;
     $query=mysqli_query($con, "insert into user_registration(fname,lname, mobile_no, email,password,confirm_password,gender,profile_pic, address,D_O_B) value('$fname','$lname', '$contno', '$email', '$password', '$confirm_password','$gender','$filename', '$add','$d_o_b' )");

     //echo "insert into tblusers(FirstName,LastName, MobileNumber, Email,profile_pic,password,confirm_password Address) value('$fname','$lname', '$contno', '$email', '$password', '$confirm_password','$filename', '$add')";exit();
   }
 }else{
 	echo "<script>alert('Password dosenot match please try Again');</script>";
 }

    if ($query) {

    	// image insert into folder by yousaf
    	if(move_uploaded_file($tempname, $folder)){

    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
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
    <form  method="POST" action="" enctype="multipart/form-data">
		<h2>User Registration</h2>
		<p class="hint-text">Fill below form.</p>

		<!-- the below Div for fname and lname in same line yousaf 30/6/2024-->
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="fname" placeholder="First Name" value="" required></div>
				<div class="col"><input type="text" class="form-control" name="lname" placeholder="Last Name" required></div>
			</div>        	
        </div>
        <!-- end -->
        <div class="form-group">
            <div class="row">
				
      
        	<!-- Email validation by yousaf 2/7/2024-->
        	
        	<div class="col"><input type="email" class="form-control" pattern=".+@gmail.com" name="email" placeholder="Enter your Email id" required></div>	
        	<div class="col"><input type="text" class="form-control" name="contactno" placeholder="Enter your Mobile Number" required maxlength="10" pattern="[0-9]+"></div>
        </div>
        	<label for="email" style="color: red;">Example of email (Only gmail accepted) example.com :</label>
        </div>

        <div class="form-group">
			<div class="row">
				<div class="col"><input type="password" class="form-control"  name="password" placeholder="Enter your password" required></div>
				<div class="col"><input type="password" class="form-control"  name="confirm_password" placeholder="Enter your confirm password" required></div>

			</div>     
			<label for="pass" style="color: red; width: 50%;">Match your Password  :</label>     	
        </div>
        <!-- the below Div for Gender yousaf -->
        <label class="control-label" >Gender:</label>
<div class="row">
  <div class="col-md-6" >
    <label class="radio-inline">
      <input type="radio" name="gender" value="Male" <?php if ($gender != "Female") echo "checked"; ?> />Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?> />Female
    </label>
  </div>
</div>



<!-- -*********************** -->
		<!-- the below Div for image yousaf -->
        <div class="form-group">
        	<div class="row">

				<div class="col"><input type="date" class="form-control" name="D_O_B" placeholder="Enter Date Of Birth" required></div>
				<div class="col"><input type="file" class="form-control" name="profile_pic" placeholder="Enter profile pic" required></div>
        </div>
        <label for="email" style="color: red;">Enter Date Of Birth	:</label>
    </div>
        <!-- end -->
		
		<div class="form-group">
            <textarea class="form-control" name="address" placeholder="Enter Your Address" required="true"></textarea>
        </div>
        <!-- YOUSAF PUT CODE FOR Radio Button -->
      <!-- <div class="form-group">
        	Pakistan:<input type="radio" value="1" name="Pakistan"  required>
        	India:<input type="radio" value="2" name="India"  required>
        	U.A.E:<input type="radio" value="3" name="U.A.E"  required>
        	Qatar:<input type="radio" value="4" name="Qatar"  required>
        </div> -->

		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>
        <!-- <div class="btn btn-secondary" style="margin-left: 200px;"> <a href="admin_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Admin Detail</span></a></div> -->
        <button class="btn btn-secondary" onclick="history.back()"><a href="admin_index.php"> Go Back</a></button>
        
    </form>
	<div class="text-center">View Aready Inserted Data!! </div>
</div>
</body>
</html>