<?php
include("init.php");
$_SESSION['id'];

if(isset($_SESSION["id"]));
$id = $_SESSION["id"];
$q=$app->getUserProfile($id);
if($q['status']==1){
    $userProfile=$q['data'];
}else{
    header("location: ../");
}

?>