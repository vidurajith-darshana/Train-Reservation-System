<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vidurajith
 * Date: 1/16/2018
 * Time: 8:46 AM
 */

session_start();

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"image/pic/".$file_name);
        $_SESSION['fileName']=$file_name;
        $_SESSION['customerImage']=$file_name;
        header('Location: admin.php');
    }else{
        print_r($errors);
    }
}