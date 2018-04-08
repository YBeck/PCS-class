<?php
include_once 'top.php';
?>
<div class="jumbotron"><h1 class="h1 text-center">Update Sefer</h1></div>
<?php if(!isset($_POST['updateForm'])){ ?>
<h2 class="h2 text-primary text-center">Update <?=$array['sefer_name']?></h2>
  <form class="form-horizontal action="controllers/updateController.php" method="post"> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="seferName">Sefer Name:</label>
      <div class="col-sm-10">
        <input type="text" name="seferName" class="form-control" id="seferName">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price:</label>
      <div class="col-sm-10"> 
        <input type="text" step="any" class="form-control" id="price" name="updatePrice">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="inStock">In Stock:</label>
      <div class="col-sm-10"> 
        <input type="number" class="form-control" id="inStock" name="inStock">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Categories:</label>
      <div class="col-sm-3">
          <select class="form-control" name="updateCategory">
            <option value="" disabled selected>Select a category</option>
              <?php 
              foreach($checkbox as $check): ?>
                  <option value="<?=$check['id'] ?>"><?= $check['name'] ?></option> 
              <?php endforeach?>  
          </select>
      </div>
      </div>
      <?php if(isset($_POST['update'])):?>
      <!-- pass in all the values from $_POST['sefer'] -->
        <input type="hidden" name="sefer" value="<?=$_POST['sefer']?>">
      <?php endif ?>
    <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="updateForm">Update</button>
      </div>
    </div>
  </form>
<?php }
else if(empty($_POST['seferName']) && empty($_POST['updatePrice']) && empty($_POST['inStock']) && empty($_POST['updateCategory'])){ ?>
<div class=well bg-danger><h2 class="h2 text-warning">No input to update</h2></div>
<?php }else{ ?>
  <div class="well bg-success"><h2 class="h2 text-success">successfully updated <?=$array['sefer_name']?></h2></div>
  <a href="<?=getLink(['action' => $array['currentPage']])?>" class="btn btn-success">Ok</a>
<?php } ?>
</div>
<?php
include_once 'bottom.php';
?>
