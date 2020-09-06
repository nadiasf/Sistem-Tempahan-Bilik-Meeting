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
<title>Refreshment</title>
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
    
<h3 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">Refreshment</h3>

 
			<form action="refreshment.php" method="post" style="margin-top:30px;">
			<img alt="" width="150px"  style="margin-left:70px;clear:left;" src="images/icon/food.png" /><br/><br/><br/>
			<h4 style="color:red;"><marquee behavior="scroll" direction="left"> * All prices are shown for per pax</marquee></h4>
				<label>Breakfast   :</label>
				<img alt="" class="media-image" style="margin-left:42px; margin-top:10px; margin-bottom: -22px; clear:left" width="130"  src="images/upload/breakfast/breakfast1.jpg" />
				<img alt="" class="media-image" style="margin-left:200px; margin-top:10px; margin-bottom: -22px; clear:left" width="150"  src="images/upload/breakfast/breakfast2.jpg" /> <br> 
				<br>
				<label  style="padding-left: 94px;">Nasi Lemak & tea (RM5)  </label>
				<label style="padding-left: 158px;">Toast with tea  (RM5) </label>
				<br>
				<input type="checkbox" name="nasilemak_tea"  style="margin-left:184px;" />	
				<input type="checkbox" name="toast_tea"  style="margin-left:318px;" /><br /><br />
				<label>Lunch :&nbsp;</label>
				<img alt="" class="media-image" style="margin-left:42px; margin-top:10px; margin-bottom: -22px; clear:left" width="130"  src="images/upload/lunch/lunch1.jpg" />
				<img alt="" class="media-image" style="margin-left:222px; margin-top:10px; margin-bottom: -22px; clear:left" width="150"  src="images/upload/lunch/lunch2.jpg" /> <br> 
				<br>
				<label  style="padding-left: 94px;">Nasi Kerabu & Orange Juice(RM9)  </label>
				<label style="padding-left: 56px;">Nasi Tomato & Orange Juice  (RM9) </label>
				<br>
				<input type="checkbox" name="nasikerabu_orange"  style="margin-left:184px;" />	
				<input type="checkbox" name="nasitomato_orange"  style="margin-left:322px;" /><br /><br />
				<label>Hi-Tea :&nbsp;</label>
				
				<img alt="" class="media-image" style="margin-left:42px; margin-top:10px; margin-bottom: -22px; clear:left" width="130"  src="images/upload/hi-tea/hitea1.jpg" />
				<img alt="" class="media-image" style="margin-left:222px; margin-top:10px; margin-bottom: -22px; clear:left" width="150"  src="images/upload/hi-tea/hitea2.jpg" /> <br> 
				<br>
				<label  style="padding-left: 94px;">Variety of Kuih (RM8)  </label>
				<label style="padding-left: 180px;">Coffee with tea  (RM7) </label>
				<br>
				<input type="checkbox" name="kuieh"  style="margin-left:184px;" />	
				<input type="checkbox" name="coffee_tea"  style="margin-left:319px;" /><br /><br /><br><br><br><br>
				
				<a href="utilities.php" ><img alt="" class="media-image" style="margin-left:42px; margin-top:10px; margin-bottom: -22px; clear:left" width="130"  src="images/icon/back2.png" /></a>
				<input type="submit" value="Save" style="width:100px;margin-left:100px;margin-top:20px;height:30px;"  />
				<input type="hidden" name="ref" value="<?php if(isset($ref_number)){ echo $ref_number;} ?>" />
				<input type="reset" value="Cancel" style="text-align:center;width:100px;margin-left:60px;margin-top:20px;height:30px;"  />

			</form>
		<br>
		<br>
		
		<?php
			$db_host='localhost';
			$db_user='root';
			$db_pass='';
			$db_name='mbsb';
			$connect=@mysql_connect($db_host,$db_user,$db_pass) or die('Could not connect to Mysql !!!');
			$db=mysql_select_db($db_name) or die('No database with this name in Mysql');
			
			
	if(isset($_POST["nasilemak_tea"])){
		$breakfast1_p=5;
		$breakfast1="yes";
		
	}
	else{
		$breakfast1_p=0;
		$breakfast1="no";
		
	}
	if(isset($_POST["toast_tea"])){
		$breakfast2_p=5;
		$breakfast2="yes";
	}
	else{
		$breakfast2_p=0;
		$breakfast2="no";
	}
	if(isset($_POST["nasikerabu_orange"])){
		$lunch1_p=9;
		$lunch1="yes";
	}
	else{
		$lunch1_p=0;
		$lunch1="no";
		
	}
	if(isset($_POST["nasitomato_orange"])){
		$lunch2_p=9;
		$lunch2="yes";
	}
	else{
		$lunch2_p=0;
		$lunch2="no";
		
	}
	if(isset($_POST["kuieh"])){
		$hitea1_p=8;
		$hitea1="yes";
	}
	else{
		$hitea1_p=0;
		$hitea1="no";
		
	}
	if(isset($_POST["coffee_tea"])){
		$hitea2_p=7;
		$hitea2="yes";
	}
	else{
		$hitea2_p=0;
		$hitea2="no";
		
	}
	
	$total_refreshment=$breakfast1_p+$breakfast2_p+$lunch1_p+$lunch2_p+$hitea1_p+$hitea2_p;
	
	if(isset($_POST["ref"])){
		$ref=$_POST["ref"];
		echo '<a href="summary.php?id='.$ref.'" ><img alt="" class="media-image" style="position: absolute;top: 1347px;left: 910px;" width="130"  src="images/icon/next2.png" /></a>';
		 $sql=mysql_query("insert into `refreshment`(`refreshment_id`,`order_no`,`user_id`,`breakfast1`,`breakfast2`,`hitea1`,`hitea2`,`lunch1`,`lunch2`,`email`,`total_refreshment`) values ('','".$ref."','".$user_id."','".$breakfast1."','".$breakfast2."','".$hitea1."','".$hitea2."','".$lunch1."','".$lunch2."','".$email."','".$total_refreshment."') " ) or die(mysql_error());
		 if($sql){ 
			 echo 'Refreshment Done .Go to Summary by Click Next Button ';
		 }else{
		 
			 echo 'Error with order,try again please.';
		 }
		}
			
		?>
		
	
       
        
   
    </div>
	
    
</div><!--#wrapper-->
<?php include("template_footer.php");?>

</body>
</html>
