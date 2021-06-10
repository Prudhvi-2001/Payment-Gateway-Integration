<?php
$name = $_POST['name'];

$email = $_POST['email'];

$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$feed = $_POST['feed'];
//Database connection
$conn = new mysqli('localhost', 'root','','donation');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);

}else{
	$stmt = $conn->prepare("insert into details(name,email,address,city,state,pincode,feed) values(?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssii",$name, $email, $address, $city, $state, $pincode,$feed);
	$stmt->execute();
	echo "<script>alert('ThankYou for Donating You will receive a call from our operator')</script>";
	echo "<script>location.href='index.html'</script>";
	$stmt->close();
	$conn->close();
}
?>
