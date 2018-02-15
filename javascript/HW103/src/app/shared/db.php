<?php

class DB {
    private $cs;
    private $user;
    private $password;
    private $options;

    public function __construct(){
        $this -> cs = "mysql:host=localhost;dbname=thestudents";
        $this -> user = "test";
        $this -> password = "password";
        $this -> options =  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    }

    public function createDb(){
        try { 
            $db = new PDO($this -> cs, $this -> user, $this -> password, $this -> options);
        } catch(PDOException $e) {
            die("Something went wrong " . $e->getMessage());
        }
        return $db;
    }
}

?>
