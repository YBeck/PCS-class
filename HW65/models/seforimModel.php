<?php
require 'db.php';
    if(isset($_GET['sefer'])):
        $name = $_GET['sefer'];
        if(empty($name)):
            $errors [] = "Please enter a Sefer";
        endif;
    else:
        $name = "";
    endif;

    if(isset($_GET['delete']) && empty($errors)){
        $delete = "DELETE FROM seforim WHERE name = :name";
        $statement = $db-> prepare($delete);
        $statement -> bindValue('name', $name);
        $statement -> execute();
    }

    function getRows(){
         global $db;
        try{
            $query = "SELECT * FROM seforim";
            $results = $db->query($query);
            $seforimOption = $results -> fetchAll();
           
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