<?php include "../inc/header.php";?>
<?php include "../config/config.php";?>

<!-- CHECK FOR AUTHENTICITY OF THE FORM -->
<?php 
    if (isset($_POST["submit"])) {
        $prop_id= $_POST["prop_id"];
        $user_id= $_POST["user_id"];

        $insert  = $conn->prepare("INSERT INTO addfav (prop_id, user_id) VALUES(:prop_id, :user_id)");
        $insert->execute([
            ':prop_id'=> $prop_id,
            ':user_id' => $user_id
        ]);
      
        echo "<script>window.location.href ='".BASEURL."/property-details.php?id=$prop_id'</script>";
    }

?>



<?php //include "inc/footer.php";?>
