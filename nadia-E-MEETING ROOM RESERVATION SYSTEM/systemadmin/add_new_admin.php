<!----------------Session Start------------------------->
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
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here or back to  <a href="index.php" style="color:#09f; text-decoration: none;"> Admin Panel</a>';
}
?>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Admin Area</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="http://localhost/storeadmin/style.css" rel="stylesheet" type="text/css" media="screen" />
<!-------------------New Admin StyleSheet------------>
<style type="text/css">
.center{
	margin:auto;
	font-family: Arial, Helvetica, sans-serif;
	color: #000;
	text-align:center;
	font-size:12px;
}
h2{
	font-size:16px;
}
p{
	color:#C00;
	font:12px Georgia, "Times New Roman", Times, serif;
}
h2{
	color:#006;
}
#add label{
	font:12px Arial, Helvetica, sans-serif;
}
#add .user {
	width:350px;
	height:25px;
	border-radius:4px;
	border:1px solid black;
}
#add .submit{
	width:80px;
	border-radius:3px;
	color:#FFF;
	background-color:#181E46;
	border:1px solid #181E46;
}
#add .submit:hover{
	background-color:#F37232;
	cursor:pointer;
	border:1px solid #F37232;
}
.php{
	font:12px Georgia, "Times New Roman", Times, serif;
	color:red;
	padding-top:15px;
	word-spacing:3px;
}
.user1{
	font:12px Georgia, "Times New Roman", Times, serif;
	height:2.5em;
	border:1px solid black;
	border-radius:5px;
	width:40%;
}
</style>

</head>

<body>
<div class="page">
   <?php include_once('../template_header.php');?>
   
   <div class="main">
   
   <main role="main">
      <?php include_once('../template_sidebar_left.php'); ?>
       
      <div class="center">
	  <h2>Add New Admin</h2>
<p>Note:By adding New users in this section, the Users can access to Admin Store Panel.*</p>
<form id="add" action="add_new_admin.php" method="post">
<label>New UserName(New Admin) :</label> <br /><br />
<input  type="text" name="username" class="user1" size="40" maxlength="30" />
<br /><br />
<label>Password :</label><br /><br />
<input class="user1" type="password" name="password" size="40" maxlength="30" /><br /><br />
<label>Re-type Password :</label><br /><br/>
<input class="user1" type="password" name="re_password" size="40" maxlength="30" /><br /><br />
<input class="submit" type="submit" value="Add!" />
</form>
<!------------------Add New Admin PHP Add To Admin Table In DataBase-------------->
<div class="php">
<?php
require('../storescripts/connect_to_mysql.php');
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_password'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$re_pass=$_POST['re_password'];
	$pass_hash=md5($pass);
	$date=date('Y-m-d');
    if(!empty($user) &&!empty($pass) &&!empty($re_pass)){
		if(strlen($pass)<6 && strlen($re_pass)<6){
			echo'Password Must Be at least 6 character !';    
		}else{
			if($pass != $re_pass){
				echo'Password Do Not Match !';
			}else{
				$query="select username from admin where username='".mysql_real_escape_string($user)."'";
				$query_run=mysql_query($query);
			    $mysql_num_rows=mysql_num_rows($query_run);
				if($mysql_num_rows==1){
					echo'The Username '.$user.' Already Exist .';
			    }else{
				 $query="insert into admin values ('','".mysql_real_escape_string($user)."','".mysql_real_escape_string($pass_hash)."','".$date."')";
				    $query_run=mysql_query($query);
				    if($query_run){
						echo'New Admin Registered. <a href="index.php">Back</a> to Admin Store Page .'; 
				    }else{
					    echo'Sorry, We Couldn\'t Register You At This Time ! Please Try Again Later .';
					}
				} 
			}
		}
	}else{
		echo'All Fields Are Required !';
	}
}
?>
</div>

        
      </div>
      
      
      <?php include_once('../template_sidebar_right.php'); ?> 
        
   </main>
   
   </div>
   

   
</div>

</body>
</html>


