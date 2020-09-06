<!--------------Check For Error------------------->
<?php
//Error Reporting 
error_reporting(E_ALL);
ini_set('display_errors','1');
?>

<div style="color:white; width:69%; font:16px Georgia, 'Times New Roman', Times, serif; background-color:#181E46;margin-left:15.5%;">
<?php
require'connect_to_mysql.php';
require'users/core.php';
if(login()){
	$username=getuserfield('first_name');
	$date=date('l | d - M - Y');
	$user_id=getuserfield('id');
	$email=getuserfield('email');
	echo 'Welcome  '.$username.'  Today : '.$date.' ';
}else{
	header('location:http://localhost/nad/index.php');
}
?>
</div>
<?php
if(isset($_GET['id'])){
	include('connect_to_mysql.php');
	$id=preg_replace('#[^0-9]#i','',$_GET['id']);//just can put number instead id no more
	$sql_id=mysql_query("select * from `room_reg` where `order_no`='".$id."' limit 1");
	$count=mysql_num_rows($sql_id);
	if($count>0){
		//get all product details
		while($rows=mysql_fetch_array($sql_id)){
		    $ref_number=$rows['order_no'];
		}	
	}else{
		echo'That order doesn\'t exist .';
	    exit();	
	}
	
}
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>
	<style type="text/css">

.logout{
	color:white;
	font-size:22px;
}
.logout:hover{
	color:red;
}

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


    
<h3 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">Payment</h3>

 
			<form action="payment.php" method="post" style="margin-top:30px;">
		
			
			
				
				<p>All credit card and debit card with VISA / MasterCard / AMEX brand logo are accepted.</p>
				<br><br>
				
				<h5> Note:* Please Choose one and Please Kindly Key In Card Number</h5>
				
				<img alt="" class="media-image" style="margin-left:42px; margin-top:10px; margin-bottom: -22px; clear:left" width="130"  src="images/icon/visa.png" />
				<img alt="" class="media-image" style="margin-left:134px; margin-top:10px; margin-bottom: -22px; clear:left" width="130"  src="images/icon/master.png" />
				<img alt="" class="media-image" style="margin-left:143px; margin-top:10px; margin-bottom: -22px; clear:left" width="150"  src="images/icon/amex.png" /> 
				<br>
				<label style="padding-left: 77px;">Card No.</label>
				<label style="padding-left: 184px;">Card No.</label>
				<label style="padding-left: 214px;">Card No.</label>
				<br>
				<input type="text" name="visa"  maxlength="255" style="margin-left:22px" />
				<input type="text" name="master"  maxlength="255" style="margin-left:100px" />
				<input type="text" name="amex"  maxlength="255" style="margin-left:100px" />
				<br> 
				<br>
				<br /><br /><br><br><br>
		<br>
		<br>
				
					<input type="submit" value="Pay" style="width:100px;margin-left:329px;margin-top:20px;height:30px;"  />
						<input type="hidden" name="ref" value="<?php if(isset($ref_number)){ echo $ref_number;} ?>" />
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
			$db_host='localhost';
			$db_user='root';
			$db_pass='';
			$db_name='mbsb';
			$connect=@mysql_connect($db_host,$db_user,$db_pass) or die('Could not connect to Mysql !!!');
			$db=mysql_select_db($db_name) or die('No database with this name in Mysql');
			
			
		 if(isset($_POST['visa'])&& isset($_POST['master'])&& isset($_POST['amex'])&& isset($_POST['ref'])){
					$visa=$_POST["visa"];
					$master=$_POST["master"];
					$amex=$_POST["amex"];
					
					$ref=$_POST["ref"];

			
	
			
					$sql=mysql_query("insert into `payment`(`payment_id`,`order_no`,`user_id`,`visa_no`,`master_no`,`amex`,`paid`) values ('','".$ref."','".$user_id."','".$visa."','".$master."','".$amex."','YES') " );
					if($sql){
						
							echo 'Payment Done.Click On Icon Print to Print Invoice  
								<a href="form.php?id='.$ref.'" ><img alt="" class="media-image" style="position: absolute;top: 880px;left: 910px;" width="130"  src="images/icon/invoice.jpg" /></a>';
						
					}else{
						echo "Can not connect to database ,Please try again later";
					}
					
			}else{
				echo'These Fields Are Required *';
			}
		
			
			
		?>
		
	
       
        
   
    </div>
	
    
</div><!--#wrapper-->
<?php include("template_footer2.php");?>
<?php include("template_footer.php");?>

</body>
</html>
