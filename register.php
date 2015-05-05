<?php
session_start();

include('config.php');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$conn){
die('failed to connect Server!');
}
$db = mysql_select_db(DB_DATABASE);
if (!$db){
die('unable to connect database');
}
function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	$success= '<i>Register Successfully!.</i>';
	$failed = '<i>Please Fill in the blank.</i>';
$name = clean($_POST['username']);
$pass = clean($_POST['pass']);
$email = clean($_POST['email']);
 if($name == '' && $pass == '' && $email ==''){
	 $_SESSION['FAILED1'] = $failed;
	 header('location: index.php');
			session_write_close();
			exit();
			
}else{
$qry = "INSERT INTO tbllogin(username,password,email)VALUES('$name', '$pass', '$email')";
$result = mysql_query($qry);
}
if($result){
			$_SESSION['SUCCESS'] = $success;
			session_write_close();
			header('location: index.php');
			exit();
}

?>