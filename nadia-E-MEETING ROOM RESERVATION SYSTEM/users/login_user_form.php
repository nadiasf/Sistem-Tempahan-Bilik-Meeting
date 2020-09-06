<style type="text/css">
body {
 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: Georgia, "Times New Roman", Times, serif;
  font-size:12px;
}

.login-card {
	font-size:12px;
  padding: 40px;
  width: 274px;
  background-color: #F7F7F7;
  margin: 40px auto 10px;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
}

.login-card h1 {
  font-weight: 100;
  text-align: center;
  font-size: 2.3em;
}

.login-card input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
  font-size: 12px;
  height:30px;
}

.login-card input[type=text], input[type=password] {
  height: 30px;
  border-radius:5px;
  font-size: 12px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.login-card input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.login {
  text-align: center;
  font-size: 12px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 30px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.login-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  border-radius:5px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.login-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.login-card a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
}

.login-card a:hover {
  opacity: 1;
}

.login-help {
  width: 100%;
  text-align: center;
  font-size: 12px;
}
</style>
<title>Log In Form</title>
<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />




<div class="login-card">
    <h1>Log In</h1><br>
<form action="<?php echo $current_file; ?>" method="post">
<input type="text" name="email" placeholder="Email" /><br />
<input type="password" name="password" placeholder="Password" /><br />
<input type="submit" value="Login" name="login" class="login login-submit" />
</form>

      <div class="login-help">
      <a href="http://localhost/nad/index.php">Home</a> | <a href="http://localhost/nad/register.php">Register</a> | <a href="http://localhost/nad/users/forget_password.php">Forgot Password</a>
      </div>
</div>


<div align="center" style="color:#930; font-size:12px;">
<?php
if(isset($_POST['email'])&& isset($_POST['password'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	if(!empty($email)&& !empty($password)){
		$query="select id from `customer_details` where `email`='".mysql_real_escape_string($email)."' and `password`='".mysql_real_escape_string($password)."'";
		if($query_run=mysql_query($query)){
			$query_num_rows=mysql_num_rows($query_run);
			if($query_num_rows==0){
				echo 'Invalid Email or Password ';
			}elseif($query_num_rows==1){
				$user_id=mysql_result($query_run,0,'id');
				$_SESSION['user_id']=$user_id;
				header('location:login_user.php');
			}
		}
	}else{
		echo'You must key in Email and Password ';
	}
}
?>
</div>
