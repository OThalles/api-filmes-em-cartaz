<?php

require('../helpers/Methods.php');

libxml_use_internal_errors(true);

$methods = new Methods();
$result = $methods->getAll();

require('../return.php')



?>
