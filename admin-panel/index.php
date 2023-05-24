
<?php include "dashboard/include/init.php" ?>

<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>
              <form action="processor/plogin.php" method="POST">
                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your email and password!</p>

                  <div class="form-outline form-white mb-4">
                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" />
                    <!-- <label class="form-label" for="typeEmailX">Email</label> -->
                  </div>

                  <br>

                  <div class="form-outline form-white mb-4">
                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" />
                    <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                  </div>


                  <button class="btn btn-outline-light btn-lg px-5" name="submit" id="submit" type="submit">Login</button>            

                </div>
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>