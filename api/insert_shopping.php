<?php
include_once "db.php";


$Order2->save($_POST);    

header("Content-Type: application/json;");
echo json_encode($_POST);
?>
