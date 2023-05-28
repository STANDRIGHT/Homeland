<?php include("include/session.php"); ?>

<?php
$admins = $app->getAdmins();

$_SESSION["master"] = $app->singleAdmin();
// print json_encode( $_SESSION["master"]);

// die();

// print_r($singleAdmin);


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
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Properties</h5>
              <p class="card-text">number of properties: </p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              <p class="card-text">number of categories:></p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              <p class="card-text">number of admins:</p>
            </div>
          </div>
        </div>
      </div>
    </div>


 
    
    <div class="container-fluid">

      <div class="row ">
        <div class="col-lg-12 mx-auto">

          <div class="card rounded shadow border-0">
            <div class="card-body p-5 bg-white rounded">
              <h5 class="card-title mb-4 d-inline">ADMINS</h5>
              <a href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <div class="table-responsive">
                <table style="width:100%" class="table table-striped table-bordered table-hover  ">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Status</th>
                      <th scope="col">Admin Category</th>
                      <th scope="col">Created at</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($admins as $admin) : ?>
                      <tr>
                        <td scope="row"><input type="checkbox" /> &nbsp;<?= $admin->Aid ?></td>
                        <td><?= $admin->AadminName ?></td>
                        <td><?= $admin->Aemail ?></td>

                        <td>
                          <select name="status" class="form-control form-select" aria-label="Default select example">
                            <option value="Active" selected="">Active</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Deleted">Delete</option>
                          </select>
                        </td>

                        <td>
                          <select name="status" class="form-control form-select" aria-label="Default select example">
                            <option value="Master" selected="">Master</option>
                            <option value="Sub">Sub</option>
                          </select>
                        </td>

                        <td><?= $admin->Acreated_at ?></td>

                        <td>
                          <ul class="action-list">
                            <li><a href="edit-admin.php?id=<?= $admin->Aid ?>" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                            <li><a href="delete-admin.php?id=<?= $admin->Aid ?>" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                          </ul>
                        </td>
                      </tr>
                    <?php endforeach; ?>
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