<?php
include('db_config.php');

if(isset($_POST['sign-up'])){
    $roll = $_POST['roll'];
    $name = $_POST['username'];
    $department = $_POST['department'];
    $stu_session = $_POST['stu_session'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
     $tempname = $_FILES["image"]["tmp_name"];
     $folder = "./uploads/".$image;
    $sql = "insert into users(roll,name,department,stu_session,user_password,image)  values('$roll','$name','$department','$stu_session','$password','$image')";
    
  if ($con->query($sql) === TRUE) {
       echo "New record created successfully";
      }
   /* else {
    echo "Error: " . $sql . "<br>" . $con->error;
      
}*/
      // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    header("Location: login.php");
        exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
            .center{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
        }
        .login-form{
			width: 500px;
			background: #fff;
			padding: 20px 40px;
			border-radius: 16px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			clear: both;
		}
        .sign-up{
            border: none;
            background: #366363;
            display: block;
            width: 100%;
            padding: 10px 30px;
            margin-top: 35px;
            cursor: pointer;
            color: #fff;
        }
        h3{
            margin: 20px 0px;
            text-align: center;
        }
    </style>
</head>
<body>
  <div class="container">
      <div class="center">
          <form method="POST" action="" enctype="multipart/form-data">
             <div class="login-form">
             <h3>Create an account.</h3>
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                 <label>Roll</label>
                  <input type="text" name="roll" class="form-control" placeholder="Enter Roll">
              </div>
              <div class="form-group">
                 <label>User Name</label>
                  <input type="text" name ="username" class="form-control" placeholder="Username">
              </div>
              
              <div class="form-group">
                 <label>Department</label>
                  <input type="text" name="department" class="form-control" placeholder="Enter Department">
              </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                 <label>Session</label>
                  <input type="text" name = "stu_session" class="form-control" placeholder="Enter Session">
              </div>
              <div class="form-group">
                 <label>Password</label>
                  <input type="text" name = "password" class="form-control" placeholder="Enter Session">
              </div>
                <div class="form-group">
                   <label>image Upload</label>
                    <input type="file" name="image">
                </div>
                 </div>
             </div>
             
              
              <!--<input type="checkbox"> by signing up you agree to our terms and conditions-->
              <div class="form-group">
                  <button class="sign-up" name="sign-up">Create Account</button>
              </div>
                 <p>already have an account?<a href="user_login.php"> Login</a></p>
              </div>
          </form>
      </div>
  </div>  
</body>
</html>