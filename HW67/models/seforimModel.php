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
         global $offset;
         if(empty($category)){
             $category = "";
         }
        try{
            $query = "SELECT s.id, s.name, s.price, s.category FROM seforim s";
            if(!empty($category)){
                $query .= " JOIN categories c ON s.category = c.id WHERE c.name = :category";
            }
            $query .= " LIMIT 4 OFFSET :offset";
            $results = $db-> prepare($query);
            if(!empty($category)){
                $results -> bindValue('category', $category);
            }
            $results->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
            $results -> execute();
            $seforimOption = $results -> fetchAll(PDO::FETCH_ASSOC);
           
        }catch(PDOException $e){
            die("Something went wrong " . $e->getMessage());
        }
        return $seforimOption;
        echo "seforimOption";
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