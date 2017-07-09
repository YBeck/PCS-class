<?php
require "body.php" ;
function generate_month($months)
{
    $retMonth = "";
    foreach($months as $key =>$value){
        $retMonth .= "<option>" . $key . "</option>";
    }
    return $retMonth;
}
?>
<body>
  <div class="container text-center">
    <div class="jumbotron"><h1 class="h1">Days Of The Month</h1></div>
    <div class="row text-center">
      <form class="form-inline" action="process.php" method="post">
        <div class="form-group">
          <label for="month">Choose a month</label>
          <select class="form-control" id="month" name="month" required>
            <?= generate_month($months) ?>
          </select>
      </div>
      <div class="form-group">
        <label for="year">Enter a year:</label>
        <input type="number" class="form-control" id="year" name="year" min="1000" max="9999" hrequired>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>