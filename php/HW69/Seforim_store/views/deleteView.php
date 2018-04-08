
<?php
include_once 'top.php';
?>
<?php if(!isset($_POST['deleteSefer'])){ ?>
<h2 class="h2 text-danger text-center">Delete <?=$array['sefer_name']?>?</h2>
  <form class="form-horizontal action="controllers/deleteController.php" method="post">
  <?php if(isset($_GET['delete'])): ?>
    <input type="hidden" name="deleteId" value="<?=$array['id']?>"> 
  <?php elseif(isset($_POST['delete'])):?>
    <input type="hidden" name="sefer" value="<?=$_POST['sefer']?>">
  <?php endif?>
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-danger" name="deleteSefer">Delete</button>
        <a href="<?=getLink(['action' => $array['currentPage']])?>" class="btn btn-success">Cancel</a>
      </div>
  </form>
<?php }else{ ?>
  <div class="well bg-success"><h2 class="h2 text-success">successfully deleted <?=$array['sefer_name']?></h2></div>
  <a href="<?=getLink(['action' => $array['currentPage']])?>" class="btn btn-success">Ok</a>
  <?php unset($deleteId); ?>
<?php } ?>
</div>
<?php
include_once 'bottom.php';
?>