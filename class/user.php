<?php

class User {
    //DB
    private $conn;
    private $table = 'registered';
    //table cols
    public $id;
    public $firstName;
    public $lastName;
    public $phoneNum;
    public $email;
    public $category;

    public function __construct($db) {
        $this->conn = $db;
    }

    //get all
    public function getUsers() {
        $sqlQuery = "SELECT * FROM " . $this->table ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    //create user

    public function createUser() {
        $sqlQuery = "INSERT INTO
                        ". $this->table ."
                    SET
                        firstName = :firstName, 
                        lastName = :lastName, 
                        phoneNum = :phoneNum, 
                        email = :email, 
                        category = :category";

         $stmt = $this->conn->prepare($sqlQuery);
         
         //sanitize data
         $this->firstName=htmlspecialchars(strip_tags($this->firstName));
         $this->lastName=htmlspecialchars(strip_tags($this->lastName));
         $this->phoneNum=htmlspecialchars(strip_tags($this->phoneNum));
         $this->email=htmlspecialchars(strip_tags($this->email));
         $this->category=htmlspecialchars(strip_tags($this->category));
         //bind data
            $stmt->bindParam(":firstName", $this->firstName);
            $stmt->bindParam(":lastName", $this->lastName);
            $stmt->bindParam(":phoneNum", $this->phoneNum);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":category", $this->category);

            if($stmt->execute()){
                return true;
             }else {
                printf('Error: $s. ', $stmt->error);
                return false;
             }
             
    }

    //single user

    public function getOneUser() {
        $sqlQuery = "SELECT
                        id, 
                        firstName, 
                        lastName, 
                        phoneNum, 
                        email, 
                        category
                    FROM
                        ". $this->table ."
                            WHERE 
                            id = ?
                            LIMIT 0,1";

                    $stmt = $this->conn->prepare($sqlQuery);
                    
                    $stmt->bindParam(1, $this->id);

                    $stmt->execute();

                    $data = $stmt->fetch(PDO::FETCH_ASSOC);

                    $this->firstName = $data['firstName'];
                    $this->lastName = $data['lastName'];
                    $this->phoneNum = $data['phoneNum'];
                    $this->email = $data['email'];
                    $this->category = $data['category'];
    }


    // update user

    public function updateUser() {
        $sqlQuery = "UPDATE
                        ". $this->table ."
                    SET
                        firstName = :firstName, 
                        lastName = :lastName, 
                        phoneNum = :phoneNum, 
                        email = :email, 
                        category = :category
                    WHERE 
                        id = :id";


        $stmt = $this->conn->prepare($sqlQuery);
        
            $this->firstName=htmlspecialchars(strip_tags($this->firstName));
            $this->lastName=htmlspecialchars(strip_tags($this->lastName));
            $this->phoneNum=htmlspecialchars(strip_tags($this->phoneNum));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->category=htmlspecialchars(strip_tags($this->category));
            $this->id=htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(":firstName", $this->firstName);
            $stmt->bindParam(":lastName", $this->lastName);
            $stmt->bindParam(":phoneNum", $this->phoneNum);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":category", $this->category);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }else {
                printf('Error: $s. ', $stmt->error);
                return false;
            }
        }

    // delete user


    public function deleteUser() {
        $sqlQuery = "DELETE FROM " . $this->table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()) {
                return true;
            }else {
                printf('Error: $s. ', $stmt->error);
                return false; 
            }
        }




    }
?>





