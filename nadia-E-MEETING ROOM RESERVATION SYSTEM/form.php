


<?php
require'connect_to_mysql.php';
require'users/core.php';
if(login()){
	$username=getuserfield('first_name');
	$date=date('l | d - M - Y');
	$id=getuserfield('id');
	$email=getuserfield('email');
	echo 'Welcome  '.$username.'  Today : '.$date.' ';
}else{
	header('location:http://localhost/nad/index.php');
}
?>

<?php
if(isset($_GET['id'])){
	include('connect_to_mysql.php');
	$id=preg_replace('#[^0-9]#i','',$_GET['id']);//just can put number instead id no more
	$sql_id=mysql_query("select * from `room_reg` where `order_no`='".$id."' limit 1");
	$sql_utility=mysql_query("select * from `utilities` where `order_no`='".$id."' limit 1");
	$sql_refreshment=mysql_query("select * from `refreshment` where `order_no`='".$id."' limit 1");
	$count=mysql_num_rows($sql_id);
	$count_utility=mysql_num_rows($sql_utility);
	$count_refreshment=mysql_num_rows($sql_refreshment);
	if($count>0){
		//get all product details
		while($rows=mysql_fetch_array($sql_id)){
		    $ref_number=$rows['order_no'];
			$name=$rows['name'];
			 $ic=$rows['ic'];
			$date=$rows['date_event'];
			 $room_price=$rows['room_price'];
			  $room_type=$rows['room_type'];
			$pax=$rows['pax'];
			$utility_price=$rows['utilities_price'];
		}	
	}else{
		echo'That order doesn\'t exist .';
	    exit();	
	}
	if($count_utility>0){
		//get all product details
		while($rows_utility=mysql_fetch_array($sql_utility)){
		   $projector=$rows_utility['projector'];
		   $whiteboard=$rows_utility['whiteboard'];
		   $pen_pencil=$rows_utility['pen_pencil'];
		   $paper=$rows_utility['paper'];
		   $printer=$rows_utility['printer'];
		   $mic=$rows_utility['mic'];
		   $speaker=$rows_utility['speaker'];
		}	
	}
	
	if($count_refreshment>0){
		//get all product details
		while($rows_refreshment=mysql_fetch_array($sql_refreshment)){
		  $breakfast1=$rows_refreshment['breakfast1'];
		  $breakfast2=$rows_refreshment['breakfast2'];
		  $hitea1=$rows_refreshment['hitea1'];
		  $hitea2=$rows_refreshment['hitea2'];
		  $lunch1=$rows_refreshment['lunch1'];
		  $lunch2=$rows_refreshment['lunch2'];
		  $total_refreshment=$rows_refreshment['total_refreshment'];
		}	
	}
	$total=($pax*$total_refreshment)+($room_price)+($utility_price);
}


?>











	
    

			
			


<?php
require 'pdfcrowd.php';

try
{   
    // create an API client instance
    $client = new Pdfcrowd("deeya2love", "e3f810ab415bd041499e10edcc20d8ac");

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertHtml('<h4 style="text-decoration:italic">Thank You</h4><br><h3 style="text-align:left;color:black;margin-left:70px ;font-family:Times New Roman">Reference Invoice : COPY ORI SDN BHD</h3>

 
			
			<hr>
           <div>
		   
		   
            	
             

 
			<form action="details_booking.php" method="post" style="margin-top:30px;">
		
			
				<h4>Room Registration Details   :</h4> 
			
			    <label>Order No. :</label><label style="margin-left: 70px"> '.$ref_number.'</label><br><br>
				<label>Name :</label><label style="    margin-left: 103px">'.$name.'</label><br /><br />
				<label>IC :&nbsp;</label><label style="    margin-left: 126px;">'.$ic.'</label><br /><br/>
				<label style="padding-right: 107px;">Date :&nbsp;</label><label>'. $date.'</label><br /><br/>
				<label>Room Type :</label> <label style="margin-left: 55px;">'.$room_type.'</label>
               
 				</select><br /><br />
				<label>Pax :</label><label style="    margin-left: 124px;">'.$pax.'</label><br /><br />
				
				<h4>Utilities   :</h4> 
				
				<label>Projector (RM80)  :</label><label > '.$projector.'</label><br /><br />
				<label>Whiteboard (RM50):&nbsp;</label><label>'.$whiteboard.'</label><br /><br/>
				<label>Pen & Pencil (RM30):&nbsp;</label><label>'.$pen_pencil.'</label><br /><br/>
				<label>Paper (RM30) :&nbsp;</label><label>'.$paper.'</label><br /><br/>
				<label>Printer (RM60) :</label><label>'.$printer.'</label><br /><br/>
				<label>Microphone (RM20):&nbsp;</label><label>'.$mic.'</label><br /><br/>
				<label>Speaker (RM30):</label><label>'.$speaker.'</label><br /><br/>
				
				<h4>Refreshment   :</h4> 
				
				<label>Nasi Lemak & Tea :</label><label>'.$breakfast1.'</label><br /><br/>
				<label>Toast With Tea:&nbsp;</label><label>'.$breakfast2.'</label><br /><br/>
				<label>Nasi Kerabu & Orange Juice:&nbsp;</label><label>'.$lunch1.'</label><br /><br/>
				<label>Nasi Tomato & Orange Juice :&nbsp;</label><label>'.$lunch2.'</label><br /><br/>
				<label>Variety Kuih :</label><label>'.$hitea1.'</label><br /><br/>
				<label>Tea & Coffee:&nbsp;</label><label>'.$hitea2.'</label><br /><br/>
				
				<label>Total Price (RM)  :</label><label>'.$total.'</label><br /><br/>
				<br /><br /><br><br>
				
				<input type="hidden" name="ref" value="<?php if(isset($ref_number)){ echo $ref_number;} ?>" />
				
				<br>
				<br>
				<br>
				
			</form>');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"invoice.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>
