<?php include("include/session.php"); ?>

<?php
// print json_encode($_GET);
// exit;
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $resp = $gories->delete($id);

    if($resp["status"] ===1){
        header("location:show-categories.php");
        $_SESSION["Return-message"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hello!  ' . $userProfile->_adminName . '</strong> Record Sucessfully Deleted.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button></div>';

    }else{
        $_SESSION['Return-message'] = "<div class='alert alert-danger'>" . $resp['message'] . "</div>";
        header("location:delete-category.php");
    }

    

}

?>