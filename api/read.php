<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '..\config\database.php';
    include_once '..\class\user.php';

    $database = new Database();
    $db = $database->connect();

    $users = new User($db);

    $stmt = $users->getUsers();
    $userCount = $stmt->rowCount();

   


    if($userCount > 0){
        
        $userArr = array();
        $userArr['data'] = array();
        $userArr['userCount'] = $userCount;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $arr = array(
                "id" => $id,
                "firstName" => $firstName,
                "lastName" => $lastName,
                "phoneNum" => $phoneNum,
                "email" => $email,
                "category" => $category
            );

            array_push($userArr['data'], $arr);
        }
        
        echo json_encode($userArr, JSON_PRETTY_PRINT);

    } else {
        http_response_code(404);
        echo json_encode("No record found.");
    }
?>