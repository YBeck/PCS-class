<?php 
include 'top.php';
?>
<div class="row col-sm-8">
    <?php foreach($selectedSefer as $sefer): ?>
        <div class="well text-success text-left">The Sefer's name: <?=$sefer['name']?></div>
        <div class="well text-success text-left">The Sefer's ID: <?=$sefer['id']?></div>
        <div class="well text-success text-left">The Sefer's Price: $<?=$sefer['price']?></div>
        <div class="well text-success text-left">Units in stock: <?=$sefer['units_in_stock']?></div>
        <div class="well text-success text-left">The Sefer's Category: <?=$sefer['category']?></div>
    <?php endforeach ?>
    </div>
</div>
<?php 
include 'bottom.php';
?>