<?php 
error_reporting(0);
//Databse Connection file
// include('dbconnection.php');
$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
// if buttun submit is click by yousaf than below
if(isset($_POST['submit']))
  {
  	//getting the post values
    $P_Id=$_POST['P_Id'];
    $name=$_POST['name'];
    $made=$_POST['made'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    
    // If upload button is clicked ...




    	// image upload code by yousaf
	  $filename = $_FILES["product_pic"]["name"];
    $tempname = $_FILES["product_pic"]["tmp_name"];
    $folder = "../product_image/" . $filename;

    // echo "insert into products(name,image, made, price,quantity,from_date,to_date) value('$name','$filename','$made', '$price','$quantity','$from_date','$to_date' )";exit();

    // echo "insert into products(name,image, made, price,quantity,from_date,to_date) value('$name','$filename','$made', '$price','$quantity','$from_date','$to_date' )";exit();
  // Query for data insertion by yousaf
     $query=mysqli_query($con, "insert into products(P_Id,name,image, made, price,quantity,from_date,to_date) value('$P_Id','$name','$filename','$made', '$price','$quantity','$from_date','$to_date' )");

    if ($query) {

    	// image insert into folder by yousaf
    	if(move_uploaded_file($tempname, $folder)){

    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='product_index.php'; </script>";
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
		<h2>Add Product</h2>
		<p class="hint-text">Fill below form.</p>

		<!-- the below Div for name yousaf -->
        <div class="form-group">
			<div class="row">
		<div class="col"><input type="text" class="form-control" name="name" placeholder="Product Name" value="" required></div>
		<div class="col"><input type="text" class="form-control" name="made" placeholder="Made" value="" required></div>      	
        </div>
    </div>
        <!-- end -->

        <!-- the below Div for image yousaf -->
        <div class="form-group">
			<div class="row">
		<div class="col"><input type="file" class="form-control" name="product_pic" placeholder="Enter Product" required></div>
        	<div class="col"><input type="text" class="form-control" name="P_Id" placeholder="Product No" value="" required></div>
        </div>
    </div>
        <!-- end -->
      <!-- the below Div for made yousaf -->
        <div class="form-group">
			<div class="row">
		<div class="col"><input type="text" class="form-control" name="quantity" placeholder="quantity" value="" required></div>
		<div class="col"><input type="Number" class="form-control" name="price" placeholder="Price" value="" required></div>		       	
        </div>
    </div>
        <!-- end -->


        <!-- the below Div for price yousaf -->
        <div class="form-group">
		<div class="row">
		<div class="col"><input type="Date" class="form-control" name="from_date" placeholder="" value="" required></div>
		<div class="col"><input type="Date" class="form-control" name="to_date" placeholder="" value="" required></div>       	
        </div>
    </div>
        <!-- end -->

		
	
        <!-- YOUSAF PUT CODE FOR CHECKBOX         -->
      <!-- <div class="form-group">
        	Pakistan:<input type="radio" value="1" name="Pakistan"  required>
        	India:<input type="radio" value="2" name="India"  required>
        	U.A.E:<input type="radio" value="3" name="U.A.E"  required>
        	Qatar:<input type="radio" value="4" name="Qatar"  required>
        </div> -->

		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>
        <div class="" style="margin-left: 200px;"> <a href="product_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Product Detail</span></a>

<span><a href="admin_index.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Main Page</span></a></span>
        </div>
    </form>
	<div class="text-center">View Aready Inserted Data!! </div>
</div>
</body>
</html>