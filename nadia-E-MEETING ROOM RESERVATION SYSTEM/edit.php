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
<?php
if(isset($_GET['id'])){
	include('connect_to_mysql.php');
	$id=preg_replace('#[^0-9]#i','',$_GET['id']);//just can put number instead id no more
	$sql_id=mysql_query("select * from `room_reg` where `order_no`='".$id."' limit 1");
	$sql_utility=mysql_query("select * from `utilities` where `order_no`='".$id."' limit 1");
	$sql_refreshment=mysql_query("select * from `refreshment` where `order_no`='".$id."' limit 1");
	$count=mysql_num_rows($sql_id);
	$count_utility=mysql_num_rows($sql_utility);
	$count_refreshment=mysql_num_rows($sql_refreshment);
	if($count>0){
		//get all product details
		while($rows=mysql_fetch_array($sql_id)){
		    $ref_number=$rows['order_no'];
			$name=$rows['name'];
			 $ic=$rows['ic'];
			$date=$rows['date_event'];
			 $room_price=$rows['room_price'];
			  $room_type=$rows['room_type'];
			$pax=$rows['pax'];
			$utility_price=$rows['utilities_price'];
		}	
	}else{
		echo'That order doesn\'t exist .';
	    exit();	
	}
	if($count_utility>0){
		//get all product details
		while($rows_utility=mysql_fetch_array($sql_utility)){
		   $projector=$rows_utility['projector'];
		   $whiteboard=$rows_utility['whiteboard'];
		   $pen_pencil=$rows_utility['pen_pencil'];
		   $paper=$rows_utility['paper'];
		   $printer=$rows_utility['printer'];
		   $mic=$rows_utility['mic'];
		   $speaker=$rows_utility['speaker'];
		}	
	}
	
	if($count_refreshment>0){
		//get all product details
		while($rows_refreshment=mysql_fetch_array($sql_refreshment)){
		  $breakfast1=$rows_refreshment['breakfast1'];
		  $breakfast2=$rows_refreshment['breakfast2'];
		  $hitea1=$rows_refreshment['hitea1'];
		  $hitea2=$rows_refreshment['hitea2'];
		  $lunch1=$rows_refreshment['lunch1'];
		  $lunch2=$rows_refreshment['lunch2'];
		  $total_refreshment=$rows_refreshment['total_refreshment'];
		}	
	}
	$total=($pax*$total_refreshment)+($room_price)+($utility_price);
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Summary</title>
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
.logout{
	color:white;
	font-size:22px;
}
.logout:hover{
	color:red;
}
.pay{
	margin-left:60px;
	padding-right: 15px;
    padding-left: 15px;
    padding-top: 4px;
    padding-bottom: 4px;
	background-color:darkgray;
	color:white;
	border-radius:4px;
	
}
.pay:hover{
	background-color:aqua;
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
        	<ul style="margin-left:-150px;">
            	<li><a href="http://localhost/nad/user_main.php">Home</a></li>
                <li><a href="http://localhost/nad/about.php">About Us</a></li>
				<li><a href="http://localhost/nad/services.php">Our Services</a></li>
				<li><a href="http://localhost/nad/gallery.php">Gallery</a></li>
                <li><a href="http://localhost/nad/contact.php">Contact Us</a></li>
                <li><a href="http://localhost/nad/faq.php">FAQs</a></li>
            </ul>
        </div><!--#access-->
        
    </div><!--#header-->
    
<h2 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">Edit</h2>

 
			<form action="edit.php" method="post" style="margin-top:30px;">
		
			
				<h4>Room Registration Details   :</h4> 
				
				<label>Name :*</label><input type="text" name="name"  maxlength="255" style="margin-left:100px" value="<?php if(isset($name)){ echo $name;}?>" /><br /><br />
				<label>IC :*&nbsp;</label><input type="text" name="ic"  maxlength="10" style="margin-left:126px" value="<?php if(isset($ic)){ echo $ic;}?>" /><br /><br/>
				<label style="padding-right: 107px;">Date :*&nbsp;</label><input type="date" name="date" style="width: 168px;" value="<?php if(isset($date)){ echo $date;}?>" /><br /><br/>
				<label>Room Type :*</label> 
                <select name="role"  style="margin-left:54px;    width: 172px;"   >
					<option value=""><?php if(isset($room_type)){ echo $room_type;}?></option>
					<option value="ushape">U-Shape (RM300)</option>
					<option value="meeting">Meeting (RM350)</option>
					<option value="conference">Conference (RM700)</option>
					<option value="simple">Simple (RM200) </option>
 				</select><br /><br />
				<label>Pax :*</label><input type="text" name="pax"  maxlength="10" style="margin-left:122px" value="<?php if(isset($pax)){ echo $pax;}?>" /><br /><br />
				
				<h4>Utilities   :</h4> 
				
				<label>Projector (RM80)  :</label><input type="checkbox" name="projector"  style="margin-left:146px;" <?php if(isset($projector)){ if($projector=="yes"){echo "checked";}else{echo "";} }?>/><br /><br />
				<label>Whiteboard (RM50):&nbsp;</label><input type="checkbox" name="board"   style="margin-left:126px" <?php if(isset($whiteboard)){ if($whiteboard=="yes"){echo "checked";}else{echo "";} }?>/><br /><br/>
				<label>Pen & Pencil (RM30):&nbsp;</label><input type="checkbox" name="pen"   style="margin-left:119px" <?php if(isset($pen_pencil)){ if($pen_pencil=="yes"){echo "checked";}else{echo "";}} ?>/><br /><br/>
				<label>Paper (RM30) :&nbsp;</label><input type="checkbox" name="paper"   style="margin-left:169px" <?php if(isset($paper)){ if($paper=="yes"){echo "checked";}else{echo "";}} ?>/><br /><br/>
				<label>Printer (RM60) :</label><input type="checkbox" name="printer"   style="margin-left:162px"<?php if(isset($printer)){ if($printer=="yes"){echo "checked";}else{echo "";} }?> /><br /><br />
				<label>Microphone (RM20):&nbsp;</label><input type="checkbox" name="mic"   style="margin-left:122px" <?php if(isset($mic)){ if($mic=="yes"){echo "checked";}else{echo "";} }?>/><br /><br/>
				<label>Speaker (RM30):</label><input type="checkbox" name="speaker"   style="margin-left:159px" <?php if(isset($speaker)){ if($speaker=="yes"){echo "checked";}else{echo "";} }?>/><br /><br />
				
				<h4>Refreshment   :</h4> 
				
				<label>Nasi Lemak & Tea :</label><input type="checkbox" name="breakfast1"  style="margin-left:141px" <?php if(isset($breakfast1)){ if($breakfast1=="yes"){echo "checked";}else{echo "";}} ?> /><br /><br />
				<label>Toast With Tea:&nbsp;</label><input type="checkbox" name="breakfast2"   style="margin-left:164px" <?php if(isset($breakfast2)){ if($breakfast2=="yes"){echo "checked";}else{echo "";}} ?>/><br /><br/>
				<label>Nasi Kerabu & Orange Juice:&nbsp;</label><input type="checkbox"  name="lunch1"   style="margin-left:63px" <?php if(isset($lunch1)){ if($lunch1=="yes"){echo "checked";}else{echo "";}} ?>/><br /><br/>
				<label>Nasi Tomato & Orange Juice :&nbsp;</label><input type="checkbox"  name="lunch2"   style="margin-left:56px" <?php if(isset($lunch2)){ if($lunch2=="yes"){echo "checked";}else{echo "";}} ?>/><br /><br/>
				<label>Variety Kuih :</label><input type="checkbox" name="hitea1"   style="margin-left:189px" <?php if(isset($hitea1)){ if($hitea1=="yes"){echo "checked";}else{echo "";}} ?>/><br /><br />
				<label>Tea & Coffee:&nbsp;</label><input type="checkbox" name="hitea2"   style="margin-left:190px" <?php if(isset($hitea2)){ if($hitea2=="yes"){echo "checked";}else{echo "";}} ?>/><br /><br/>
				<br>
				
				<br /><br /><br><br>
				
				<input type="hidden" name="ref" value="<?php if(isset($ref_number)){ echo $ref_number;} ?>" />
				<input type="submit" value="Update Order" name="update" style="width:100px;margin-left:100px;margin-top:20px;height:30px;"  />
				`<a href="summary.php?id=<?php if(isset($ref_number)){ echo $ref_number;} ?>" class="pay">Back</a>
				
			</form>
			
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<?php
		
		
		if(isset($_POST['update'])){
			$ref=$_POST["ref"];
			$name=$_POST['name'];
			$ic=$_POST['ic'];
			$date=$_POST['date'];
			$pax=$_POST['pax'];
			$room_type=$_POST['role'];
			if($room_type=="ushape"){
				$price=300;
			}elseif($room_type=="meeting")
			{
				$price=350;
				
			}
				elseif($room_type=="conference")
			{
				$price=700;
				
			}
			elseif($room_type=="simple")
			{
				$price=200;
				
			}
	
			
			$sql_room=mysql_query("update  `room_reg` set name='".$name."',ic='".$ic."',date_event='".$date."',room_type='".$room_type."',pax='".$pax."',room_price='".$price."' where order_no='".$ref."' ")or die(mysql_error());
	
	
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
		$sql_utility=mysql_query("update  `utilities` set projector='".$projector."',whiteboard='".$board."',pen_pencil='".$pen."',paper='".$paper."',printer='".$printer."',mic='".$mic."',speaker='".$speaker."',total_price='".$total_utilities."' where order_no='".$ref."' ")or die(mysql_error());
		$sql_utility2=mysql_query("update  `room_reg` set utilities_price  = '".$total_utilities."' where order_no='".$ref."' ")or die(mysql_error());
		
		if(isset($_POST["breakfast1"])){
		$breakfast1_p=5;
		$breakfast1="yes";
		
	}
	else{
		$breakfast1_p=0;
		$breakfast1="no";
		
	}
	if(isset($_POST["breakfast2"])){
		$breakfast2_p=5;
		$breakfast2="yes";
	}
	else{
		$breakfast2_p=0;
		$breakfast2="no";
	}
	if(isset($_POST["lunch1"])){
		$lunch1_p=9;
		$lunch1="yes";
	}
	else{
		$lunch1_p=0;
		$lunch1="no";
		
	}
	if(isset($_POST["lunch2"])){
		$lunch2_p=9;
		$lunch2="yes";
	}
	else{
		$lunch2_p=0;
		$lunch2="no";
		
	}
	if(isset($_POST["hitea1"])){
		$hitea1_p=8;
		$hitea1="yes";
	}
	else{
		$hitea1_p=0;
		$hitea1="no";
		
	}
	if(isset($_POST["hitea2"])){
		$hitea2_p=7;
		$hitea2="yes";
	}
	else{
		$hitea2_p=0;
		$hitea2="no";
		
	}
	
	$total_refreshment=$breakfast1_p+$breakfast2_p+$lunch1_p+$lunch2_p+$hitea1_p+$hitea2_p;
		
	$sql_refreshment=mysql_query("update  `refreshment` set breakfast1='".$breakfast1."',breakfast2='".$breakfast2."',hitea1='".$hitea1."',hitea2='".$hitea2."',lunch1='".$lunch1."',lunch2='".$lunch2."',total_refreshment='".$total_refreshment."' where order_no='".$ref."' ")or die(mysql_error());
		
	if($sql_room && $sql_utility && $sql_utility2 && $sql_refreshment){
		
		header('location:http://localhost/nad/summary.php?id='.$ref.'');
	}
	
	}
		
		
		?>
	
		
	
       
        
   
    </div>
	
    
</div><!--#wrapper-->
<?php include("template_footer2.php");?>
<?php include("template_footer.php");?>

</body>
</html>
