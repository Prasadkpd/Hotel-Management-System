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
		body{ background-image:url('../a.jpg'); background-size:1710px 1000px;}
    </style>
    
</head>
<body>
 
<div class="demo-table">
<?php
// define variables and set to empty values
$guest_nameErr =$billErr= $nicErr =$check_outErr =$con1Err =$con2Err =$con3Err =$genderErr =$guest_typeErr=$guest_idErr= "";
$guest_name =$bill= $nic =$check_out =$con1 =$con2 =$con3 =$gender =$guest_type=$guest_id= ""; 
echo "<style>th{background-color:#5d9cec;color:black;}
		tr:nth-child(even){background-color:#f5f7fa;}
		th,td{padding:15px 10px;}
		table{border-collapse:collapse;border-bottom: 1px solid #ddd;}</style>";
echo "<div style='overflow-x:auto;'><center><table style='border: 1px solid blue; padding: 10px 10px;'>";
echo "<tr><th >Guest_Id</th><th >Bill_Id</th><th>Total</th></tr></center></div>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td '>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}
$stmt = $pdo->prepare("SELECT g.Guest_Id,b.Bill_Id,SUM( Cost_Amount) AS Total FROM guest g,bill b,cost c WHERE  b.Guest_Id=g.Guest_Id AND b.Bill_Id=c.BIll_Id GROUP BY BIll_Id");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>	
		<h2>Total Bill Info</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 
  
  <div class=field-column>

	 <div>
	 <center><p><a id="a" href="../../logout.php" class="btnLogin">Logout</a></p></center>
	 </div>
  </div>
</form>
</div>

</body>
</html>