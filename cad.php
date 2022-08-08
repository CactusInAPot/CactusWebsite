<?php
$connn = pg_connect( "host=HOST	 dbname=fnaccount user=postgres password=PASSWORD port=5432" );
$login = isset( $_POST[ 'username' ] ) ? $_POST[ 'username' ] : '';
$passs = isset( $_POST[ 'password' ] ) ? $_POST[ 'password' ] : '';
$cpasss = isset( $_POST[ 'confirm_password' ] ) ? $_POST[ 'confirm_password' ] : '';
$passcript = md5( $passs );
$Error = 0;
$Message = "";
$ErrorMessage = "";
$login_username_check = pg_query( "SELECT username FROM accounts WHERE username='$login'" );
$username_check = pg_num_rows( $login_username_check );

$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
		'secret' => '6LcQH6cUAAAAAHgp3tVawMkXW8UXWXJCeXU12GvE',
		'response' => $_POST["g-recaptcha-response"]
);

$options = array(
	'http' => array (
		'method' => 'POST',
		'content' => http_build_query($data)
	)
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);

if ($captcha_success->success==false) {
	$ErrorMessage = "Please confirm that you are not a robot<br/>";
	$Error = 8;
}

if ( empty( $login ) || empty( $passs ) ) {
	$ErrorMessage = "Please fill in the account number and password<br/>";
	$Error = 1;
	$find_empty = array( $login, $passs );
	$i = 0;
} elseif ( ( $username_check > 0 ) ) {
	//echo "<center><h1>Please correct the following errors: <br />"; 
	if ( $username_check > 0 ) {
		$ErrorMessage = "Your account has been registered<br/>";
		$Error = 1;
	}
}
elseif ( $passs != $passs ) {
	//echo "<center><h1>The passwords you entered are not identical. <br>Enter the same password in the 2 fields.</center></h1>";  
	$ErrorMessage = "Inconsistent password<br/>";
	$Error = 1;
}
elseif ( $passs != $cpasss ) {
	$ErrorMessage = "Inconsistent password and confirmation password<br/>".$passs." and ".$cpasss." = ".( $passs != $cpasss )."<br/>";
	$Error = 7;
}
if ( $Error < 1 ) {
	$id_last = pg_query( "SELECT id FROM accounts ORDER BY id DESC" );
	$id_result = pg_fetch_array( $id_last );
	$id_last = $id_result[ "id" ] + 1;
	//echo "$id_last";
	$sql = pg_query( "INSERT INTO accounts (id,username,password) VALUES ('$id_last','$login','$passs')" );
	$connn = pg_connect( "host=HOST dbname=fnmember user=postgres password=PASSWORD port=5432" );
	$sql2 = pg_query( "INSERT INTO tb_user (mid,password,pwd,pvalues) VALUES ('$login','$passs','$passcript','100000')" );
	if ( $sql == TRUE ) {
		$Message = "Registration is successful! Play more than buried unlimited points";
	} else {
		$ErrorMessage = "registration failed";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="https://s.aeriastatic.com/files/edeneternal/image/e/ee_favicon.ico" type="image/x-icon"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Eden Eternal Online -
		<?php if ($Error == 0) { echo("registration success");;} else { echo($ErrorMessage);} ?>
	</title>

	<!-- Font Icon -->
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		.form-group input[type=text],
		input[type=password] {
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
								echo($Message."<br/>");
							} else { 
								echo("Error code: ".$Error."0<br/>".$ErrorMessage."<br/>");
							} 
							echo("<p></p>Return to the homepage after five seconds");
							header( "refresh:5;url=index.php" );
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
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>