<?php
echo "HAHA";
include("dblink.php");
$usn=$_POST["username"];
$utel=$_POST["telph"];
$uem=$_POST["em"];
$uno=$_POST["no"];
$ustreet=$_POST["street"];
$uquarter=$_POST["quarter"];
$utownship=$_POST["township"];
$udivision=$_POST["division"];
$uaddr=$uno."/".$ustreet."/".$uquarter."/".$utownship."/".$udivision;
$unrc=$_POST["nrcname"];
$upw=$_POST["pwname"];
$ucpw=$_POST["cpwname"];
$ubrief=$_POST["briefName"];
$uradio=$_POST["group3"];

if (strcmp($uradio, 'seller') == 0) {
	$selectQuery="Select * from seller where s_email='$uem';";
	
	$results1=mysqli_query($con,$selectQuery);
	$row = mysqli_num_rows($results1);
	if($row <=0){
    $query = "INSERT INTO `seller`(sid,sname,s_phoneno,s_email,s_address,s_nrc_no,s_description,s_profile_image,s_pwd)  VALUES ('509','$usn','$utel','$uem','$uaddr','$unrc','$ubrief','C:Picturespopo','pw');";
	$results=mysqli_query($con,$query); 
	echo "<script>alert('Seller Account has been created')</script>";
	mysqli_close($con);
    }

}
else{
	$selectQuery="Select * from buyer where b_email='$uem';";
	
	$results1=mysqli_query($con,$selectQuery);
	$row = mysqli_num_rows($results1);
	if($row <=0){
	$query = "INSERT INTO `buyer`(bid,bname,b_phoneno,b_email,b_profile_image,b_nrc_no,b_address,b_pwd) VALUES ('507','$usn','$utel','$uem','C:Picturesjames ','$unrc','$uaddr','$upw');";

	$results=mysqli_query($con,$query); 
	echo "<script>alert('Buyer Account has been created')</script>";
	mysqli_close($con);
}
else{
	echo "ELse case";
}
}


?>
