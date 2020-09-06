<!-----------------Check Session--------------------->
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
include('../storescripts/connect_to_mysql.php');
$sql=mysql_query("select * from admin where id='".mysql_real_escape_string($managerID)."' and username='".mysql_real_escape_string($manager)."' and password='".mysql_real_escape_string($password)."' limit 1");
$existcount=mysql_num_rows($sql);
if($existcount==0){
	echo 'Your login session data is not on record in database!';
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
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here or Back to  <a href="cod_list.php" align="right" style="color:#09f; text-decoration: none;"> Manage COD (Cas On Delivery) </a>';
}
?>
</div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New COD (Cash On Delivery) Order</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />
<!--------------------Inventory Form StylSHeet------------------------->
<style type="text/css">
#myform{
	font:12px Georgia, "Times New Roman", Times, serif;
	margin-left:5%;
}
p{
	color:#C00;
	font:12px Georgia, "Times New Roman", Times, serif;
	margin-left:5%;
}
h2{
	margin-left:5%;
	color:#006;
	font-size:14px;
}
.form-cod{
	width:100%;
	font:12px Georgia, "Times New Roman", Times, serif;
}
.form-cod .text{
	margin-left:7%;
	border:1px solid black;
	border-radius:3px;
	height:2.5em;
	width:30%;
}
.form-cod .address{
	margin-left:6.8%;
	border:1px solid black;
	border-radius:3px;
	height:2.5em;
	width:70%;
	font:12px Georgia, "Times New Roman", Times, serif;

}
.form-cod .textarea{
	margin-left:14%;
	border:1px solid black;
	border-radius:3px;
	height:8em;
	width:60%;
}
.form-cod .submit{
	width:25%;
	margin-top:2em;
	background-color:#F37232;
	border:1px solid #F37232;
	height:3em;
	color:white;
	margin-left:5%;
	border-radius:3px;
}
.form-cod .submit:hover{
	background-color:#FFD386;
	border:1px solid #FFD386;
	cursor:pointer;
}

</style>
</head>
<body>
<div class="page">
   <?php include_once('../template_header.php');?>
   
   <div class="main">
   
   <main role="main">
      <?php include_once('../template_sidebar_left.php'); ?>
       
      <div class="center" id="center">
<!-----------COD Form PHP Register In DataBase----------------------->
      <div style="font:12px Georgia, 'Times New Roman', Times, serif; color:red;margin-left:5%; margin-top:2m;">

<?php
if(isset($_POST['email'])&&isset($_POST['firstname'])&& isset($_POST['lastname']) &&isset($_POST['contactno'])&&isset($_POST['address1'])&&isset($_POST['zipcode'])&&isset($_POST['textarea'])){
	$email=mysql_real_escape_string($_POST['email']);
	$firstname=mysql_real_escape_string($_POST['firstname']);
	$lastname=mysql_real_escape_string($_POST['lastname']);
	$contactno=mysql_real_escape_string($_POST['contactno']);
	$address1=mysql_real_escape_string($_POST['address1']);
	$address2=mysql_real_escape_string($_POST['address2']);
	$state=mysql_real_escape_string($_POST['state']);
	$city=mysql_real_escape_string($_POST['city']);
	$zipcode=mysql_real_escape_string($_POST['zipcode']);
	$order_name=mysql_real_escape_string($_POST['textarea']);
	$date_order=date('Y-m-d');
	if(!empty($_POST['email'])&&!empty($_POST['firstname'])&& !empty($_POST['lastname'])&& !empty($_POST['contactno'])&& !empty($_POST['address1'])&& !empty($_POST['zipcode'])&& !empty($_POST['textarea'])){
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo ucwords('email is not validate !');
		}else{
		$sql=mysql_query(" insert into `cod` (email,firstname,lastname,contactno,address1,address2,state,city,zipcode,order_name,date_order) values ('".$email."','".$firstname."','".$lastname."','".$contactno."','".$address1."','".$address2."','".$state."','".$city."','".$zipcode."','".$order_name."','".$date_order."')") or die (mysql_error());
		   if($sql){
			 echo 'Add New COD (Cash On Delivery) Order Done ! Back to <a href="cod_list.php" style="text-decoration:none;color:blue;">Manage COD</a>"';
			  
		   }	
		}
	}else{
		echo ucwords('these * fields are required');
	}
}

?>
</div>


<!-----------------------COD Form ------------------------------------------->

<h2>Add New COD (Cash On Delivery) Order</h2>

<div class="form-cod">
<form action="cod_form.php" method="post">
<label>Email :*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="text" name="email" placeholder="You@Yourmail.com" maxlength="225"  /><name style="color:red;">(required)</name><br /><br />
<label>First Name :*&nbsp;</label> <input type="text" class="text" name="firstname" placeholder="Your Name" maxlength="255" /><name style="color:red;">(required)</name><br /><br />

<label>Last Name :*&nbsp;&nbsp;</label> <input type="text" class="text" name="lastname"  placeholder="Your Last Name" maxlength="255" /><name style="color:red;">(required)</name><br /><br />
<label>Contact No :*&nbsp;&nbsp;</label><input type="text" class="text" name="contactno" placeholder="Your HP Number" maxlength="20" /><name style="color:red;">(required)</name><br /><br />
<label>Address1 :*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="address" name="address1" placeholder="Your Address" maxlength="1000" /><name style="color:red;">(required)</name><br /><br />
<label>Address2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="address" name="address2" placeholder="Your Address" maxlength="1000" /><br /><br />
<label>State :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="text" name="state" placeholder="Your State" maxlength="50" /><br /><br />
<label>City :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="text" name="city" placeholder="Your City" maxlength="50" /><br /><br />
<label>Postal Code/Zip Code :*</label><input type="text" class="text" name="zipcode" placeholder="Your Postal Code" maxlength="20" /><name style="color:red;">(required)</name><br /><br />
<legend>Order Name :*</legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea class="textarea" name="textarea" placeholder="Product Name and Quantity and Total Price" maxlength="1000"></textarea><name style="color:red;">(required)</name><br /><br />
<input type="submit" value="ADD!" name="submit" class="submit" />
</form>
</div>


  
      </div>
      
      
      <?php include_once('../template_sidebar_right.php'); ?> 
        
   </main>
   
   </div>
   
   <?php include_once('../template_footer.php')?>

   
</div>

</body>
</html>



