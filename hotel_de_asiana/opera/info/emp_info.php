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

echo "<style>th{background-color:#5d9cec;color:black;}
		tr:nth-child(even){background-color:#f5f7fa;}
		th,td{padding:15px 10px;}
		table{border-collapse:collapse;border-bottom: 1px solid #ddd;}</style>";
echo "<div style='overflow-x:auto;'><center><table style='border: 1px solid blue; padding: 10px 10px;'>";
echo "<tr><th >Employee_Id</th><th >Name</th><th >Contact</th></tr></center></div>";

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
$guest_id=$_SESSION["Guest_Id"];
$stmt = $pdo->prepare("SELECT * FROM emp_info");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
	
?>
<h2>Employee Informations</h2>

</div>

</body>
</html>