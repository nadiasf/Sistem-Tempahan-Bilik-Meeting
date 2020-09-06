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
	echo 'Welcome to store admin '.$manager.'  Today is :'.$date.' .You can <a style="color:#09f; text-decoration: none;" href="admin_logout.php">Log Out</a> here or Back to  <a href="promotion_list.php" align="right" style="color:#09f; text-decoration: none;"> Manage Promotion </a>';
}
?>
</div>

<!-----------Promotion Form PHP Register In DataBase----------------------->
<?php
include('../storescripts/connect_to_mysql.php');
if(isset($_POST['product_name'])&& isset($_POST['product_price'])&& isset($_POST['category'])&& isset($_POST['subcategory'])){
	$product_name=$_POST['product_name'];
	$price=$_POST['product_price'];
	$sale_price=$_POST['sale'];
	$category=$_POST['category'];
	$subcategory=$_POST['subcategory'];
	$color=$_POST['color'];
	$size=$_POST['size'];
	$details=$_POST['product_detail'];
	$date=date('Y-m-d');
	if(!empty($product_name)&&!empty($price)&&!empty($category)&&!empty($subcategory)){
		$sql=mysql_query("select id from promotion where product_name='".mysql_real_escape_string($product_name)."' limit 1");
		$productmatch=mysql_num_rows($sql);
		if($productmatch>0){
			$no1='Sorry you tried to place a duplicate "Product Name" into system, <a href="promotion_list.php" style="text-decoration:none;color:blue;">Click Here</a>';
		}else{
			$sql=mysql_query("insert into promotion values ('','".mysql_real_escape_string($product_name)."','".mysql_real_escape_string($price)."','".mysql_real_escape_string($sale_price)."','".mysql_real_escape_string($details)."','".mysql_real_escape_string($category)."','".mysql_real_escape_string($subcategory)."','".mysql_real_escape_string($color)."','".mysql_real_escape_string($size)."','".$date."')")or die(mysql_error());
            $pid=mysql_insert_id();
			$newname="$pid.jpg";
			move_uploaded_file($_FILES['image']['tmp_name'],"../image/promotion/type1/$newname");
			move_uploaded_file($_FILES['image2']['tmp_name'],"../image/promotion/type2/$newname");
			move_uploaded_file($_FILES['image3']['tmp_name'],"../image/promotion/type3/$newname");
			move_uploaded_file($_FILES['image4']['tmp_name'],"../image/promotion/type4/$newname");
			$yes1='Add Item Done. Back to promotion List <a href="promotion_list.php" style="text-decoration:none; color:blue">Click Here</a>';
		}
	}else{
		$no2='All Fields Are Required *';
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Promotion Item</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<link href="http://localhost/store/style/style.css" rel="stylesheet" type="text/css" media="screen" />
<!--------------------Promotion Form StylSHeet------------------------->
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
#myform label{
	font:12px  Georgia, "Times New Roman", Times, serif;
}
#myform .product {
	border:1px solid #B7B7B7;
	width:350px;
	height:25px;
	border-radius:4px;
	margin-left:25px;
	margin-top:20px;
	font-size:12px;
}
#myform .price{
	border:1px solid #B7B7B7;
	width:70px;
	height:25px;
	border-radius:4px;
	margin-left:28px;
	font-size:12px;
}
#myform .sale{
	border:1px solid #B7B7B7;
	width:70px;
	height:25px;
	border-radius:4px;
	margin-left:48px;
	font-size:12px;
}
#myform .category{
	width:150px;
	height:25px;
	border-radius:4px;
	margin-left:54px;
	border:1px solid #B7B7B7;
	font-size:12px;
}
#myform .sub-category{
	width:150px;
	height:25px;
	border-radius:4px;
	margin-left:33px;
	border:1px solid #B7B7B7;
	font-size:12px;
}
#myform .color{
	width:250px;
	height:25px;
	border-radius:4px;
	margin-left:81px;
	border:1px solid #B7B7B7;
	font-size:12px;
}
#myform .size{
	width:250px;
	height:25px;
	border-radius:4px;
	margin-left:88px;
	border:1px solid #B7B7B7;
	font-size:12px;
}
#myform .product-detail{
	width:350px;
	margin-left:22px;
	height:150px;
	border-radius:4px;
	border:1px solid #B7B7B7;
	font-size:11px;
}
#myform .file{
	width:250px;
	height:25px;
	border-radius:4px;
	font-size:12px;
}
#myform .submit{
	width:25%;
	border-radius:3px;
	color:white;
	background-color:#181E46;
	border:1px solid #181E46;
	margin-left:2%;
}
#myform .submit:hover{
	bcrder-radius:3px;
	color:white;
	background-color:#F37232;
	border:1px solid #F37232;
}
#myform .textarea{
	float:left;
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
<?php if(isset($no1)){echo $no1;} ?>
<?php if(isset($no2)){echo $no2;} ?>
<?php if(isset($yes1)){echo $yes1;} ?>
</div>
<!-----------------------Promotion Form ------------------------------------------->

<h2>Add New Promotion</h2>

<form action="promotion_form.php" enctype="multipart/form-data" name="myform" id="myform" method="post">
<label>Product Name :*</label><input type="text" name="product_name" class="product" maxlength="255" /><br /><br />
<label>Product Price :*&nbsp;</label><input type="text" name="product_price" class="price" maxlength="16" />&nbsp;&nbsp;RM<br /><br/>
<label>Sale Price :&nbsp;&nbsp;&nbsp;</label><input type="text" name="sale" class="sale" maxlength="16" />&nbsp;&nbsp;RM<br /><br/>
<label>Category :*</label><select name="category" class="category">
<option value="Clothing">Clothing</option>
<option value="Shoes">Shoes</option>
<option value="Accessories">Accessories</option>
<option value="Muslimwear">Muslim Wear</option>
 </select><br /><br />
<label>Subcategory :*</label><select name="subcategory" class="sub-category">
<option value="Shoes">Shoes</option>
<option value="Skirt">Skirt</option>
<option value="Dress">Dress</option>
<option value="Wedding Dress">Wedding Dress</option>
<option value="Evining Dress">Evining Dress</option>
<option value="Baju Kurung">Baju Kurung</option>
<option value="Tudung">Tudung</option>
<option value="Asseccories">Asseccories</option>
 </select><br /><br />
<label>Color :</label><input type="text" name="color" class="color" maxlength="30" /><br /><br />
<label>Size :</label><input type="text" name="size" class="size" maxlength="30" /><br /><br />
<label class="textarea">Product Details:</label>&nbsp;<textarea name="product_detail" class="product-detail"></textarea><br /><br />
<label>Product Image :</label><name style="margin-left:14px; color:#669;">Image 1</name><input type="file" name="image" class="file"/><br /><name style="color:#669;margin-left:104px">Image 2</name><input type="file" name="image2" class="file"/><br /><name style="margin-left:104px;color:#669;">Image 3</name><input type="file" name="image3" class="file"/><br /><name style="color:#669;margin-left:103px">Image 4</name><input type="file" name="image4" class="file"/><br /><br />
<input type="submit" value="Add New Item Now" class="submit" />
</form>


  
      </div>
      
      
      <?php include_once('../template_sidebar_right.php'); ?> 
        
   </main>
   
   </div>
   
   <?php include_once('../template_footer.php')?>

   
</div>

</body>
</html>



