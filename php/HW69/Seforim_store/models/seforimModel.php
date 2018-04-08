<?php

    function getRows(){
        global $con;
        global $categories;
        global $offset;
        global $sort;
        $sortArray = ["s.name ASC", "s.name DESC", "s.price ASC", "s.price DESC"];

        $placeHolder = [];  // a array that will store all values to bind
        if(empty($categories)){
            $categories = [];
        } 
        if(empty($offset)){
            $offset = 0;
        }

        try{
            $query = "SELECT s.id, s.name AS sefer_name, s.price, s.category, s.units_in_stock, c.name AS cat_name
                 FROM seforim s  JOIN categories c ON s.category = c.id";
            if(!empty($categories)){ 
                $qmArray = array_fill(0, count($categories), '?'); //set number of ? 
                $qm = implode(",", $qmArray); // turn ?array int a string
                $query .= "  WHERE c.id IN ($qm)"; 
            }
            $query .= " ORDER BY ";  
            if(in_array($sort, $sortArray)){
                $query .=  $sort;
            }
            else{
                $query .= "s.name ASC";
            }
            $query .= " LIMIT 4 OFFSET ?";
            $placeHolder[] = $offset;
            $statement = $con->prepare($query);
            $queryArray = array_merge($categories, $placeHolder); // a new array with all values to bind
            //$statement -> execute($queryArray);
            foreach($queryArray as $key => $value){
                $statement->bindvalue($key+1,(int)$value, PDO::PARAM_INT);
            }
            $statement -> execute();
            $seforimOption = $statement -> fetchAll(PDO::FETCH_ASSOC);
           
           
        }catch(PDOException $e){
            die("Something went wrong " . $e->getMessage());
        }
        return $seforimOption;
    }
    
    function getSeforimInfo($id){
        $equel = false;
        $returnString = "";
        foreach(getRows() as $seferInfo){
                if($seferInfo['id'] == $id){
                    $returnString .= " " . $seferInfo['sefer_name'] . " Price: $" . number_format($seferInfo['price'], 2);
                    $equel = true;
                }
            }
        if(!$equel){
            die("Please enter a valid sefer");
        }
        return $returnString;
    }
?>