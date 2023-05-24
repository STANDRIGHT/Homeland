<?php

print json_encode($_POST);
exit;
include "../dashboard/include/session.php"; ?>


<?php
if (isset($_POST["id"]) AND isset($_POST["submit"])){
  $id = $_POST["id"];
  $name = $_POST["name"];

  if(empty($_POST["id"] || empty($_POST["name"]))){
    $_SESSION["Return-message"] ='<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hello! User</strong> Fieldset is empty.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>';
    header("location:../dashboard/update-categories.php");
  }else{
    $resp = $app->updateCategories($id, $name);
    if($resp['status']===1){
        header("location:../dashboard/show-categories.php");
    }else{
        $_SESSION['msg']="<div class='alert alert-danger'>".$resp['message']."</div>";
        header("location:../dashboard/update-categories.php");
    }
  }





}else{
    $_SESSION["update-message"] = "<div class='alert alert-danger'>Error in updating catergory</div>";

}
?>

