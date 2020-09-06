<title>Log In</title>

<?php
require '../connect_to_mysql.php';
require 'core.php';
if(login()){
	header('location:http://localhost/nad/user_main.php');
}else{
    include 'login_user_form.php';
}

?>