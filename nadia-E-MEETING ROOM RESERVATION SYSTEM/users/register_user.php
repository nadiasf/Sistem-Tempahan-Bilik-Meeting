<title>Register</title>

<?php
require '../storescripts/connect_to_mysql.php';
require 'core.php';
if(login()){
	header('location:http://localhost/store/index.php');
}else{
    include 'register_user_form.php';
}

?>