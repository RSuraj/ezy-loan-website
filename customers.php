<?php

session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: admin.php"); 
    exit; 
}  

$servername = "localhost";
$dbusername = "xeoiniio_ezloan";
$dbpassword = "ezloan123";
$dbname = "xeoiniio_ezyloans_db";

$conn = new mysqli ($servername, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

    $sql = 'SELECT * FROM cust';
	$result = mysqli_query($conn, $sql);

if(!$result){
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<html>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>View Customers | EZY-Loan</title>
	<link rel='stylesheet' href='css/style.min.css' />
</head>
<body>
	<!-- navbar -->
	<div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.html" class="navbar__logo">EZY LOAN</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="dashboard.php">Add Customer</a></li>
						<li><a href="#">View Customers</a></li>
						<li><a href="update.php">Update Customer Details</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>
	<!-- Page content -->
	<div class="app">
		<div class="container">
			<div class="app__inner">
				<div class="app__menu">
					<ul class="vMenu">
						<li><a href="dashboard.php">Add New Customer</a></li>
						<li><a href="#" class="vMenu--active">View Customers</a></li>
						<li><a href="update.php">Update Customer Details</a></li>
					</ul>
				</div>
				<div class="app__main">
					<div class="text-container">
						<h3 class="app__main__title">Customer Details</h3>
						<p>Scroll down to see the customer details and update them</p>
						<table id="customers">
						<thead>
						  <tr>
						  	<th>Sl no.</th>
						    <th>Customer Name</th>
						    <th>Number</th>
						    <th>Bank Name</th>
						    <th>Loan Type</th>
						    <th>Loan Number</th>
						    <th>Loan Amount(Rs)</th>
						    <th>Tenure(yrs)</th>
						    <th>EMI Amount(Rs)</th>
						    <th>EMI Date</th>
						    <th>Location</th>
						    <th>E-Mail</th>
						    <th>Date of Birth</th>
						  </tr>
						 </thead>
					<tbody>
<?php
	$no=1;

    while($row = mysqli_fetch_array($result)) {

    					echo 
    					'<tr>
						    <td>'.$no.'</td>
						    <td>'.$row["customer_name"]."</td>
						    <td>".$row["customer_phone"]."</td>
						    <td>".$row["bank_name"]."</td>
						    <td>".$row["loan_type"]."</td>
						    <td>".$row["loan_number"]."</td>
						    <td>".$row["loan_amount"]."</td>
						    <td>".$row["loan_tenure"]."</td>
						    <td>".$row["emi_amount"]."</td>
						    <td>".$row["emi_date"]."</td>
						    <td>".$row["customer_location"]."</td>
						    <td>s".$row["customer_email"]."</td>
						    <td>".$row["customer_dob"]."</td>
						  </tr>";
						  $no++;
    }?>
 			</table>	
					</div>
				</div>
			</div>
		</div>
	</div>

<script src='js/app.min.js'></script>
</body>
</html>