<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container"> 
       <div class="row">
            <div class="col-md-4 col-xs-offset-4 tabel-responsive text-left">
                <table class="table table-striped table-bordered">
                    <caption class="text-center h2" >Last Three Presidents</caption>
                    <tbody>
                    <?php
                        $presidentsV1 = [
                            ["George W. Bush", 2000],
                            ["Barack Husain Obamba", 2009],
                            ["Donald J Trump", 2016]
                        ];

                        $presidentsV2 = [
                            ["Name" => "George W. Bush", "Year" =>  2000],
                            ["Name" => "Barack Husain Obamba", "Year" => 2009],
                            ["Name" => "Donald J Trump", "Year" => 2016]
                        ];
                            foreach($presidentsV1 as $president){
                                echo("<tr>");
                                foreach($president as $value){
                                    echo("<td>" . $value . "</td>");
                                }
                                echo "</tr>";
                        };
                        ?>
                        </tbody>
                </table>
            </div>
       </div>
    </div>

     <div class="container"> 
       <div class="row">
            <div class="col-md-4 col-xs-offset-4 tabel-responsive text-left">
                <table class="table table-striped table-bordered">
                    <caption class="text-center h2" >Last Three Presidents</caption>
                    
                    <?php 
                    echo "<thead><tr>";
                        foreach($presidentsV2[0] as $key => $head){
                            echo "<th>" . $key . "</th>";
                        }; 
                        echo "</tr></thead>";
                  
                        echo "<tbody>";
                        foreach($presidentsV2 as $president){
                            echo("<tr>");
                            foreach($president as $value){
                                echo("<td>" . $value . "</td>");
                            }
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        ?>
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