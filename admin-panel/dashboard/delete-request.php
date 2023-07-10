<?php include("include/session.php"); ?>

<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];

    //make query
    $delete=$db->query("DELETE FROM ".TBL_REQUEST." WHERE _id='$id'");
    $delete->execute();
    $_SESSION["Return-message"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Hello! '.$userProfile->_adminName.'</strong> Request has been deleted.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button></div>';


    header("location:show-requests.php?return");

    


}

?>