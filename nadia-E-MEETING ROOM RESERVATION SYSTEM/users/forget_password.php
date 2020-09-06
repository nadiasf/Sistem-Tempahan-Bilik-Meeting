<?php
require '../connect_to_mysql.php';
require 'core.php';
if(login()){
	header('location:http://localhost/nad/index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />

<style type="text/css">
.form1{
	margin-top:1em;
	width:70%;
	margin-left:50%;
	font-size:12px;
	font-family:Georgia, "Times New Roman", Times, serif;
}
.form1 r{
	color:#960;
	font-size:12px;
}
.form1 input[type=text],[type=password] {
	width:60%;
	margin-top:2%;
	height:35px;
	border-radius:5px;
	font-weight:100;
	font-weight:lighter;
	font-size:12px;
	font-family:Georgia, "Times New Roman", Times, serif;
	border:1px solid #B7B7B7;
}
.head{
	width:100%;
	height:30px;
	border-bottom:3px double #B7B7B7;
	text-align:center;
	display:inline-block;
}
.head h2{
	float:left;
	padding-left:0%;
	font-size:14px;
	font-family:Georgia, "Times New Roman", Times, serif;
}
.head home{
	text-align:right;
	font:12px Georgia, "Times New Roman", Times, serif;
	float:right;
	padding-top:5px;
}
.head home a{
	text-decoration:none;
	color:#999;
}
.head home a:hover{
	color:#03C;
	text-decoration:underline;
}
.submit-pass{
	width:20%;
	font-size:12px;
	font-family:Georgia, "Times New Roman", Times, serif;
	height:3em;
	margin-top:0.5em;
	margin-left:1%;
	border-radius:3px;
	text-align:center;
	border:1px solid #F37540;
	background-color:#F37540;
	color:white;
}
.submit-pass:hover{
	border-radius:3px;
	background-color:#B97540;
	cursor:pointer;
}
.php{
	text-align:center;
	margin-top:1em;
	color:#C30;
	font:12px Georgia, "Times New Roman", Times, serif;
	margin-left:50%;
}
/*----------logo-Search-------------------*/
.logo-search1{
	width:100%;
	height:6.5em;
	background-color:#181E46;
	display:inline-block;
}

/*---Div logo---*/
.logo1{
	width:30%;
	height:6.3em;
	float:left;
}
.logo1 a{
	text-decoration:none;
	color:white;
}
/*---Div search---*/
.search1{
	width:68%;
	height:6.3em;
	float:right;
	display:inline-block;
}
.form2{
	width:85%;
	float:left;
}
.text1{
	margin-top:0.8em;
	width:85%;
	height:2.8em;
	border-top-left-radius:5px;
	border-bottom-left-radius:5px;
	border:1px solid #181E46;
	margin-right:0;
	font:12px Georgia, "Times New Roman", Times, serif;
}
.submit1{
	font:12px Georgia, "Times New Roman", Times, serif;
	margin-top:0.8em;
	width:13%;
	margin-left:0;
	height:2.9em;
	color:white;
	border:1px solid #F37540 ;
	background-color:#F37540;
	margin-left:-1%;
	border-left:2px solid #203E4E;
	border-top-right-radius:5px;
	border-bottom-right-radius:5px;
}
.submit1:hover{
	background-color:#C30;
	border-color:#c30;
	cursor:pointer;
	border-left:2px solid #203E4E;
}
/*---Div menu---*/
.menu1-head{
	margin-top:0.7em;
	width:90%;
	height:1.3em;
}
.menu1-head ul{
	margin-top:0;
	margin-left:-9.5%;
}
.menu1-head li{
	display:inline-block;
	font-size:12px;
	text-align:left;
	margin-left:4%;
}
.menu1-head li a{
	text-decoration:none;
	color:white;
}
.menu1-head li a:hover{
	text-decoration:underline;
}
/*---Div cart---*/
.cart1{
	border:1px solid #F37232;
	height:3em;
	width:6%;
	margin-right:5%;
	float:right;
	margin-top:0.75em;
	background-color:#F37232;
	border-radius:5px;
}
.cart1:hover{
	background-color:#C30;
	border:1px solid #C30;
	border-radius:5px;
}
.cart1 a{
	text-decoration:none;
}
.cart1-img{
	height:3em;
	width:100%;
}


</style>

</head>

<body>
<div class="page">

      

   <div class="main">
   
   <main role="main">
       
      <div class="center">
      <div class="form1">
<div class="head"><h2>Forget Your Password </h2><home><a href="../index.php">Home</a></home></div><br /><br />
<p style="color:red;">Note : If you forget your password, insert your Email and we will send your password to your email ASAP, Thank you.</p>
<form action="forget_password.php" method="post">
<input type="text" name="email" maxlength="254" placeholder="You@youremail.com" /><r>&nbsp;(Required*)</r><br /><br />
<input class="submit-pass" type="submit" value="Submit" />
</form>
</div>

<div class="php">
<?php
require('../connect_to_mysql.php');
if(!login()){
    if(isset($_POST['email'])){
		 $email=mysql_real_escape_string($_POST['email']);
	    if(!empty($email)){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo ucwords('email is not validate !');
			}else{
				 $query=mysql_query("select * from customer_details where email='".$email."' ")or die (mysql_error());
		         while($rows=mysql_fetch_array($query)){
					$email_user=$rows['email'];
					$password=$rows['password'];
				}
				if($email==$email_user){
					$to=$email;
			        $subject='Your Password';
					$body="This is your password, for more security we change your password type to MD5 Encryption . \n It Should Be 32 Character, Thank you for your copration .<br> Your Password = ".$password."<br> &nbsp;&nbsp;Best Regards";
					$header='From : ADMIN EMAil';
					if(mail($to,$subject,$body,$header)){
						echo'Thank you, Password send to your Email .';
					}else{
						echo 'Sorry, an error occured . Please try again later .';
					}
				}else{
					echo 'This Email Did Not Register Before, Please  <a href="register_user.php" style="text-decoration:none;color:blue;">Register Here</a>';
				}
			}
		}else{
			echo'This * Field Are Reqiured ! ';
		}
	}
}
?>
</div>
     
        
      </div>
        
   </main>
   
   </div>
   

  
   
</div>


</body>
</html>