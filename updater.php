 <!DOCTYPE html>
<html>
<body>

 <?php
 $custname = filter_input(INPUT_POST, 'customer_name');
 $custphone = filter_input(INPUT_POST, 'customer_phone');
 $loantype = filter_input(INPUT_POST, 'loan_type');
 $loannum = filter_input(INPUT_POST, 'loan_number');
 $loanamt = filter_input(INPUT_POST,'loan_amount');
 $loanten = filter_input(INPUT_POST, 'loan_tenure');
 $emiamt = filter_input(INPUT_POST, 'emi_amount');
 $emidate = filter_input(INPUT_POST, 'emi_date');
 $custloc = filter_input(INPUT_POST, 'customer_location');
 $custmail = filter_input(INPUT_POST, 'customer_email');
 $custdob = filter_input(INPUT_POST, 'customer_dob');
 $bankname=filter_input(INPUT_POST, 'bank_name'); 

 if (!empty($custname)){
if (!empty($custphone)){
$host = "localhost";
$dbusername = "xeoiniio_ezloan";
$dbpassword = "ezloan123";
$dbname = "xeoiniio_ezyloans_db";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "UPDATE cust SET customer_name='$custname', customer_phone='$custphone', loan_type='$loantype', loan_amount='$loanamt', loan_tenure='$loanten', emi_amount='$emiamt', emi_date='$emidate', customer_location='$custloc', customer_email='$custmail', customer_dob='$custdob', bank_name='$bankname' WHERE loan_number='$loannum'";

  if ($conn->query($sql)){
    echo "record has been updated sucessfully";
    header( "refresh:2;url=customers.php" );
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
  $conn->close();
}
}
else{
  echo "Customer Phone should not be empty";
  die();
}
 }
 else{
  echo "Customer Name should not be empty";
  die();
 }
 ?>
 </body>
 </html>