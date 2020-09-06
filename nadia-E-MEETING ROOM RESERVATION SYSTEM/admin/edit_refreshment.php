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
    
<h2 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">Choose Refreshment Menu</h2>

 <br>
 <br>
 <br>
 <br>
		
			
			<form action="edit_refreshment.php" method="post" enctype="multipart/form-data">
    Breakfast:
	<label>Food 1 :</label>
	
    <input style="    padding-left: 147px;" type="file" name="breakfast1" id="fileToUpload5">
    <input type="submit" value="Upload Image" name="submit5">
	<br>
	<br>
	<label style="margin-left: 84px;">Food 2 :</label>
	
    <input style="    padding-left: 147px;" type="file" name="breakfast2" id="fileToUpload6">
    <input type="submit" value="Upload Image" name="submit6">
	<br>
	<br>
	<br>
	 Lunch:
	<label style="margin-left: 20px;">Food 1 :</label>
	
    <input style="    padding-left: 155px;" type="file" name="lunch1" id="fileToUpload7">
    <input type="submit" value="Upload Image" name="submit7">
	<br>
	<br>
	<label style="margin-left: 78px;">Food 2 :</label>

    <input style="    padding-left: 153px;" type="file" name="lunch2" id="fileToUpload8">
    <input type="submit" value="Upload Image" name="submit8">
	<br>
	<br>
	<br>
	
	 Hi-Tea:
	<label style="margin-left: 20px;">Food 1 :</label>

    <input style="    padding-left: 150px;" type="file" name="hitea1" id="fileToUpload9">
    <input type="submit" value="Upload Image" name="submit9">
	<br>
	<br>
	<label style="margin-left: 84px;">Food 2 :</label>
	
    <input style="    padding-left: 148px;" type="file" name="hitea2" id="fileToUpload10">
    <input type="submit" value="Upload Image" name="submit10">
	<br>
	<br>
	
	
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
			if(isset($_POST['submit5'])){
				move_uploaded_file($_FILES['breakfast1']['tmp_name'],"../images/upload/breakfast/breakfast1.jpg");
				echo 'upload Breakfast 1  done';	
			}
			
			if(isset($_POST['submit6'])){
				move_uploaded_file($_FILES['breakfast2']['tmp_name'],"../images/upload/breakfast/breakfast2.jpg");
				echo '  Upload Breakfast 2 done  ';	
			}
		
			if(isset($_POST['submit7'])){
				move_uploaded_file($_FILES['lunch1']['tmp_name'],"../images/upload/lunch/lunch1.jpg");
				echo '  Upload Lunch 1 done  ';	
			}
			if(isset($_POST['submit8'])){
				move_uploaded_file($_FILES['lunch2']['tmp_name'],"../images/upload/lunch/lunch2.jpg");
				echo '  Upload Lunch 2  done  ';	
			}
			if(isset($_POST['submit9'])){
				move_uploaded_file($_FILES['hitea1']['tmp_name'],"../images/upload/hi-tea/hitea1.jpg");
				echo '  Upload Hi-tea 1  done  ';	
			}
			if(isset($_POST['submit10'])){
				move_uploaded_file($_FILES['hitea2']['tmp_name'],"../images/upload/hi-tea/hitea2.jpg");
				echo '  Upload Hi-tea 2 done  ';	
			}
			
		?>
		
		
	
       
        
   
    </div>
	
    
</div><!--#wrapper-->
<?php include("../template_footer2.php");?>
<?php include("../template_footer.php");?>


</body>
</html>
