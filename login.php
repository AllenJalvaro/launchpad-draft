<?php
require "config.php";
// if(!empty($_SESSION["email"])){
//     header("Location: /student-dashboard/index.php");
// }
    if(isset($_POST["submit"])){
        $email=trim($_POST["email"]);
        $password=$_POST["password"];
        $sql = mysqli_query($conn, "SELECT *  FROM student_registration WHERE Student_email='$email'");
        $row=mysqli_fetch_assoc($sql);
        if(mysqli_num_rows($sql) > 0){
            if($password == $row["Student_password"]){
                $_SESSION["login"]= true;
                $_SESSION["email"]=$row["Student_email"];
                header("Location: index.php");
            }else{
                echo "<script>
                Swal.fire({
                    title: 'Wrong Password!',
                    text: '',
                    icon: 'error',
                    showCancelButton: false,
                    showDenyButton: false,
                    showCloseButton: false,
                    confirmButtonText: 'OK'
                });
              </script>";
            }
        }else{
            echo "<script>
            Swal.fire({
                title: 'Account doesn\'t exist!',
                text: '',
                icon: 'error',
                showCancelButton: false,
                showDenyButton: false,
                showCloseButton: false,
                confirmButtonText: 'OK'
            });
          </script>";
            
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Launchpad - Login</title>
		<link rel="icon" href="/launchpad/images/favicon.svg" />
		<link rel="stylesheet" href="css/login.css">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	</head>
	<body>
		<div class="login-card">
			<h2> 
				<img src="/launchpad/images/logo.png" alt="launchpad-logo" /><span
					class="og"
					>OG</span
				><span class="in">IN</span>
			</h2>
			<h5>Enter your credentials as either a student or mentor affiliated exclusively with PSU.</h5>
			<button class="btn-continue-google">
				<img src="/launchpad/images/google-logo.png" alt="google-logo" />
				Continue with Google
			</button>
				<span class="or">or</span>
			<form class="login-form" action="" method="post">
				<input type="email" placeholder="Email" name="email" required/>
				<input type="password" placeholder="Password" name="password" required/>
				<button type="submit" name="submit">LOGIN</button>
				<span>Don't have an account? <a href="#">Register Now</a></span>
			</form>
		</div>
	</body>
</html>
