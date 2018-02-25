<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome to Sign UP Page</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="innovia,cse,2k18,Paper Presentation Registration,Yuktaha, Symposium 2K18 , Psgitech,psg institute of technology,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="style.css" rel="stylesheet" type="text/css" media="all">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<!--//online-fonts -->
<script type="text/javascript" src="jquery-3.3.1.js"></script>
<script type="text/javascript" src="refresh.js"></script>
</head>
<body>
<div class="header">
	<h1>Sign Up</h1>
</div>
<div class="w3-main">
		<div class="form-w3l">

			<div class="img">
				
				<h2>Register here</h2>
				<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
			</div>	
			<form action="success.php" class="form-horizontal" method="post">
				<div class="w3l-user">
					<span><i class="fa fa-user" aria-hidden="true"></i></span>
					<input type="text" name="username" placeholder="Name" required=""/>
					<div class="clear"></div>
				</div>
				
				<div class="w3l-email">
					<span><i class="fas fa-envelope" aria-hidden="true"></i></span>
					<input type="email" name="email" placeholder="Email ID (info@gmail.com)" required=""/>
					<div class="clear"></div>
				</div>
			
      	<div class="w3l-password">
          <span><i class="fas fa-envelope" aria-hidden="true"></i></span>
          <input type="password" name="password" placeholder="Password" required=""/>
          <div class="clear"></div>
        </div>

        <div class="w3l-password">
          <span><i class="fas fa-envelope" aria-hidden="true"></i></span>
          <input type="password" name="confirm_password" placeholder="Confirm Password" required=""/>
          <div class="clear"></div>
        </div>
							
				<div class="w31-phone">	
					<span><i class="fas fa-phone" aria-hidden="true"></i></span>
					<input type="text" name="phone" placeholder="Phone Number" required=""/>
					<div class="clear"></div>
				</div>
				
				
				<div class="w31-city">	
					<span><i class="fas fa-globe" aria-hidden="true"></i></span>
					<input type="text" name="city" placeholder="city" required=""/>
					<div class="clear"></div>
				</div>
				
				
				
				<div class="w3l-btn">
					<input type="submit" name="signupSubmit" value="REGISTER"/>
				</div>
			</form>
				
		</div>
	</div>
	


<footer>
&copy; 2018 Paparazzi. All rights reserved 
</footer>
</body>
</html>