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
              <h5 class="card-title mb-4 d-inline">Requests</h5>
            
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">go to this property</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>MOhamed</td>
                    <td>moha@gmail.com</td>
                    <td>0123040488</td>
                     <td><a href="" class="btn btn-success  text-center ">go</a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>MOhamed</td>
                    <td>moha@gmail.com</td>
                    <td>0123040488</td>
                    <td><a href="" class="btn btn-success  text-center ">go</a></td>
                </tr>
                 <tr>
                    <th scope="row">3</th>
                    <td>MOhamed</td>
                    <td>moha@gmail.com</td>
                    <td>0123040488</td>
                    <td><a href="" class="btn btn-success  text-center ">go</a></td>
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