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
$guest_idErr =$billErr= $nicErr =$check_outErr =$con1Err =$con2Err =$con3Err =$genderErr =$guest_typeErr=$guest_nameErr= "";
$guest_id=$bill= $nic =$check_out =$con1 =$con2 =$con3 =$gender =$guest_type= $guest_name="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["guest_name"])) {
    $guest_nameErr = "Name is required";
  } else {
    $guest_name = test_input($_POST["guest_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$guest_name)) {
      $guest_nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["nic"])) {
  } else {
    $nic = test_input($_POST["nic"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'0-9 ]*$/",$nic)) {
      $nicErr = "Only letters,numbers and white space allowed";
    }
  }if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
	
  }// Check if username is empty
  if(empty(is_numeric($_POST["guest_id"]))){
        $guest_iderr = "Please enter Guest id.";
  } else{
        $guest_id= (int)($_POST["guest_id"]);
  }
  if(empty($Guest_iderr)){
        // Prepare a select statement
        $sql = "SELECT Guest_Id FROM individual WHERE Guest_Id = :guest_id";
        
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
  if(empty($guest_nameErr) && empty($guest_idErr)  && empty($nicErr) && empty($genderErr) &&!empty($guest_id)&&!empty($guest_name) &&!empty($nic)&& !empty($gender) ){
    try{$sql14="UPDATE individual SET I_NIC='$nic', I_Name='$guest_name', I_Gen='$gender' WHERE Guest_Id=$guest_id";
       if($pdo->exec($sql14)){echo "New record created successfully. Last inserted ID is: " .$guest_id;}
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
	Hi!</center><hr>
    
	    <center><p>Please fill all the fields.</p></center>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  Guest id: 
  <input type="text" name="guest_id" class="demo-input-box" >
  <span class="error-message ">* <?php echo $guest_idErr;?></span><br>
  Nic:
  <input type="text" name="nic" class="demo-input-box" >
  <span class="error-message ">* <?php echo $nicErr;?></span><br>
  Name of the Guest : 
  <input type="text" name="guest_name" class="demo-input-box" >
  <span class="error-message ">* <?php echo $guest_nameErr;?></span><br>
  Gender:<br>
  <input type="radio" id="r1" name="gender"  value="female">Female
  <input type="radio" id="r1" name="gender"  value="male">Male
  <input type="radio" id="r1" name="gender"  value="other">Other  
  <span class="error-message ">* <?php echo $genderErr;?></span><br>

  <center>   
        <span><input type="submit" name="login" value="Update" class="btnLogin"></span><br><br>  
		<a id="a" href="../updatemenu.php" class="btnLogin">Back</a>&nbsp
        <a id="a" href="../../logout.php" class="btnLogin">Logout</a>&nbsp
		<a id="a" href="../user.php" class="btnLogin">Home</a>
  </center>  
</div>

</body>
</html>