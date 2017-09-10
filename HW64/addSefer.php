<?php
require 'db.php';
 $seferName = "";
 $priceEntered = "";
if(isset($_POST['seferEntered'])){
    $seferName = $_POST['seferEntered'];
    if(empty($seferName)){
        $errors[] = "please enter a Sefer";
    }
}

if(isset($_POST['priceEntered'])){
    $priceEntered = $_POST['priceEntered'];
    if(empty($priceEntered)){
        $errors[] = "please enter a price";
    }
}

if(isset($_POST['add']) && empty($errors)){
    $insert = "INSERT INTO seforim (name, price) VALUES (:seferName, :priceEntered)";
    $statement = $db-> prepare($insert);
    $statement -> bindValue('seferName', $seferName);
    $statement -> bindValue('priceEntered', $priceEntered);
    $rowsAmount =$statement -> execute();
}
?>

<body> 
    <div class="container">
        <div class="jumbotron text-center"><h1 class="h1">Add Seforim</h1></div>
        <form class="form-inline text-center" method="post">
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
                <label for="sefer">Sefer Name:</label>
                <input type="text" class="form-control" id="sefer" name="seferEntered">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="any" class="form-control" id="price" name="priceEntered">
            </div>
        <button type="submit" class="btn btn-primary">Add Sefer</button>
        <a href="index.php">Seforim Store</a>
        </form>
        <?php endif ?>
    </div>
</body>
</html>