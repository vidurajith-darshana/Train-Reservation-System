<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$clid=$_GET['clid'];
$trtpid=$_GET['trtpid'];
$room=$_GET['room'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select srid from sub_room,room where room.rid in(select room.rid from room,class,train_type where train_type.trtpid='$trtpid' and class.clid='$clid' and room.clid=class.clid and train_type.trtpid=room.trtpid and room.name='$room') and sub_room.rid=room.rid";
    $result= mysqli_query($connection, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    print json_encode($rows);
    mysqli_close($connection);

}