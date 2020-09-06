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
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here or Back to  <a href="subscribe_list.php" align="right" style="color:#09f; text-decoration: none;">Manage Subscribe </a>';
}
?>
</div>
<!-----------Ussers Form PHP Register In DataBase----------------------->
<?php
include('../storescripts/connect_to_mysql.php');
if(isset($_POST['email'])){
	$email=$_POST['email'];
	$date=date('Y-m-d');
	if(!empty($email)){
		$sql=mysql_query("select id from newsletter where email='".mysql_real_escape_string($email)."' limit 1");
		$usermatch=mysql_num_rows($sql);
		if($usermatch>0){
			$no1='Sorry you tried to place a duplicate "Email Name" into system, <a href="subscribe_list.php" style="text-decoration:none;color:blue;">Click Here</a>';
		}else{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$no2= ucwords('email is not validate !');
			}else{
			    $sql=mysql_query("insert into newsletter values ('','".mysql_real_escape_string($email)."','".$date."')")or die(mysql_error());
            
			        $yes1='Add Subscriber Done. Back to subscribe List <a href="subscribe_list.php" style="text-decoration:none; color:blue">Click Here</a>';
			}
		 }

	}else{
		$no3='This Field Are Required *';
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Subscriber</title>
<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />

<!--------------------Users Form StylSHeet------------------------->
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
}
#myform label{
	font:12px  Georgia, "Times New Roman", Times, serif;
}
#myform .email {
	border:1px solid black;
	width:350px;
	height:35px;
	border-radius:4px;
	margin-left:30px;
	margin-top:20px;
	font-size:12px;
}
#myform .submit{
	width:25%;
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
<?php if(isset($yes1)){echo $yes1;} ?>
</div>
  <h2>Add New Subscriber </h2>

<form action="subscribe_form.php" name="myform" id="myform" method="post">
<label>Email :*</label><input type="text" name="email" class="email" maxlength="254" /><br /><br />
<input type="submit" value="Add New Subscriber Now" class="submit" />
</form>

      </div>
      
      
      <?php include_once('../template_sidebar_right.php'); ?> 
        
   </main>
   
   </div>
   
   <?php include_once('../template_footer.php')?>

   
</div>

</body>
</html>
