<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

session_start();

$json=file_get_contents("php://input");
$custArray=json_decode($json,true);

$cid=$_SESSION['cid'];

$distance=$custArray[0]['value'];
$total=$custArray[1]['value'];

$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="insert into luggage values(0,'$cid','$distance','$total')";
    if(mysqli_query($connection,$sql)){
        echo 'Success';
    }else{
        echo mysqli_error($connection);
    }
    mysqli_close($connection);

}