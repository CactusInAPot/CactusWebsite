<?php
//Start session.
session_start();

$login = 0;

//Check if user already logged in.
if (isset($_SESSION["username"])) { 
	$login = 1;
	$name = $_SESSION["username"];
}
?>
<html>
	<head>
 		<link rel="stylesheet" href="fonts/honyaJi-re/css/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="fonts/setofont/css/stylesheet.css" type="text/css" charset="utf-8" />
	 	<link rel="shortcut icon" href="https://s.aeriastatic.com/files/edeneternal/image/e/ee_favicon.ico" type="image/x-icon" />
	 	<meta charset="UTF-8">
		 <title>Eden Eternal Online - Download</title> 
		 <style>
			 html, body {
				 margin: 0;
				 padding: 0;
				 height: 100%;
				 background: url("/images/signup-bg-dark.jpg") no-repeat center center fixed;
				 -webkit-background-size: cover;
  				 -moz-background-size: cover;
  				 -o-background-size: cover;
				 background-size: cover;
			}
			 div {
				 outline: 1px soild;
			 }
			 #Content {
				 height: 100vh;
				 width: 50%; 
				 margin-left: 10%; 
				 margin-right: 10%; 
				 padding-bottom: 10%;
				 padding-left: 15%;
				 padding-right: 15%;
				 padding-top: 2.5%;
				 background: rgba(255,255,255,0.75);
				 border-radius: 2%;
			 }
			 #Footer {
				 position: absolute; 
				 bottom: 0; 
				 width: 100%; 
				 height: 100px; 
				 background: black;
			 }
			 .gm-title {
				 color: #BA55D3;
			 }
			 .box {
				 background: rgba(0,0,0,0.75); 
				 padding: 5%; 
				 margin-bottom: 5%; 
				 border-radius: 1%;
			 }
			 .box table tr td {
				 color: white;
			 }
		</style>
	</head>
	<body>
		<div style="min-height: 100%; position: relative;">
			<div style="text-align: center; margin-top: 2.5%; margin-bottom: 2.5%;">
				<img src="images/logo-light.png">
			</div>
			<div id="Content">
				<div>
					<table border="0" height="100%" width="100%;">
						<tr height="80%;">
							<td style="vertical-align: top;">
								<div>
									<center><b style="font-size: 24px;">Download links</b></center><br/><p></p>
									<div class="box">
										<table style="width: 80%;" border="0">
											<tr style="height: 30px;">
												<td>
													<img src="images/new.gif" style="height: 25px;">
												</td>
												<td>
													[2019/10/15] <a href="https://google.com" target="new" style="text-decoration: none; color: orange;">eden-eternal-pre---release-1.00.zip</a> <label>(120GB)</label> <!-- Change the new client file link and the size here. -->
												</td>
											</tr>
											<tr style="height: 30px;">
												<td>
													&nbsp;
												</td>
												<td>
													&nbsp;
												</td>
											</tr>
										</table>
									</div>
								</div>
							</td>
						</tr>
						<tr height="10%">
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td height="10%">
							<div style="text-align: center;">
								<?php 
									if ($Login == 1) { 
										echo("<a href='logout.php' style='text-decoration: none; color: black;'>--Log Out--</a><br/><p></p>");	
										echo("<a href='index.php' style='text-decoration: none; color: black;'>--Home--</a>");
									} else { 
										echo("<a href='index.php' style='text-decoration: none; color: black;'>--Home--</a>");
									} 
								?>
							</div>
								
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div id="Footer">
				<div style="height: 100%; position:relative;">
					<div style="margin: 0; position: absolute; top: 35%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, 50%);">
						<label style="font-size: 14px; color: white;">Maintainer: NotAura.</label>
				  	</div>
				</div>
			</div>
		</div>
		
		<script>
		
		window.onload = function() {
			var body = document.body,
				html = document.documentElement;

			var height = Math.max(body.scrollHeight, body.offsetHeight,
								 html.clientHeight, html.scrollHeight, html.offsetHeight);

			var content = document.getElementById("Content");
			
			content.style.height = height;
		}
			
		
		</script>
	</body> 
</html>