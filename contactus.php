<?php
$name = $_POST['name'];

$email = $_POST['email'];
$number = $_POST['number'];
//Database connection
$conn = new mysqli('localhost', 'root','','contact');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);

}else{
	$stmt = $conn->prepare("insert into contactus(name,email,number) values(?,?,?)");
	$stmt->bind_param("ssi",$name, $email, $number);
	$stmt->execute();
	echo "<script>alert('You will receive a message from our operator')</script>";
	echo "<script>location.href='index.html'</script>";
	$stmt->close();
	$conn->close();
}
?>
