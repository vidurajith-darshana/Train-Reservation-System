<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$tid=$_GET['tid'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select class.clid,class.name from class,train,train_type,room where room.clid=class.clid and train_type.trtpid=room.trtpid and train_type.tid=train.tid and train.tid='$tid' group by class.clid";
    $result= mysqli_query($connection, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    print json_encode($rows);
    mysqli_close($connection);

}