<!DOCTYPE html>
<html lang="en">
<head>
   	<link rel="stylesheet" href="fonts/honyaJi-re/css/stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="fonts/setofont/css/stylesheet.css" type="text/css" charset="utf-8" />
   	<link rel="shortcut icon" href="https://s.aeriastatic.com/files/edeneternal/image/e/ee_favicon.ico" type="image/x-icon" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eden Eternal Online - Register</title>
	
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
   </head>
<body>
<?php 
$login = isset($_POST['login']) ? $_POST['login'] : ''; 
$passs = isset($_POST['passs']) ? $_POST['passs'] : ''; 
?> 
    <div class="main">
		<form action="cad.php" method="post" name="form2" target="_self" id="form"> 
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title"><img src="images/loli.gif" width="150" height"150"></h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="login" id="login" placeholder="Username" value="<?php echo $login; ?>" maxlength="15" pattern="[a-z0-9]{15}" title='The username cannot exceed fifteen characters, and the characters can only contain English lowercase or numbers.' required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="passs" id="passs" placeholder="Password" value="<?php echo $passs; ?>" maxlength="15" pattern="[a-z0-9]{15}" title='The password cannot exceed fifteen characters, and the characters can only contain English lowercase or numbers.' required/>
                            <span toggle="#passs" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree with<a href="https://google.com" class="term-service"><b>TOS</b></a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit" style='cursor: pointer;'/>
                        </div>
                    </form>
                    <div class="loginhere">
                        <a href="https://drive.google.com/open?id=17y1xQ5RePUsW5oyh_DKFw4WakfY0HsGD" class="loginhere-link"><b>Download</b> <label style="text-decoration: none; color: darkgray; cursor: pointer">(120GB@GOOGLE)</label></a><br/>
                        <p></p>
                        <a href="index.php" style="text-decoration: none; color: black;">--Home--</a>
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