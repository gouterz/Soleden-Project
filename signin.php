<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT email,Password,status,name,id FROM users WHERE email=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	foreach ($results as $result) {
    $status=$result->status;
    $_SESSION['user_id']=$result->id;
	$_SESSION['name'] = $result->name;
  } 
  
  if($status==1)
	{
		$msg="Your account is Inactive. Please contact admin";
	} 
  else{
		$_SESSION['prof_login']=$_POST['email'];
		
		echo "<script type='text/javascript'> document.location = 'admin/dashboard.php'; </script>";
	} 
} 

else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}


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
<title>Welcome to Sign In Page</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Paparazzi, Online Movie Rating, Movies,Theatres" />
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
	<h1>Sign IN</h1>
</div>
<div class="w3-main">
		<div class="form-w3l">

			<div class="img">
				
				<h2>Login</h2>
				<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
			</div>	
			<form action="success.php" class="form-horizontal" method="post">
				
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

				
				<div class="w3l-btn">
					<input type="submit" name="loginSubmit" value="REGISTER"/>
				</div>
			</form>
				
		</div>
	</div>
	


<footer>
&copy; 2018 Paparazzi. All rights reserved 
</footer>
</body>
</html>