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
#captcha{
	width:25%;
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
.submit-register{
	width:20%;
	font-size:12px;
	font-family:Georgia, "Times New Roman", Times, serif;
	height:3em;
	margin-top:0.5em;
	margin-left:41%;
	border-radius:3px;
	text-align:center;
	border:1px solid #F37540;
	background-color:#F37540;
	color:white;
}
.submit-register:hover{
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
<!----------------------Template Header---------------------------------->
<header role="banner">

   <div class="header">
   
       <div class="top-nav">
           <div class="social-nav">
              <ul>
                  <li><a href="#"><img class="icon" src="http://localhost/store/style/facebook.gif" alt="facebook" /></a></li>
                  <li><a href="#"><img class="icon" src="http://localhost/store/style/google+.gif" alt="google+" /></a></li>
                  <li><a href="#"><img class="icon" src="http://localhost/store/style/twitter.gif" alt="twitter" /></a></li>
                  <li><a href="#"><img class="icon" src="http://localhost/store/style/youtube.gif" alt="youtube" /></a></li>
                  <li><a href="#"><img class="icon" src="http://localhost/store/style/linkedin.gif" alt="linked in" /></a></li>
                  <li><a href="#"><img class="icon" src="http://localhost/store/style/instagram.gif" alt="instagram" /></a></li>
             </ul>
           </div>
           
           <div class="head-nav">
              <ul>
                 <li><a href="http://localhost/store/index.php">HOME<img src="http://localhost/store/style/arrow-down.png" alt="arrow" /></a></                    li>
                 <li><a href="http://localhost/store/storeuser/login_user.php">LOGIN<img  src="http://localhost/store/style/arrow-down.png" alt=                    "arrow" /></a></li>
                 <li><a href="http://localhost/store/storeuser/register_user.php">SINGUP<img src="http://localhost/store/style/arrow-down.png"                    alt="arrow" /></a></li>
              </ul>
           </div>
           
       </div>
<!--------------------------------------------------------------->
       <div class="logo-search1">
       
          <div class="logo1">
            <a href="http://localhost/store/index.php"><img src="#" alt="logo" /></a>
          </div>
          
          <div class="search1">
            <div class="form2">
              <form action="http://localhost/store/search.php" method="post" name="form-search" >
              <input type="search" name="search" class="text1" placeholder="Search for products, Category, subcategory" />
              <input type="submit" value="Search"  class="submit1" />
              </form>
            
               <div class="menu1-head">
                <ul>
                  <li><a href="http://localhost/store/new_arrival.php">New Arrival</a></li>
                  <li><a href="http://localhost/store/category/clothing.php">Clothing</a></li>
                  <li><a href="http://localhost/store/category/shoes.php">Shoes</a></li>
                  <li><a href="http://localhost/store/category/accessories.php">Accessories</a></li>
                  <li><a href="http://localhost/store/category/muslimwear.php">Muslim Wear</a></li>
                  <li><a href="#">Unbelievable Sale!</a></li>
                </ul>
               </div>
            </div>
             
             <div class="cart1">
               <a href="http://localhost/store/cart.php"><img class="cart1-img" src="http://localhost/store/style/cart.gif" alt="cart" title=                     "Your Cart" /></a>
             </div>
             
          </div>
          
          
       </div>
       
   </div>
</header>

   <div class="main">
   
   <main role="main">
       
      <div class="center">
      <div class="php">
<?php
require('../storescripts/connect_to_mysql.php');
if(!login()){
	if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_password']) ){
		$email=mysql_real_escape_string($_POST['email']);
		$username=mysql_real_escape_string($_POST['username']);
		$password=mysql_real_escape_string($_POST['password']);
		$re_password=mysql_real_escape_string($_POST['re_password']);
		$password_hash=md5($password);
		$date=date('Y-m-d');
		if(!empty($email) &&!empty($password) && !empty($password) && !empty($re_password)){
			if(strlen($password)<=5){
				echo ucwords('password must be 6 or more character .');
			}else{
				if($password != $re_password){
					echo ucwords('password do not match . try again ! ');
				}else{
					$sql=mysql_query("select email from user where email='".$email."' ");
                    if(mysql_num_rows($sql)>=1){
						echo ucwords('This e-mail '.$email.' already register. please try another email.');
					}else{
						$sql=mysql_query("select username from user where username='".$username."' ");
						if(mysql_num_rows($sql)>=1){
							echo ucwords('This username '.$username.' already register. please try another username.');
						}else{
						if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
							echo ucwords('email is not validate !');
						}else{
							if(!isset($_POST['captcha'])){
								$text='QWERTYUIPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789';
								$code='';
                                for($i=1;$i<=6;$i++){
									$start=rand(0, strlen($text));
	                                $code.=substr($text, $start, 1);
                                }
	                            $_SESSION['captcha']=$code;
                            }else{
								if($_SESSION['captcha']==$_POST['captcha']){
								$sql=mysql_query("insert into `user` (email,username,password,register_date) values ('".$email."','".$username."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($date)."')") or die(mysql_error()) ;
								    if($sql){
									    echo 'You\'r Register Done ! Please <a href="login_user.php" style="text-decoration:none;color:blue;">Log-In </a> Here .'; 
							        }else{
								        echo'Sorry, We Couldn\'t Register You At This Time.Please Try Again Later !' ;
							        }
	                            }else{
									echo 'Incorrect Match Security Image, Please Try Again!';
		                            $text='QWERTYUIPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789';
                                    $code='';
                                    for($i=1;$i<=6;$i++){
			                        $start=rand(0, strlen($text));
	                                $code.=substr($text, $start, 1);
                                }
		                        $_SESSION['captcha']=$code;
	                         }
                          }
						
					    }
					}  
				}
			}
		}
		}else{
			echo ucwords('these fields are required * !');
		}
	}
}else{
	header('location:http://localhost/store/index.php');
}

$text='QWERTYUIPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789';
$code='';
for($i=1;$i<=6;$i++){
$start=rand(0, strlen($text));
$code.=substr($text, $start, 1);
}
$_SESSION['captcha']=$code;
?>
</div>
      <div class="form1">
<div class="head"><h2>Register Form</h2><home><a href="../index.php">Home</a></home></div><br /><br />
<form action="register_user.php" method="post">
<label>E-mail</label><br />
<input type="text" name="email" maxlength="254" placeholder="You@youremail.com"  /><r>&nbsp;(Required*)</r><br /><br />
<label>Username</label><br />
<input type="text" name="username" maxlength="254" placeholder="ex:your name"  /><r>(Required*)</r><br /><br />
<label>Password</label><br />
<input type="password" name="password" maxlength="254" />&nbsp;<r>(Required*)</r><br /><br />
<label>Re-type Password</label><br />
<input type="password" name="re_password" maxlength="254" />&nbsp;<r>(Required*)</r><br /><br />
<label>Type the value you see :&nbsp;<r>(Security Image)</r></label><br />
<img src="http://localhost/store/storeuser/captcha.php" /> <br />
<input type="text" size="6" name="captcha" id="captcha" />&nbsp;<r>(Required*)</r><br /><br />
<r>Important Note :</r> By Register in our website, you accept our <a href="http://localhost/store/ourwebsite/terms&conditions.php">Terms & Conditions </a><br /><br />
<input class="submit-register" type="submit" value="Register" />
</form>

</div>
        
      </div>
        
   </main>
   
   </div>
   

   <?php include_once('../template_footer.php')?>
   
</div>


</body>
</html>