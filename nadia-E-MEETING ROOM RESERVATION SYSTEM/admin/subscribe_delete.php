<!-----------------Check Session--------------------->
<?php
session_start();
if(!isset($_SESSION['manager'])){
	header('location:admin_login.php');
	exit();
}
//Be sure to check that this manager SESSION value is in fact in the database
$managerID=preg_replace('#[^0-9]#i','',$_SESSION['id']);
$manager=preg_replace('#[^A-Za-z0-9]#i','',$_SESSION['manager']);
$password=preg_replace('#[^A-Za-z0-9]#i','',$_SESSION['password']);
include('../storescripts/connect_to_mysql.php');
$sql=mysql_query("select * from admin where id='".mysql_real_escape_string($managerID)."' and username='".mysql_real_escape_string($manager)."' and password='".mysql_real_escape_string($password)."' limit 1");
$existcount=mysql_num_rows($sql);
if($existcount==0){
	echo 'Your login session data is not on record in database!';
	exit();
}
?>
<!----------------Check Session------------------------->
<div style="color:white; width:100%; font:12px Georgia, 'Times New Roman', Times, serif; background-color:#181E46;">
<?php
ob_start();
$current_file=$_SERVER['SCRIPT_NAME'];
function loggedin(){
	if(isset($_SESSION['manager'])&& !empty($_SESSION['manager'])){
		return true;
	}else{
		return false;
	}
}
$date=date('l | d - M - Y');
if(loggedin()){
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here or Back to  <a href="subscribe_list.php"  style="color:#09f; text-decoration: none;">Subcriber Users</a>';
}
?>
</div>
<br /><br /><br />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subscriber Delete</title>
</head>

<body>

<!-------------------Delete Item Question To Admin And Delete Product If They Choose ------------------------>
<div style="color:black; width:100%; font:12px Georgia, 'Times New Roman', Times, serif;">
<?php
include('../storescripts/connect_to_mysql.php');
if(isset($_GET['deleteid'])){
	echo 'Do you really want to delete Subscriber with ID of &nbsp; '.$_GET['deleteid'].' &nbsp;?&nbsp; <a style="color:blue;text-decoration:none;" href="subscribe_delete.php?yesdelete='.$_GET['deleteid'].'">&nbsp;Yes</a> | <a style="color:Red;text-decoration:none;" href="subscribe_list.php">No</a>';
}
if(isset($_GET['yesdelete'])){
	$id_to_delete=$_GET['yesdelete'];
    $sql=mysql_query("DELETE FROM `newsletter` WHERE `newsletter`.`id`='".$id_to_delete."' limit 1") or die(mysql_error());  
	echo 'Delete Subscriber Done . Back to Subscribe List <a href="subscribe_list.php" style="color:blue;">Click Here</a>';
}
?>
</div>

</body>
</html>