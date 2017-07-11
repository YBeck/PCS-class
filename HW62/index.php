<?php

    if(isset($_GET['sefer'])):
        $name = $_GET['sefer'];
        if(empty($name)):
            $errors [] = "Please enter a Sefer";
        endif;
    else:
        $name = "";
    endif;
    
    function getConnection(){
        $cs = "mysql:host=localhost;dbname=seforim_store";
        $user = "test";
        $password = 'password';
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try { 
            $db = new PDO($cs, $user, $password, $options);
        } catch(PDOException $e) {
            die("Something went wrong " . $e->getMessage());
        }
        return $db;
    }
    
     function getRows(){
         $db = getConnection();
        try{
            $returnArr = [];
            $query = "SELECT s.name FROM seforim s";
            $results = $db->query($query);
            foreach($results as $seforim) {
               $returnArr[] = $seforim; 
               
            }
           
        }catch(PDOException $e){
            die("Something went wrong " . $e->getMessage());
        }
        return $returnArr;
    }

    function getSeforimInfo($name){
        $db = getConnection();
         try{
            $returnString = "";
            $query = "SELECT * FROM seforim s WHERE s.name='$name'";
            $results = $db->query($query);
            foreach($results as $seforim) {
                $returnString .= " " . $seforim['name'] . " ";
                $returnString .= "Price: " . $seforim['price'];
            }
        }catch(PDOException $e){
            die("Something went wrong " . $e->getMessage());
        }
        return $returnString;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">
    <title>seforim</title>
</head>
<body>
    <div class="container text-center">
    <div class="jumbotron"><h1 class="h1">Seforim Store</h1></div>
    <div class="row text-center">
      <form class="form-inline">
      <?php if(isset($errors)): ?>
           <div class="alert alert-danger col-sm-offset-4">
            <ul>
            <?php foreach ($errors as $error) { ?>
                <li> <?= $error ?> </li>
            <?php } ?>
            </ul>
        </div> 
        <?php else: ?>
        <div class="form-group">
            <label for="sefer">Choose a Sefer</label>
            <select class="form-control" id="sefer" name="sefer" required>
            <?php foreach(getRows() as $key => $seforim):?>
                <option
                <?php if($name === $seforim['name']) echo "selected" ?>
                ><?= $seforim['name']?></option>
            <?php endforeach ?>
            </select>
      </div>
      <?php if(empty($errors) && isset($_GET['sefer'])){ ?>
                <h2 class="h2">The sefer you requested: <?= getSeforimInfo($name) ?></h2>
      <?php } ?>
      <button type="submit" class="btn btn-primary">Submit</button>
      <?php endif ?>
      </form>
    </div>
  </div>
</body>
</html>