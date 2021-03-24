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
echo "<tr><th >Guest_Id</th><th >Bill_Id</th><th >Cost_Name</th><th >Cost_Amount</th></tr></center></div>";

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
$stmt = $pdo->prepare("SELECT g.Guest_Id,b.Bill_Id,c.Cost_Name,c.Cost_Amount FROM guest g,bill b,cost c WHERE  g.Guest_Id=$guest_id AND b.Guest_Id=g.Guest_Id AND b.Bill_Id=c.BIll_Id");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
	
?>
<h2>Bill Informations</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  
  
  <div class=field-column>

	 <div>
	 <center><p><a id="a" href="../user.php" class="btnLogin">Home</a></p></center>
	 </div>
  </div>
</form>
</div>

</body>
</html>