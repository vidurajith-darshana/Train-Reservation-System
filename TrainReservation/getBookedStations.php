<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$start=$_GET['start'];
$trtpid=$_GET['trtpid'];
$end=$_GET['end'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select train_station.sid from train_station,station where train_station.sid between '$start' and '$end' and trtpid='$trtpid' and train_station.sid=station.sid";
    $result= mysqli_query($connection, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    print json_encode($rows);
    mysqli_close($connection);

}