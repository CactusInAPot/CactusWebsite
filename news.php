<?php
//Start session.
session_start();

$login = 0;

//Check if user already logged in.
if (isset($_SESSION["username"])) { 
	$login = 1;
	$name = $_SESSION["username"];
}

$messages = array(

	0 => array (
		"author" => "NotAura",
		"date" => "2019/10/15",
		"time" => "12:00 PM",
		"message" => 
			"Initial web build😂<br/>
			<p></p>
			<img src='images/kururu.gif'>")
	);
		   
?>
<html>
	<head>
	 	<link rel="shortcut icon" href="https://s.aeriastatic.com/files/edeneternal/image/e/ee_favicon.ico" type="image/x-icon" />
	 	<link rel="stylesheet" href="fonts/honyaJi-re/css/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="fonts/setofont/css/stylesheet.css" type="text/css" charset="utf-8" />
	 	<meta charset="UTF-8">
		<title>Eden Eternal Online - News</title> 
		<style>
			html, body {
				margin: 0;
				padding: 0;
				height: 100%;
				background-color: rgba(0,0,0,0);
				-webkit-background-size: cover;
  				-moz-background-size: cover;
  				-o-background-size: cover;
				background-size: cover;
			}
			div {
				background: rgba(0,0,0,0.75); 
				padding: 5%; 
				margin-bottom: 5%; 
				border-radius: 1%;
				color: white;
				overflow: hidden;
				height: 100px;
				line-height: 25px;
				margin: 20px;
			}
			div:hover {
				cursor: pointer;
				opacity: 0.8;
			}
			div:before {
				content: "";
				float: left;
				width: 5px;
				height: 200px;
			}
			div > *:first-child {
				float: right;
				width: 100%;
				margin-left: -5px;
			}
			div:after {
				content: "\02026";
				box-sizing: content-box;
				-webkit-box-sizing: content-box;
				-moz-box-sizing: content-box;
				float: right;
				position: relative;
				top: -25px;
				left: 100%;
				width: 3em;
				margin-left: -3em;
				padding-right: 5px;
				text-align: right;
				background-size: 100% 100%;/* 512x1 image,gradient for IE9. Transparent at 0% -> white at 50% -> white at 100%.*/
				background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAABCAMAAACfZeZEAAAABGdBTUEAALGPC/xhBQAAAwBQTFRF////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////AAAA////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////wDWRdwAAAP90Uk5TgsRjMZXhS30YrvDUP3Emow1YibnM9+ggOZxrBtpRRo94gxItwLOoX/vsHdA2yGgL8+TdKUK8VFufmHSGgAQWJNc9tk+rb5KMCA8aM0iwpWV6dwP9+fXuFerm3yMs0jDOysY8wr5FTldeoWKabgEJ8RATG+IeIdsn2NUqLjQ3OgBDumC3SbRMsVKsValZplydZpZpbJOQco2KdYeEe36BDAL8/vgHBfr2CvTyDu8R7esU6RcZ5ecc4+Af3iLcJSjZ1ivT0S/PMs3LNck4x8U7wz7Bv0G9RLtHuEq1TbJQr1OtVqqnWqRdoqBhnmSbZ5mXapRtcJGOc4t2eYiFfH9AS7qYlgAAARlJREFUKM9jqK9fEGS7VNrDI2+F/nyB1Z4Fa5UKN4TbbeLY7FW0Tatkp3jp7mj7vXzl+4yrDsYoVx+JYz7mXXNSp/a0RN25JMcLPP8umzRcTZW77tNyk63tdprzXdmO+2ZdD9MFe56Y9z3LUG96mcX02n/CW71JH6Qmf8px/cw77ZvVzB+BCj8D5vxhn/vXZh6D4uzf1rN+Cc347j79q/zUL25TPrJMfG/5LvuNZP8rixeZz/mf+vU+Vut+5NL5gPOeb/sd1dZbTs03hBuvmV5JuaRyMfk849nEM7qnEk6IHI8/qn049hB35QGHiv0yZXuMdkXtYC3ebrglcqvYxoj1muvC1nDlrzJYGbpcdHHIMo2FwYv+j3QAAOBSfkZYITwUAAAAAElFTkSuQmCC);
				background: -webkit-gradient(linear,left top,right top,
					from(rgba(255,255,255,0)),to(white),color-stop(50%,white));
					background: -moz-linear-gradient(to right,rgba(255,255,255,0),white 50%,white);
					background: -o-linear-gradient(to right,rgba(255,255,255,0),white 50%,white);
					background: -ms-linear-gradient(to right,rgba(255,255,255,0),white 50%,white);
					background: linear-gradient(to right,rgba(255,255,255,0),white 50%,white);
				}
		</style>
	</head>
	<body>
	
		<?php
		
		$dQuotes = '"';
		
		for ($i=0; $i<count($messages); $i++) { 
			echo ("
				<form method=".$dQuotes."POST".$dQuotes." action=".$dQuotes."newsMessage.php".$dQuotes." target=".$dQuotes."_parent".$dQuotes.">
					<div onclick=".$dQuotes."javascript:this.parentNode.submit();".$dQuotes.">
						".$messages[$i]['message']."
					</div>
					<input type=".$dQuotes."hidden".$dQuotes." name=".$dQuotes."author".$dQuotes." value=".$dQuotes.$messages[$i]['author'].$dQuotes.">
					<input type=".$dQuotes."hidden".$dQuotes." name=".$dQuotes."date".$dQuotes." value=".$dQuotes.$messages[$i]['date'].$dQuotes.">
					<input type=".$dQuotes."hidden".$dQuotes." name=".$dQuotes."time".$dQuotes." value=".$dQuotes.$messages[$i]['time'].$dQuotes.">
					<input type=".$dQuotes."hidden".$dQuotes." name=".$dQuotes."msg".$dQuotes." value=".$dQuotes.$messages[$i]['message'].$dQuotes.">
				</form>"); 
		}
		
		?>
				
	</body>
</html>
				