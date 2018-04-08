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

    if(isset($_GET['delete']) && empty($errors)){
        $delete = "DELETE FROM seforim WHERE name = :name";
        $statement = $db-> prepare($delete);
        $statement -> bindValue('name', $name);
        $statement -> execute();
}

?>
    <div class="container text-center">
        <div class="jumbotron"><h1 class="h1">Seforim Store</h1></div>
        <div class="row">
            <div class="col-sm-7 text-right">
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
                            <?php foreach(getRows() as $seforim):?>
                                <option
                                <?php if($name === $seforim['name']) echo "selected" ?>
                                ><?= $seforim['name']?></option> 
                            <?php endforeach ?>
                            </select>
                        </div>
                        <button name="add" type="submit" class="btn btn-primary">Get Sefer Info</button>
                        <button name="delete" type="submit" class="btn btn-primary">Delete Sefer</button>
                        <?php if(isset($_GET['delete'])): ?>
                            <h2 class="h2"><?=$name?> was deleted</h2>
                        <?php endif ?>
                        <?php if(empty($errors) && isset($_GET['add'])){ ?>
                            <h2 class="h2">The sefer is: <?= getSeforimInfo($name) ?></h2>
                        <?php } ?>
                </form>
            </div>
            <div class="col-sm-1 text-left">
                <form class="form-inline" action="addSefer.php" method="post">
                <button type="submit" class="btn btn-primary">Add a sefer</button>
                </form>
            </div>
        <?php endif ?>
        </div>
    </div>
</body>
</html>