<?php include("include/session.php"); ?>

<?php
//intializing the request function from the class
$allrequest = $quest->request();

// print_r($allrequest);
//  die();

?>

<?php
if (isset($_GET["return"])) {
  $return = $_GET["return"];


  $_SESSION["msg"] = '<div class="alert alert-danger" >Request Successfully Deleted</div>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

      <div class="row ">
        <div class="col-lg-12 mx-auto">

          <div class="card rounded shadow border-0">
            <div class="card-body p-5 bg-white rounded">
              <?php if(isset($_SESSION["msg"])){ echo $_SESSION["msg"];} ?>
              <h5 class="card-title mb-4 d-inline">Request</h5>
              <div class="table-responsive">
                <table id="example" style="width:100%" class="table table-striped table-bordered table-hover text-center ">
                  <thead class="">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Mail property</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php $x = 10;
                    foreach ($allrequest as $request) : ?>

                      <tr>
                        <th scope="row"><?= $x; ?></th>
                        <td><?php echo $request["Rname"]; ?></td>
                        <td><?php echo $request["Remail"]; ?></td>
                        <td><?php echo $request["Rphone"]; ?></td>
                        <td><a href="mailto:<?php echo $request["Remail"]; ?>" class="btn btn-info text-center "><i class="fa-solid fa-envelope fa-beat fa-lg"></i> Send mail</a></td>
                        <td>
                          <ul class="action-list">
                            <!-- <li><a href="edit-request.php?id=<?= $request['Rid'] ?>" data-tip="edit"><i class="fa fa-edit"></i></a></li> -->
                            <li><a href="delete-request.php?id=<?= $request['Rid'] ?>" data-tip="delete"><i class="fa-solid fa-trash  fa-xl " style="color: #862e09;"></i> </a></li>
                          </ul>
                        </td>
                      </tr>
                    <?php $x++;
                    endforeach; ?>

                  </tbody>
                </table>
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