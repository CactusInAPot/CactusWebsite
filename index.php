<?php
//Start session.
session_start();

$login = 0;

if ( isset( $_SESSION[ "username" ] ) ) {
	$login = 1;
	$name = $_SESSION[ "username" ];
}

//Set server status manually here
$server_status = true;

?>
<html>

<head>
	<meta charset="UTF-8">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="stylesheet" href="fonts/honyaJi-re/css/stylesheet.css" type="text/css" charset="utf-8"/>
	<link rel="stylesheet" href="fonts/setofont/css/stylesheet.css" type="text/css" charset="utf-8"/>
	<link rel="shortcut icon" href="https://s.aeriastatic.com/files/edeneternal/image/e/ee_favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<title>Eden Eternal Online -
		<?php if ($login == 1) { echo ($name);} else { echo (notaura.com);} ?>
	</title>
	<style>
		html,
		body {
			font-family: 'setofont', 'honyaji-reregular' !important;
		}
		
		@media (max-width:600px) {
			html,
			body {
				background: url("/images/signup-bg-dark.jpg") no-repeat center center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
		}
		
		@media (max-width:992px) and (min-width:601px) {
			html,
			body {
				background: url("/images/signup-bg-dark.jpg") no-repeat center center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
		}
		
		* {
			box-sizing: border-box;
		}
		
		.video-background {
			background: #000;
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			z-index: -99;
		}
		
		.video-foreground,
		.video-background iframe {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			pointer-events: none;
		}
		
		#vidtop-content {
			top: 0;
			color: #fff;
		}
		
		.vid-info {
			position: absolute;
			top: 0;
			right: 0;
			width: 33%;
			background: rgba(0, 0, 0, 0.3);
			color: #fff;
			padding: 1rem;
			font-family: Avenir, Helvetica, sans-serif;
		}
		
		.vid-info h1 {
			font-size: 2rem;
			font-weight: 700;
			margin-top: 0;
			line-height: 1.2;
		}
		
		.vid-info input[type=text],
		input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		
		.vid-info button {
			color: #fff;
			background: rgba(0, 0, 0, 0.5);
			border: none;
			cursor: pointer;
			padding: 14px 20px;
			margin: 8px 0;
			width: 100%;
			text-align: center;
		}
		
		.vid-info button:hover {
			opacity: 0.8;
		}
		
		@media (min-aspect-ratio: 16/9) {
			.video-foreground {
				height: 300%;
				top: -100%;
			}
		}
		
		@media (max-aspect-ratio: 16/9) {
			.video-foreground {
				width: 300%;
				left: -100%;
			}
		}
		
		@media all and (max-width: 600px) {
			.vid-info {
				width: 50%;
				padding: .5rem;
			}
			.vid-info h1 {
				margin-bottom: .2rem;
			}
		}
		
		@media all and (max-width: 500px) {
			.vid-info .acronym {
				display: none;
			}
		}
		
		::placeholder {
			color: white;
			opacity: 1;
			/* Firefox */
		}
		
		:-ms-input-placeholder {
			/* Internet Explorer 10-11 */
			color: white;
		}
		
		::-ms-input-placeholder {
			/* Microsoft Edge */
			color: white;
		}
		
		#phonetop-content {
			color: #fff;
		}
		
		.phone-info {
			position: absolute;
			width: 100%;
			background: rgba(0, 0, 0, 0.3);
			color: #fff;
			padding: 1rem;
			font-family: Avenir, Helvetica, sans-serif;
		}
		
		.phone-info button {
			color: #fff;
			background: rgba(0, 0, 0, 0.5);
			border: none;
			cursor: pointer;
			padding: 5% 20px;
			margin: 8px 0;
			width: 100%;
			text-align: cover;
			font-size: 150%;
		}
		
		.phone-info button:hover {
			opacity: 0.8;
		}
		/* The side navigation menu */
		
		.sidenav {
			height: 100%;
			/* 100% Full-height */
			width: 0;
			/* 0 width - change this with JavaScript */
			position: fixed;
			/* Stay in place */
			z-index: 1;
			/* Stay on top */
			top: 0;
			/* Stay at the top */
			left: 0;
			background: rgba(0, 0, 0, 0.3);
			/* Black*/
			overflow-x: hidden;
			/* Disable horizontal scroll */
			padding-top: 60px;
			/* Place content 60px from the top */
			transition: 0.5s;
			/* 0.5 second transition effect to slide in the sidenav */
		}
		/* The navigation menu links */
		
		.sidenav a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}
		/* When you mouse over the navigation links, change their color */
		
		.sidenav a:hover {
			color: #f1f1f1;
		}
		/* Position and style the close button (top right corner) */
		
		.sidenav .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}
		/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
		
		#main {
			transition: margin-left .5s;
			padding: 20px;
		}
		/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
		
		@media screen and (max-height: 450px) {
			.sidenav {
				padding-top: 15px;
			}
			.sidenav a {
				font-size: 18px;
			}
		}
		
		.icon-btn i {
			cursor: pointer;
		}
		
		.login-container button[type=submit],
		.register-container button[type=submit],
		.download-container button[type=submit] {
			width: 100%;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			-o-border-radius: 5px;
			-ms-border-radius: 5px;
			padding: 17px 20px;
			box-sizing: border-box;
			font-size: 14px;
			font-weight: 700;
			color: #fff;
			text-transform: uppercase;
			border: none;
			background-image: -moz-linear-gradient(to left, #404040, #303030, #404040);
			background-image: -ms-linear-gradient(to left, #404040, #303030, #404040);
			background-image: -o-linear-gradient(to left, #404040, #303030, #404040);
			background-image: -webkit-linear-gradient(to left, #404040, #303030, #404040);
			background-image: linear-gradient(to left, #404040, #303030, #404040);
		}
		/* Full-width input fields */
		
		.login-container input[type=text],
		.login-container input[type=password],
		.register-container input[type=text],
		.register-container input[type=password],
		.download-container input[type=text],
		.download-container input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			background-color: rgba(0, 0, 0, 0);
			border: none;
			border-bottom: 2px solid #fff;
			color: white;
			box-sizing: border-box;
		}
		
		.login-container input[type=text]::placeholder,
		.login-container input[type=password]::placeholder,
		.register-container input[type=text]::placeholder,
		.register-container input[type=password]::placeholder,
		.download-container input[type=text]::placeholder,
		.download-container input[type=password]::placeholder {
			color: transparent;
			text-shadow: 0 0 0 white;
		}
		/* Set a style for all buttons */
		
		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}
		
		button:hover {
			opacity: 0.8;
		}
		/* Extra styles for the cancel button */
		
		.cancelbtn {
			width: auto;
			padding: 10px 18px;
			background-color: #f44336;
		}
		/* Center the image and position the close button */
		
		.imgcontainer {
			text-align: center;
			margin: 24px 0 12px 0;
			position: relative;
		}
		
		img.avatar {
			width: 15%;
			border-radius: 50%;
		}
		
		.container {
			padding: 16px;
		}
		
		span.psw {
			float: right;
			padding-top: 16px;
		}
		/* The Modal (background) */
		
		.modal {
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 1;
			/* Sit on top */
			left: 25%;
			top: 10%;
			width: 40%;
			/* Full width */
			height: 80%;
			/* Full height */
			overflow: hidden;
			/* Enable scroll if needed */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.6);
			/* Black w/ opacity */
			/*background: rgba(255,255,255,0.4)*/
			background-repeat: no-repeat;
			background-position: center center;
			background-attachment: fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			padding-top: 60px;
			border: 1px solid rgba(255, 255, 255, 0.4);
			color: #fff;
		}
		/* Modal Content/Box */
		
		.modal-content {
			background-color: #fefefe;
			margin: 5% auto 15% auto;
			/* 5% from the top, 15% from the bottom and centered */
			border: 1px solid #888;
			width: 10%;
			/* Could be more or less, depending on screen size */
		}
		/* The Close Button (x) */
		
		.close {
			position: absolute;
			right: 25px;
			top: 0;
			color: #000;
			font-size: 35px;
			font-weight: bold;
		}
		
		.close:hover,
		.close:focus {
			color: red;
			cursor: pointer;
		}
		/* Add Zoom Animation */
		
		.animate {
			-webkit-animation: animatezoom 0.6s;
			animation: animatezoom 0.6s
		}
		
		@-webkit-keyframes animatezoom {
			from {
				-webkit-transform: scale(0)
			}
			to {
				-webkit-transform: scale(1)
			}
		}
		
		@keyframes animatezoom {
			from {
				transform: scale(0)
			}
			to {
				transform: scale(1)
			}
		}
		/* Change styles for span and cancel button on extra small screens */
		
		@media screen and (max-width: 300px) {
			span.psw {
				display: block;
				float: none;
			}
			.cancelbtn {
				width: 100%;
			}
		}
		
		#newsDiv {
			padding-left: 5%;
			padding-right: 5%;
			width: 100%;
			overflow: hidden;
		}
		
		#newsDiv {
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}
		
		#newsIframe {
			overflow: auto;
			width: 110%;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}
		/* Slideshow */
		
		#stage {
			margin: 0em auto;
			width: 100vw;
			height: 100vh;
			background: black;
			z-index: -1;
		}
		
		#stage a {
			position: absolute;
		}
		
		#stage a img {
			padding: 0px;
			border: 0px solid #ccc;
			background: #fff;
			width: 100vw;
			height: 100vh;
			object-fit: cover; 
		}
		
		#stage a:nth-of-type(1) {
			animation-name: fader;
			animation-delay: 4s;
			animation-duration: 1s;
			z-index: 20;
		}
		
		#stage a:nth-of-type(2) {
			z-index: 10;
		}
		
		#stage a:nth-of-type(n+3) {
			display: none;
		}
		
		@keyframes fader {
			from {
				opacity: 1.0;
			}
			to {
				opacity: 0.0;
			}
		}
	</style>
