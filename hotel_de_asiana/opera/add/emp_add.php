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
		body{ background-image:url('../a.jpg'); background-size:1710px 1500px;}
    </style>
    
</head>
<body>  
<div class="demo-table">
<?php
// define variables and set to empty values
$emp_nameErr =$desErr =$con1Err =$sal_gradeErr =$gradeErr =$genderErr =$expErr=$locaErr=$cpErr=$empErr=$ssErr="";
$emp_name =$des=$con1=$sal_grade =$grade =$gender =$exp= $loca=$cp=$emp=$ss="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
  if (empty($_POST["exp"])) {
    $expErr = "Designation is required";
  } else {
    $exp = test_input($_POST["exp"]);
    if (!preg_match("/^[a-zA-Z-0-9' ]*$/",$exp)) {
      $expErr = "Only letters and white space allowed";
    }  
  }
  if (empty($_POST["loca"])) {
    $locaErr = "Designation is required";
  } else {
    $loca = test_input($_POST["loca"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$loca)) {
      $locaErr = "Only letters and white space allowed";
    }  
  }
  if (empty($_POST["emp"])) {
    $empErr = "Gender is required";
  } else {
    $emp = test_input($_POST["emp"]);
  }
  if (empty($_POST["ss"])) {
  } else {
    $ss = test_input($_POST["ss"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$ss)) {
      $ssErr = "Only letters and white space allowed";
    }  
  }
  if (empty($_POST["cp"])) {
    
  } else {
    $cp =$_POST["cp"];
    // check if name only contains letters and whitespace
  } 
  if(empty($emp_nameErr) && empty($desErr) && empty($gradeErr) && empty($sal_gradeErr)&& empty($con1Err)&& empty($genderErr) && empty($expErr) && !empty($exp)&& empty($empErr) && !empty($emp) 
	  && empty($locaErr) && !empty($loca) && !empty($emp_name) && !empty($des) && !empty($gender) && !empty($sal_grade) &&!empty($con1) && !empty($gender) ){
    try{
		$sql1 = "INSERT INTO employee (Emp_Name, Gender, Tp_Num, Salary_Grade)
        VALUES ( '$emp_name', '$gender', '$con1', '$sal_grade')";
         // use exec() because no results are returned
        $pdo->exec($sql1);
		$last_id = $pdo->lastInsertId();
		if($emp=="manager")
		{        
			$sql2 = "INSERT INTO manager ( Emp_Id,Designation, Grade)
			VALUES (' $last_id','$des','$grade')";
			// use exec() because no results are returned
			$pdo->exec($sql2);
	    }
		if($emp=="receptionist")
		{        
			$sql2 = "INSERT INTO receptionist ( Emp_Id)
			VALUES (' $last_id')";
			// use exec() because no results are returned
			$pdo->exec($sql2);
	    }
		if($emp=="cleaner")
		{        
			$sql2 = "INSERT INTO cleaner ( Emp_Id,Location)
			VALUES (' $last_id','$loca')";
			// use exec() because no results are returned
			$pdo->exec($sql2);
	    }
		if($emp=="cheff")
		{   $sql2 = "INSERT INTO kitchen ( Emp_Id,Grade,Experience)
			VALUES ('$last_id','$grade','$exp')";
			// use exec() because no results are returned
			$pdo->exec($sql2);  
			$sql4 = "INSERT INTO specility_area ( Specialty_Area)
			VALUES (' $ss')";
			// use exec() because no results are returned
			$pdo->exec($sql4);     	
			$ss_id = $pdo->lastInsertId();
			$sql3 = "INSERT INTO cheff ( Emp_Id	,Speciality_Area_Id)
			VALUES (' $last_id','$ss_id')";
			// use exec() because no results are returned
			$pdo->exec($sql3);
		
	    }
		if($emp=="support_chef")
		{   $sql2 = "INSERT INTO kitchen ( Emp_Id,Grade,Experience)
			VALUES ('$last_id','$grade','$exp')";
			// use exec() because no results are returned
			$pdo->exec($sql2);
			$sql3 = "INSERT INTO support_chef ( Emp_Id,Contract_Period	)
			VALUES (' $last_id','$cp')";
			// use exec() because no results are returned
			$pdo->exec($sql3);
		    
	    }
		if($emp=="waiter")
		{   $sql2 = "INSERT INTO kitchen ( Emp_Id,Grade,Experience)
			VALUES ('$last_id','$grade','$exp')";
			// use exec() because no results are returned
			$pdo->exec($sql2);
			$sql3 = "INSERT INTO specialty_style ( Specialty_Style)
			VALUES ('$ss')";
			// use exec() because no results are returned
			$pdo->exec($sql3);	
			$ss_id = $pdo->lastInsertId();
			$sql4 = "INSERT INTO waiter ( Emp_Id,Specialty_Style_Id)
			VALUES (' $last_id','$ss_id')";
			// use exec() because no results are returned
			$pdo->exec($sql4);
		    
	    }			
       echo "New record created successfully. Last inserted ID is: " . $last_id;
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
		<h2>Manager Adding Interface</h2>
<p><span class="error-info">* required field.<br>* Please insert A-E for Grade and Salary Grade</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
  Experiance: <input type="text" name="exp" class="demo-input-box" >
  <span class="error-message ">* <?php echo $expErr;?></span><br>
  <hr>
  Location: <input type="text" name="loca" class="demo-input-box" >
  <span class="error-message ">* <?php echo $locaErr;?></span><br>
  <hr>
  Contract_Period:<input type="date" name="cp" class="demo-input-box" >
  <span class="error-message ">* <?php echo $cpErr;?></span><br>
  Employee Type:<br>
  <input type="radio" id="r1" name="emp"  value="manager">Manager
  <input type="radio" id="r1" name="emp"  value="receptionist">Receptionist
  <input type="radio" id="r1" name="emp"  value="cheff">Cheff
  <input type="radio" id="r1" name="emp"  value="cleaner">Cleaner    
  <input type="radio" id="r1" name="emp"  value="support_chef">Support_chef
  <input type="radio" id="r1" name="emp"  value="waiter">Waiter   
  <span class="error-message ">* <?php echo $empErr;?></span><br>
  Specialty Style :<input type="text" name="ss" class="demo-input-box" >
  <span class="error-message ">* <?php echo $ssErr;?></span><br>

  <div class=field-column>
     <div>
     <span><input type="submit" name="login" value="Insert" class="btnLogin"></span>
	 
     </div>
	 <div>
	 <center><p><a id="a" href="../manager.php" class="btnLogin">Home</a> &nbsp  &nbsp  <a id="a" href="../../logout.php" class="btnLogin">Logout</a></p></center>
	 </div>
  </div>
</form>
</div>

</body>
</html>