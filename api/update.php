<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/user.php';
    
    $database = new Database();
    $db = $database->connect();
    
    $upUser = new User($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $upUser->id = $data->id;
    
   
    $upUser->firstName = $data->firstName;
    $upUser->lastName = $data->lastName;
    $upUser->phoneNum = $data->phoneNum;
    $upUser->email = $data->email;
    $upUser->category = $data->category;
    
    if($upUser->updateUser()){
        echo json_encode("User data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>