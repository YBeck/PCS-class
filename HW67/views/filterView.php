<?php  include 'models/filterModel.php' ?>
<div class="col-sm-2 text-left">
    <form>
    <h5 class="h5 well">Filter by category</h5>
    <?php foreach($checkbox as $check): ?>
        <div class="radio">
            <label><input type="radio" name="category" value="<?= $check ?>"><?= $check?></label>
        </div>
    <?php endforeach ?>
    <input type="hidden" name="action" value="<?=$action?>">
    <button type="submit" class="btn btn-default">Filter</button>
    </form>
</div>
