<?php include("include/session.php"); ?>

<?php
$allproperties = $perties->props();
// print json_encode($allproperties);
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

      <div class="row ">
        <div class="col-lg-12 mx-auto">

          <div class="card rounded shadow border-0">
            <div class="card-body p-5 bg-white rounded">
              <h5 class="card-title mb-4 d-inline">Properties</h5>
              <a href="create-properties.php" class="btn btn-primary mb-4 text-center float-right">Create Properties</a>
              <div class="table-responsive">
                <table id="example" style="width:100%" class="table table-striped table-bordered table-hover text-center ">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Home</th>
                      <th scope="col">Beds</th>
                      <th scope="col">Baths</th>
                      <th scope="col">Type</th>
                      <th scope="col">Created at</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $x = 30;
                    foreach ($allproperties as $props) : ?>
                      <tr>
                        <td scope="row">&nbsp; <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                          <?= $x; ?></td>
                        <td><?= $props->Pname ?></td>
                        <td><?= $props->Pprice ?></td>
                        <td><?= $props->Phometype ?></td>
                        <td><?= $props->Pbeds ?></td>
                        <td><?= $props->Pbath ?></td>
                        <td><?= $props->Ptype ?></td>
                        <td><?= $props->Pcreated_at ?></td>
                        <td>
                          <ul class="action-list">
                            <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                            <li><a href="#" data-tip="delete"><i class="fa fa-trash"></i></a></li>
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



    
<!-- card starts here -->

    <!-- <div class="site-section site-section-sm " id="property"> -->
      <div class="container ">
        <div class="card">
          <div class="row mb-5">
            <?php foreach ($allproperties as $props) : ?>
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                  <div class="card">
                    <img src="../../images/<?php echo $props->Pimage; ?>" class="card-img-top" alt="...">
                    <div class="offer-type-wrap ml-2">
                      <span class="d-inline-block rounded font-weight-bold bg-<?php if ($props->Phometype == "Rent") {
                                                        echo "alert alert-success";
                                                      } else {
                                                        echo "alert alert-danger";
                                                      } ?> text-white px-3 mb-3 property-offer-type "><?php echo $props->Phometype; ?> </span>
                    </div>

                    <div class="card-body">
                      <h5 class="card-title"><a href="property-details.php?id=<?php echo $props->Pid; ?>"><?php echo $props->Pname; ?></a></h5>
                      <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $props->Plocation; ?></span>
                      <h5><strong class="property-price text-primary mb-3 d-block text-success">$<?php echo $props->Pprice; ?></strong></h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>

                    <div class="details">
                      <div class="container text-center">
                        <div class="row">
                          <div class="col">
                            <span class="property-specs font-weight-bold">Beds</span>
                            <span class="property-specs-number font-weight-bold text-danger"><?php echo $props->Pbeds; ?> <sup>+</sup></span>
                          </div>

                          <div class="col">
                            <span class="property-specs font-weight-bold">Baths</span>
                            <span class="property-specs-number font-weight-bold text-danger"><?php echo $props->Pbath; ?></span>
                          </div>

                          <div class="col">
                            <span class="property-specs font-weight-bold">SQ FT</span>
                            <span class="property-specs-number font-weight-bold text-danger"><?php echo $props->Psq_ft; ?></span>
                          </div>

                        </div>
                      </div>                  
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>

    <!-- card ends here -->


  </div>



    <?php include "component/footer.php" ?>
    <!-- do a button that can print and that can download in pdf and excel -->
 
</body>

</html>