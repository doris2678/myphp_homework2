<?php
include_once "db.php";

$table=$_GET['table'];
$db=${ucfirst($table)};
echo $table;

switch($table){
    case "admin":
        $url="../backend/admin.php";        
    break;
    case "member":
        $url=("../backend/member.php");
    break;
    case "items":
        $url=("../backend/items.php");
    break;

    default:        
        $url=("../backend.php");

}

$db->del($_GET['id']);

to($url);
?>