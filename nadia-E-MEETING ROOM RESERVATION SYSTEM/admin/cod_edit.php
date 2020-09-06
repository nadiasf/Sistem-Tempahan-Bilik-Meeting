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
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here or Back to  <a href="cod_list.php" align="right" style="color:#09f; text-decoration: none;"> Manage COD (Cash On Delivery)</a>';
}
?>
</div>

<!----------------Check Error-------------------->
<?php
//Error Reporting 
error_reporting(E_ALL);
ini_set('display_errors','1');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COD (Cash On Delivery) Edit</title>

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
	margin-left:5%;
	border:1px solid black;
	border-radius:3px;
	height:2.5em;
	width:30%;
}
.form-cod .address{
	margin-left:4.8%;
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
      <div style="color:red; font:12px Georgia, 'Times New Roman', Times, serif; margin-left:5%;">

<!-----------COD Edit Form PHP Register In DataBase----------------------->
<?php
include('../storescripts/connect_to_mysql.php');
if(isset($_POST['email'])&&isset($_POST['firstname'])&& isset($_POST['lastname']) &&isset($_POST['contactno'])&&isset($_POST['address1'])&&isset($_POST['zipcode'])&&isset($_POST['textarea'])){
	$pid=$_POST['thisid'];
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
		$sql=mysql_query("update cod set email='".$email."',firstname='".$firstname."',lastname='".$lastname."',contactno='".$contactno."',address1='".$address1."',address2='".$address2."',state='".$state."',city='".$city."',zipcode='".$zipcode."',order_name='".$order_name."' where id='".mysql_real_escape_string($pid)."'");
		echo 'Edit COD Done. Back to COD List <a href="COD_list.php" style="text-decoration:none; color:blue">Click Here</a>';
	}else{
		echo 'These Fields Are Required *';
	}
}
?>
 <!------------------Gather this COD full information for inserting automatically into the edit form below on page-------------------->
<?php
if(isset($_GET['pid'])){
	$targetid=$_GET['pid'];
    $sql=mysql_query("select * from cod where id='".$targetid."' limit 1");
    $productcount=mysql_num_rows($sql);//count the out put amount
    if($productcount>0){
		while($rows=mysql_fetch_array($sql)){
		$email=$rows['email'];
	$firstname=$rows['firstname'];
	$lastname=$rows['lastname'];
	$contactno=$rows['contactno'];
	$address1=$rows['address1'];
	$address2=$rows['address2'];
	$state=$rows['state'];
	$city=$rows['city'];
	$zipcode=$rows['zipcode'];
	$order_name=$rows['order_name'];
	$date_order=date('Y-m-d');
	    }
	}else{
		echo 'Sorry The COD Don\'t Exist .';
		exit();
	}
}
?>


</div>
          <h2>Edit COD (Cash On Delivery)</h2>

<div class="form-cod">
<form action="cod_edit.php" method="post">
<label>Email :*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="text" name="email"  maxlength="225" value="<?php echo $email; ?>" /><name style="color:red;">(required)</name><br /><br />
<label>First Name :*&nbsp;&nbsp;</label> <input type="text" class="text" name="firstname"  maxlength="255"value="<?php echo $firstname; ?> "/><name style="color:red;">(required)</name><br /><br />

<label>Last Name :*&nbsp;&nbsp;&nbsp;</label> <input type="text" class="text" name="lastname" maxlength="255"value="<?php echo $lastname; ?>" /><name style="color:red;">(required)</name><br /><br />
<label>Contact No :*&nbsp;&nbsp;&nbsp;</label><input type="text" class="text" name="contactno" maxlength="20" value="<?php echo $contactno; ?>"/><name style="color:red;">(required)</name><br /><br />
<label>Address1 :*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="address" name="address1" maxlength="1000" value="<?php echo $address1; ?>" /><name style="color:red;">(required)</name><br /><br />
<label>Address2 :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="address" name="address2"  maxlength="1000"  value="<?php echo $address2; ?>"/><br /><br />
<label>State :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="text" name="state" maxlength="50"  value="<?php echo $state; ?>"/><br /><br />
<label>City :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="text" name="city" maxlength="50" value="<?php echo $city; ?>" /><br /><br />
<label>Postal Code/Zip Code :*</label><input type="text" class="text" name="zipcode" maxlength="20" value="<?php echo $zipcode; ?>" /><name style="color:red;">(required)</name><br /><br />
<legend>Order Name :*</legend>&nbsp;&nbsp;&nbsp;&nbsp;<textarea class="textarea" name="textarea" maxlength="1000" ><?php echo $order_name; ?></textarea><name style="color:red;">(required)</name><br /><br />
<input type="hidden" name="thisid" value="<?php echo $targetid; ?>"  />
<input type="submit" value="EDIT!" name="submit" class="submit" />
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





