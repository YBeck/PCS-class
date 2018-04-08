<?php
include_once 'top.php';
?>
<div class="jumbotron"><h1 class="h1 text-center">Seforim Order</h1></div>
<h2 class="h2 text-center">Please review your order</h2>
<div class="well">
<h3 class="h3">
Sefer: <?=$array['sefer_name']?> </br> Price: <?=$array['price']?>
</h3>
</div>
<h4 class="h4 text-center text-success">Thank you for your purchase!</h4>
<?php unset($array['buy']);?>
<a href="<?=getLink(['action' => $array['currentPage']])?>" class="btn btn-success">OK</a>
<?php include_once 'bottom.php';