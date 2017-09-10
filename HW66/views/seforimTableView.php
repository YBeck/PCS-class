<?php
include 'top.php';
?>
 <div class="jumbotron"><h1 class="h1">Seforim Store</h1></div>
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
                        <td><a href="index.php?action=selected&id=<?=$seforim['id']?>"><?= $seforim['name'] ?></a></td>
                        <td><?= $seforim['id'] ?></td>
                        <td><?= $seforim['price'] ?></td>
                        <td><?= $seforim['category'] ?></td>
                    </tr>
                </tbody>
                <?php endforeach ?>
            </thead>
        </table>
    </div>
    </div>
</div>
<?php include 'bottom.php'; ?>