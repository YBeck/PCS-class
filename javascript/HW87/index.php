<?php
    require 'db.php';
    $db = new DB();
    $con = $db->createDb();

    try{
        $query = "SELECT id, name FROM recipes";
        $stmt = $con->query($query);
        $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e::getTraceAsString ;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"crossorigin="anonymous"> 
    <link rel="stylesheet" href="/bootstrap-4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="jumbotron text-center"><h1>PCS recipes</h1></div>
    <div class="container">
        <div class="text-center" id="listOfRecipes">
            <?php foreach($results as $recipe): ?>
            <label class="custom-control custom-radio">
                <input id=<?=$recipe['name']?> name="recipes" type="radio" 
                 data-dbId=<?=$recipe['id']?> class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description"><?=$recipe['name']?></span>
            </label>
            <?php endforeach?>
        </div> 
        <section id="section"> 
        </section>
    </div>

    <script src="/tether.min.js"></script>
    <script src="/jquery-3.2.1.min.js"></script>
    <script src="/popper.min.js"></script>
    <script src="/bootstrap-4.0.0/js/bootstrap.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"crossorigin="anonymous"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>-->
    <script src="recipes.js"></script>
</body>
</html>