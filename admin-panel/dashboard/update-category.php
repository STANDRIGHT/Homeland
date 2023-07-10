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
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
  <div id="wrapper">
    <?php include "component/header.php" ?>

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-6 mb-6 m-auto">
          <div class=" bg-dark">
            <div class="card-body">
              <?php if(isset( $_SESSION["Return-message"] )){ echo  $_SESSION["Return-message"] ; unset( $_SESSION["Return-message"] );} ?>
              <h5 class="card-title mb-5 d-inline text-white">Update Categories</h5>
              <nav aria-label="..." class="float-right">
                <ul class="pagination ">
                  <li class="page-item">
                    <a class="page-link" href="show-categories.php">Back</a>
                  </li>
                </ul>
              </nav>
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