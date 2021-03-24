<?php 

// Initialize the session
session_start();



// Define variables and initialize with empty values
$username = $password = $userlevel= "";
$username_err = $userlevel_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["userlevel"]))){
        $userlevel_err = "Please enter user level.";
    } else{
        $userlevel = trim($_POST["userlevel"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    // Validate credentials
    if(empty($username_err) && empty($password_err)){  
	if($userlevel==="root" && $password==="root123"){
		session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userlevel"] = $userlevel;                
                            
                            // Redirect user to welcome page
                            header("location: welcome/welcomeroot.php");
	}elseif($userlevel==="manager" && $password==="mana123"){
			session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userlevel"] = $userlevel;
                            // Redirect user to welcome page
                            header("location: welcome/welcomemana.php");
		
	}elseif($userlevel==="receptionist" && $password==="rec123"){
				session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userlevel"] = $userlevel;             
                            
                            // Redirect user to welcome page
                            header("location: welcome/welcomerec.php");
	}elseif($userlevel==="chef" && $password==="chef123"){
					session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userlevel"] = $userlevel;                         
                            // Redirect user to welcome page
                            header("location: welcome/welcomechef.php");
	}elseif($userlevel==="waiter" && $password==="wait123"){
						session_start();
                            
            		 	    // Store data in session variables
              			    $_SESSION["loggedin"] = true;
                          	    $_SESSION["userlevel"] = $userlevel; 	
							// Redirect user to welcome page
                           	header("location: welcome/welcomewait.php");                            
    }elseif($userlevel==="cleaner" && $password==="cle123"){
						session_start();
                            
                         	// Store data in session variables
                   		    $_SESSION["loggedin"] = true;
                          	    $_SESSION["userlevel"] = $userlevel; 	 
							// Redirect user to welcome page
                           	 header("location: welcome/welcomecle.php");                            
    }elseif(($userlevel==="cleaner" || $userlevel==="root" || $userlevel==="waiter" || $userlevel==="chef" || $userlevel==="receptionist") && ($password!=="cle123" ||$password!=="root123"||$password!=="wait123"||$password!=="rec123"||$password!=="chef123")){
						// Display an error message if password is not valid
                            			$password_err = "The password you entered was not valid.";
	}
	elseif(($userlevel!=="cleaner" || $userlevel!=="root" || $userlevel!=="waiter" || $userlevel!=="chef" || $userlevel!=="receptionist") && ($password==="cle123" || $password==="root123" || $password==="wait123" || $password==="rec123" || $password==="chef123")){
						// Display an error message if userlevel is not valid
                            			$userlevel_err = "The user level  you entered was not valid.";
	}
	}

    }

?>
<html lang="en">
<head>
<title>User Login</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{ background-image:url('opera/a.jpg'); background-size:1550px 1125px;}
</style>
</head>
<body>
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="demo-table">

                <div class="form-head">Login</div>
		                    
                <center>
		  <p>Please fill in your credentials to login.</p>
                </center>
                <div class="field-column <?php echo (!empty($userlevel_err)) ? 'has-error' : ''; ?>">
                    <div>
                        <label for="userlevel">User level </label>
                    </div>
                    <div>
                       <input type="text" name="userlevel" class="demo-input-box" >
                    <span class="help-block"><?php echo $userlevel_err; ?></span>
                    </div>
                </div>
                <div class="field-column <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <div>
                        <label for="password">Password </label>
                    </div>
                    <div>
                       <input type="password" name="password" class="demo-input-box" >
                    <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                </div>
                <div class=field-column>
                    <div>
                        <span><input type="submit" name="login" value="Login"
                        class="btnLogin"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>