<?php include("include/session.php"); ?>

<?php
//intializing the request function from the class
$allrequest = $quest->request();

// print_r($allrequest);
//  die();
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
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Requests</h5>

              <table class="table mt-3 table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Mail property</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach  ($allrequest as $request) : ?>

                    <tr>
                      <th scope="row"><?php echo $request["Rid"] ?></th>
                      <td><?php echo $request["Rname"]; ?></td>
                      <td><?php echo $request["Remail"]; ?></td>
                      <td><?php echo $request["Rphone"]; ?></td>
                      <td><a href="mailto:<?php echo $request["Remail"]; ?>" class="btn btn-success  text-center ">Send mail</a></td>
                    </tr>
                  <?php endforeach; ?>

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