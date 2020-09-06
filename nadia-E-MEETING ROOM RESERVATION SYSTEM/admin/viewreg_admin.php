
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Booking</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
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
            		
                	<a href="admin_logout.php"  class="logout"  >Log out</label>
                	
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
        	<ul style="margin-left: -150px;">
            	<li><a href="http://localhost/nad/admin/index.php">Home</a></li>
                <li><a href="http://localhost/nad/about.php">About Us</a></li>
				<li><a href="http://localhost/nad/services.php">Our Services</a></li>
				<li><a href="http://localhost/nad/gallery.php">Gallery</a></li>
                <li><a href="http://localhost/nad/contact.php">Contact Us</a></li>
                <li><a href="http://localhost/nad/faq.php">FAQs</a></li>
            </ul>
        </div><!--#access-->
        
    </div><!--#header-->
    
<h3 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">List Of Booking</h3>
<h5>*Please Click Order No to view details of Booking</h5>

   <?php
include('../connect_to_mysql.php');
$admin_list='';
$sql=mysql_query("SELECT * FROM room_reg as a inner join utilities as b on a.order_no = b.order_no inner join refreshment as c on a.order_no = c.order_no inner join payment as d on a.order_no = d.order_no left outer join customer_details as e on a.user_id = e.id where d.paid = 'YES'");

$productcount=mysql_num_rows($sql);//count the out put amount
if($productcount>0){
	while($rows=mysql_fetch_array($sql)){
		$order_no=$rows['order_no'];
		$comp_name=$rows['comp_name'];
		$email=$rows['email'];
		$firstname=$rows['first_name'];
		$lastname=$rows['last_name'];
		$phone_no=$rows['phone_no'];
		
		$date_event=strftime('%d/%b/%Y',strtotime($rows['date_event']));
		
		$admin_list.="
			<tr><td><a style='text-decoration:underline;color:red' href='details_booking.php?id=".$order_no."'>$order_no</a></td><td>$comp_name</td><td>$email</td><td>$firstname</td><td>$lastname</td><td>$phone_no</td><td>$date_event</td></tr>";
		
	}
}else{
	$admin_list='You have no users listed  yet .';
}
?>
			
			
           <div>
		    <div style="text-align:center;font-size:22px;"><form action="viewreg_admin.php" method="post" > <label style=" margin-right: 7px; font-size: 15px;">First Name/Company Name</label><input type="text" name="name" placeholder="Key in First Name/Company Name" style="width:250px;height:25px;padding:5px;border-radius:6px;border:2px solid blue;"  />
			<input type="submit" value="Search"  style="width:100px;margin-left:10px;margin-top:20px;height:30px;"  /></form>
		  </div> <br /><br /><br />
		  
		  <?php
					if(isset($_POST['name'])){
					$name=$_POST['name'];
					$admin_list="";
					if(!empty($name)){
						$connect=@mysql_connect('localhost','root','');
						if($connect==false){
						die('Error with Connect!');
					}
						$db=@mysql_select_db('mbsb');
						if($db==false){
							die('Error with Connect DataBase!');
						}
					$query="SELECT * FROM room_reg as a inner join utilities as b on a.order_no = b.order_no inner join refreshment as c on a.order_no = c.order_no inner join payment as d on a.order_no = d.order_no left outer join customer_details as e on a.user_id = e.id   where `name` like '%".mysql_real_escape_string($name)."%' or `comp_name` like '%".mysql_real_escape_string($name)."%' ";
					$result=mysql_query($query);
					while($rows=mysql_fetch_assoc($result)){
						$order_no1=$rows['order_no'];
						$comp_name1=$rows['comp_name'];
						$email1=$rows['email'];
						$firstname1=$rows['first_name'];
						$lastname1=$rows['last_name'];
						$phone_no1=$rows['phone_no'];
						$date_event1=strftime('%d/%b/%Y',strtotime($rows['date_event']));
						$admin_list.= "
			<tr><td><a style='text-decoration:underline;color:red' href='view_booking.php?id=".$order_no1."'>$order_no1</a></td><td>$comp_name1</td><td>$email1</td><td>$firstname1</td><td>$lastname1</td><td>$phone_no1</td><td>$date_event1</td></tr>";
					}
					  
					}else{
						$sql=mysql_query("SELECT * FROM room_reg as a inner join utilities as b on a.order_no = b.order_no inner join refreshment as c on a.order_no = c.order_no inner join payment as d on a.order_no = d.order_no left outer join customer_details as e on a.user_id = e.id where d.paid = 'YES'");
						$productcount=mysql_num_rows($sql);//count the out put amount
						if($productcount>0){
							while($rows=mysql_fetch_array($sql)){
								$order_no=$rows['order_no'];
								$comp_name=$rows['comp_name'];
								$email=$rows['email'];
								$firstname=$rows['first_name'];
								$lastname=$rows['last_name'];
								$phone_no=$rows['phone_no'];	
								$date_event=strftime('%d/%b/%Y',strtotime($rows['date_event']));
								$admin_list.="
									<tr><td><a style='text-decoration:underline;color:red' href='view_booking.php?id=".$order_no."'>$order_no</a></td><td>$comp_name</td><td>$email</td><td>$firstname</td><td>$lastname</td><td>$phone_no</td><td>$date_event</td></tr>";
							}
						}else{
							$admin_list='You have no booking list  yet .';
						}
					}	
				}
				?>
		   
            	
                <table style="margin-left: 14px;margin-right: 27px;margin-top: -24px;" border="1" cellpadding="15" cellspacing="1" style="color: #0000;"  >
                <tr style="background-color:#04A2C6;    color: white;    font-weight: bold;">
                <td>Order No.</td>
				<td>Company Name</td>
				<td>Email</td>
				<td>First Name</td>
				
				<td>Last Name </td>
				<td>Phone No.</td>
			    <td>Date Event </td>
			
		
			</tr>
                <?php echo $admin_list; ?>
            </table>
			
			<br>
					<br>
				<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br>
            </div>

    </div>
	
  
</div><!--#wrapper-->
<?php include("../template_footer2.php");?>
<?php include("../template_footer.php");?>

</body>
</html>
