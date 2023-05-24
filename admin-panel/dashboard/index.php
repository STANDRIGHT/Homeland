<?php include("include/session.php"); ?>

<?php
  $allprops = $app->countProps();
  // print_r($allprops);
  // die();

  //count categories
  $allCat = $app->countCat();


  //count admin
  $alladmin = $app->countAmin();
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

    <div class="container-fluid">

      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Properties</h5>
              <p class="card-text">number of properties: <?php echo $allprops->totalProps?></p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>

              <p class="card-text">number of categories: <?php echo $allCat->totalcat?></p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>

              <p class="card-text">number of admins: <?php echo $alladmin->totaladmin?></p>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
  </div>
  </div>
  <?php include "component/footer.php" ?>

</body>

</html>