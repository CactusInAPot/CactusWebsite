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

//Detect what user input.
//echo ("User has typed in: ".$username." for username and ".$password." for password.<br/>");

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
	//User did not fill in username or password.
	if (empty($username) || empty($password)) {
		$ErrorMessage = ("You not enter username or password<br/>");  
		$Error=1;
	} 

	//If there is no error from above we can start searching from database.
	else {
		//md5 of password.
		$passcript = md5 ($password);
		//Select everything with username matching the user input.
		$user = pg_query("SELECT * FROM tb_user WHERE mid='$username'"); 
		//Check if sql works.
		if ($user) {
			//Output the results from $user.
			$row_user = pg_fetch_assoc($user);
			//Output number of results from $user.
			$totalRows_user = pg_num_rows($user);
			//Found one or more account(s) matching the username the user has typed.
			if ($totalRows_user > 0){
				$ErrorMessgae = ($username." exist.<br/>");
				//echo("Checking if the password match with the password the user has typed.<br/>");
				//Check if password match.
				if ($row_user['pwd'] == $passcript) {
					//echo("Password matched. Login Success.<br/>");
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
					
					//Back to index.php
					header('Location: /index.php');
					die();
				} else {
					$ErrorMessage = ("Incorrect password<br/>");
					//echo("ERROR: ".$row_user['password']." not equals to ".$password);
					$Error=4;
				}
			} else {
				$ErrorMessage = ("Unable to find username: ".$username."<br/>");
				//echo("ERROR: ".$totalRows_user." > 0");
				$Error=3;
			}
		} else {
			$ErrorMessage = ("Unable to connect to server<br/>");
			$Error=2;
		}

	}
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
                        <div class ="form-group">
                        	<?php 
							if ($Error == 0) { 
								echo(
									"Username: <input type='text' name='username' value='$user_mid' class='form-input' disabled><br/>
                       				Password: (<a href='edit.php'>Change password?</a>)<input type='password' name='password' value='$user_password' class='form-input' disabled><br/>
                       				md5 password: <input type='password' name='pwd' value='$user_pwd' class='form-input' disabled><br/>
                       				AP: ");
								
								//Topup feature will realease after 14th Jun 2019 00:00 GMT+8
								$dt = time();
								if ($dt >= 1560418688) {
									echo ("(<a href='topup.php'>Donate!</a>)");
								}/* else {
									echo ("(距離開放點數填充功能還有：".(1560441600 - $dt)." 秒)");
								}*/
								
								echo ("<input type='text' name='pvalues' value='$user_pvalues'' class='form-input' disabled><br/>"
								);
								
							} else { 
								echo("Error code:: ".$Error."<br/>".$ErrorMessage."<br/><p></p>Redirent to home page in 5 secs");
								header( "refresh:5;url=index.php" );
							} 
							?>
                        </div>
                    	<div class="loginhere">
                       		<?php 
							if ($Error == 0) { 
								echo("<a href='logout.php' style='text-decoration: none; color: black;'>--Log Out--</a><br/><p></p>");	
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