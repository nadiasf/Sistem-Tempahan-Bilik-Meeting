<!--//////////////////////////////////////////////////////////////////
* Connect to Database
//////////////////////////////////////////////////////////////////////-->

<?php

	$db_host='localhost';
	$db_user='root';
	$db_pass='';
	$db_name='mbsb';
	$connect=@mysql_connect($db_host,$db_user,$db_pass) or die('Could not connect to Mysql !!!');
	$db=mysql_select_db($db_name) or die('No database with this name in Mysql');
	

?>