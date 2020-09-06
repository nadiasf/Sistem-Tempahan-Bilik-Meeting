<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Room</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>
	<style type="text/css">



#wrapper form{
	margin-left: 70px;
	font:18px Georgia ,"Times New Roman", Times, serif;
	
}

#wrapper form input[type="checkbox"]{
	border:2px solid darkblue;
	border-radius:8px;
	height:20px;
}


.logout{
	color:white;
	font-size:22px;
}
.logout:hover{
	color:red;
}


#wrapper form input[type="submit"]{
	background-color: grey;
	font-size:40px Georgia ,"Times New Roman", Times, serif;
	color: white;
	height:25px;
	border-radius: 6px;
}

#wrapper form input[type="reset"]{
	background-color: grey;
	font-size:40px Georgia ,"Times New Roman", Times, serif;
	color: white;
	height:20px;
	border-radius: 6px;
	
}

#wrapper form input[type="submit"]:hover {
	cursor:pointer;
	background-color:lightblue;
}

#wrapper form input[type="reset"]:hover {
	cursor:pointer;
	background-color:lightblue;
}
</style>
</head>
<body >
	
	


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
        
    </div>
    
<h2 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">Choose Room Picture</h2>

 
		<br>
		<br>
			
			<form action="edit_room.php" method="post" enctype="multipart/form-data">
    Room 1:
    <input type="file" name="con" id="fileToUpload1">
    <input type="submit" value="Upload Image" name="submit1">
	<br>
	<br>
	
	Room 2:
    <input type="file" name="meetingroom" id="fileToUpload2">
    <input type="submit" value="Upload Image" name="submit2">
	<br>
	<br>
		
	Room 3:
    <input type="file" name="simple" id="fileToUpload3">
    <input type="submit" value="Upload Image" name="submit3">
	<br>
	<br>
	Room 4:
    <input type="file" name="ushape" id="fileToUpload4">
    <input type="submit" value="Upload Image" name="submit4">
	<br><br><br>
	
	<br><br><br>
	
</form>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		
		<?php
			if(isset($_POST['submit1'])){
				move_uploaded_file($_FILES['con']['tmp_name'],"../images/upload/room/conference.jpg");
				echo 'upload Conference Room done';	
			}
			
			if(isset($_POST['submit2'])){
				move_uploaded_file($_FILES['meetingroom']['tmp_name'],"../images/upload/room/meetingroom.jpg");
				echo '  Upload Meeting Room done  ';	
			}
		
			if(isset($_POST['submit3'])){
				move_uploaded_file($_FILES['simple']['tmp_name'],"../images/upload/room/simple.jpg");
				echo '  Upload Simple Room done  ';	
			}
			if(isset($_POST['submit4'])){
				move_uploaded_file($_FILES['ushape']['tmp_name'],"../images/upload/room/ushape.jpg");
				echo '  Upload U-Shape Room done  ';	
			}
			
		?>
		
	
       
        
   
    </div>
	
    
</div><!--#wrapper-->
<?php include("../template_footer2.php");?>
<?php include("../template_footer.php");?>


</body>
</html>
