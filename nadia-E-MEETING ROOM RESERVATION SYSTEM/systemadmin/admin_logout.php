<!-----------------Admin Logout------------------->
<?php
ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
$http_refere=$_SERVER['HTTP_REFERER'];
function loggedin(){
	if(isset($_SESSION['manager'])&& !empty($_SESSION['manager'])){
		return true;
	}else{
		return false;
	}
}
session_destroy();
header('location:admin_login.php');
?>