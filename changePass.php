<?php
//Start session.
session_start();

$login = 0;
$newPass = 0;
$conPass = 0;

//Check if user already logged in.
if (isset($_SESSION["username"])) { 
	$login = 1;
	$name = $_SESSION["username"];
}

//Check if new password exist from last page.
if (isset($_POST["new_password"])) {
	$newPass = 1;
	$new_password = $_POST["new_password"];
}
if (isset($_POST["confirm_password"])) {
	$conPass = 1;
	$confirm_password = $_POST["confirm_password"];
}

//Set Variable
$Error = 0;
$ErrorMessgae = "";
$Message = "";

//If the user has login already
if ($login == 1) {
	//When system detect value for new password
	if (($newPass == 1) && ($conPass == 1)){
		//Check if new password and confirm password are the same.
		if ($new_password == $confirm_password) {
			//md5 of new password.
			$newPasscript = md5 ($new_password);
			//Create connection
			$connn = pg_connect("host=HOST dbname=fnmember user=postgres password=PASSWORD port=5432");
			//sql to update
			$sql = pg_query ("UPDATE tb_user SET password='$new_password', pwd='$newPasscript' WHERE mid='$name'");
			//Create connection
			$connn2 = pg_connect("host=HOST dbname=fnaccount user=postgres password=PASSWORD port=5432");
			//sql to update
			$sql2 = pg_query ("UPDATE accounts SET password='$new_password' WHERE username='$name'");
			if (($sql) && ($sql2)) {
				$Message = ("Password changed successfully! <br/>");
			} else {
				$Error = 2;
				$ErrorMessage = ("Unable to connect to server<br/>");
			}
		} else {
			$Error = 7;
			$ErrorMessage = ("New password is inconsistent with confirming new password<br/>");
		}
	} else {
		$Error = 6;
		$ErrorMessage = ("No new password detected<br/>");
	}
} else {
	$ErrorMessage = ("Incorrect access to this page<br/>");
	$Error=5;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<link rel="stylesheet" href="fonts/honyaJi-re/css/stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="fonts/setofont/css/stylesheet.css" type="text/css" charset="utf-8" />
   	<link rel="shortcut icon" href="https://s.aeriastatic.com/files/edeneternal/image/e/ee_favicon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eden Eternal Online - <?php if ($Error == 0) { echo($user_mid."(online)");;} else { echo($ErrorMessage);} ?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
		.form-group input[type=text], input[type=password] { 
			width: 100%;
  			padding: 12px 20px;
  			margin: 8px 0;
  			display: inline-block;
  			border: 1px solid #ccc;
  			box-sizing: border-box;
		}
	</style>
</head>
<body>
    <div class="main">
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                        <h2 class="form-title">
                        	<img src="images/loli.gif" style="width: 150px; height: 150px;">
                        </h2>
                        <div class="form-group">
                        	<?php 
							if ($Error == 0) { 
								echo($Message."<br/><p></p>Return to the homepage after five seconds");
								header( "refresh:5;url=index.php" );
							} else { 
								echo("ERROR CODE: ".$Error."<br/>".$ErrorMessage."<br/><p></p>Return to the homepage after five seconds");
								header( "refresh:5;url=index.php" );
							} 
							?>
                        </div>
                        <div class="loginhere">
                       		<a href='index.php' style='text-decoration: none; color: black;'>--Home--</a>
                    	</div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>