<?php
// Initialize the session
session_start();
// Include config file
require_once "../config/configrec.php"; 

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
	 <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body{ text-align: center; }
		 #a{	text-decoration:none;}
		 hr	{ 	border-top: #e5e6e9 ;}
		 body{ background-image:url('a.jpg'); background-size:1550px 1125px;}

    </style>
</head>
<body>
<div class="demo-table">
    <div class="form-head">
       <h3> Welcome to Hotel De Asiana</h3>
    </div >
	<hr><span class="error-message">
	Hi,<?php echo htmlspecialchars($_SESSION["Emp_Name"]); ?></span><hr>
    <p><br>
        <a id="a" href="add/guestadd.php" class="btnLogin">Add New Guest</a><br><br>
		<a id="a" href="checkbill.php" class="btnLogin">Bill Payment</a><br><br>
		<a id="a" href="updatemenu.php" class="btnLogin">Update</a> &nbsp
		<a id="a" href="deletemenu.php" class="btnLogin">Delete</a> &nbsp
        <a id="a" href="../logout.php" class="btnLogin">Logout</a><br><br>
		<a id="a" href="info/emp_info.php" class="btnLogin">Employee Details</a>
		<a id="a" href="guest_info.php" class="btnLogin">Guest Details</a>
    </p>
</div>
</body>
</html>