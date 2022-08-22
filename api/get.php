<?php

require('../helpers/Methods.php');

libxml_use_internal_errors(true);

$id = filter_input(INPUT_GET, 'id');

$methods = new Methods();
$result = $methods->getOne($id);

require('../return.php')



?>
