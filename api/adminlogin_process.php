<?php
include_once "db.php";

//判斷是否登入成功
$admin=$Admin->count($_POST);

if($admin){
   //登入成功
   session_start();
   $_SESSION['admin']=$_POST['acc'];
   setcookie("admin",$_POST['acc']);
   to("../backend.php");
}else{
    //登入失敗
   to("../admin_login.php?err=1");
}
?>