<?php include("include/session.php"); ?>

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
      <div class="row w-70 m-auto">
        <div class="col-md-8 col-lg-6 mb-8 m-auto">
          <div class="card  bg-dark">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline text-white">Create Admin</h5>
              <nav aria-label="..." class="float-right">
                <ul class="pagination ">
                  <li class="page-item">
                    <a class="page-link text-dark font-weight-bold" href="admins.php">Back</a>
                  </li>
                </ul>
              </nav>

              <form method="POST" action="../processor/padmin.php">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" />
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="username" id="form2Example1" class="form-control" placeholder="Password" />
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-info  mb-4 text-center font-weight-bold">Create</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

  <?php include "component/footer.php" ?>
</body>

</html>