<?php
//Start session.
session_start();

$login = 0;

//Check if user already logged in.
if (isset($_SESSION["username"])) { 
	$login = 1;
	$name = $_SESSION["username"];
}

//Initialize variables.
$Error = 0;
$ErrorMessage = "";
$message = "";

//Check if message exist.
if ((isset($_POST['author'])) && (isset($_POST['date'])) && (isset($_POST['time'])) && (isset($_POST['msg']))) {
	$author = $_POST['author'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$message = $_POST['msg'];
} else {
	$Error = 5;
	$ErrorMessage = "You not have access to this page :( <br/>";
}
?>
<html>
	<head>
 		<link rel="stylesheet" href="fonts/honyaJi-re/css/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="fonts/setofont/css/stylesheet.css" type="text/css" charset="utf-8" />
	 	<link rel="shortcut icon" href="https://s.aeriastatic.com/files/edeneternal/image/e/ee_favicon.ico" type="image/x-icon" />
	 	<meta charset="UTF-8">
		 <title>Eden Eternal Online - News</title> 
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
			 .player-title {
				 color: white;
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
			 .list-item {
				 display: block;
				 float: left;
				 margin-bottom: 1%;
				 margin-right: 5%;
			 }
			 .list-item img {
				 vertical-align: middle;
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
									<center><b style="font-size: 24px;">News</b></center><br/><p></p>
									<div class="box">
										<table style="width: 80%; word-wrap:break-word; table-layout: fixed;" border="0">
											<tr>
												<td style="width: 15%;">
													<div style="text-align: center;">
														
															<?php 
																  if ($Error == 0) { 
																	  echo ("<img src='");
																	  if ($author == "NotAura") {
																		  echo ("https://cdn.discordapp.com/avatars/309750128187801601/a567737a94fda9b7cb49d293bcceaf16.png?size=128"); 
																	  }
																	  echo  ("' alt='Avatar' style='width: 100%; border-radius: 50%;'><br/><p></p>");
																  }
															?>
														
														<b class="gm-title">
															<?php
																if ($Error == 0) {
																	echo ("&lt;GM&gt;".$author);
																}
															?>
														</b>
													</div>
													
												</td>
												<td style="width: 15%;" rowspan="3">&nbsp;

												</td>
												<td style="width: 50%;" rowspan="3">
													<?php
														if ($Error == 0) {
															echo ($date." ".$time."<br/><p></p>".$message);
														} else {
															echo("Error Code: ".$Error."<br/>".$ErrorMessage."<br/><p></p>Return to the home page in 5 secs");
															header( "refresh:5;url=index.php" );
														}
													?>
												</td>
											</tr>
											<tr>
												<td style="text-align: center;" rowspan="2">

												</td>
											</tr>
										</table>
									</div>
								</div>
							</td>
						</tr>
						<tr height="10%">
							<td class="box">
								<table>
								<tr><td>
								<b style="color: white;">GM List：</b><br/>
								<p></p>
								<p></p>
								<div class="list-item">
									<img src="https://cdn.discordapp.com/avatars/309750128187801601/a567737a94fda9b7cb49d293bcceaf16.png?size=128" style="margin-right: 5px; border-radius: 50%; width: 50px; height: 50px; background: #99aab5;">
									<b class="gm-title" style="margin-right: 10px;">NotAura</b>
								</div>

								</td></tr>
								<?php
								
									//Create connection.
									$connn = pg_connect("host=HOST dbname=fndb1 user=postgres password=PASSWORD port=5432"); 
									//Select all online characters.
									$sql = pg_query("SELECT given_name, level FROM player_characters WHERE flags='Online' ORDER BY level DESC");
									//Check if sql works.
									if ($sql) {
										//Output number of results from $sql.
										$totalRows_sql = pg_num_rows($sql);
										
										//Where there is result from $sql, print online players list.
										if ($totalRows_sql > 0) {
											
											echo ("<tr><td>&nbsp;</td></tr><tr><td>
												   <b style='color: white; margin-top: 100%;'>Online player(BETA)(".$totalRows_sql.")：</b><br/>
													   <p></p>
													   <p></p>");
											
											while ( $row_sql = pg_fetch_assoc( $sql ) ) {
												
													echo ("<div class='list-item' style='margin-right: 2.5%;'>
															   <img src='https://i.imgur.com/DRgt9Y0.png' style='margin-right: 5px; border-radius: 50%; width: 25px; height: 25px; background: #99aab5;'>
															   <b class='player-title' style='margin-right: 10px;'>".$row_sql["given_name"]."(");
													if ($row_sql["level"] > 70) {
														echo ("??");
													} else {
														echo($row_sql["level"]);
													}
													echo ("LV)"."</b>
														   </div>");
											}
											echo ("</td></tr>");
										} else {
											echo ("");
										}
									} else {
										$Error=2;
										$ErrorMessage = ("Can't connect to server<br/>");
									}
								
								?>
								</table>
							</td>
						</tr>
						<tr><td height="5%">&nbsp;</td></tr>
						<tr>
							<td height="5%">
							<div style="text-align: center;">
								<?php 
									if ($Login == 1) { 
										echo("<a href='logout.php' style='text-decoration: none; color: black;'>--Log Out--</a><br/><p></p>");	
										echo("<a href='index.php' style='text-decoration: none; color: black;'>--Back--</a>");
									} else { 
										echo("<a href='index.php' style='text-decoration: none; color: black;'>--Back--</a>");
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