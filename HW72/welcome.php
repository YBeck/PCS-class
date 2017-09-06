<?php
session_start();
if(!isset($_SESSION['verifiedUsers'])){
    header("Location:login.php");
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
<div class="jumbotron text-center"><h1>Pcs verification site</h1></div>
<h2 class="text-center">Wecome to our site</h2>
<div class="justify-content-between">
    <a href="page2.php">Page2</a>
    <form action="authentication.php" method="post">
        <button type="submit" name="logout" class="btn btn-link">logout</button>
    </form>
</div>
<div class="container">
    <h2>Page 1</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam pariatur praesentium nisi porro autem explicabo dolor optio. Eius sed a corporis voluptatibus atque sunt iste porro commodi doloribus! Alias ut temporibus cupiditate, nesciunt doloremque aspernatur vel dolore omnis tenetur labore maxime deserunt, amet cumque dicta rem autem? Nobis, officiis beatae nihil odio, libero dolorem dicta et ea repellat nisi a repellendus eius quasi quis nemo esse cupiditate consectetur. Aperiam totam asperiores omnis, fugiat unde veniam id alias enim eligendi minus perspiciatis cupiditate illo consequuntur! Dolore nulla nisi eius provident ducimus. Quam rerum aperiam facilis minus quis consequuntur nemo atque velit.</p>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    <script src="/jquery-3.2.1.min.js" ></script>
    <script src="/popper.min.js"></script>
    <script src="/bootstrap-4.0.0/js/bootstrap.min.js">   
</body>
</html>