
<html lang="en">

<head>
	<link rel="stylesheet" href="fonts/honyaJi-re/css/stylesheet.css" type="text/css" charset="utf-8"/>
	<link rel="stylesheet" href="fonts/setofont/css/stylesheet.css" type="text/css" charset="utf-8"/>
	<link rel="shortcut icon" href="https://s.aeriastatic.com/files/edeneternal/image/e/ee_favicon.ico" type="image/x-icon"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Eden Eternal Online -
		<?php if ($Error == 0) { echo($user_mid."(Online)");;} else { echo($ErrorMessage);} ?>
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
								echo($Message."<br/><p></p>ERROR");
								header( "refresh:5;url=index.php" );
							} else { 
								echo("ERROR CODE: ".$Error."<br/>".$ErrorMessage."<br/><p></p>Redirect to homepage in 5 secs");
								header( "refresh:5;url=index.php" );
							} 
							?>
					</div>
					<div class="loginhere">
						<a href='index.php' style='text-decoration: none; color: black;'>--HOME--</a>
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