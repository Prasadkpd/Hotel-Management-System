<?php
// Initialize the session
session_start();
// Include config file
require_once "../../config/configrec.php";
?>
<!DOCTYPE HTML>  
<html>
<head>
<meta charset="UTF-8">
    <title>Login</title>
           <link href="../../css/style.css" rel="stylesheet" type="text/css">
    <style type="text/css" >
		#a{	text-decoration:none;}
		body{ background-image:url('../a.jpg'); background-size:1550px 1125px;}
    </style>
    
</head>
<body>  
<div class="demo-table">
<?php
// define variables and set to empty values
$guest_nameErr =$Emp_Id=$billErr= $nicErr =$check_outErr =$con1Err =$con2Err =$con3Err =$genderErr =$guest_typeErr=$locaErr=$typeErr= $rateErr =$statusErr= "";
$guest_name =$bill= $nic =$check_out =$con1 =$con2 =$con3 =$gender =$guest_type=$type=$rate=$status=$loca= ""; 

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
  }
   if (empty($_POST["check_out"])) {
    $check_outErr = "Check Out Date is required";
  } else {
    $check_out =$_POST["check_out"];
    // check if name only contains letters and whitespace
  }
  if (empty($_POST["bill"])) {
  } else {
    $bill = test_input($_POST["bill"]);
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
  if (empty($_POST["con2"])) {
  } else {
    $con1 = test_input($_POST["con1"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$con2)) {
      $con2Err = "Only numbers allowed";
    }
  }
  if (empty($_POST["con3"])) {
  } else {
    $con3 = test_input($_POST["con3"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$con3)) {
      $con3Err = "Only numbers allowed";
    }
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["guest_type"])) {
    $guest_typeErr = "Guest type is required";
  } else {
    $guest_type = test_input($_POST["guest_type"]);
  }
  if (empty($_POST["type"])) {
    $typeErr = "Room type is required";
  } else {
    $type = test_input($_POST["type"]);
  }   
  if (empty($_POST["rate"])) {
    $rateErr = "Room rate is required";
  } else {
    $rate = test_input($_POST["rate"]);
  }    
  if (empty($_POST["status"])) {
    $statusErr = "Room status is required";
  } else {
    $status = test_input($_POST["status"]);
  }
  if (empty($_POST["loca"])) {
    $locaErr = "Room location is required";
  } else {
    $loca = test_input($_POST["loca"]);
  }
  if(empty($typeErr) && !empty($type) && empty($rateErr) && !empty($rate) && empty($statusErr) && !empty($status) && empty($locaErr) && !empty($loca) &&
	  empty($guest_nameErr) && empty($billErr) && empty($nicErr)&& empty($billErr)&& empty($check_outErr)&& empty($con1Err)&& empty($con2Err)&& empty($con3Err)
	  && empty($guest_typeErr) && !empty($guest_name) && (!empty($bill)|| empty($bill))&& (!empty($nic)|| empty($nic)) && 
      !empty($check_out)&& !empty($con1)&& !empty($gender)&& !empty($guest_type) && (!empty($con2)  || empty($con2)) && (!empty($con3)  || empty($con3)) ){
    try{
		$sql1 = "INSERT INTO guest (Check_Out_Date, Guest_Type)
        VALUES ( '$check_out', '$guest_type')";
         // use exec() because no results are returned
        $pdo->exec($sql1);
		
        $last_id = $pdo->lastInsertId();
        $Emp_Id=$_SESSION["Emp_Id"];
        $sql2 = "INSERT INTO handle ( Emp_Id, Guest_Id)
        VALUES ('$Emp_Id',' $last_id')";
        // use exec() because no results are returned
        $pdo->exec($sql2);
		
	    $sql3 = "INSERT INTO contact ( Guest_Id, Contact_No)
        VALUES ('$last_id', '$con1')";
		$pdo->exec($sql3);
		
		if(!empty($con2)){
			$sql4 = "INSERT INTO contact ( Guest_Id, Contact_No)
            VALUES ('$last_id','$con2')";
		    $pdo->exec($sql4);
		}
		
		if(!empty($con3)){
			$sql5 = "INSERT INTO contact ( Guest_Id, Contact_No)
            VALUES ('$last_id','$con3')";
			$pdo->exec($sql5);
		}
		
	    if($guest_type=="individual"){
			$sql6 = "INSERT INTO individual ( Guest_Id, I_NIC, I_Name, I_Gen)
			VALUES ('$last_id', '$nic', '$guest_name', '$gender')";
		    $pdo->exec($sql6);
		}
		if($guest_type=="family"){
			$sql7 = "INSERT INTO family (Guest_Id, Fam_H_NIC, Fam_H_Name, Fam_H_Gen) 
			VALUES('$last_id', '$nic', '$guest_name', '$gender')";
		    $pdo->exec($sql7);
		}
		if($guest_type=="company"){
			$sql8 = "INSERT INTO company (Guest_Id, C_Name, Billing_Address) 
			VALUES ('$last_id', '$guest_name', '$bill')";
		    $pdo->exec($sql8);
		}
				$_SESSION["guest_id"]=$last_id;
		$_SESSION["type"]=$type;
		$_SESSION["loca"]=$loca;
		$_SESSION["rate"]=$rate;
		$_SESSION["status"]=$status;
		if($status=="Required"){
			header("location: ../info/room_info.php");
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
		<h2>Guest Insertion Interface</h2>
<p><span class="error-info">* required field</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  Name of the Guest or the Company: 
  <input type="text" name="guest_name" class="demo-input-box" >
  <span class="error-message ">* <?php echo $guest_nameErr;?></span><br>
  Nic:
  <input type="text" name="nic" class="demo-input-box" >
  <span class="error-message ">* <?php echo $nicErr;?></span><br>
  Billing Address: <input type="text" name="bill" class="demo-input-box">
  <span class="error-message ">* <?php echo $billErr;?></span><br>
  Check out date:
  <input type="date" name="check_out" class="demo-input-box" >
  <span class="error-message ">* <?php echo $check_outErr;?></span><br>
  Contact Number1: <input type="text" name="con1" class="demo-input-box" >
  <span class="error-message ">* <?php echo $con1Err;?></span><br>
  Contact Number2: <input type="text" name="con2" class="demo-input-box" >
  <span class="error-message "><?php echo $con2Err;?></span><br>
  Contact Number3: <input type="text" name="con3" class="demo-input-box" > 
  <span class="error-message "><?php echo $con3Err;?></span><br>  
  Gender:<br>
  <input type="radio" id="r1" name="gender"  value="female">Female
  <input type="radio" id="r1" name="gender"  value="male">Male
  <input type="radio" id="r1" name="gender"  value="other">Other  
  <span class="error-message ">* <?php echo $genderErr;?></span><br>
  Guest type:<br>
  <input type="radio" id="r2" name="guest_type"  value="individual">Individual
  <input type="radio" id="r2" name="guest_type"  value="family">Family
  <input type="radio" id="r2" name="guest_type"  value="company">Company
  <span class="error-message ">* <?php echo $guest_typeErr;?></span>
    <hr>
  Type:<br>
  <input type="radio"   name="type"  value="Single">Single
  <input type="radio"   name="type"  value="Double">Double 
  <span class="error-message ">* <?php echo $typeErr;?></span><br>
  Rate:<br>
  <input type="radio"   name="rate"  value="one">One
  <input type="radio"   name="rate"  value="two">Two
  <input type="radio"   name="rate"  value="three">Three  
  <input type="radio"   name="rate"  value="four">Four 
  <span class="error-message ">* <?php echo $rateErr;?></span><br>
  Room status:<br>
  <input type="radio"   name="status"  value="Required">Required
  <input type="radio"   name="status"  value="Not Required">Not Required
  <span class="error-message ">* <?php echo $statusErr;?></span><br>
  Location:<br>
  <input type="radio"   name="loca"  value="First_Floor">First floor
  <input type="radio"   name="loca"  value="Second_Floor">Second floor  
  <span class="error-message ">* <?php echo $locaErr;?></span><br>

  <div class=field-column>
     <div>
     <span><input type="submit" name="login" value="Insert" class="btnLogin"></span>
	 
     </div>
	 <div>
	 <center><p><a id="a" href="../user.php" class="btnLogin">Home</a> &nbsp  &nbsp  <a id="a" href="../../logout.php" class="btnLogin">Logout</a>
	 &nbsp  &nbsp <a id="a" href="../info/room_info.php" class="btnLogin">Next</a>
	 </p></center>
	 </div>
  </div>
</form>
</div>

</body>
</html>