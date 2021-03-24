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
    $sql = "SELECT * FROM guest_info WHERE Guest_Id = :guest_id";
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
							}
							header("location: info/guest_info.php");
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

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>	
		<center><h2>Guest Info</h2></center>
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