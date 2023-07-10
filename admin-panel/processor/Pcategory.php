<?php include "../dashboard/include/session.php"; ?>

<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];

    if(empty($_POST["name"])){
        header("location:../dashboard/create-category.php");
        $_SESSION["Return-message"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hello! '.$userProfile->_adminName.'</strong> This Fieldset is Empty.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>';

    }else{
        $resp = $gories->createCategories($name);
        if($resp['status']===1){
            $_SESSION["Return-message"] ='<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hello! '.$userProfile->_adminName.'</strong> Category Successfully created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>';
            header("location:../dashboard/show-categories.php");

           
            
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'>".$resp['message']."</div>";
            header('location:../');
        }


    }

  }else{
    $_SESSION["msg"] = "<div class='alert alert-danger'>Sever Error</div>";
  }

?>