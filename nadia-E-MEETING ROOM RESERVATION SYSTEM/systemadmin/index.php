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
include('../connect_to_mysql.php');
$sql=mysql_query("select * from system where id='".mysql_real_escape_string($managerID)."' and username='".mysql_real_escape_string($manager)."' and password='".mysql_real_escape_string($password)."' limit 1");
$existcount=mysql_num_rows($sql);
if($existcount==0){
	echo 'Your login session data is not on record in database ! Please<a style="text-decoration:none;color:blue;" href="http://localhost/nad/systemadmin/admin_login.php"> Login</a> again .';
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
	echo 'Welcome to  admin Page '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here';
}
?>
</div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Admin Area</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/nad/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<?php include_once('../template_header.php')?>
<div class="page">
  
   
   <div class="main">
   
   <main role="main">
       
      <div class="center">
	  
	    <div class="admin">
           <h2>Hello  manager, what would you like to do today?</h2>
           <a href="add_new_admin.php">2.&nbsp;&nbsp;Add New Admin</a><br /><br />
           <a href="users_list.php">4.&nbsp;&nbsp;Manage Users</a><br /><br />
           <a href="send_email.php">7.&nbsp;&nbsp;Send Email</a><br /><br />
        </div>
        
      </div>
      
      
        
   </main>
   
   </div>
   
   <?php include_once('../template_footer.php')?>

   
</div>

</body>
</html>