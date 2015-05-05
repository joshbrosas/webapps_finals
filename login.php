<?php

session_start();

include('config.php');

$arr = array();
$errflag = false;

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

$username = clean($_POST['uname']);
$password = clean($_POST['pw']);
if($username != '$username' && $password != '$password') {
		$qry = "SELECT * FROM tbllogin WHERE Username='$username' AND Password = '$password'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Please login your account.';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//login failed message
	$failed = '<i>Invalid Username/Password. Please try again.</i>';
	
	//Create query
	$qry="SELECT * FROM tbllogin WHERE Username='$username' and password= '$password'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION[uname] = $member['Username'];
			$_SESSION[pw] = $member['Password'];
			session_write_close();
			header("location: mainpage.php");
			exit();
		}else {
			
			//show a message query excecuted.
			$_SESSION['FAILED'] = $failed;
			session_write_close();
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>