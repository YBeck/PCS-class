<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
       $nameA = "George W. Bush";
       $nameB = "Barack Husain Obamba";
       $nameC ="Donald J Trump"; 
       $yearA = 2000;
       $yearB = 2008;
       $yearC = 2016;
    ?>
    <div class="container"> 
       <div class="row">
            <div class="col-md-6 col-xs-offset-3 tabel-responsive text-right">
                <table class="table table-striped table-bordered">
                    <caption class="text-center h2" >Last Three Presidents</caption>
                    <thead>
                        <tr>
                            <th>Presidents</th>
                            <th><?= $nameA;?></th>
                            <th><?= $nameB;?></th>
                            <th><?= $nameC;?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Year</th>
                            <td><?=$yearA;?></td>
                            <td><?=$yearB;?></td>
                            <td><?=$yearC;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
       </div>
    </div>
    <script src="/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>