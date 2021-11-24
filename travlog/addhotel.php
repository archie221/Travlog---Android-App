<?php

require "init.php";
$trip_id = $_GET["trip_id"];
$hotel_id = $_GET["hotel_id"];
$check_in = $_GET["check_in"];
$check_out = $_GET["check_out"];
$cost = $_GET["cost"];

date_default_timezone_set('Asia/Kolkata');

if($check_in>$check_out)
{
    $status = "Hotel Booking not added : You cannot checkout before checkin!!";
}
else
{
    $sql="INSERT INTO hotelbooking(hotelid,trip_id,checkin,checkout,cost)  VALUES
        ($hotel_id, $trip_id, $check_in, $check_out, $cost)";
    if(mysqli_query($con,$sql))
    {
        $status = "ok";
    }
    else
    {
        $status="error";
    }
}
echo json_encode(array("response"=>$status));
mysqli_close($con);
?>