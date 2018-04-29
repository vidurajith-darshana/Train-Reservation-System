<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$sid=$_GET['sid'];
$am_pm=$_GET['am_pm'];
$start=$_GET['start'];
$end=$_GET['end'];
$date=$_GET['date'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select subroom_booking.srid from sub_room,booking,subroom_booking,subroom_booking_station,train_station,station where subroom_booking_station.sid='$sid' and subroom_booking.srbid=subroom_booking_station.srbid and sub_room.srid=subroom_booking.srid and date='$date' and start_hour between '$start' and '$end' and subroom_booking.am_pm='$am_pm' and train_station.sid=station.sid group by subroom_booking.srid";
    $result= mysqli_query($connection, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    print json_encode($rows);
    mysqli_close($connection);

}