<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '..\config\database.php';
    include_once '..\class\user.php';

    $database = new Database();
    $db = $database->connect();

    $user = new User($db);

    if(isset($_GET['id'])){
        $user->id = $_GET['id'];
    }else {
        throw new Exception('Invalid Request');
    }

    $user->getOneUser();

    if($user->firstName != null){
        //create array

        $arr = array(
            "id" =>  $user->id,
            "firstName" => $user->firstName,
            "lastName" => $user->lastName,
            "phoneNum" => $user->phoneNum,
            "email" => $user->email,
            "category" => $user->category
        );
        
        http_response_code(200);
        echo json_encode($arr);
    } else{

        http_response_code(404);
        echo json_encode("User not found.");
    }
?>