<?php include "inc/header.php";?>
<?php include "config/config.php";?>

<!-- CHECK FOR AUTHENTICITY OF THE FORM -->
<?php 
    if (isset($_GET["prop_id"]) AND isset($_GET["fav_user"])) {
        $prop_id= $GET["prop_id"];
        $fav_user= $GET["fav_user"];

        $delete  = $conn->prepare("DELETE FROM addfav WHERE prop_id='$prop_id' AND user_id='$fav_user'");
        $delete->execute();
      
        echo "<script>window.location.href ='".BASEURL."/property-details.php?id=$prop_id'</script>";
    }

?>




