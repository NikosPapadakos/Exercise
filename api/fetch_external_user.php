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

    $url = 'http://localhost/exercise/external_api/api.php';
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_URL,$url);

    $result=curl_exec($ch);

    curl_close($ch);


    $decoded = json_decode($result);


    $nameParts =  explode(" ", $decoded->full_name);
    
    $new->firstName = $nameParts[0] ?? '';
    $new->lastName = $nameParts[1] ?? '';
    $new->phoneNum = $decoded->tel1;
    $new->email = $decoded->email;
    $new->category = $decoded->category;
    
    if($new->createUser()){
        echo  json_encode('User created successfully.');
    } else{
        echo  json_encode('User could not be created.');
    }
?>