<!DOCTYPE>
<?php
session_start();
require_once "../../config/configrec.php";

?>
<html>
<head>
<meta charset="UTF-8">
    <title>Welcome</title>
	 <link href="../../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
		#a	{	text-decoration:none;	}
		hr	{ 	border-top: #e5e6e9 ;}
		body{ background-image:url('../a.jpg'); background-size:1550px 1000px;}
    </style>
</head>
<body>
<?php
// define variables and set to empty values
$guest_idErr =$billErr= $nicErr =$check_outErr =$con1Err =$con2Err =$con3Err =$genderErr =$guest_typeErr= "";
$guest_id=$bill= $nic =$check_out =$con1 =$con2 =$con3 =$gender =$guest_type= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["check_out"])) {
    $check_outErr = "Check Out Date is required";
  } else {
    $check_out =$_POST["check_out"];
    // check if name only contains letters and whitespace
  }if (empty($_POST["guest_type"])) {
    $guest_typeErr = "Guest type is required";
  } else {
    $guest_type = test_input($_POST["guest_type"]);
	
  }// Check if username is empty
  if(empty(is_numeric($_POST["guest_id"]))){
        $guest_iderr = "Please enter Guest id.";
  } else{
        $guest_id= (int)($_POST["guest_id"]);
  }
  if(empty($Guest_iderr)){
        // Prepare a select statement
        $sql = "SELECT Guest_Id FROM guest WHERE Guest_Id = :guest_id";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":guest_id", $param_Emp_Id, PDO::PARAM_STR);
            
            // Set parameters
            $param_Emp_Id = (int)trim($_POST["guest_id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                
            }else{
				// Display an error message if username doesn't exist
				$guest_iderr = "No account found with that guest id.";
			}
		}else{
		echo "Oops! Something went wrong. Please try again later.";
	    }

		// Close statement
		unset($stmt);
	}
  if(empty($guest_idErr) &&empty($check_outErr) && empty($guest_typeErr) &&!empty($guest_id) && !empty($check_out)&& !empty($guest_type)){
    try{
		
		$sql1 = "UPDATE guest SET Check_Out_Date='$check_out',Guest_Type='$guest_type' WHERE Guest_Id=$guest_id";
         // use exec() because no results are returned
        

       if($pdo->exec($sql1)){echo "New record created successfully. Last inserted ID is: " .$guest_id ;}
    }catch(PDOException $e) {
       die("ERROR: Could not able to execute $sql1.".$e->getMessage());
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="demo-table">
    <div class="form-head">
       <h3> Welcome to Update Page</h3><hr>
    </div >
	<center><span class="error-message">
	Hi!</span></center><hr>
    
	    <center><p>Please fill all the fields.</p></center>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  Guest id: 
  <input type="text" name="guest_id" class="demo-input-box" >
  <span class="error-message ">* <?php echo $guest_idErr;?></span><br>

  Check out date:
  <input type="date" name="check_out" class="demo-input-box" >
  <span class="error-message ">* <?php echo $check_outErr;?></span><br>
  Guest type:<br>
  <input type="radio" id="r2" name="guest_type"  value="individual">Individual
  <input type="radio" id="r2" name="guest_type"  value="family">Family
  <input type="radio" id="r2" name="guest_type"  value="company">Company
  <span class="error-message ">* <?php echo $guest_typeErr;?></span><br><br>

  <center>   
        <span><input type="submit" name="login" value="Update" class="btnLogin"></span><br><br>  
		<a id="a" href="../updatemenu.php" class="btnLogin">Back</a>&nbsp
        <a id="a" href="../../logout.php" class="btnLogin">Logout</a>&nbsp
		<a id="a" href="../user.php" class="btnLogin">Home</a>
  </center>  
</div>

</body>
</html>