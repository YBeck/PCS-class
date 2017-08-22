<?php include_once 'utils/link.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">
    <title>seforim</title>
    <style>
        body{
            padding-top: 70px;
        }

        <?php if (!empty($styles)) echo $styles ?>
    </style>
</head>
<body>
    <nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">SEFORIM</a>
    </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="<?=getLink(['action' => 'home'])?>">Home</a></li>
            <li><a href="<?=getLink(['action' => 'table'])?>">Table</a></li>
            <li><a href="<?=getLink(['action' => 'add'])?>">Add Sefer</a></li>
        </ul>
        </div>
    </div>
</nav>
    <div class="container text-center">