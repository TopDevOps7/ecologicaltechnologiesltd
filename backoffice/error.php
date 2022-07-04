<?php 
    include_once("../lang/config.php");
    include_once('../utils/dbconfig.php');
    include_once('../utils/config.php');
?>
<h1>This is error!</h1>

<h4>Investment [payed = 1, payed_date = NULL]</h4>
<?php
  $crud->getInvestDateError();
 ?>