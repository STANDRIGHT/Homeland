<?php include "inc/header.php"; ?>
<?php include "config/config.php"; ?>

<?php
//Check the potentials of the page if the id is here
if (!isset($_GET["id"]) AND !isset($_SESSION["User_id"])){
  echo "<script>window.location.href ='404.php'</script>";
}

// check if isset
if (isset($_GET["id"])) {
  $id = $_GET["id"];

  // make query
  $single = $conn->query("SELECT * FROM props WHERE _id = '$id'");
  $single->execute();

  // fetch all query
  $fetchdetails = $single->fetch(PDO::FETCH_OBJ);
  // print_r($fetchdetails->_type);

  // die();

}else{
  echo "<script>window.location.href ='404.php'</script>";
}


// MAKE QUERY FOR GALLARY
$gallary = $conn->query("SELECT * FROM gallary WHERE gala_id='$id'");
$gallary->execute();

// fetch all query
$allgallary = $gallary->fetchAll(PDO::FETCH_OBJ);
// print_r($allgallary);
// die();




// MAKE QUERY FOR RELATED PROPERTIES
// AND  RPid != '$id'
// $Relateprops=$conn->query("SELECT * FROM props WHERE _type ='$fetchdetails->_type' AND  _id != '$id' ");
$Relateprops = $conn->query("SELECT * FROM related_properties WHERE RPmodels ='$fetchdetails->_type'");
$Relateprops->execute();

// Fetch all related properties 
$properties = $Relateprops->fetchAll(PDO::FETCH_OBJ);
// print_r($properties);
// die();


//make query for add to  favourite table
if (isset($_SESSION['User_id'])) {
  $fav = $conn->query("SELECT * FROM addfav WHERE prop_id ='$id' AND user_id='$_SESSION[User_id]'");
  $fav->execute();

  //fetch all data
  $fetch_fav = $fav->fetch(PDO::FETCH_OBJ);
  // print_r($fetch_fav);

}



?>


<!-- FIRST IMAGE VIEW -->
<div class="site-blocks-cover inner-page-cover overlay" style="background-image:url(images/<?php echo $fetchdetails->image ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-10">
        <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
        <h1 class="mb-2"><?php echo $fetchdetails->name ?></h1>
        <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?php echo $fetchdetails->price ?></strong></p>
      </div>
    </div>
  </div>
</div>
<!-- END OF FIRST IMAGE VIEW -->



