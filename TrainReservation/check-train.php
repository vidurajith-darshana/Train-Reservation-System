<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$fromSid=$_GET['fromSid'];
$fromHour=$_GET['fromHour'];
$toHour=$_GET['toHour'];
$am_pm=$_GET['am_pm'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select type.name,train.tid,train_name,arival,depature from train,train_type,type,train_station where train.tid=train_type.tid and train_type.trtpid=train_station.trtpid and  train_station.trtpid in(select trtpid from train_station where (hour between '$fromHour' and '$toHour' ) and am_pm='$am_pm') and sid='$fromSid' and type.tpid=train_type.tpid group by train_station.trtpid";
    $result= mysqli_query($connection, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    print json_encode($rows);
    mysqli_close($connection);

}