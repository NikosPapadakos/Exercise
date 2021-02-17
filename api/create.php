<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-phoneNum: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Methods, Authorization, X-Requested-With");

    include_once '..\config\database.php';
    include_once '..\class\user.php';

    $database = new Database();
    $db = $database->connect();

    $new = new User($db);

    $result = json_decode(file_get_contents("php://input"));
    if(!empty($result->firstName) && !empty($result->lastName) && !empty($result->phoneNum) && !empty($result->email) && !empty($result->category) ){
    $new->firstName = $result->firstName;
    $new->lastName = $result->lastName;
    $new->phoneNum = $result->phoneNum;
    $new->email = $result->email;
    $new->category = $result->category;
    }else{
        echo 'Inputs cannot be empty';
    }
    if($new->createUser()){
        echo  json_encode('User created successfully.');
    } else{
        echo  json_encode('User could not be created.');
    }
?>