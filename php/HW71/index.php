<?php
$items = ["Camera", "Bike", "Ball", "Bat", "Hockey Stick", "Mit"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="/bootstrap-4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center"><h1 class="h1">PCS Store</h1></div> 
        <form class="form-inline justify-content-center" action="cartModel.php">
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label col-form-label-lg">Item</label>
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="item" name="name" required>
                <option selected>Choose...</option>
                <?php foreach($items as $item):?>
                    <option><?= $item?></option> 
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-3 col-form-label col-form-label-lg">Quantity</label>
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <input type="number" class="form-control" id="quantity" name="quantity">
            </div>
        </div>
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
        <button type="submit" class="btn btn-primary">Buy</button>
        </div>
        <a title="View Cart" href="viewCart.php"><img src="icons/glyphicons-203-shopping-cart.png" alt="View Cart"></a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    <script src="/jquery-3.2.1.min.js" ></script>
    <script src="/popper.min.js"></script>
    <script src="/bootstrap-4.0.0/js/bootstrap.min.js">   
</body>
</html>