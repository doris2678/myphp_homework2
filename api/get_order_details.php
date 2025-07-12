<?php 
session_start();
include_once "db.php";
$data=q("select * from order2 where or_no='{$_POST['or_no']}'");
echo json_encode($data);
?>

