<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$time=$_GET['time'];
$type=$_GET['type'];
$tid=$_GET['tid'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select train_type.trtpid from train_type,type,train_station,train where train_station.arival='$time' and type.name='$type' and train.tid='$tid' and train_type.tpid=type.tpid and train_type.trtpid=train_station.trtpid and train.tid=train_type.tid";
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result)>0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            echo ($row['trtpid']);
        }
    } else {
        echo 1;
    }
    mysqli_close($connection);

}