<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$trtpid=$_GET['trtpid'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select type.name from train_type,type where train_type.tpid=type.tpid and train_type.trtpid='$trtpid'";
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result)>0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            echo ($row['name']);
        }
    } else {
        echo 1;
    }
    mysqli_close($connection);

}