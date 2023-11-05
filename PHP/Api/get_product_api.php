<?php

    header("Access-Control-Allow-Methods: POST GET");
    header("Content-Type: appilcation/json");

    
    include('api.php');

    $api = new Api();

     if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
       $api->getProduct();
    }
    else{
        echo json_encode(['result'=>'This Method Not....']);
    }
    
?>