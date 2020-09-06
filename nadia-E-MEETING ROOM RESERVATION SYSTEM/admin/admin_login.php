<!---------------Check Session---------------->
<?php
session_start();
if(isset($_SESSION['manager'])){
	header('location:index.php');
	exit();
}
?>

<?php
if(isset($_POST['username']) && isset($_POST['password'])){
	$manager=preg_replace('#[^A-Za-z0-9]#i','',$_POST['username']);
    $password=preg_replace('#[^A-Za-z0-9]#i','',$_POST['password']);
	include('../connect_to_mysql.php');
    $sql=mysql_query("select id from admin where name='".mysql_real_escape_string($manager)."' and password='".mysql_real_escape_string($password)."' limit 1");
    $existcount=mysql_num_rows($sql);
    if($existcount==1){
		while($row=mysql_fetch_array($sql)){
	     	$id=$row['id'];
		}
		$_SESSION['id']=$id;
		$_SESSION['manager']=$manager;
		$_SESSION['password']=$password;
		header('location:index.php');
		exit();
	}else{
		$out='That information is incorrect, try again please!';
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Admin Area</title>

<meta name="viewport" content="width=device-width,initial-scale=1"  />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>

<script type="text/javascript">		
var horizontal_offset="9px" //horizontal offset of hint box from anchor link

/////No further editting needed

var vertical_offset="0" //horizontal offset of hint box from anchor link. No need to change.
var ie=document.all
var ns6=document.getElementById&&!document.all

function getposOffset(what, offsettype){
var totaloffset=(offsettype=="left")? what.offsetLeft : what.offsetTop;
var parentEl=what.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge(obj, whichedge){
var edgeoffset=(whichedge=="rightedge")? parseInt(horizontal_offset)*-1 : parseInt(vertical_offset)*-1
if (whichedge=="rightedge"){
var windowedge=ie && !window.opera? iecompattest().scrollLeft+iecompattest().clientWidth-30 : window.pageXOffset+window.innerWidth-40
dropmenuobj.contentmeasure=dropmenuobj.offsetWidth
if (windowedge-dropmenuobj.x < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure+obj.offsetWidth+parseInt(horizontal_offset)
}
else{
var windowedge=ie && !window.opera? iecompattest().scrollTop+iecompattest().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj.contentmeasure=dropmenuobj.offsetHeight
if (windowedge-dropmenuobj.y < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure-obj.offsetHeight
}
return edgeoffset
}

function showhint(menucontents, obj, e, tipwidth){
if ((ie||ns6) && document.getElementById("hintbox")){
dropmenuobj=document.getElementById("hintbox")
dropmenuobj.innerHTML=menucontents
dropmenuobj.style.left=dropmenuobj.style.top=-500
if (tipwidth!=""){
dropmenuobj.widthobj=dropmenuobj.style
dropmenuobj.widthobj.width=tipwidth
}
dropmenuobj.x=getposOffset(obj, "left")
dropmenuobj.y=getposOffset(obj, "top")
dropmenuobj.style.left=dropmenuobj.x-clearbrowseredge(obj, "rightedge")+obj.offsetWidth+"px"
dropmenuobj.style.top=dropmenuobj.y-clearbrowseredge(obj, "bottomedge")+"px"
dropmenuobj.style.visibility="visible"
obj.onmouseout=hidetip
}
}

function hidetip(e){
dropmenuobj.style.visibility="hidden"
dropmenuobj.style.left="-500px"
}

function createhintbox(){
var divblock=document.createElement("div")
divblock.setAttribute("id", "hintbox")
document.body.appendChild(divblock)
}

if (window.addEventListener)
window.addEventListener("load", createhintbox, false)
else if (window.attachEvent)
window.attachEvent("onload", createhintbox)
else if (document.getElementById)
window.onload=createhintbox

</script>

</head>

<body>
<div id="wrapper"  >

	<div id="header">
    	
        <div id="top-nav">
        	<div id="banner-1">
            	
            </div><!--#banner-1-->
            <div id="banner-2">
            	
            </div><!--banner-2-->
            <div id="top-menu">
            	<div class="nav">
            		
                	
                	
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
        	<ul>
            	<li><a href="http://localhost/nad/user_main.php">Home</a></li>
                <li><a href="http://localhost/nad/about.php">About Us</a></li>
				<li><a href="http://localhost/nad/services.php">Our Services</a></li>
				<li><a href="http://localhost/nad/gallery.php">Gallery</a></li>
                <li><a href="http://localhost/nad/contact.php">Contact Us</a></li>
                <li><a href="http://localhost/nad/faq.php">FAQs</a></li>
            </ul>
        </div><!--#access-->
        
    </div><!--#header-->
   
   <div class="main">
   
   <main role="main">
      
       
      <div class="center">
     <div class="login-admin">
<h2>Please LogIn To Manage the System</h2>
<form id="form1" name="form1" method="post"  action="admin_login.php" style="text-align:center;">
Username:<br /><br />
<input type="text" class="test" name="username" id="username"  maxlength="30" /><a href="#" class="hintanchor" onMouseover="showhint('Please choose a username. Should consist of Admin users.', this, event, '150px')">[?]</a>
<br /><br />
Password:<br /><br />
<input type="password" class="test" name="password" id="password"  maxlength="30" /><a href="#" class="hintanchor" onMouseover="showhint('Enter the desired password.', this, event, '200px')">[?]</a>
<br /><p style="color:#C00; font:12px Georgia, 'Times New Roman', Times, serif;text-align: center;
    margin-top: 20px;">(All fields are required*)</p>
<input type="submit" name="button" id="button" value="Log In!" />
</form>
</div><br /><br />
<div style="margin-left:34%;color:red;margin-bottom: 20px;">
<?php if(isset($out)){echo $out;} ?>
</div>
        
      </div>
      
      
     
        
   </main>
   
   </div>
   

  
   
</div>

<?php include("../template_footer2.php");?>
<?php include("../template_footer.php");?>
</body>
</html>