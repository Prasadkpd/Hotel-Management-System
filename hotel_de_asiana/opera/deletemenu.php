<!DOCTYPE>
<?php
session_start();
require_once "../config/configrec.php";

?>
<html>
<head>
<meta charset="UTF-8">
    <title>Welcome</title>
	 <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body{ 	text-align: center; 	}
		#a	{	text-decoration:none;	}
		body{ background-image:url('a.jpg'); background-size:1550px 1000px;}
    </style>
</head>
<body>

<div class="demo-table">
    <div class="form-head">
       <h3> Welcome to Delete Page</h3><hr>
    </div >
	<span class="error-message">
	Hi!</span><hr>
    <p>
	    <p>Please select the table the that you want to update.</p>
    <span>    
		<a id="a" href="../opera/delete/deleteguest.php" class="btnLogin">Guest</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
		<a id="a" href="../opera/delete/deletefamily.php" class="btnLogin">Family</a><br><br>
		<a id="a" href="../opera/delete/deleteindividual.php" class="btnLogin">Individual</a> &nbsp &nbsp &nbsp &nbsp &nbsp
		<a id="a" href="../opera/delete/deletecompany.php" class="btnLogin">Comapny</a><br><br>
		<a id="a" href="../opera/delete/deletecontact.php" class="btnLogin">Contact</a>&nbsp
		<a id="a" href="../opera/user.php" class="btnLogin">Back</a>&nbsp
        <a id="a" href="../logout.php" class="btnLogin">Logout</a></span>
    </p>
</div>

</body>
</html>