<?php include("include/session.php"); ?>

<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];

    //make query
    $delete=$db->query("DELETE FROM ".TBL_REQUEST." WHERE _id='$id'");
    $delete->execute();

    header("location:show-requests.php?return");

    


}

?>