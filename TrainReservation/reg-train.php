<?php

session_start();

$tid=$_SESSION['fileName'];

$json=file_get_contents('php://input');
$train=json_decode($json,true);

$name=$train[0]['value'];

$connection=mysqli_connect('localhost','root','vidura','train_reservation');
if(!$connection){
    echo mysqli_error($connection);
}else{

    $sql="insert into train values(0,'$name','$tid')";
    $result=mysqli_query($connection,$sql);
    if(mysqli_affected_rows($connection)>0){

        echo 'success';
    }else{
        echo 'error';
    }



}



?>