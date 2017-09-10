<?php

    include 'top.php';
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
                        <button name="info" type="submit" class="btn btn-primary">Get Sefer Info</button>
                        <button name="delete" type="submit" class="btn btn-primary">Delete Sefer</button>
                        <?php if(isset($_GET['delete'])): ?>
                            <h2 class="h2"><?=$name?> was deleted</h2>
                        <?php endif ?>
                        <?php if(empty($errors) && isset($_GET['info'])){ ?>
                            <h2 class="h2">The sefer is: <?= getSeforimInfo($name) ?></h2>
                        <?php } ?>
                </form>
            </div>
            <div class="col-sm-1 text-left">
                <form class="form-inline" action="../controllers/addSeferController.php" method="post">
                <button type="submit" class="btn btn-primary">Add a sefer</button>
                </form>
            </div>
        <?php endif ?>
        </div>
    </div>
<?php
include 'bottom.php';
?>