<?php
require 'db.php';
    if(isset($_GET['delete']) && empty($errors)){
        $delete = "DELETE FROM seforim WHERE name = :name";
        $statement = $db-> prepare($delete);
        $statement -> bindValue('name', $name);
        $statement -> execute();
    }

    function getRows(){
         global $db;
         global $category;
        try{
            $query = "SELECT * FROM seforim";
            if(!empty($category)){
                $query .= " WHERE category = :category";
            }
            echo $category;
            $results = $db-> prepare($query);
            if(!empty($category)){
                $results -> bindValue('category', $category);
            }
            $results -> execute();
            $seforimOption = $results -> fetchAll(PDO::FETCH_ASSOC);
           
        }catch(PDOException $e){
            die("Something went wrong " . $e->getMessage());
        }
        return $seforimOption;
    }

    function getSeforimInfo($name){
        $equel = false;
        $returnString = "";
        foreach(getRows() as $seferInfo){
            foreach($seferInfo as $key => $value){
                if(strtoupper($name) === strtoupper($seferInfo['name'])){
                    $equel = true;
                    $returnString .= " " . $name . " Price: " . $seferInfo['price'];
                    break;     
                }
            }
        }
        if(!$equel){
            die($name . " is not a valid sefer");
        }
        return $returnString;
    }
?>