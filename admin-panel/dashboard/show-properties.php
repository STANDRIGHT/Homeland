<?php include("include/session.php") ;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
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
              <h5 class="card-title mb-4 d-inline">Properties</h5>
              <a href="create-properties.php" class="btn btn-primary mb-4 text-center float-right">Create Properties</a>

              <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">home type</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>625 S. BERENDO ST</td>
                    <td>1,265,500</td>
                    <td>Condo</td>
                     <td><a href="delete-posts.php" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>625 S. BERENDO ST</td>
                    <td>1,265,500</td>
                    <td>Condo</td>
                    <td><a href="delete-posts.php" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                 <tr>
                    <th scope="row">3</th>
                    <td>625 S. BERENDO ST</td>
                    <td>1,265,500</td>
                    <td>Condo</td>
                    <td><a href="delete-posts.php" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
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