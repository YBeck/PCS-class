<?php
    $styles = ".btn-link{
        font-size: 2em;
    }
    .next::after{
        content: \" >>>\";
    }
    .previous::before{
        content:\"<<< \";
    }
    .clear{
        clear:both;
    }";
    include 'top.php';
?>
<div class="jumbotron"><h1 class="h1">Seforim Store</h1></div>
<div class="row">
    <?php include_once 'views/sortView.php'; ?>
</div>
<div class="row">
    <?php include 'filterView.php' ?>
    <div class="col-sm-8 text-left">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
            <tbody>
                <?php foreach(getRows() as $seforim): ?>
                    <tr>
                        <td><a href="<?=getLink(['action'=>'selected', 'id'=>$seforim['id']])?>"><?= $seforim['sefer_name'] ?></a></td>
                        <td><?= $seforim['id'] ?></td>
                        <td><?= $seforim['price'] ?></td>
                        <td><?= $seforim['cat_name'] ?></td> 
                        <td><a href="<?=getLink(array_merge (['action'=>'update', 'currentPage'=>'table', 'buy'=>""], $seforim))?>" class="btn btn-primary">Buy</a></td>
                        <td><a href="<?=getLink(array_merge (['action'=>'update', 'currentPage'=>'table', 'update'=>""], $seforim))?>" class="btn btn-primary">Update</a></td>
                        <td><a href="<?=getLink(array_merge (['action'=>'delete', 'currentPage'=>'table', 'delete'=>""], $seforim))?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                </tbody>
                 <?php if(isset($_POST['buy'])){
                     $baught = $seforim['sefer_name'];
                     }
                 endforeach ?>
            </thead>
        </table>
    </div>
    <?php if(isset($_POST['buy'])): ?>
        <div class="well text-center clear">
            <h2 class="h2 text-sucsess">Thank you for your purchase of <?=$buyName?></h2>
        </div>
    <?php endif ?>
    </div>
     <div>
        <a href="<?=getLink(['offset' => $previous])?>"class="btn btn-link previous">Previous</a>
        <a href="<?=getLink(['offset' => $next])?>"class="btn btn-link next">Next</a> 
    </div> 
</div>
<?php include 'bottom.php'; ?>