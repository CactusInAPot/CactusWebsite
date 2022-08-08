<?php
//Start session.
session_start();

$login = 0;

//Check if user already logged in.
if (isset($_SESSION["username"])) { 
	$login = 1;
	$name = $_SESSION["username"];
}

//Create connection.
$connn = pg_connect("host=HOST dbname=fnmember user=postgres password=PASSWORD port=5432"); 
//Username & Password.
$username = isset($_POST['username']) ? $_POST['username'] : ''; 
$password = isset($_POST['password']) ? $_POST['password'] : ''; 
//Set Variable
$Error = 0;
$ErrorMessgae = "";

//If the user has login already
if ($login == 1) {
	//Select everything with username mating the user input.
	$user = pg_query("SELECT * FROM tb_user WHERE mid='$name'"); 
	//Check if sql works.
	if ($user) {
		//Output the results from $user.
		$row_user = pg_fetch_assoc($user);
		//Output number of results from $user.
		$totalRows_user = pg_num_rows($user);
		
		$user_mid = $row_user['mid'];
		$user_password = $row_user['password'];
		$user_pwd = $row_user['pwd'];
		$user_idnum = $row_user['idnum'];
		$user_byauthority = $row_user['byauthority'];
		$user_pvalues = $row_user['pvalues'];
		$user_firstlogindate = $row_user['firstlogindate'];
		$user_billingrule = $row_user['billingrule'];
		$user_status = $row_user['status'];
		$user_regdate = $row_user['regdate'];
		$user_lastlogindate = $row_user['lastlogindate'];
		$user_memberid = $row_user['memberid'];
		$user_clientip = $row_user['clientip'];
		$user_updatetime = $row_user['updatetime'];
		$user_bonus = $row_user['bonus'];
		$user_char_id = $row_user['char_id'];
		$user_sel_chk = $row_user['sel_chk'];

		//Handle sesssion
		$_SESSION["username"] = $user_mid;
		
	} else {
		$ErrorMessage = ("Unable to connect to server<br/>");
		$Error=2;
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
    <title>Eden Eternal Online - <?php if ($Error == 0) { echo($user_mid."(Online)");;} else { echo($ErrorMessage);} ?></title>

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
								echo(
									"<center><b style='font-size: 24px;'>Change password</b></center><br/><p></p>
									<form action='changePass.php' method='post' name='form' target='_self' id='form'>
									Old password: <input type='password' name='password' value='$user_password' disabled><br/>
									New password: <input type='password' class='form-input' name='new_password' id='new_password' placeholder='Enter new password' value='' >
									<span toggle='#passs' class='zmdi zmdi-eye field-icon toggle-password'></span><br/>
									Confirm the new password: <input type='password' class='form-input' name='confirm_password' id='confirm_password' placeholder='Confirm the new password' value='' >
									<span toggle='#passs' class='zmdi zmdi-eye field-icon toggle-password'></span><br/>
									<p style='margin-bottom: 10%;'></p>
									<button type='submit' name='submit' id='submit' class='form-submit' value='Submit' style='cursor: pointer;'><b>Submit</b></button>
									</form>"
								);
							} else { 
								echo("Error。<br/><p></p>Return to the homepage after five seconds");
								header( "refresh:5;url=index.php" );
							} 
							?>
                        </div>
                    	<div class="loginhere">
                       		<?php 
							if ($Error == 0) { 
								echo("<a href='javascript:history.back()' style='text-decoration: none; color: black;'>--Back--</a><br/><p></p>");	
								echo("<a href='index.php' style='text-decoration: none; color: black;'>--Home--</a>");
							} else { 
								echo("<a href='index.php' style='text-decoration: none; color: black;'>--Home--</a>");
							} 
							?>
                        	
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