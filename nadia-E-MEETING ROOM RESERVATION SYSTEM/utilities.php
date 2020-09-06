<!--------------Check For Error And Start Session And Connect To Database ------------------->
<?php
//Error Reporting 
error_reporting(E_ALL);
ini_set('display_errors','1');
include('connect_to_mysql.php');
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
<title>Utilities</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
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
</style>
</head>
<body>
	
	


	<div id="wrapper" >

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
            	<h2><?php echo 'MELAYU BERSATU SDN BHD'; ?></h2>
            </div><!--.sie-title-->
            <div class="site-tagline">
            	<h4><?php echo 'Meeting Room Reservation'; ?></h4>
            </div><!--.sie-tagline-->
        </div><!--#branding-->
        
        <div id="access">
        	<ul>
            	<li><a href="http://localhost/nad/user_main.php">Home</a></li>
                <li><a href="http://localhost/nad/about.php">About Us</a></li>
				<li><a href="http://localhost/nad/services.php">Our Services</a></li>
				<li><a href="http://localhost/nad/gallery.php">Gallery</a></li>
                <li><a href="http://localhost/nad/contact.php">Contact Us</a></li>
                <li><a href="http://localhost/nad/faq.php">FAQs</a></li>
            </ul>
        </div><!--#access-->
        
    </div><!--#header-->
    
<h3 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">Utilities</h3>
 
			<form action="utilities.php" method="post" style="margin-top:30px;">
			<img alt="" width="150px"  style="margin-left:70px;clear:left;" src="images/icon/projector.jpg" /><br/><br/><br/>
			
				<label>Projector (RM80)  :</label><input type="checkbox" name="projector"  style="margin-left:146px;" /><br /><br />
				<label>Whiteboard (RM50):&nbsp;</label><input type="checkbox" name="board"  maxlength="32" style="margin-left:126px" /><br /><br/>
				<label>Pen & Pencil (RM30):&nbsp;</label><input type="checkbox" name="pen"  maxlength="32" style="margin-left:119px" /><br /><br/>
				<label>Paper (RM30) :&nbsp;</label><input type="checkbox" name="paper"  maxlength="32" style="margin-left:169px" /><br /><br/>
				<label>Printer (RM60) :</label><input type="checkbox" name="printer"  maxlength="255" style="margin-left:162px" /><br /><br />
				<label>Microphone (RM20):&nbsp;</label><input type="checkbox" name="mic"  maxlength="32" style="margin-left:122px" /><br /><br/>
				<label>Speaker (RM30):</label><input type="checkbox" name="speaker"  maxlength="255" style="margin-left:159px" /><br /><br />
				
				
			<a href="room.php" ><img alt="" class="media-image" style="margin-left:42px; margin-top:10px; margin-bottom: -22px; clear:left" width="130"  src="images/icon/back2.png" /></a>
				<input type="hidden" name="ref" value="<?php if(isset($ref_number)){ echo $ref_number;} ?>" />
				<input type="submit" name="submit" value="Save" style="width:100px;margin-left:100px;margin-top:20px;height:30px;"  />
				<input type="reset" value="Cancel" style="text-align:center;width:100px;margin-left:60px;margin-top:20px;height:30px;"  />
				
			</form>
			<br>
		<br>
		
		<?php
		

			
		
	if(isset($_POST["projector"])){
		$projector_p=80;
		$projector='yes';
		
	}
	else{
		$projector_p=0;
		$projector='no';
		
	}
	if(isset($_POST["board"])){
		$board_p=50;
		$board='yes';
	}
	else{
		$board_p=0;
		$board='no';
	}
	if(isset($_POST["pen"])){
		$pen_p=30;
		$pen='yes';
	}
	else{
		$pen_p=0;
		$pen='no';
		
	}
	if(isset($_POST["paper"])){
		$paper_p=30;
		$paper='yes';
	}
	else{
		$paper_p=0;
		$paper='no';
		
	}
	if(isset($_POST["printer"])){
		$printer_p=60;
		$printer='yes';
	}
	else{
		$printer_p=0;
		$printer='no';
		
	}
	if(isset($_POST["mic"])){
		$mic_p=20;
		$mic='yes';
	}
	else{
		$mic_p=0;
		$mic='no';
		
	}
	if(isset($_POST["speaker"])){
		$speaker_p=30;
		$speaker='yes';
	}
	else{
		$speaker_p=0;
		$speaker='no';
		
	}
		$total_utilities= $projector_p+$board_p+$pen_p+$paper_p+$printer_p+$mic_p+$speaker_p;	
		if(isset($_POST["ref"])){
		$ref=$_POST["ref"];
		echo '<a href="refreshment.php?id='.$ref.'" ><img alt="" class="media-image" style="position: absolute;top: 990px;left: 910px;" width="130"  src="images/icon/next2.png" /></a>';
		 $sql=mysql_query("insert into `utilities`(`utilities_id`,`order_no`,`user_id`,`projector`,`whiteboard`,`pen_pencil`,`paper`,`printer`,`mic`,`speaker`,`total_price`,`email`) values ('','".$ref."','".$user_id."','".$projector."','".$board."','".$pen."','".$paper."','".$printer."','".$mic."','".$speaker."','".$total_utilities."','".$email."') " ) or die(mysql_error());
		 if($sql){
			
			 $sql_price=mysql_query("update  `room_reg` set utilities_price  = '".$total_utilities."' where order_no='".$ref."' ")or die(mysql_error());
			 
			 echo 'Go to Refreshment by click on Next Button';
		 }else{
		 
			 echo 'Error with order,try again please.';
		 }
		}
		
		?>
		
	
       
        
   
    </div>
	
    
</div><!--#wrapper-->
<?php include("template_footer2.php");?>
<?php include("template_footer.php");?>

</body>
</html>
