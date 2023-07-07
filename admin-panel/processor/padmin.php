<?php include "../dashboard/include/session.php"; ?>



<?php 
//declearing function of data
 function val($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

if(isset($_POST["submit"])){
    $email = val($_POST["email"]);
    $username= val($_POST["username"]);
    $password= val($_POST["password"]);




}else{
    header("location:../dashboard/admins.php");
}



?>