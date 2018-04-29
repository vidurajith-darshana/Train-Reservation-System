<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/13/2018
 * Time: 4:10 PM
 */

$json=file_get_contents("php://input");
$custArray=json_decode($json,true);

$name=$custArray[0]['value'];
$address=$custArray[1]['value'];
$contact=$custArray[2]['value'];
$email=$custArray[3]['value'];
$password=$custArray[4]['value'];


$connection=mysqli_connect('localhost','root','vidura','train_reservation','3306');

if(!$connection){

    echo mysqli_error($connection);
    mysqli_close($connection);

}else{

    $sql="insert into customer values(0,'$name','$address','$contact','$email','$password')";
    if(mysqli_query($connection,$sql)){
        echo 'Success';
    }else{
        echo mysqli_error($connection);
    }
    mysqli_close($connection);

}