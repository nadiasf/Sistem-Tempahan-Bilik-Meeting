<div style="color:white; width:69%; font:16px Georgia, 'Times New Roman', Times, serif; background-color:#181E46;margin-left:15.5%;">
<?php
require'connect_to_mysql.php';
require'users/core.php';
if(login()){
	$username=getuserfield('first_name');
	$date=date('l | d - M - Y');
	echo 'Welcome  '.$username.'  Today : '.$date.' ';
}
else{
	header('location:http://localhost/nad/index.php');
}
?>
</div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Home</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
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

<div id="wrapper" class="hfeed">

	<div id="header">
    	
        <div id="top-nav">
        	<div id="banner-1">
            	
            </div><!--#banner-1-->
            <div id="banner-2">
            	
            </div><!--banner-2-->
            <div id="top-menu">
            	<div class="nav">
            		
                	<a href="http://localhost/nad/users/logout_user.php"  class="logout"  >Log out</label>
                	
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
        	<ul  style="margin-left:-150px;">
            	<li><a href="http://localhost/nad/user_main.php">Home</a></li>
                <li><a href="http://localhost/nad/about.php">About Us</a></li>
				<li><a href="http://localhost/nad/services.php">Our Services</a></li>
				<li><a href="http://localhost/nad/gallery.php">Gallery</a></li>
                <li><a href="http://localhost/nad/contact.php">Contact Us</a></li>
                <li><a href="http://localhost/nad/faq.php">FAQs</a></li>
            </ul>
        </div><!--#access-->
        
    </div><!--#header-->
    
    <div id="main">
    
    	<div id="container">
			
			<p> <h5 style="text-align:center;color:red"> NOTE :Please Click On Icon</h5></p>
				<p style="width:1000px">	
    
 <a href="room.php" ><img alt="" class="media-image" style="float: left; margin-bottom: 5px; margin-right: 7px;" width="150" typeof="foaf:Image" src="images/icon/new.jpg" /></a><b style="height:auto;font-size:20px;vertical-align:top;">New Registration</b>
 
 
	 </p>
	
	<br>
	<br>
	
	<p style="width:1000px">
	 <a href="viewreg_user.php" ><img alt="" class="media-image" style="float: left; margin-bottom: 5px; margin-right: 7px;" width="150" typeof="foaf:Image" src="images/icon/view.jpg" /> </a><b style="height:auto;font-size:20px;vertical-align:top;">View Registration & Print Invoice</b>
	 

	 </p>
	
		<br>
		<br>
		<br>		
<br>
<br><br>
        	
        </div><!--#container-->
        
        
    </div><!--#main-->
    
    
</div><!--#wrapper-->
<?php include("template_footer2.php");?>
<?php include_once('template_footer.php'); ?>
</body>
</html>
