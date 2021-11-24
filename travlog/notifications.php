<?php
require "init.php";

$username = $_GET["username"];
$sql =" select customer_id from customer where emailid='$username'"; 
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$customer_id=$row['customer_id'];

$sql =" select trip_id from trips where customer_id='$customer_id' ";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_all($result);

    $status="ok";
    echo json_encode(array('response'=>$status,'trips'=>$row));
}
else{
    $status="No notifications";
    echo json_encode(array('response'=>$status));
}
mysqli_close($con);
?>