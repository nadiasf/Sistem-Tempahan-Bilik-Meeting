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
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here or Back to  <a href="users_list.php" style="color:#09f; text-decoration: none;"> Manage Users</a>';
}
?>
</div>

<!----------------Check Error-------------------->
<?php
//Error Reporting 
error_reporting(E_ALL);
ini_set('display_errors','1');
?>

<!-----------Users Edit Form PHP Register In DataBase----------------------->
<?php
include('../storescripts/connect_to_mysql.php');
if(isset($_POST['email'])){
	$pid=$_POST['thisid'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$re_password=$_POST['re_password'];
	$password_hash=md5($password);
	if(!empty($email)&& !empty($username) && !empty($password)){
		$sql=mysql_query("update user set email='".mysql_real_escape_string($email)."',username='".mysql_real_escape_string($username)."',password='".mysql_real_escape_string($password_hash)."'  where id='".mysql_real_escape_string($pid)."'");
		if(strlen($password)<=5){
			$no1=ucwords('password must be 6 characters or more !');
		}else{
			if($password != $re_password){
				$no2= ucwords('password do not match !');
			}else{
				if($sql){
					$yes1='Edit Item Done. Back to Users List <a href="users_list.php" style="text-decoration:none; color:blue">Click Here</a>';
		        }else{
			        $no3='Problem With Query And DataBase';
				}
			}
		}
	}else{
		$no4='All Fields is Required *';
	}
}
?>


<!------------------Gather this user's full information for inserting automatically into the edit form below on page-------------------->
<?php
if(isset($_GET['pid'])){
	$targetid=$_GET['pid'];
    $sql=mysql_query("select * from user where id='".$targetid."' limit 1");
    $usercount=mysql_num_rows($sql);//count the out put amount
    if($usercount>0){
		while($rows=mysql_fetch_array($sql)){
		$email=$rows['email'];
		$username=$rows['username'];
		$password=$rows['password'];
		$register_date=strftime('%d/%b/%Y',strtotime($rows['register_date']));
	    }
	}else{
		$no5='Sorry The User Don\'t Exist .';
		exit();
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users Edit</title>
<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />


<!--------------------Edit Form StylSHeet------------------------->
<style type="text/css">
#center{
	font-size:12px;
	font-family:Georgia, "Times New Roman", Times, serif;
}
p{
	color:#C00;
	font:12px Georgia, "Times New Roman", Times, serif;
	margin-left:5%;
}
h2{
	color:#006;
	margin-left:5%;
}
#myform{
	margin-left:5%;
	font:12px Georgia, "Times New Roman", Times, serif;
}
#myform label{
	font:12px  Georgia, "Times New Roman", Times, serif;
}
#myform .email {
	border:1px solid #B7B7B7;
	width:350px;
	height:35px;
	border-radius:4px;
	margin-left:97px;
	margin-top:20px;
	font-size:12px;
}
#myform .username {
	border:1px solid #B7B7B7;
	width:350px;
	height:35px;
	border-radius:4px;
	margin-left:72px;
	margin-top:20px;
	font-size:12px;
}
#myform .password {
	border:1px solid #B7B7B7;
	width:350px;
	height:35px;
	border-radius:4px;
	margin-left:78px;
	margin-top:20px;
	font-size:12px;
}
#myform .re_password {
	border:1px solid #B7B7B7;
	width:350px;
	height:35px;
	border-radius:4px;
	margin-left:27px;
	margin-top:20px;
	font-size:12px;
}

#myform .submit{
	border-radius:3px;
	color:white;
	background-color:#181E46;
	border:1px solid #181E46;
	margin-left:2%;
}
#myform .submit:hover{
	bcrder-radius:3px;
	color:white;
	background-color:#F37232;
	border:1px solid #F37232;
}
</style>

</head>
<body>
<div class="page">
   <?php include_once('../template_header.php');?>
   
   <div class="main">
   
   <main role="main">
      <?php include_once('../template_sidebar_left.php'); ?>
       
      <div class="center" id="center">
      <div style="color:red; font:12px Georgia, 'Times New Roman', Times, serif; margin-left:5%;">
<?php if(isset($no1)){echo $no1;} ?>
<?php if(isset($no2)){echo $no2;} ?>
<?php if(isset($no3)){echo $no3;} ?>
<?php if(isset($no4)){echo $no4;} ?>
<?php if(isset($no5)){echo $no5;} ?>
<?php if(isset($yes1)){echo $yes1;} ?>
</div>
       <h2>Edit User</h2>

<form action="users_edit.php" name="myform" id="myform" method="post">
<label>Email :*</label><input type="text" name="email" class="email" maxlength="254" value="<?php echo $email;?>" /><br /><br />
<label>Username :*</label><input type="text" name="username" class="username" maxlength="254" value="<?php echo $username;?>" /><br /><br />
<label>Password :*</label><input type="password" name="password" class="password" maxlength="32" value="<?php echo $password;?>" /><br /><br />
<label>Re-Type Password :*</label><input type="password" name="re_password" class="re_password" maxlength="32" value="<?php echo $password;?>" /><br /><br />
<input type="hidden" name="thisid" value="<?php echo $targetid; ?>"  />
<input type="submit" value="Edit" class="submit" />
</form>
  
      </div>
      
      
      <?php include_once('../template_sidebar_right.php'); ?> 
        
   </main>
   
   </div>
   
   <?php include_once('../template_footer.php')?>

   
</div>

</body>
</html>
