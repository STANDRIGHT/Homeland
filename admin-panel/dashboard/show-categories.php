<?php include("include/session.php"); ?>

<?php
$allcategories = $gories->showCategoies();
// print_r($allcategories);
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
    <div class="container-fluid">
      <?php include "component/header.php" ?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
            <?php if(isset($_SESSION['delete-message'])){ echo $_SESSION['delete-message']; unset($_SESSION['delete-message']); } ?>

            <?php if(isset($_SESSION['Return-message'])){ echo $_SESSION['Return-message']; unset($_SESSION['Return-message']); } ?>
              <h5 class="card-title mb-4 d-inline">Categories</h5>
              <a href="create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>              
              <table class="table  table-hover">
                <thead class="thead-dark ">
                  <tr>
                    <th scope="col">S/n</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody class=""></tbody>
                  <?php $sn=1; foreach ($allcategories as $allcategory) : ?>
                    <tr>
                      <th scope="row"><?= $sn ?></th>
                      <td><?= $allcategory->_Pname ?></td>
                      <td><?= $allcategory->_created_at ?></td>
                      <td><a href="update-category.php?id=<?= $allcategory->_Pid ?>" class="btn btn-warning text-white text-center ">Update Categories</a></td>
                      <td><a href="delete-category.php?id=<?= $allcategory->_Pid ?>" class="btn btn-danger  text-center ">Delete Categories</a></td>
                    </tr>
                  <?php $sn++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



    </div>
    <?php include "component/footer.php" ?>

</body>

</html>