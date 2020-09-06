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
$sql=mysql_query("select * from admin where id='".mysql_real_escape_string($managerID)."' and name='".mysql_real_escape_string($manager)."' and password='".mysql_real_escape_string($password)."' limit 1");
$existcount=mysql_num_rows($sql);
if($existcount==0){
	echo 'Your login session data is not on record in database ! Please<a style="text-decoration:none;color:blue;" href="http://localhost/nad/admin/admin_login.php"> Login</a> again .';
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
	'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here';
}
?>
</div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Admin Area</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
.logout{
	color:white;
	font-size:22px;
}
.logout:hover{
	color:red;
}

</style>
</head>

<body>
<div class="page">
<div id="wrapper"  >

	<div id="header">
    	
        <div id="top-nav">
        	<div id="banner-1">
            	
            </div><!--#banner-1-->
            <div id="banner-2">
            	
            </div><!--banner-2-->
            <div id="top-menu">
            	<div class="nav">
            		
                	<a href="admin_logout.php"  class="logout"  >Log out</label>
                	
                </div>
            	<!--.nav-->
            </div><!--#top-menu-->
        </div><!--#top-nav-->
        
    	<div id="branding">
        	<div class="site-title">
            	<h2><?php echo 'COPY ORI SDN BHD'; ?></h2>
            </div><!--.sie-title-->
            <div class="site-tagline">
            	<h4><?php echo 'Meeting Room Reservation'; ?></h4>
            </div><!--.sie-tagline-->
        </div><!--#branding-->
        
        <div id="access">
        	<ul style="margin-left: -150px;">
            	<li><a href="http://localhost/nad/admin/index.php">Home</a></li>
                <li><a href="http://localhost/nad/about.php">About Us</a></li>
				<li><a href="http://localhost/nad/services.php">Our Services</a></li>
				<li><a href="http://localhost/nad/gallery.php">Gallery</a></li>
                <li><a href="http://localhost/nad/contact.php">Contact Us</a></li>
                <li><a href="http://localhost/nad/faq.php">FAQs</a></li>
            </ul>
        </div><!--#access-->
        
    </div><!--#header-->
   
   <div class="main">
   
   <main role="main">
      
       
      <div class="center">
	  
	    <div class="admin">
           <h3>Hello Admin, what would you like to do today?</h3>
          <h4> <a href="viewreg_admin.php">View Room Booking</a></h4><br>
          <h4> <a href="edit_room.php">Edit Room</a><h4>
          <h4> <a href="edit_refreshment.php">Edit Refreshment</a><h4><br /><br />
           
        </div>
        
      </div>
      
      
       
        
   </main>
   
   </div>
   
  

   
</div>
<?php include("../template_footer2.php");?>
<?php include("../template_footer.php");?>
</body>
</html>