<?php

require "init.php";
$trip_id = $_GET["trip_id"];
$title=$_GET["title"];
$description=$_GET["description"];
$drive_link=$_GET["drive_link"];
$start_date=$_GET["start_date"];
$end_date=$_GET["end_date"];

date_default_timezone_set('Asia/Kolkata');

if($start_date>$end_date)
{
	$status = "Trip cannot be added as end date cannot be before start date!";
}

else if(date("Y/m/d")>$end_date)
{
    $status="Trip cannot be added as it already ended!";
}

else
{

	$sql="UPDATE trips SET title = $title, description = $description, drive_link = $drive_link, start_date = $start_date, end_date = $end_date WHERE trip_id = $trip_id";
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