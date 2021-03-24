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
		body{ background-image:url('../a.jpg'); background-size:1710px 1145px;}
    </style>
    
</head>
<body>  
<?php
echo "<style>th{background-color:#5d9cec;color:black;}
		tr:nth-child(even){background-color:#f5f7fa;}
		th,td{padding:15px 10px;}
		table{border-collapse:collapse;border-bottom: 1px solid #ddd;}</style>";
echo "<div style='overflow-x:auto;'><center><table style='border: 1px solid blue; padding: 10px 10px;'>";
echo "<tr><th>Room_Id</th><th>Type</th><th>Rate</th><th>Status</th><th>Location</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:100px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

try {
  $stmt = $pdo->prepare("SELECT * FROM room_info");
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
?>
<div class="demo-table">
		<h2>Employee Informations Interface</h2>

  
  <div class=field-column>
	 <div>
	 <center><a id="a" href="../../logout.php" class="btnLogin">Logout</a>
	<a id="a" href="room_info.php" class="btnLogin">Back</a>
	</center>
	 
	 </div>
</div>
</form>
</div>

</body>
</html>