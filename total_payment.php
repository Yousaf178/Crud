<?php
error_reporting(0);
session_start();
$con=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Room Details</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body>

	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row" id="print">


					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:3%">Rooms Details</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Room Details</div>
							<div class="panel-body">
			<table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1">
									
						 <span style="float:left" ><i class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)" style="cursor:pointer" title="Print the Report"></i></span>			
									<tbody>
							
<?php	

                     $Uid=$_GET['orderid'];

// echo "SELECT buy_product.productid, user_registration.fname,user_registration.lname FROM buy_product INNER JOIN user_registration ON buy_product.userid=user_registration.id where userid=$Uid";
$against_name_show_query=mysqli_query($con,"SELECT * FROM user_registration INNER JOIN buy_product ON buy_product.userid=user_registration.id where userid=$Uid");

$cnt=1;
                            $row_against_name_show_query=mysqli_num_rows($against_name_show_query);
                            $row_against_name_show_query=mysqli_fetch_array($against_name_show_query);
// print_r($row_against_name_show_query);
                            ?>
			<tr>
<td colspan="8" style="text-align:center; color:blue"><h3>Product Related Info Againt <?php echo $row_against_name_show_query['fname']."  ".$row_against_name_show_query['lname'];?> </h3></td>
</tr>

<?php
// echo "SELECT buy_product.productid, products.name,products.image,products.made, buy_product.Tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location,buy_product.status FROM buy_product INNER JOIN products ON buy_product.productid=products.id where userid=$Uid";
$ret=mysqli_query($con,"SELECT buy_product.productid, products.name,products.image,products.made, buy_product.Tax,buy_product.total_price,buy_product.bank_number,buy_product.sub_total,buy_product.location,buy_product.creation_time,buy_product.status FROM buy_product INNER JOIN products ON buy_product.productid=products.id where userid=$Uid" );
                            $cnt=1;
                            $row=mysqli_num_rows($ret);
                            if($row>0){
                            while($row=mysqli_fetch_array($ret)){
	  	// print_r($row);
	  	?>


<tr style="background-color: gray;">
	<th>Product Number :</th>
<th><?php echo $row['productid'];?></th>
<th>Date :</th>
<?php $date = $row['creation_time'];
$pieces = explode(" ", $date);
// echo $pieces[0];?>
<td colspan="1"><?php echo $pieces[0];?></td>
<th >Location :</th>
<td colspan="3"><?php echo $row['location'];?></td>

</tr>



<tr>
<td><b>Product :</b></td>
<td><img style="border-width: 10px; width: 52px; height: 52px;" src="./product_image/<?php echo $row['image']; ?>  "><?php echo $row['name'];?> </td>
<td><b>Quantity :</b></td>
<td><?php echo $row['quantity'];?></td>
<td><b>Product Status :</b></td>
<td><?php 
if($row['status']==0)
{
echo "<p style='color:red'>Pending</p>";
}
else
{
echo "<p style='color:green'>Recived from company</p>";
};?></td>
<td><b>Tax :</b></td>
<td><?php 
if ($row['Tax']==0) {
	echo "0";
}else{?>
<?php echo $row['Tax'];
}?></td>
</tr>

<tr>
<td><b>Product Price :</b></td>
<td><?php 
	echo $row['total_price'];
?></td>
<td><b>Discount:</b></td>
<td>
<?php 
if ($row['total_price'] > 1000) {
	// code...
	echo $row['total_price'] /100 * 10;
}else{
	echo "0";
}

// if($row['Tax']==0)
// {
// echo "Without Tax";
// }
// else
// {
// echo "With Tax";
// }
;?></td>

<td><b>Sub total:</b></td>
<td><?php

	 echo $row['sub_total'];
?>
<td>Date:</td>
<td></td>
</tr>
<?php  }?>

	
		<?php
		// echo "SELECT SUM(total_price) AS 'sub_total' FROM buy_product WHERE userid=$Uid";
		$rettotalPrice=mysqli_query($con,"SELECT SUM(total_price) AS 'Total_price' FROM buy_product WHERE userid=$Uid");
			$cnt=1;
                            $rowtotalPrice=mysqli_fetch_array($rettotalPrice);


 $rettaxPrice=mysqli_query($con,"SELECT SUM(Tax) AS 'sub_Tax' FROM buy_product WHERE userid=$Uid");
			$cnt=1;
                            $rowtaxPrice=mysqli_fetch_array($rettaxPrice);

        
		?>
<tr align="right"><th colspan=""><h3>Total Price:</h3></th>
<td><?php echo $rowtotalPrice['Total_price'];?></td>

<th colspan=""><h3>Total Tax :</h3></th>
<td colspan=""><?php echo  $rowtaxPrice['sub_Tax'];?></td>

</tr>
<br>
<br>
<tr align="right">
	<?php 
 $retsubtotalPrice=mysqli_query($con,"SELECT SUM(sub_total) AS 'sub_Total' FROM buy_product WHERE userid=$Uid");
			$cnt=1;
                            $rowsubtotalPrice=mysqli_fetch_array($retsubtotalPrice);
	?>
<th colspan=""><h3>Total Discount :</h3></th>
<td><?php echo "10%";?></td>

<th colspan=""><h3>Sub Total:</h3></th>
<td><?php echo $rowsubtotalPrice['sub_Total'];?></td>

</tr>

<tr>
<td colspan="6" style="color:red"><h4>Personal Info</h4></td>
</tr>

<tr>
<td><b>Reg No. :</b></td>
<td><?php echo $row_against_name_show_query['id'];?></td>
<td><b>Full Name :</b></td>
<td><?php echo $row_against_name_show_query['fname'].'   '. $row_against_name_show_query['lname'];?></td>
<td><b>Email :</b></td>
<td><?php echo $row_against_name_show_query['email'];?></td>
</tr>


<tr>
<td><b>Contact No. :</b></td>
<td><?php echo $row_against_name_show_query['mobile_no'];?></td>
<td><b>Gender :</b></td>
<td><?php echo $row->gender;?></td>
<td><b>Course :</b></td>
<td><?php echo $row->course;?></td>
</tr>


<tr>
<td><b>Emergency Contact No. :</b></td>
<td><?php echo $row->egycontactno;?></td>
<td><b>Guardian Name :</b></td>
<td><?php echo $row->guardianName;?></td>
<td><b>Guardian Relation :</b></td>
<td><?php echo $row->guardianRelation;?></td>
</tr>

<tr>
<td><b>Guardian Contact No. :</b></td>
<td colspan="5"><?php echo $row->guardianContactno;?></td>
</tr>

<tr>
<td colspan="6" style="color:blue"><h4>Addresses</h4></td>
</tr>
<tr>
<td><b>Permanent Address</b></td>
<td colspan="2">
<?php echo $row->pmntAddress;?><br />
<?php echo $row->pmntCity;?>, <?php echo $row->pmntPincode;?><br />
<?php echo $row_against_name_show_query['address'];?>	

</td>
</tr>


<?php
$cnt=$cnt+1;
} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
 <script>
$(function () {
$("[data-toggle=tooltip]").tooltip();
    });
function CallPrint(strid) {
var prtContent = document.getElementById("print");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}
</script>
</body>

</html>
