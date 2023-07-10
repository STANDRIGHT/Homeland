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
  <link href="assets/css/style.css" rel="stylesheet">


  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/js/testing.js"></script>
</head>

<body>



  <div id="wrapper">

    <?php include "component/header.php" ?>
  

    <div class="container-fluid">
      <div class="row  ">
        <div class="col-lg-12 mx-auto">
          <div class="card rounded shadow border-0">
            <div class="card-body p-5 bg-white rounded">
            <?php if(isset($_SESSION["Return-message"])){
              echo  $_SESSION["Return-message"];
              unset($_SESSION["Return-message"]);
            } ?>

              <h5 class="card-title mb-4 d-inline">Category</h5>
              <a href="create-category.php" class="btn btn-info mb-4 text-center float-right">Create Categories</a>
              <div class="table-responsive">
                <table style="width:100%" class="table table-striped table-bordered table-hover  ">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">S/n</th>
                      <th scope="col">Name</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $sn = 1; foreach ($allcategories as $allcategory) : ?>
                      <tr>
                        <td scope="row"><?= $sn ?></td>
                        <td><?= $allcategory->_Pname ?></td>
                        <td><?= $allcategory->_created_at ?></td>
                        <td>
                          <ul class="action-list">
                            <li><a href="update-category.php?id=<?= $allcategory->_Pid ?>" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                            <li><a href="delete-category.php?id=<?= $allcategory->_Pid ?>" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                          </ul>
                        </td>
                      </tr>
                    <?php $sn++; endforeach; ?>
                  </tbody>
                </table>
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