<div class="site-section site-section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div>
          <div class="slide-one-item home-slider owl-carousel">
            <?php foreach ($allgallary as $gala) : ?>
              <div><img src="gallary/<?php echo $gala->images ?>" alt="Image" class="img-fluid"></div>
            <?php endforeach; ?>           
          </div>
        </div>
        <div class="bg-white property-body border-bottom border-left border-right">
          <div class="row mb-5">
            <div class="col-md-6">
              <strong class="text-success h1 mb-3">$<?php echo $fetchdetails->price ?></strong>
            </div>
            <div class="col-md-6">
              <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number"><?php echo $fetchdetails->beds ?> <sup>+</sup></span>

                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number"><?php echo $fetchdetails->bath ?></span>

                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number"><?php echo $fetchdetails->sq_ft ?></span>

                </li>
              </ul>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
              <strong class="d-block"><?php echo $fetchdetails->home_type ?></strong>
            </div>
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
              <strong class="d-block"><?php echo $fetchdetails->year_built ?></strong>
            </div>
            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
              <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
              <strong class="d-block">$<?php echo $fetchdetails->price_sqft ?></strong>
            </div>
          </div>
          <h2 class="h4 text-black">More Info</h2>
          <?php echo $fetchdetails->description ?>

          <div class="row no-gutters mt-5">
            <div class="col-12">
              <h2 class="h4 text-black mb-3">Gallery</h2>
            </div>

            <?php foreach ($allgallary as $gala) : ?>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="gallary/<?php echo $gala->images ?>?id=<?php echo $gala->_id ?>" class="image-popup gal-item"><img src="gallary/<?php echo $gala->images ?>" alt="Image" class="img-fluid"></a>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
      <div class="col-lg-4">

        <!-- FORM CONTACT -->
        <div class="bg-white widget border rounded">
          <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
          <?php if (isset($_SESSION["User_id"])) : ?>

            <form action="request/process-request.php" method="POST" class="form-contact-agent">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="Requestname" id="Requestname" class="form-control">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="Requestemail" id="Requestemail" class="form-control">
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="Requestphone" class="form-control">
              </div>

              <div class="form-group">
                <input type="submit" name="submit" id="phone" class="btn btn-primary" value="Send Message">
              </div>
            </form>

          <?php else : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Hello! User you have to login before you can request for this property</strong>              
              </button>
            </div>

          <?php endif; ?>
        </div>
        <!-- END OF FORM CONTACT -->

        <!-- SOCIAL MEDIA HANDLES -->
        <div class="bg-white widget border rounded">
          <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
          <div class="px-3" style="margin-left: -15px;">
            <a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
            <a href="https://twitter.com/intent/tweet?text=&url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
          </div>
        </div>
        <!-- END OF SOCIAL MEDIA HANDLES -->


        <!-- FAVOURITE LINK -->
        <div class="bg-white widget border rounded">
          <form action="addfav.php" method="POST" class="form-contact-agent">
            <h3 class="h4 text-black widget-title mb-3">Add this to Favourite</h3>
            <?php if (!isset($_SESSION["User_id"])) {
              echo '<div class="alert alert-danger">
                    <strong>Hello! Log in before you can add property to Favourite</strong>
                    </div>';
            } ?>
            <div class="form-group">
              <!-- <label for="name">prop_id</label> -->
              <input type="hidden" name="prop_id" value="<?php echo $id; ?>" class="form-control">
            </div>

            <div class="form-group">
              <!-- <label for="name">user_id</label> -->
              <input type="hidden" name="user_id" class="form-control" value="<?php if (isset($_SESSION["User_id"])) {
                                                                                echo $_SESSION['User_id'];
                                                                              }  ?>">
            </div>

            <?php if (isset($_SESSION["User_id"]) and isset($id)) : ?>
              <?php if ($fav->rowcount() > 0) : ?>
                <div class="form-group">
                  <a href="fav_delete.php?prop_id=<?php echo $id; ?>&fav_user=<?php if (isset($_SESSION["User_id"])) {
                                                                                echo $_SESSION['User_id'];
                                                                              }  ?>" class='btn btn-success text-white'>Added to Favourite</a>
                </div>

              <?php else : ?>
                <div class="form-group">
                  <!-- <a href="addfav.php"  class="btn btn-primary text-white">Add to Favourite</a> -->
                  <input type="submit" name="submit" class="btn btn-primary" value="Add to Favourite">
                </div>
              <?php endif; ?>
            <?php endif; ?>

          </form>
          <!-- END OF FAVOURITE LINK HANDLES -->
        </div>

      </div>

    </div>
  </div>
</div>
<!-- END OF GRID THAT HOLDS THE DETAILS OF THE PROPERTIES AND THE FORM/SOCIAL MEDIA HANDLES -->



<!-- Related Properties -->
<div class="site-section site-section-sm bg-light">
  <div class="container">

    <div class="row">
      <div class="col-12">
        <div class="site-section-title mb-5">
          <h2>Related Properties</h2>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <?php foreach ($properties as $property) : ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="property-entry h-100">
            <a href="property-details.php?id=<?php echo $property->RPid ?>" class="property-thumbnail">
              <div class="offer-type-wrap">
                <span class="offer-type bg-<?php if ($property->RPtypes == "sale") {
                                              echo "success";
                                            } elseif ($property->RPtypes == "Lease") {
                                              echo "info";
                                            } else {
                                              echo "danger";
                                            } ?>"><?php echo $property->RPtypes; ?></span>
              </div>
              <img src="images/<?php echo $property->RPimages; ?>" alt="Image" class="img-fluid">
            </a>
            <div class="p-4 property-body">
              <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
              <h2 class="property-title"><a href="property-details.php?id=<?php echo $property->RPid ?>"><?php echo $property->RPname; ?></a></h2>
              <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $property->RPlocation; ?></span>
              <strong class="property-price text-primary mb-3 d-block text-success">$<?php echo $property->RPprice; ?></strong>
              <ul class="property-specs-wrap mb-3 mb-lg-0">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number"><?php echo $property->RPbeds; ?> <sup>+</sup></span>
                </li>

                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number"><?php echo $property->RPbaths; ?></span>
                </li>

                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number"><?php echo $property->RPsq_ft; ?></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- END OF Related Properties -->

<?php require "inc/footer.php"; ?>