</head>

<body>
	<!-- <div class="video-background w3-hide-medium w3-hide-small">
		<div class="video-foreground w3-hide-medium w3-hide-small">
			<iframe src="https://www.youtube.com/embed/yEYHQX0Cn6k?controls=0&showinfo=0&rel=0&mute=1&autoplay=1&loop=1&playlist=yEYHQX0Cn6k" frameborder="0" allow="autoplay; fullscreen"></iframe>
		</div>
	</div> -->

	<!-- Automatic Slideshow Images -->
	<div id="stage" class="mySlides w3-display-container w3-hide-medium w3-hide-small">
		<a>
			<div style="position: absolute; width: 100vw; height: 100vh; background:  radial-gradient(rgba(0,0,0,0), rgba(0,0,0,0.5));">
				&nbsp;
			</div>
			<img src="/images/bgs/bg1.jpg" width="100vw" height="100vh" style="object-fit: cover;">
		</a>
		<a>
			<div style="position: absolute; width: 100vw; height: 100vh; background:  radial-gradient(rgba(0,0,0,0), rgba(0,0,0,0.5));">
				&nbsp;
			</div>
			<img src="/images/bgs/bg2.jpg" width="100vw" height="100vh"  style="object-fit: cover;">
		</a>
		<a>
			<div style="position: absolute; width: 100vw; height: 100vh; background:  radial-gradient(rgba(0,0,0,0), rgba(0,0,0,0.5));">
				&nbsp;
			</div>
			<img src="/images/bgs/bg3.jpg" width="100vw" height="100vh"  style="object-fit: cover;">
		</a>
	</div>

	<div id="mySidenav" class="sidenav w3-hide-medium w3-hide-small">
		<div style="padding-left: 5%; padding-right: 5%;">
			<p style="margin-bottom: 20%;"></p>
			<iframe src="https://canary.discordapp.com/widget?id=612277823805194250&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
		</div>
	</div>

	<div id="mySidenav2" class="sidenav w3-hide-medium w3-hide-small">
		<div id="newsDiv">
			<iframe src="news.php" width="100%" height="100%" allowtransparency="true" id="newsIframe" frameborder="0"></iframe>
		</div>
	</div>

	<div id="myLogin" class="modal login-container animate">
		<form action='user.php' method='post' name='form' target='_self' id='form' class='login-container'>
			<div class="imgcontainer login-container">
				<!-- <span onclick="document.getElementById('myLogin').style.display='none'" class="close" title="Close Modal">&times;</span> -->
				<!-- <img src="images/loli.gif" alt="Avatar" class="avatar login-container"> -->
			</div>

			<div class="container login-container">
				<label for='username' class="login-container"><b class="login-container">Username</b></label>
				<input class='login-container' type='text' placeholder='👤 Enter username' name='username' maxlength='15' pattern='[a-z0-9]{0,}' title='The username cannot exceed fifteen characters, and the characters can only contain English lowercase or numbers.' required>
				<p></p>
				<label for='password' class="login-container"><b class="login-container">Password</b></label>
				<input class='login-container' type='password' placeholder='🔒 Enter Password' name='password' maxlength='15' pattern='[a-z0-9]{0,}' title='The password cannot exceed fifteen characters, and the characters can only contain English lowercase or numbers.' required>
				<p></p>
				<button type="submit" class="login-container">Submit</button>
				<label class="login-container">
					<!-- <a href='register.php' class="login-container"><b class="login-container">還未有帳號？請註冊</b></a-> -->
				</label>
			





			</div>

			<div class="container login-container">
				<!-- <button type="button" onclick="document.getElementById('myLogin').style.display='none'" class="cancelbtn">取消</button> -->
				<!-- <span class="psw login-container"><a href="#" class="login-container">忘記密碼？</a></span> -->
			</div>
		</form>
	</div>

	<div id="myRegister" class="modal register-container animate">
		<form action='cad.php' method='post' name='form' target='_self' id='form' class='register-container'>
			<div class="imgcontainer register-container">
				<!-- <span onclick="document.getElementById('myRegister').style.display='none'" class="close" title="Close Modal">&times;</span> -->
				<!-- <img src="images/loli.gif" alt="Avatar" class="avatar register-container"> -->
			</div>

			<div class="container register-container">
				<label for='username' class="register-container"><b class="register-container">Username</b></label>
				<input class='register-container' type='text' placeholder='👤 Enter Username' name='username' maxlength='15' pattern='[a-z0-9]{0,}' title='The username cannot exceed fifteen characters, and the characters can only contain English lowercase or numbers.' required>
				<p></p>
				<label for='password' class="register-container"><b class="register-container">Password</b></label>
				<input class='register-container' type='password' placeholder='🔒 Enter Password' name='password' maxlength='15' pattern='[a-z0-9]{0,}' title='The password cannot exceed fifteen characters, and the characters can only contain English lowercase or numbers.' required>
				<p></p>
				<label for='confirm_password' class="register-container"><b class="register-container">Repeat password</b></label>
				<input class='register-container' type='password' placeholder='🔒 Repeat Password' name='confirm_password' maxlength='15' pattern='[a-z0-9]{0,}' title='The confirmation password cannot exceed fifteen characters, and the characters can only contain English lowercase or numbers.' required>
				<p></p>
				<!-- <input type="checkbox" name="agree-term" id="agree-term" class="agree-term register-container" /> -->
				<!-- <label for="agree-term" class="label-agree-term register-container"><span class="register-container"><span class="register-container"></span></span>我同意<a href="https://youtu.be/siq9nztoP2c?t=13" class="term-service register-container"><b>蘿莉條款</b></a></label> -->
				<p></p>
				<center>
					<div class="g-recaptcha" data-theme="dark" data-sitekey="6LcQH6cUAAAAAP-8XHJ6Uy7DshoiMIoqMiHS5pr1"></div>
				</center>
				<button type="submit" class="register-container">Sumbit</button>
				<label class="register-container">
				  <!-- <a href='register.php' class="register-container"><b class="register-container">還未有帳號？請註冊</b></a-> -->
			  </label>
			





			</div>

			<div class="container register-container">
				<!-- <button type="button" onclick="document.getElementById('myRegister').style.display='none'" class="cancelbtn">取消</button> -->
				<!-- <span class="psw register-container"><a href="#" class="register-container">忘記密碼？</a></span> -->
			</div>
		</form>
	</div>

	<div id="myDownload" class="modal download-container animate">
		<div class="imgcontainer download-container">
			<!-- <span onclick="document.getElementById('myDownload').style.display='none'" class="close" title="Close Modal">&times;</span> -->
			<!-- <img src="images/loli.gif" alt="Avatar" class="avatar download-container"> -->
		</div>

		<div class="container download-container">
			<label for='username' class="download-container"><b class="download-container"></b></label>
			<p></p>
			<label for='password' class="download-container"><b class="download-container">Client V1.00 2019/10/15</b></label>
			<p></p>
			<button type="submit" class="download-container" onclick="goto(6)">Download(120GB)</button>
			<!-- Change the file size here. -->
			<label class="download-container">
				  <!-- <a href='register.php' class="download-container"><b class="download-container">還未有帳號？請註冊</b></a-> -->
			  </label>
		





		</div>

		<div class="container download-container">
			<!-- <button type="button" onclick="document.getElementById('myRegister').style.display='none'" class="cancelbtn">取消</button> -->
			<span class="psw download-container"><a href="download.php" class="download-container">More download links>></a></span>
		</div>
	</div>

	<div id="vidtop-content w3-hide-medium w3-hide-small">
		<div class="vid-info w3-hide-medium w3-hide-small" style="text-align: center; height: 100%;">
			<a href="index.php" target="_self"><img src='images/logo-light.png' style='margin-bottom: 15%;'></a>
			<p></p>
			<table style="color: white;">
				<tr>
					<td>
						<b>Server Status：
							<label style="text-shadow: 1px 1px #000; color: <?php if ($server_status) { echo ("lightgreen"); } else { echo ("orange"); }?>;">
								<?php if ($server_status) { echo ("Online"); } else { echo ("Offline"); }?>
							</label>
						</b>
					</td>
				</tr>
			</table>
			<?php

			if ( $login == 0 ) {
				echo( "
						<button onclick='openNav(2)'><b>News</b></button>
						<p>
						<button id='login' onclick='openLogin()'><b>Login</b></button>
						<p>
						<button id='register' onclick='openRegister()'><b>Register</b></button>
						<p>
						<button id='download' onclick='openDownload()'><b>Download</b></button>
						<div style='position: absolute; bottom: 20px; width: 92.5%;'>
							<label style='font-size: 10px;'>Maintainer: NotAura.</label>
							<hr>
							<div class='icon-btn' style='font-size: 24px;'>
								<i onclick='openNav(1)' class='fab fa-discord' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
								<i class='fab fa-facebook-square' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
								<i class='fab fa-instagram' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
								<i class='fab fa-twitter-square' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
								<i class='fab fa-google-plus-square' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
							</div>
						</div>
					" );
			} else {
				echo( "
						<button onclick='openNav(2)'><b>News</b></button>
						<p>
						<button onclick='goto(1)'><b>" . $name . "</b></button>
						<p>
						<button onclick='goto(3)'><b>Log out</b></button>
						<p>
						<button id='download' onclick='openDownload()'><b>Download</b></button>
						<div style='position: absolute; bottom: 20px; width: 92.5%;'>
							<label style='font-size: 10px;'>Maintainer: NotAura.</label>
							<hr>
							<div class='icon-btn' style='font-size: 24px;'>
								<i onclick='openNav(1)' class='fab fa-discord' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
								<i class='fab fa-facebook-square' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
								<i class='fab fa-instagram' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
								<i class='fab fa-twitter-square' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
								<i class='fab fa-google-plus-square' style='margin-left: 2.5%; margin-right: 2.5%;'></i>
							</div>
						</div>
					" );
			}

			?>

		</div>
	</div>
	<div class="w3-hide-large" id="phonetop-content" style="text-align: center; height: 100%;">
		<div class="phone-info w3-hide-large" style="text-align: center; height: 100%;">
			<img src="images/logo-light.png" width="50%">
			<p></p>
			<iframe src="http://google.com" width="75%" height="25%" frameborder="0" style="margin-top: 5%; margin-bottom: 5%;" allowfullscreen></iframe>
			<button type="button" onclick="location.href='/news.php';"><b>News</b>
			<button type="button" onclick="alert('Theres no guides yet');"><b>Guides</b>
  			<button type="button" onclick="alert('Soon');">Login</b>
  			<button type="button" onclick="location.href='/register.php';">Register</b>
  			<button type="button" onclick="location.href='/download.php';">Download</b>
  			<button type="button" onclick="location.href='https://discord.gg/uhzWeDb';">Discord</b>
		</div>
	</div>
	<script>
		// Automatic Slideshow
		window.addEventListener("DOMContentLoaded", function(e) {

			var stage = document.getElementById("stage");
			var fadeComplete = function(e) { stage.appendChild(arr[0]); };
			var arr = stage.getElementsByTagName("a");
			for(var i=0; i < arr.length; i++) {
			  arr[i].addEventListener("animationend", fadeComplete, false);
			}

	  	}, false);
		
		function goto(num) {
			if (num == 1) {
				location.replace("/user.php");
			} else if (num == 2) {
				window.open("https://google.com"); /* Change the new client link here. */
			} else if (num == 3) {
				location.replace("/logout.php");
			} else if (num == 4) {
				location.replace("/register.php");
			} else if (num == 5) {
				location.replace("/news.php");
			} else if (num == 6) {
				window.open("https://google.com/link6"); /* Put your new updated files link here */
			} else if (num == 7) {
				window.open("https://google.com/link7")
			} else {
				location.replace("#");
			}
		}
		/* Set the width of the side navigation to 250px */
		function openNav(num) {
			if (num == 1) {
				document.getElementById("mySidenav").style.width = "500px";
			} else if (num == 2) {
				document.getElementById("mySidenav2").style.width = "500px";
			}
		}

		/* Set the width of the side navigation to 0 */
		function closeNav(num) {
			if (num == 1) {
				document.getElementById("mySidenav").style.width = "0px";
			} else if (num == 2) {
				document.getElementById("mySidenav2").style.width = "0px";
			}
		}
			
		function openLogin() {
			document.getElementById('myLogin').style.display='block';
		}
			
		function openRegister() {
			document.getElementById('myRegister').style.display='block';
		}
			
		var hideMe = document.getElementById('mySidenav');
			
		window.addEventListener('click', function(event) {
			if(event.target.id !== 'mySidenav'){
				if(hideMe.offsetWidth > 0){
					closeNav(1);
				}
			}
		});
			
		var hideMe2 = document.getElementById('mySidenav2');
			
		window.addEventListener('click', function(event) {
			if(event.target.id !== 'mySidenav2'){
				if(hideMe2.offsetWidth > 0){
					closeNav(2);
				}
			}
		});
			
		var loginModal = document.getElementById('myLogin');

		window.addEventListener('click', function(event) {
			if (event.target.id == 'login') {
				loginModal.style.display = 'block';
			} else if (!event.target.classList.contains('login-container')) {
				loginModal.style.display = 'none';
			}
		});	
			
		var registerModal = document.getElementById('myRegister');

		window.addEventListener('click', function(event) {
			if (event.target.id == 'register') {
				registerModal.style.display = 'block';
			} else if (!event.target.classList.contains('register-container')) {
				registerModal.style.display = 'none';
			}
		});	
			
		var downloadModal = document.getElementById('myDownload');

		window.addEventListener('click', function(event) {
			if (event.target.id == 'download') {
				downloadModal.style.display = 'block';
			} else if (!event.target.classList.contains('download-container')) {
				downloadModal.style.display = 'none';
			}
		});	
	</script>
	</body>
</html>