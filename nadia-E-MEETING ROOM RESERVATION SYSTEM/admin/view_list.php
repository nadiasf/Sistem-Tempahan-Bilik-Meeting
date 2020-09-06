<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Booking</title>
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
.logout{
	color:white;
	font-size:22px;
}
.logout:hover{
	color:red;
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
            	<li><a href="http://localhost/nad/user_main.php">Home</a></li>
                <li><a href="http://localhost/nad/about.php">About Us</a></li>
				<li><a href="http://localhost/nad/services.php">Our Services</a></li>
				<li><a href="http://localhost/nad/gallery.php">Gallery</a></li>
                <li><a href="http://localhost/nad/contact.php">Contact Us</a></li>
                <li><a href="http://localhost/nad/faq.php">FAQs</a></li>
            </ul>
        </div><!--#access-->
        
    </div><!--#header-->
    
<h3 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">List Of Booking</h3>

 
			
			
           <div>
		   
		   
            	
               <form action="summary.php" method="post" style="margin-top:30px;">
		
			
				<h4>Room Registration Details   :</h4> 
				<label>Order No. :</label><input type="text" name="orderno"  maxlength="255" style="margin-left:100px" /><br /><br />
				<label>Name :</label><input type="text" name="name"  maxlength="255" style="margin-left:100px" /><br /><br />
				<label>IC :&nbsp;</label><input type="text" name="ic"  maxlength="10" style="margin-left:126px" /><br /><br/>
				<label style="padding-right: 107px;">Date :&nbsp;</label><input type="date" name="date" style="width: 168px;"  /><br /><br/>
				<label>Room Type :</label>
                <select name="role"  style="margin-left:54px;    width: 172px;">
					<option value="ushape">U-Shape (RM300)</option>
					<option value="meeting">Meeting (RM350)</option>
					<option value="conference">Conference (RM700)</option>
					<option value="simple">Simple (RM200) </option>
 				</select><br /><br />
				<label>Pax :</label><input type="text" name="pax"  maxlength="10" style="margin-left:122px" /><br /><br />
				
				<h4>Utilities   :</h4> 
				
				<label>Projector (RM80)  :</label><input type="checkbox" name="projector"  style="margin-left:146px;" /><br /><br />
				<label>Whiteboard (RM50):&nbsp;</label><input type="checkbox" name="board"  maxlength="32" style="margin-left:126px" /><br /><br/>
				<label>Pen & Pencil (RM30):&nbsp;</label><input type="checkbox" name="pen"  maxlength="32" style="margin-left:119px" /><br /><br/>
				<label>Paper (RM30) :&nbsp;</label><input type="checkbox" name="paper"  maxlength="32" style="margin-left:169px" /><br /><br/>
				<label>Printer (RM60) :</label><input type="checkbox" name="printer"  maxlength="255" style="margin-left:162px" /><br /><br />
				<label>Microphone (RM20):&nbsp;</label><input type="checkbox" name="mic"  maxlength="32" style="margin-left:122px" /><br /><br/>
				<label>Speaker (RM30):</label><input type="checkbox" name="speaker"  maxlength="255" style="margin-left:159px" /><br /><br />
				
				<h4>Refreshment   :</h4> 
				
				<label>Nasi Lemak & Tea :</label><input type="checkbox" name="projector"  style="margin-left:141px;" /><br /><br />
				<label>Toast With Tea:&nbsp;</label><input type="checkbox" name="board"  maxlength="32" style="margin-left:164px" /><br /><br/>
				<label>Nasi Kerabu & Orange Juice:&nbsp;</label><input type="checkbox" name="pen"  maxlength="32" style="margin-left:63px" /><br /><br/>
				<label>Nasi Tomato & Orange Juice :&nbsp;</label><input type="checkbox" name="paper"  maxlength="32" style="margin-left:55px" /><br /><br/>
				<label>Variety Kuih :</label><input type="checkbox" name="printer"  maxlength="255" style="margin-left:189px" /><br /><br />
				<label>Tea & Coffee:&nbsp;</label><input type="checkbox" name="mic"  maxlength="32" style="margin-left:190px" /><br /><br/>
				<br>
				<h4>Total Price   :</h4><input type="text" name="totalprice"  maxlength="255" style="margin-left:222px" />
				<br /><br /><br><br>
				
				
				
			</form>
			
			
				
			
			
            </div>
		
		
		
	
       
        
   
    </div>
	
    
</div><!--#wrapper-->
<?php include("../template_footer2.php");?>
<?php include("../template_footer.php");?>

</body>
</html>
