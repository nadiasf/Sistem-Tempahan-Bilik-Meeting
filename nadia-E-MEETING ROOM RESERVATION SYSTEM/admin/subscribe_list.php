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
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here or Back to  <a href="index.php" align="right" style="color:#09f; text-decoration: none;">Admin Panel</a>';
}
?>
</div>

<!----------------Check Error-------------------->
<?php
//Error Reporting 
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
<!------------------Viewing Users List From DataBase-------------------->
<?php
//This block grabs whole list for viewing
$subscribe_list='';
$sql=mysql_query("select * from newsletter order by subscribe_date desc");
$usercount=mysql_num_rows($sql);//count the out put amount
if($usercount>0){
	while($rows=mysql_fetch_array($sql)){
		$id=$rows['id'];
		$email=$rows['email'];
		$subscribe_date=strftime('%d/%b/%Y',strtotime($rows['subscribe_date']));
		$subscribe_list.="<p style='border-bottom:1px dotted #F37232; '>$subscribe_date | $id | $email&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='subscribe_edit.php?pid=$id'>Edit</a>&nbsp;|&nbsp;<a href='subscribe_delete.php?deleteid=$id'>Delete</a><br/></p>";
	}
}else{
	$subscribe_list='You have no subscriber listed in your store yet .';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subscribe List</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="page">
   <?php include_once('../template_header.php');?>
   
   <div class="main">
   
   <main role="main">
      <?php include_once('../template_sidebar_left.php'); ?>
       
      <div class="center">
        <div align="right" style="width:95%;">
<a style="text-decoration:none; color:#00F;" href="subscribe_form.php">+ Add New Subscriber</a>
</div>
<div class="user">
<h2>Subscribe List</h2>
<p style="color:#666; border-bottom:1px solid #F37232;">Date Added | ID | Email  </p>
<?php echo $subscribe_list;?>
</div>       
      </div>
      
      
      <?php include_once('../template_sidebar_right.php'); ?> 
        
   </main>
   
   </div>
   
   <?php include_once('../template_footer.php')?>

   
</div>

</body>
</html>
