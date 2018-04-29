<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

session_start();

$json=file_get_contents("php://input");
$myArray=json_decode($json,true);

$email=$myArray[0]['value'];
$password=$myArray[1]['value'];


$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="select cid,name,pic from customer where email='$email' and password='$password'";
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result)>0) {

        while($row = mysqli_fetch_array($result)) {
            $_SESSION['cid']=$row['cid'];
            $_SESSION['user-name']=$row['name'];
            $_SESSION['user-pic']=$row['pic'];
        }

        echo 'found';
    } else {
        echo 'error';
    }
    mysqli_close($connection);

}