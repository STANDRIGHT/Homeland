<?php

// print json_encode($_POST);
// exit;
include "../dashboard/include/session.php"; ?>


<?php
if (isset($_POST["update"])) {
  $id = $_POST["id"];
  $name = $_POST["name"];

  if (empty($_POST["id"] || empty($_POST["name"]))) {
    header("location:../dashboard/update-category.php");
    $_SESSION["Return-message"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hello! User</strong> Fieldset is empty.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>';
  } else {
    $resp = $gories->updateCategories($id, $name);
    if ($resp['status'] === 1) {
      header("location:../dashboard/show-categories.php");
      $_SESSION["Return-message"] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hello! ' . $userProfile->_adminName . '</strong> Your Category has been updated successfuly.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>';
    } else {
      $_SESSION['Return-message'] = "<div class='alert alert-danger'>" . $resp['message'] . "</div>";
      header("location:../dashboard/update-category.php");
    }
  }
} else {
  $_SESSION["update-message"] = "<div class='alert alert-danger'>Error in updating catergory</div>";
}
?>

