<?php  
session_start();
if(isset($_GET['remove'])){
    if(!empty($_GET['remove'])){
        $remove = $_GET['remove'];
        unset($_SESSION['cart'][$remove]);
    }  
}

if(isset($_GET['edit'])){
    if(!empty($_GET['edit'])){
        $edit = $_GET['edit'];
    }  
}

if(isset($_GET['input'])){
    if(!empty($_GET['input']) && is_numeric($_GET['input']) && $_GET['input'] > 0){
        $input = $_GET['input'];
        $theItem = $_GET['item'];
        $_SESSION['cart'][$theItem] = $input;
    }  
}
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
    <div class="jumbotron text-center"><h1 class="h1">View Cart</h1></div>
    <ul class="list-group">
        <li class="list-group-item active">Cart</li>
        <?php if(!empty($_SESSION['cart'])) : ?>
            <?php foreach ($_SESSION['cart'] as $key => $value) : ?>
                <li class="list-group-item justify-content-between">Item: <?=$key?> Quantity: <?=$value?>
                <?php if(!empty($edit) && $edit === $key):?>
                    <form class="form-inline">
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-form-label col-form-label-sm">Quantity</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <input type="number" class="form-control form-control-sm" id="input" name="input">
                            </div>
                        </div>
                        <input type="hidden" name="item" value="<?=$key?>">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                     <?php endif?>
                    <div>       
                    <a href="viewCart.php?edit=<?=$key?>"class="btn btn-primary btn-sm">Edit</a>
                    <a href="viewCart.php?remove=<?=$key?>"class="btn btn-warning btn-sm">Remove</a>
                </div>
                </li>
             <?php endforeach ;
            else:?>
            <li class="list-group-item"><h2>You have no items in your cart<h2></li>
            <?php endif ?>
    </ul>
    <a href="index.php">Home</a>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    <script src="/jquery-3.2.1.min.js" ></script>
    <script src="/popper.min.js"></script>
    <script src="/bootstrap-4.0.0/js/bootstrap.min.js">   
</body>
</html>