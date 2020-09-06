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
	$id=getuserfield('id');
	$email=getuserfield('email');
	echo 'Welcome  '.$username.'  Today : '.$date.' ';
}else{
	header('location:http://localhost/nad/index.php');
}
?>
</div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meeting Room</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>
	<style type="text/css">


		
#wrapper form{
	
	font:18px Georgia ,"Times New Roman", Times, serif;
	
	
}

#wrapper form input[type="text"]{
	border:2px solid darkblue;
	border-radius:8px;
	height:20px;
}

#wrapper form input[type="date"]{
	border:2px solid darkblue;
	border-radius:8px;
	height:25px;
	margin-left:108px;
	width:167px;
}

#wrapper form select{
	border:2px solid darkblue;
	border-radius:8px;
	height:25px;
	width :169px;
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
<body>
	
	


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
        	<ul style="margin-left:-120px;">
            	<li><a href="http://localhost/nad/user_main.php">Home</a></li>
                <li><a href="http://localhost/nad/about.php">About Us</a></li>
				<li><a href="http://localhost/nad/services.php">Our Services</a></li>
				<li><a href="http://localhost/nad/gallery.php">Gallery</a></li>
                <li><a href="http://localhost/nad/contact.php">Contact Us</a></li>
                <li><a href="http://localhost/nad/faq.php">FAQs</a></li>
            </ul>
        </div><!--#access-->
        
    </div><!--#header-->
    
<h3 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">Room Registration</h3>
 
			<form action="room.php" method="post" style="margin-left:30px;">
			 <img alt="" width="150px"  style="margin-left:70px;clear:left;" src="images/icon/register.jpg" /><br/><br/><br/>
			
			

			<img alt="" class="media-image" style="margin-left:42px; margin-top:10px; margin-bottom: -22px; clear:left ; height: 183px;" width="388"  src="images/upload/room/meetingroom.jpg" />
				<img alt="" class="media-image" style=" margin-top:10px; margin-bottom: -22px; clear:left" width="315"  src="images/upload/room/ushape.jpg" />
<img alt="" class="media-image" style="margin-left:106px; margin-top:27px; margin-bottom: 56px; clear:left" width="336"  src="images/upload/room/conference.jpg" /> 
<img alt="" class="media-image" style="margin-left:3px; margin-top:10px; margin-bottom: 54px; clear:left" width="345"  src="images/upload/room/simple.jpg" /> 
				<br> 
			<?php
				//Generate order Number
				$value_random=rand(1,99999);
				
			?>
			    <input type="hidden" name="orderno" value="<?php if(isset($value_random)){echo $value_random;} ?>" maxlength="255" style="margin-left:68px;" /><br /><br />
				<label>Name :*</label><input type="text" name="name" value="<?php if(isset($username)){echo $username;} ?>"  maxlength="255" style="margin-left:100px;padding-left:5px;" /><br /><br />
				<label>IC :*&nbsp;</label><input type="text" name="ic"  maxlength="13" style="margin-left:126px" /><br /><br/>
				<label>Date :*&nbsp;</label><input type="date" name="date"   /><br /><br/>
				<label>Room Type :*</label>
                <select name="role"  style="margin-left:54px">
					<option value="ushape">U-Shape (RM300)</option>
					<option value="meeting">Meeting (RM350)</option>
					<option value="conference">Conference (RM700)</option>
					<option value="simple">Simple (RM200) </option>
 				</select><br /><br />
				<label>Pax :*</label><input type="text" name="pax"  maxlength="10" style="margin-left:122px" /><br /><br />
				<a href="user_main.php" ><img alt="" class="media-image" style="margin-left:118px; margin-top:10px; margin-bottom: -22px; clear:left" width="130"  src="images/icon/back2.png" /></a>
				
				<input type="submit" value="Save" style="width:100px;margin-left:100px;margin-top:20px;height:30px;"  />
				<input type="reset" value="Cancel" style="text-align:center;width:100px;margin-left:60px;margin-top:20px;height:30px;"  />
				
			</form>
		
		<br/><br/><br/> 
		<?php
		
			$db_host='localhost';
			$db_user='root';
			$db_pass='';
			$db_name='mbsb';
			$connect=@mysql_connect($db_host,$db_user,$db_pass) or die('Could not connect to Mysql !!!');
			$db=mysql_select_db($db_name) or die('No database with this name in Mysql');
			
			
		 if( isset($_POST['orderno'])&& isset($_POST['name'])&& isset($_POST['ic'])&& isset($_POST['date'])&& isset($_POST['role'])&& isset($_POST['pax'])){
				
			if(!empty($_POST['orderno'])&&!empty($_POST['name'])&&!empty($_POST['ic'])&&!empty($_POST['date'])&&!empty($_POST['role'])&&!empty($_POST['pax'])){
				 $orderno=$_POST['orderno'];
				  $name=$_POST['name'];
				 $ic=$_POST['ic'];
				 $date=$_POST['date'];
				 $pax=$_POST['pax'];
				 $role=$_POST['role'];
			if($role=="ushape"){
				$price=300;
			}elseif($role=="meeting")
			{
				$price=350;
				
			}
				elseif($role=="conference")
			{
				$price=700;
				
			}
			elseif($role=="simple")
			{
				$price=200;
				
			}
					$check=mysql_query("select * from `room_reg` where date_event='".$date."' and  `room_type`='".$role."' ") or die (mysql_error());
					$count=mysql_num_rows($check);
					if($count>0){
						echo 'Sorry,This order booked .Please change date or room type ,thanks';
					}else{
						$sql=mysql_query("insert into `room_reg`(`room_id`,`order_no`,`user_id`,`name`,`ic`,`date_event`,`room_type`,`pax`,`room_price`,`email`) values ('','".$orderno."','".$id."','".$name."','".$ic."','".$date."','".$role."','".$pax."','".$price."','".$email."') " );
						if($sql){
						
							echo 'Register Done. Click Button Next
						
							<a href="utilities.php?id='.$orderno.'" ><img alt="" class="media-image" style="position: absolute;top: 1395px;left: 910px;" width="130"  src="images/icon/next2.png" /></a>';
						
						}else{
							echo "Can not order with same Order number ,Please try again later";
						}
					}
			}else{
				echo'These Fields Are Required *';
			}
		}
			
			
		?>
		
	
       
       <br/><br/><br/> 
   
    </div>
	
    
<?php include("template_footer2.php");?>
<?php include("template_footer.php");?>

</body>
</html>
