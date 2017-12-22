<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"crossorigin="anonymous"> 
    <link rel="stylesheet" href="/bootstrap-4.0.0/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        #container{
            margin: 0 auto;
            height: 278px;
            display: block;
            width: 70%;
        }
        #img{
            width: 60%;
            height: 300px;
        }
        #prev, #next{
            cursor: pointer;
        }
        #prev:hover, #next:hover{
            background-color: rgb(255,0,0);
        }
        #slide{
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="jumbotron text-center"><h1>PCS Photos</h1></div>
    <div class="container text-center" id="container">
        <h2 id="title"></h2>
        <span id="prev"><img src="images/prev.jpg" alt=""></span>
        <img id="img"src="" alt="">
        <span id="next"><img src="images/next.jpg" alt=""></span>
        <div>
            <button class="btn btn-default" id="slide">View Slideshow</button>
        </div>
    </div>

    <script src="/tether.min.js"></script>
    <script src="/jquery-3.2.1.min.js"></script>
    <script src="/popper.min.js"></script>
    <script src="/bootstrap-4.0.0/js/bootstrap.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"crossorigin="anonymous"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>-->
    <script src="images.js"></script>
</body>
</html>