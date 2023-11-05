<?php

    header("Access-Control-Allow-Methos: POST");
    header("Content-Type: appilcation/json");

    include('api.php');

    $Api = new Api();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $Api->InsertUser($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['password'],$_POST['full_address'],$_POST['pincode'],$_POST['city'],$_POST['state']);
    }
    else{
        echo json_encode(['result'=>'This Methos is Not....']);
    }

?>