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
$fac_nameErr =$locaErr=$typeErr= $rateErr =$statusErr= "";
$fac_name =$type=$rate=$status=$loca= ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["type"])) {
    $typeErr = "Facility type is required";
  } else {
    $type = test_input($_POST["type"]);
  }   
  if (empty($_POST["rate"])) {
    $rateErr = "Facility rate is required";
  } else {
    $rate = test_input($_POST["rate"]);
  }    
  if (empty($_POST["fac_name"])) {
    $fac_nameErr = "Facility status is required";
  } else {
    $fac_name = test_input($_POST["fac_name"]);
  }
  if (empty($_POST["loca"])) {
    $locaErr = "Facility location is required";
  } else {
    $loca = test_input($_POST["loca"]);
  }
  if(empty($typeErr) && !empty($type) && empty($rateErr) && !empty($rate) && empty($locaErr) && !empty($loca) &&
	  empty($fac_nameErr)&& !empty($fac_name) ){  
	  try{
		$sql1 = "INSERT INTO facility (Fact_Name,Fact_Type,Fact_Rate,Location)
        VALUES ( '$fac_name', '$type', '$rate', '$loca')";
         // use exec() because no results are returned
        $pdo->exec($sql1);
		$Emp_Id=$_SESSION["Emp_Id"];
        $last_id = $pdo->lastInsertId();
        $sql2 = "INSERT INTO manage ( Fact_Id,Emp_Id)
        VALUES ('$last_id','$Emp_Id')";
        // use exec() because no results are returned
        $pdo->exec($sql2);
		
	    
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
  Name of Facility: 
  <input type="text" name="fac_name" class="demo-input-box" >
  <span class="error-message ">* <?php echo $fac_nameErr;?></span><br>
  Type: <input type="text" name="type" class="demo-input-box">
  <span class="error-message ">* <?php echo $typeErr;?></span><br>
  Rate: 
  <input type="text" name="rate" class="demo-input-box" >
  <span class="error-message ">* <?php echo $rateErr;?></span><br>
  Location: 
  <input type="text" name="loca" class="demo-input-box" >
  <span class="error-message ">* <?php echo $locaErr;?></span><br>

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