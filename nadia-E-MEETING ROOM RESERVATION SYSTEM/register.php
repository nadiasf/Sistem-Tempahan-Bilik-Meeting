<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
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
<body >
	
	


	<div id="wrapper"  >

	<?php include("template_header.php");?>
    
<h2 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">User Registration</h2>

 
			<form action="register.php" method="post" style="margin-top:30px;">
		
			

				
				<label>First Name :*</label><input type="text" name="firstname"  maxlength="255" style="margin-left:100px" /><br /><br />
				<label>Last Name :*&nbsp;</label><input type="text" name="lastname"  maxlength="255" style="margin-left:100px" /><br /><br/>
				<label>Company Name :*&nbsp;</label><input type="text" name="compname"  maxlength="255" style="margin-left:58px" /><br /><br/>
				<label>Password :*&nbsp;</label><input type="text" name="password"  maxlength="10" style="margin-left:110px" /><br /><br/>
                <label>Email :*</label><input type="text" name="email"  maxlength="255" style="margin-left:144px" /><br /><br />
				<label>Phone No. :*</label><input type="text" name="phone"  maxlength="10" style="margin-left:110px" /><br /><br />
				
				<label>Address :*</label><input type="text" name="address"  maxlength="255" style="margin-left:130px" /><br /><br />
				<br /><br /><br><br>
				
				
				<input type="submit" value="Save" style="width:100px;margin-left:100px;margin-top:20px;height:30px;"  />
				<input type="reset" value="Cancel " style="width:100px;margin-left:100px;margin-top:20px;height:30px;"  />
			
				
			</form>
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
			
			
		 if(isset($_POST['firstname'])&& isset($_POST['lastname'])&& isset($_POST['compname'])&& isset($_POST['password'])&& isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['address'])){
				
			if(!empty($_POST['firstname'])&&!empty($_POST['lastname'])&&!empty($_POST['compname'])&&!empty($_POST['password'])&&!empty($_POST['email'])&&!empty($_POST['phone'])&&!empty($_POST['address'])){
				 $firstname=$_POST['firstname'];
				 $lastname=$_POST['lastname'];
				 $compname=$_POST['compname'];
				 $password=$_POST['password'];
				 $email=$_POST['email'];
			     $phone=$_POST['phone'];
				 $address=$_POST['address'];
				
			
					$sql=mysql_query("insert into `customer_details`(`first_name`,`last_name`,`comp_name`,`password`,`email`,`phone_no`,`address`) values ('".$firstname."','".$lastname."','".$compname."','".$password."','".$email."','".$phone."','".$address."') " );
					if($sql){
						echo 'Register Done.Go to Log In';
					}else{
						echo "Can not connect to database ,Please try again later";
					}
					
			}else{
				echo'These Fields Are Required *';
			}
		}
			
			
		?>
		
	
       
        
   
    </div>
	
    
</div><!--#wrapper-->
<?php include("template_footer2.php");?>
<?php include("template_footer.php");?>

</body>
</html>
