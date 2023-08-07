<?php include "../inc/header.php";?>
<?php include "../config/config.php";?>

<!-- CHECK FOR AUTHENTICITY OF THE FORM -->
<?php 
    if (isset($_GET["prop_id"]) AND isset($_GET["user_id"])) {
        // echo "yes";
        $prop_id= $_GET["prop_id"];
        $user_id= $_GET["user_id"];

        $delete  = $conn->query("DELETE FROM addfav WHERE prop_id='$prop_id' AND user_id='$user_id'");
        $delete->execute();
      
        echo "<script>window.location.href ='".BASEURL."/property-details.php?id=$prop_id'</script>";
        // echo "<script>window.location.href ='".BASEURL."/index'</script>";

    }

?>




