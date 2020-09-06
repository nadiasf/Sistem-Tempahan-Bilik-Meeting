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
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a>  here or Back to  <a href="index.php" style="color:#09f; text-decoration: none;"> Admin Panel </a>';
}
?>
</div>

<!----------------Check Error-------------------->
<?php
//Error Reporting 
error_reporting(E_ALL);
ini_set('display_errors','1');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Email</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
#myform{
	font:12px Georgia, "Times New Roman", Times, serif;
	margin-left:5%;
}
p{
	color:#C00;
	font:12px Georgia, "Times New Roman", Times, serif;
	margin-left:5%;
}
h2{
	margin-left:5%;
	color:#006;
	font-size:14px;
}
#myform label{
	font:12px  Georgia, "Times New Roman", Times, serif;
}
#myform .to {
	border:1px solid #B7B7B7;
	width:350px;
	height:25px;
	border-radius:4px;
	margin-left:68px;
	margin-top:20px;
	font-size:12px;
}
#myform .subject{
	border:1px solid #B7B7B7;
	width:350px;
	height:25px;
	border-radius:4px;
	margin-left:30px;
	font-size:12px;
}
#myform .from{
	width:150px;
	height:25px;
	border-radius:4px;
	margin-left:51px;
	border:1px solid #B7B7B7;
	font-size:12px;
}
#myform .message{
	width:350px;
	margin-left:26px;
	height:150px;
	border-radius:4px;
	border:1px solid #B7B7B7;
	font-size:12px;
}

#myform .submit{
	width:20%;
	border-radius:3px;
	color:white;
	background-color:#181E46;
	border:1px solid #181E46;
	margin-left:5%;
}
#myform .submit:hover{
	bcrder-radius:3px;
	color:white;
	background-color:#F37232;
	border:1px solid #F37232;
}
#myform .textarea{
	float:left;
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
      
      <div style="color:red; margin-left:5%; font:12px Georgia, 'Times New Roman', Times, serif;">

      <?php
	  if(isset($_POST['to'])&&isset($_POST['subject'])&&isset($_POST['message'])&&isset($_POST['from'])){
		  $to=$_POST['to'];
		  $subject=$_POST['subject'];
		  $message=$_POST['message'];
		  $from=$_POST['from'];
		  $date=date('Y-m-d');
		  if(!empty($to)&& !empty($subject)&& !empty($message)&& !empty($from)){
			  if(mail($to,$subject,$message,$from)){
				  $query=mysql_query("insert into sendemail (`to`,`subject`,`message`,`from`,`send_date`) values ('".mysql_real_escape_string($to)."','".mysql_real_escape_string($subject)."','".mysql_real_escape_string($message)."','".mysql_real_escape_string($from)."','".mysql_real_escape_string($date)."') ") or die(mysql_error());
				  echo ucwords('sending email done !');
			  }else{
				echo ucwords('sorry,an error occurred to send email, please try again later .');  
			  }
		  }else{
			echo'These Fields * Are Required ! ';  
		  }
	  }
	  ?>
      </div>
<!-----------------------Email Form ------------------------------------------->
 <div align="right" style="width:95%;">
<a style="text-decoration:none; color:#00F;" href="send_email_list.php">+ Send Email History</a>
</div>
<h2>Send Email</h2>
<p style="font:12px Georgia, 'Times New Roman', Times, serif;color:black;">Important Note :*If you want send email to two or more emails you should make it seprate email from each other with comma(,) !!! </p>

<form action="send_email.php" name="myform" id="myform" method="post">
<label>TO :*</label><input type="text" name="to" class="to" maxlength="5000" placeholder="Email-1@email.com,Email-2@email.com,..." /><br /><br />
<label>SUBJECT :*</label><input type="text" name="subject" class="subject" maxlength="255" placeholder="Email subject" /><br /><br/>
<label class="textarea">MESSAGE :*</label><textarea name="message" class="message" ></textarea><br /><br />
<label>FROM :*</label><select name="from" class="from">
<option value="admin_email1">Admin Email 1</option>
<option value="admin_email2">Admin Email 2</option>
<option value="admin_email3">Admin Email 3</option>
</select><br /><br />
<input type="submit" value="Send Email" class="submit" />
</form>
      </div>
      
      
      <?php include_once('../template_sidebar_right.php'); ?> 
        
   </main>
   
   </div>
   
   <?php include_once('../template_footer.php')?>

   
</div>

</body>
</html>