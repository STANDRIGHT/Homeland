<?php
// echo password_hash("1234", PASSWORD_DEFAULT); die();
include "../dashboard/include/session.php";

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($_POST["email"]) || empty($_POST["password"])){
        $_SESSION['msg']="<div class='alert alert-danger'>Please fill all fields</div>";
            header('location:../');

    }else{
        $resp = $app->login($email, $password);
        if($resp['status']===1){
            header('location:../dashboard/');
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'>".$resp['message']."</div>";
            header('location:../');
        }
    }
}



?>