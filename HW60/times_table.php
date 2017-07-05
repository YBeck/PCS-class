<?php
    include_once "top.php";
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <table class= "table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th></th>
                        <?php for($i=1; $i<=12; $i++){
                            echo "<th>" . $i . "</th>"; 
                        } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php for($j=1; $j<=12; $j++){ ?>
                        <tr><th>  <?=$j ?>  </th>
                            <?php for($k=1; $k<=12; $k++){
                                echo "<td>" . $j * $k . "</td>"; 
                        } ?>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
        include_once "bottom.html";
    ?>
</div>