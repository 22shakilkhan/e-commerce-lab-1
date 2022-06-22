<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to index page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}*/
require_once "db_connect.php";
 
// Define variables and initialize with empty values
$username = "";
$password = "";
$username_err = "";
$password_err = "";
$login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    /*if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }*/
    
    // Check if password is empty
    /*if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }*/
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT roll FROM users WHERE name = '$username' and user_password = '$password'";
        
        if($stmt = $con->prepare($sql)){
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                           /* $_SESSION["id"] = $id;*/
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to Home page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .login-form{
            width: 340px;
            height: 350px;
            padding: 15px;
            box-shadow: 0 0 8px 0px rgba(0,0,0,0.3);
            border-radius: 6px;
            margin-top: 20px;
        }
        .login-btn{
            border: none;
            padding: 5px 20px;
            background: #202992;
            color: #fff;
            border-radius: 2px;
            cursor: pointer;
            margin-top: 20px;
        }
        .title h2{
            padding: 10px;
        }
    
    </style>
</head>
<body>
   <div class="container">
       <div class="center">
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="login-form">
					<div class="title">
						<h2 style="text-align: center;">Login</h2>
					</div>
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="User Name" required>
					</div>
					<div class="form-group">
						<input type="text" name="password" class="form-control" placeholder="password" required>
					</div>
					<!--<p class="pass">forgot password ? </p>-->
					<input type="submit" value="Login" class="login-btn">
					<div class="sign-up">
						<!--<p>Not a member?<a href="register.php">sign up</a></p>-->
					</div>
				</div>
			</form>
		</div>
   </div> 
</body>
</html>