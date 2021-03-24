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
 
<div class="demo-table"><center><h2>Room Informations</h2></center>
<div class=field-column>
<?php 

// define variables and set to empty values
$guest_nameErr =$billErr= $nicErr =$check_outErr =$con1Err =$con2Err =$con3Err =$genderErr =$guest_typeErr=$locaErr=$typeErr= $rateErr =$statusErr=$room_idErr=  "";
$guest_name =$bill= $nic =$check_out =$con1 =$con2 =$con3 =$gender =$guest_type=$type=$rate=$status=$loca=$room_id =$guest_id=""; 
echo "<style>th{background-color:#5d9cec;color:black;}
		tr:nth-child(even){background-color:#f5f7fa;}
		th,td{padding:15px 10px;}
		table{border-collapse:collapse;border-bottom: 1px solid #ddd;}</style>";
echo "<div style='overflow-x:auto;'><center><table style='border: 1px solid blue; padding: 10px 10px;'>";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Type</th><th>Rate</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}
try {
		$type=$_SESSION["type"];
		$loca=$_SESSION["loca"];
		$rate=$_SESSION["rate"];
		$status=$_SESSION["status"];
		$guest_id=$_SESSION["guest_id"];
		$stmt = $pdo->prepare("SELECT Room_No,Type,Rate FROM room WHERE Status='Available' AND Location='$loca' AND Type='$type' AND Rate='$rate' ");
		$stmt->execute();
		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
		echo $v;
	    }
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
echo "</table>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Check if room_id is empty
	if(empty(is_numeric($_POST["room_id"]))){
		$room_idErr = "Please enter room id.";
	} else{
		$room_id= (int)($_POST["room_id"]);
	}
	if(empty($room_idErr)&& !empty($room_id)){
			try{
				$sql8 = "INSERT INTO allocate (Guest_Id, Room_Id) 
				VALUES ('$guest_id', '$room_id')";
				$pdo->exec($sql8);
				
				$sql4 = "UPDATE room SET Status='booked' WHERE 	Room_No=$room_id ";
				$pdo->exec($sql4);
			    echo "New record created and room updated successfully" ;
			}catch(PDOException $e) {
				die("ERROR: Could not able to execute $sql8.".$e->getMessage());
			}
	}
}
?>
</div><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  Room ID: 
  <input type="text" name="room_id" class="demo-input-box" >
  <span class="error-message ">* <?php echo $room_idErr;?></span><br>
     <div class=field-column>
		 <div>
		 <span><input type="submit" name="login" value="Insert" class="btnLogin"></span>
		 <center><p><a id="a" href="../add/guestadd.php" class="btnLogin">Back</a>
		 <a id="a" href="room_view.php" class="btnLogin">View</a></p></center>
	 </div>
  </div>
</form>
</div>

</body>
</html>