<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<title>E-commerce</title>
</head>
<body>


<p id="heading">Welcome to E-Commerce Site<p><small id="sm">Quality products and Affordable Price!</small><p>
<div class="container">

<div class="row">
<div class="col-md-8">
<!--carousel-->
<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
	      <div class="item active">
            <img src="images/site1.jpg">
            <div class="container active">
                <div class="carousel-caption">
                    <h1>Welcome to E-Commerce Site</h1>
                    <p>We sell laptops with high quality in affordable Price.</p>
                    
                </div>
            </div>
        </div>
		<div class="item">
            <img src="images/site2.jpg">
            <div class="container active">
                <div class="carousel-caption">
                    <h1>We sell Laptop</h1>
                    <p>We sell all stuff and we provide online payment</p>
                    
                </div>
            </div>
        </div>
	</div>
</div>
<!--end of carousel-->
</div>
<div class="col-md-4">
<form class="formbox" action="login.php" method="post">
<h3>Sign-in</h3>
<p id="para">Login to see our products and to order.</p>
<input type="text" name="uname" placeholder="Enter Username" class="form-control">
<input type="password" name = "pw" placeholder="Enter Password" class="form-control">
<button class="btn btn-success">Sign in</button>
<br>
<?php
	if(isset($_SESSION['FAILED'])){
	echo '<br><div class="alert alert-danger" font-size:12px;">';
	echo $_SESSION['FAILED']; 
	unset($_SESSION['FAILED']);
	echo '</div>';
}?>
</form>
<br>
<form class="formbox" method = "post" action="register.php">
<h3>Sign Up</h3>
<p id="para">Please Sign up to have access and to see our products.</p>
<input type="text" name = "username" placeholder="Username" class="formcontrol">
<br>
<input type="password" name = "pass" placeholder="Password" class="formcontrol">
<br>
<input type="text" name = "email" placeholder="Email Address" class="formcontrol">
<br>
<button class="btn btn-success" type = "submit">Sign up</button>
<br>
<?php
	if(isset($_SESSION['FAILED1'])){
	echo '<br><div class="alert alert-danger" font-size:12px;">';
	echo $_SESSION['FAILED1']; 
	unset($_SESSION['FAILED1']);
	echo '</div>';
}
elseif(isset($_SESSION['SUCCESS'])){
	echo '<br><div class ="alert alert-success" font-size:12px;">';
	echo $_SESSION['SUCCESS']; 
	unset($_SESSION['SUCCESS']);
	echo '</div>';
}
?>
</form>
</div>
</div>
</div>
</div>
<br>
<br>

<div class = "intro-block">
<div class ="container">
<h1>This is Webapps Final Project!</h1>
<p class = "lead">Joshua Brosas, Rene Parma. Ash Norman Paz, Gerald Briones, Ian Rey Velasco</p>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(function (){
    $('.carousel').carousel({
        interval: 3000
    });
})    
    
</script>
</body>
</html>
