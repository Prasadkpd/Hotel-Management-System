<?php
// Initialize the session
session_start();
// Include config file
require_once "../config/configcle.php"; 

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
// Define variables and initialize with empty values
$Emp_Name =$stmt= $Emp_Id ="";
$Emp_Name_err=$Emp_Id_err= "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(is_numeric($_POST["Emp_Id"]))){
        $Emp_Id_err = "Please enter employee id.";
    } else{
        $Emp_Id= (int)($_POST["Emp_Id"]);
    }
// Validate credentials
    if(empty($Emp_Id_err)){
        // Prepare a select statement
        $sql = "SELECT Emp_Id, Emp_Name FROM employee WHERE Emp_Id = :Emp_Id";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":Emp_Id", $param_Emp_Id, PDO::PARAM_STR);
            
            // Set parameters
            $param_Emp_Id = (int)trim($_POST["Emp_Id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $Emp_Id = $row["Emp_Id"];
                        $Emp_Name = $row["Emp_Name"];
                      
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["Emp_Id"] = $Emp_Id;
                            $_SESSION["Emp_Name"] = $Emp_Name;                            
                            
                            // Redirect user to welcome page
                            header("location: ../opera/user.php");
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $Emp_Id_err = "No account found with that employee id.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome</title>
 <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <style>
    #a{
		text-decoration:none;
	}hr{	border-top: #e5e6e9 ;}		body{ background-image:url('../opera/a.jpg'); background-size:1550px 1000px;}
  </style>  
</head>
<body>
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="demo-table">

                <div class="form-head"><h3>Welcome to Hotel De Asiana</h3></div>
		          <hr>          
                <center>
		        <span class="error-message">User level : <?php echo htmlspecialchars($_SESSION["userlevel"]); ?></span>
                </center><hr>
                <div class="field-column <?php echo (!empty($Emp_Id_err)) ? 'has-error' : ''; ?>">
                    <div>
                        <label for="Emp_Id">Employee id </label>
                    </div>
                    <div>
                       <input type="text" name="Emp_Id" class="demo-input-box" >
                    <span class="error-message"><?php echo $Emp_Id_err; ?></span>
                    </div>
                </div>
                <div class=field-column>
                    <div>
                        <span><input type="submit" name="login" value="Login" class="btnLogin"></span>
					    <br><br>
						<center>
						<a id="a" href="../logout.php" name="logout" value="Logout" class="btnLogin">Logout</a>
						</center>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>