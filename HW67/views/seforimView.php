<?php
    $styles = ".btn-link{
        font-size: 2em;
    }
    .next::after{
        content: \" >>>\";
    }
    .previous::before{
        content:\"<<< \";
    }";
    include 'top.php';
?>
    <div class="jumbotron"><h1 class="h1">Seforim Store</h1></div>
        <div class="row"> 
            <?php include 'filterView.php' ?>
        <div class="col-sm-8 text-right">
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
                    <input type="hidden" name="offset" value="<?=$offset?>">
                    <?php if(isset($_GET['delete'])): ?>
                        <h2 class="h2"><?=$name?> was deleted</h2>
                    <?php endif ?>
                    <?php if(empty($errors) && isset($_GET['info'])){ ?>
                        <h2 class="h2">The sefer is: <?= getSeforimInfo($name) ?></h2>
                    <?php } ?>
            </form>
        </div>
    <?php endif ?>
    </div>
    <div>
        <a href="index.php?offset=<?=$previous?>&category=<?=$category?>"class="btn btn-link previous">Previous</a>
        <a href="index.php?offset=<?=$next?>&category=<?=$category?>"class="btn btn-link next">Next</a> 
        <?php
        ?>
        </div>
    </div>
<?php
include 'bottom.php';
?>