<?php
//start session
session_start();
//load and initialize user class
include 'user.php';
include('includes/config.php');
$user = new User();
if(isset($_POST['signupSubmit'])){
    //check whether user details are empty
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['city'])){
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }else{
            //check whether user exists in the database
            $prevCon['where'] = array('email'=>$_POST['email']);
            $prevCon['return_type'] = 'count';
            $prevUser = $user->getRows($prevCon);
            if($prevUser > 0){
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Email already exists with the given user, please use another email.';
				$_SESSION['sessData'] = $sessData;
				//redirect to the home page
				header("Location:signup.php");
            }else{
                //insert user data in the database
                $userData = array(
                    'name' => $_POST['username'],
                    'email' => $_POST['email'],
					'password' => md5($_POST['password']),
                    'phone' => $_POST['phone'],
                    'city' => ($_POST['city'])
                );
                $insert = $user->insert($userData);
                //set status based on data insert
                if($insert){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'You have registered successfully, log in with your credentials.';
                    $email=$_POST['email'];
                    $sql ="SELECT email,status,name,id FROM users WHERE email=:email";
                    $query= $dbh -> prepare($sql);
					$query-> bindParam(':email', $email, PDO::PARAM_STR);
                     $query-> execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                     foreach ($results as $result) {
                     $status=$result->status;
                     $id=$result->id;
                     $name = $result->name;
					 
					 
                    } 
                    
                } 
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
            }
		}
        
	}
    else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
    //store signup status into the session
    
}elseif(isset($_POST['loginSubmit'])){
    //check whether login details are empty
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        //get user data from user class
        $conditions['where'] = array(
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'status' => '0'
        );
        $conditions['return_type'] = 'single';
        $userData = $user->getRows($conditions);
        //set user data and status based on login credentials
        if($userData){
            $sessData['userLoggedIn'] = TRUE;
            $sessData['userID'] = $userData['id'];
            $sessData['status']['type'] = 'success';
            $sessData['status']['msg'] = 'Welcome '.$userData['name'].'!';
			
			$email=$_POST['email'];
                    $sql ="SELECT email,status,name,id FROM users WHERE email=:email";
                    $query= $dbh -> prepare($sql);
					$query-> bindParam(':email', $email, PDO::PARAM_STR);
                     $query-> execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                     foreach ($results as $result) {
                     $status=$result->status;
                     $id=$result->id;
                     $name = $result->name;
					 
					 
                    } 
					}
			
        }else{
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Wrong email or password, please try again.'; 
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Enter email and password.'; 
    }
    //store login status into the session
    $_SESSION['sessData'] = $sessData;
    //redirect to the home page
}else{
    //redirect to the home page
    header("Location:index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome to Movie Rating</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="movie rating,user interaction" />
<script type="application/x-javascript"> 
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="landing.css" rel="stylesheet" type="text/css" media="all">
<!--<link rel="stylesheet" type="text/css" href="bootstrap.css">-->
<!--<link rel="stylesheet" href="css/font-awesome.css">  Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<!--<script defer src="/static/fontawesome/fontawesome-all.js"></script>-->
<!--<script src="https://use.fontawesome.com/31839febd0.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--//online-fonts -->
</head>
<body>
<div class="w3-main">
		<div class="form-w3l">
		<div class="jumbotron"><div><h2>Welcome <?php echo htmlentities($result->name);?><h2></div>
         <div class="container" style="width:800px;">
		 <h2 align="center">Movie System Platform</h2>
   <br />
   <span style="w3-black" id="business_list"></span>
   <br />
   <br />
   </div>
<form action="userlogout.php">
        <button>Log out</button>
		</form>
      </div>
		</div>
	</div>
	
<script>
$(document).ready(function(){
 
 load_business_data();
 
 function load_business_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#business_list').html(data);
   }
  });
 }
 
 $(document).on('mouseenter', '.rating', function(){
  var index = $(this).data("index");
  var business_id = $(this).data('business_id');
  remove_background(business_id);
  for(var count = 1; count<=index; count++)
  {
   $('#'+business_id+'-'+count).css('color', '#ffcc00');
  }
 });
 
 function remove_background(business_id)
 {
  for(var count = 1; count <= 5; count++)
  {
   $('#'+business_id+'-'+count).css('color', '#ccc');
  }
 }
 
 $(document).on('mouseleave', '.rating', function(){
  var index = $(this).data("index");
  var business_id = $(this).data('business_id');
  var rating = $(this).data("rating");
  remove_background(business_id);
  //alert(rating);
  for(var count = 1; count<=rating; count++)
  {
   $('#'+business_id+'-'+count).css('color', '#ffcc00');
  }
 });
 
 $(document).on('click', '.rating', function(){
  var index = $(this).data("index");
  var business_id = $(this).data('business_id');
  $.ajax({
   url:"insert_rating.php",
   method:"POST",
   data:{index:index, business_id:business_id},
   success:function(data)
   {
    if(data == 'done')
    {
     load_business_data();
     alert("You have rate "+index +" out of 5");
    }
    else
    {
     alert("There is some problem in System");
    }
   }
  });
  
 });

});
</script>


<footer>
&copy; 2018 Paparazzi. All rights reserved 
</footer>
</body>
</html>