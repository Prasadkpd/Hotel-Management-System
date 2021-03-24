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
<div class="demo-table">
<?php
// define variables and set to empty values
$guest_idErr =$billErr= $nicErr =$check_outErr =$con1Err =$con2Err =$con3Err =$genderErr =$guest_typeErr=$guest_nameErr= "";
$guest_id=$bill= $nic =$check_out =$con1 =$con2 =$con3 =$gender =$guest_type= $guest_name="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Check if username is empty
  if(empty(is_numeric($_POST["guest_id"]))){
        $guest_iderr = "Please enter Guest id.";
  } else{
        $guest_id= (int)($_POST["guest_id"]);
  }
  if(empty($Guest_iderr)){
        // Prepare a select statement
        $sql = "SELECT Guest_Id FROM family WHERE Guest_Id = :guest_id";
        
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
  if(empty($guest_idErr) &&!empty($guest_id)){
    try{$sql14="DELETE FROM family WHERE Guest_Id=$guest_id";
       if($pdo->exec($sql14)){echo "Record deleted successfully. Under Guest ID : " .$guest_id;}
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

    <div class="form-head">
       <h3> Welcome to Delete Page</h3><hr>
    </div >
	<center><span class="error-message">
	Hi!</span></center><hr>
    
	    <center><p>Please fill all the fields.</p></center>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  Guest id: 
  <input type="text" name="guest_id" class="demo-input-box" >
  <span class="error-message ">* <?php echo $guest_idErr;?></span><br>
  
  <center>   
        <span><input type="submit" name="login" value="Delete" class="btnLogin"></span><br><br>  
		<a id="a" href="../deletemenu.php" class="btnLogin">Back</a>&nbsp
        <a id="a" href="../../logout.php" class="btnLogin">Logout</a>&nbsp
		<a id="a" href="../user.php" class="btnLogin">Home</a>
  </center>  
</div>

</body>
</html>