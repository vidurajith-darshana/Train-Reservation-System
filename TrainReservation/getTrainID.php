<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

$train=$_GET['train'];

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select tid from train where train_name='$train'";
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result)>0) {
        // output data of each row
        while($row = mysqli_fetch_array($result)) {
            echo ($row['tid']);
        }
    } else {
        echo 1;
    }
    mysqli_close($connection);

}