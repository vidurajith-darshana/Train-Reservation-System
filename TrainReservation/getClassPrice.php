<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$clid=$_GET['clid'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select price from price where clid='$clid'";
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result)>0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            echo ($row['price']);
        }
    } else {
        echo 1;
    }
    mysqli_close($connection);

}