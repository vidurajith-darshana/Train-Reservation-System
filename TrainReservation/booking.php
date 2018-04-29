<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/20/2018
 * Time: 9:18 AM
 */

session_start();

$cid=$_SESSION['cid'];

$payment=$_GET['payment'];
$am_pm=$_GET['am_pm'];

$jsSeatObject=$_GET['jsSeatObject'];
$seatObject=json_decode($jsSeatObject,true);

$jsStationObject=$_GET['jsStationObject'];
$stationObject=json_decode($jsStationObject,true);

$date=$_GET['date'];
$end=$_GET['end'];
$start=$_GET['start'];



$connection=mysqli_connect('localhost','root','vidura','train_reservation');

if(!$connection){

    echo mysqli_error($connection);
}else{

    mysqli_autocommit($connection,false);

    $insertBookingSQL="insert into booking VALUES (0,'$payment','$cid')";
    $booking=mysqli_query($connection,$insertBookingSQL);

    $bid=mysqli_insert_id($connection);

    if($booking) {

        $count = 0;
        $count1=0;
        for ($x = 0; $x < sizeof($seatObject); $x++) {

            $insertSeatBookingSQL = "insert into seat_booking VALUES(0,'{$seatObject[$x]['stid']}','$bid','$date','$start','$end','$am_pm') ";
            if (!mysqli_query($connection, $insertSeatBookingSQL)) {
                break;
            }
            $sbid = mysqli_insert_id($connection);

            for ($y = 0; $y < sizeof($stationObject); $y++) {
                $insertSeatStationBookSQL = "insert into seat_booking_station VALUES ('$sbid','{$stationObject[$y]['statID']}')";
                if (!mysqli_query($connection, $insertSeatStationBookSQL)) {
                    break;
                }
                $count1++;
            }
            $count++;
        }
    }
    if($count==sizeof($seatObject) && $count1==(sizeof($seatObject)*sizeof($stationObject))){
        mysqli_commit($connection);
        echo 'Success';
    }else{
        mysqli_rollback($connection);
        echo 'Fail';
    }

}