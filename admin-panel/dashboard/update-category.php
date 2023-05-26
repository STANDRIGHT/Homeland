<?php include("include/session.php"); ?>


<?php
if(isset($_GET["id"])){
  $id= $_GET["id"];

}
$singleCategories = $gories->singleCategories($id);
// print_r($singleCategories);
// die();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
  <div id="wrapper">
    <?php include "component/header.php" ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <?php if(isset( $_SESSION["Return-message"] )){ echo  $_SESSION["Return-message"] ; unset( $_SESSION["Return-message"] );} ?>
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
              <form method="POST" action="../processor/Pupdate-category.php?">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="hidden" name="id" value="<?= $singleCategories->Pid ?>" />
                  <input type="text" name="name" id="name" class="form-control" placeholder="name" value="<?= $singleCategories->Pname; ?>" />
                </div>

                <!-- Submit button -->
                <button type="submit" name="update" class="btn btn-primary  mb-4 text-center">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "component/footer.php" ?>

  </div>
</body>

</html>