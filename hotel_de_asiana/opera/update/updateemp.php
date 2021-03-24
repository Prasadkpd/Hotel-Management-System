<?php
// Initialize the session
session_start();
// Include config file
require_once "../../config/config.php";
?>
<!DOCTYPE HTML>  
<html>
<head>
<meta charset="UTF-8">
    <title>Login</title>
           <link href="../../css/style.css" rel="stylesheet" type="text/css">
    <style type="text/css" >
		#a{	text-decoration:none;}
		body{ background-image:url('../a.jpg'); background-size:1710px 1145px;}
    </style>
    
</head>
<body>  
<div class="demo-table">
<?php
// define variables and set to empty values
$emp_nameErr =$desErr =$con1Err =$sal_gradeErr =$gradeErr =$genderErr = $emp_idErr="";
$emp_name =$des=$con1=$sal_grade =$grade =$gender = $emp_id="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["emp_id"])) {
		$emp_idErr = "Guest Id is required";
	  } else {
		$emp_id = test_input($_POST["emp_id"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[0-9]*$/",$emp_id)) {
		  $emp_idErr = "Only Numbers allowed";
		}

	  if (empty($_POST["emp_name"])) {
		$emp_nameErr = "Name is required";
	  } else {
		$emp_name = test_input($_POST["emp_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z-' ]*$/",$emp_name)) {
		  $emp_nameErr = "Only letters and white space allowed";
		}
	  }
	  if (empty($_POST["des"])) {
		$desErr = "Designation is required";
	  } else {
		$des = test_input($_POST["des"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$des)) {
		  $desErr = "Only letters and white space allowed";
		}  
	  }
	  if (empty($_POST["grade"])) {
		$gradeErr = "Grade is required";
	  } else {
		$grade = test_input($_POST["grade"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$grade)) {
		  $gradeErr = "Only letters and white space allowed";
		}  
	  }
	  if (empty($_POST["sal_grade"])) {
		$sal_gradeErr = "Salary Grade is required";
	  } else {
		$sal_grade = test_input($_POST["sal_grade"]);
		if (!preg_match("/^[a-zA-Z-' ]*$/",$sal_grade)) {
		  $sal_gradeErr = "Only letters and white space allowed";
		}  
	  }

	  if (empty($_POST["con1"])) {
		$con1Err = "contact 1 is required";
	  } else {
		$con1 = test_input($_POST["con1"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[0-9]*$/",$con1)) {
		  $con1Err = "Only numbers allowed";
		}
	  }
	  if (empty($_POST["gender"])) {
		$genderErr = "Gender is required";
	  } else {
		$gender = test_input($_POST["gender"]);
		
	  }
  $sql = "SELECT Emp_Id FROM employee WHERE Emp_Id = :emp_id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":emp_id", $param_Emp_Id, PDO::PARAM_STR);
            
            // Set parameters
            $param_Emp_Id = (int)trim($_POST["emp_id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $emp_id = $row["Emp_Id"];
                       }	
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $emp_iderr = "No account found with that employee id.";
                }
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            unset($stmt);
	  if(empty($emp_idErr) && empty($emp_nameErr) && empty($desErr) && empty($gradeErr) && empty($sal_gradeErr)&& empty($con1Err)&& empty($genderErr) && !empty($emp_id) &&!empty($emp_name) && !empty($des) && !empty($gender) && !empty($sal_grade) &&!empty($con1) && !empty($gender) ){
		try{
			$sql1 = "UPDATE employee SET Emp_Name='$emp_name', Gender='$gender', Tp_Num='$con1', Salary_Grade='$sal_grade'
			WHERE Emp_Id=$emp_id";
			 // use exec() because no results are returned
			$pdo->exec($sql1);
			
			$sql2 = "UPDATE  manager SET Designation='$des', Grade='$grade' WHERE Emp_Id=$emp_id";
			// use exec() because no results are returned
			$pdo->exec($sql2);
			
			
		   echo "Record updated successfully. Employee ID is: " . $emp_id;
		}catch(PDOException $e) {
		   die("ERROR: Could not able to execute $sql1.".$e->getMessage());
		}
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
		<h2>Employee Update Interface</h2>
<p><span class="error-info">* required field.<br>* Please insert A-E for Grade and Salary Grade</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  Employee Id: 
  <input type="text" name="emp_id" class="demo-input-box" >
  <span class="error-message ">* <?php echo $emp_idErr;?></span><br>
  Name of Employee: 
  <input type="text" name="emp_name" class="demo-input-box" >
  <span class="error-message ">* <?php echo $emp_nameErr;?></span><br>
  Designation : <input type="text" name="des" class="demo-input-box">
  <span class="error-message ">* <?php echo $desErr;?></span><br>
  Salary grade: 
  <input type="text" name="sal_grade" class="demo-input-box" >
  <span class="error-message ">* <?php echo $sal_gradeErr;?></span><br>
  Grade: 
  <input type="text" name="grade" class="demo-input-box" >
  <span class="error-message ">* <?php echo $gradeErr;?></span><br>
  Contact Number1: <input type="text" name="con1" class="demo-input-box" >
  <span class="error-message ">* <?php echo $con1Err;?></span><br>
  Gender:<br>
  <input type="radio" id="r1" name="gender"  value="female">Female
  <input type="radio" id="r1" name="gender"  value="male">Male
  <input type="radio" id="r1" name="gender"  value="other">Other  
  <span class="error-message ">* <?php echo $genderErr;?></span><br>
  
  
  <div class=field-column>
     <div>
     <span><input type="submit" name="login" value="Insert" class="btnLogin"></span>
	 
     </div>
	 <div>
	 <center><p><a id="a" href="../root.php" class="btnLogin">Home</a> &nbsp  &nbsp  <a id="a" href="../../logout.php" class="btnLogin">Logout</a></p></center>
	 </div>
  </div>
</form>
</div>

</body>
</html>