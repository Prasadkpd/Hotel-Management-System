<?php
// Initialize the session
session_start();
// Include config file
require_once "../config/config.php";
?>
<!DOCTYPE HTML>  
<html>
<head>
<meta charset="UTF-8">
    <title>Login</title>
           <link href="../css/style.css" rel="stylesheet" type="text/css">
    <style type="text/css" >
		#a{	text-decoration:none;}
		body{ background-image:url('a.jpg'); background-size:1710px 1000px;}
    </style>
    
</head>
<body>
 
<div class="demo-table">
<?php
// define variables and set to empty values
$guest_nameErr =$billErr= $nicErr =$check_outErr =$con1Err =$con2Err =$con3Err =$genderErr =$guest_typeErr=$guest_idErr= "";
$guest_name =$bill= $nic =$check_out =$con1 =$con2 =$con3 =$gender =$guest_type=$guest_id= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["guest_id"])) {
    $guest_idErr = "Guest Id is required";
  } else {
    $guest_id = test_input($_POST["guest_id"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$guest_id)) {
      $guest_idErr = "Only Numbers allowed";
    }
  }
    $sql = "SELECT Guest_Id, Guest_Type FROM guest WHERE Guest_Id = :guest_id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":guest_id", $param_Emp_Id, PDO::PARAM_STR);
            
            // Set parameters
            $param_Emp_Id = (int)trim($_POST["guest_id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $guest_id = $row["Guest_Id"];
                        $guest_type = $row["Guest_Type"];
                      
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["Guest_Id"] = $guest_id;
                            $_SESSION["Guest_Type"] = $guest_type; 
							}
							header("location: ../opera/info/bill_info.php");
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $guest_iderr = "No account found with that employee id.";
                }
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            unset($stmt);
	if($guest_type=="individual"){
		$sql2 = "SELECT I_Name FROM $guest_type WHERE Guest_Id = :guest_id";
	}
	else if($guest_type=="family"){
		$sql2 = "SELECT Fam_H_Name FROM $guest_type WHERE Guest_Id = :guest_id";
	}
	else{
		$sql2 = "SELECT C_Name FROM $guest_type WHERE Guest_Id = :guest_id";
	}
    if($stmt1 = $pdo->prepare($sql2)){
        // Bind variables to the prepared statement as parameters
        $stmt1->bindParam(":guest_id", $param_Emp_Id1, PDO::PARAM_STR);
            
        // Set parameters
        $param_Emp_Id1 = (int)trim($_POST["guest_id"]);
            
        // Attempt to execute the prepared statement
        if($stmt1->execute()){
            // Check if username exists, if yes then verify password
            if($stmt1->rowCount() == 1){
                if($row = $stmt1->fetch()){
					if(!empty($row["I_Name"])){
                        $guest_name = $row["I_Name"];
                    }else if(!empty($row["Fam_H_Name"])){
						$guest_name = $row["Fam_H_Name"];
					}else if(!empty($row["C_Name"])){
						$guest_name = $row["C_Name"];
					}
                    session_start();
                            
                    // Store data in session variables
                     $_SESSION["Guest_Name"] = $guest_name; 
				}
            }
        }
    }
     unset($stmt1);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>	
		<h2>Guest Insertion Interface</h2>
<p><span class="error-info">* required field</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  Guest Id: 
  <input type="text" name="guest_id" class="demo-input-box" >
  <span class="error-message ">* <?php echo $guest_idErr;?></span><br>
  
  <div class=field-column>
     <div>
     <span><input type="submit" name="login" value="Info" class="btnLogin"></span>
	 
     </div>
	 <div>
	 <center><p><a id="a" href="user.php" class="btnLogin">Home</a> &nbsp  &nbsp  <a id="a" href="../logout.php" class="btnLogin">Logout</a></p></center>
	 </div>
  </div>
</form>
</div>

</body>
</html>