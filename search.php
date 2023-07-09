    <?php include "inc/header.php";?>
    <?php include "config/config.php";?>

    <?php
      //make query
      $select = $conn->query("SELECT * FROM props");
      $select->execute();

      //fetch-data
      $props = $select-> fetchAll(PDO::FETCH_OBJ);

      // print_r($props);
    
    if (isset($_POST["submit"])) {
        $types = $_POST["types"];
        $offers = $_POST["offers"];
        $cities = $_POST["cites"];

        // $_SESSION['types']= $_POST["types"];
        // $_SESSION['offers']= $_POST["offers"];
        // $_SESSION['cities']= $_POST["cites"];

            // make queries
        $search = $conn->query("SELECT * FROM props WHERE _type LIKE '%$types%' OR home_type LIKE '%$offers%' OR _location LIKE '%$cities$'");
        $search->execute();

        $listings = $search->fetchAll(PDO:: FETCH_ASSOC); //NOTE: Please always use PDO:: FETCH_ASSOC NOT // PDO:: FETCH_OBJ
            // print_r($listings);
            // die();
    }else{
       echo "<script>window.location.href='index.php'</script>"; 
      // header("location:index.php");
    }


    ?>

  

    <div class="slide-one-item home-slider owl-carousel">
      <?php foreach ($props as $prop): ?>
        <div class="site-blocks-cover overlay" style="background-image: url(images/<?php echo $prop->image; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row align-items-center justify-content-center text-center">
              <div class="col-md-10">
                <span class="d-inline-block bg-<?php if($prop->home_type == "Rent"){ echo "success";}else{echo "danger";}?> text-white px-3 mb-3 property-offer-type rounded"><?php echo $prop->home_type; ?> </span>
                <h1 class="mb-2"><?php echo $prop->name; ?>  </h1>
                <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?php echo $prop->price; ?></strong></p>
                <p><a href="property-details.php?id=<?php echo $prop->_id ; ?>" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
              </div>
            </div>
          </div>
        </div>  
      <?php endforeach ; ?>
    </div>





    <div class="site-section site-section-sm pb-0" id="back">
      <div class="container">
        <div class="row">
          <form class="form-search col-md-12" style="margin-top: -100px;" method="POST" action="search.php#property" >
            <div class="row  align-items-end" >

            <!-- SEARCH TYPE -->
              <div class="col-md-3">
                <label for="list-types">Listing Types</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="types" id="list-types" class="form-control d-block rounded-0">
                    <?php foreach($allcategories as $category) :?>
                        <option value="<?php echo str_replace('-', ' ', $category["Pname"]) ;?>"><?php echo $category["Pname"] ;?></option>
                      <?php endforeach ;?>
                  </select>
                </div>
              </div>
              <!-- END SEARCH TYPE -->


              <!-- SEARCH OFFER -->
              <div class="col-md-3">
                <label for="offer-types">Offer Type</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="offers" id="offer-types" class="form-control d-block rounded-0">
                    <option value="Sale">Sale</option>
                    <option value="Rente">Rent</option>
                    <option value="Lease">Lease</option>
                  </select>
                </div>
              </div>
              <!-- END SEARCH OFFER -->

              <!-- END SEARCH CITY -->
              <div class="col-md-3">
                <label for="select-city">Select City</label>
                <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select name="cites" id="select-city" class="form-control d-block rounded-0">
                    <option value="New York">New York</option>
                    <option value="Brooklyn">Brooklyn</option>
                    <option value="London">London</option>
                    <option value="Japan">Japan</option>
                    <option value="Japan">Japan</option>
                    <option value="Los Angeles">Los Angeles</option>
                    <option value="Philippines">Philippines</option>
                  </select>
                </div>
              </div>
              <!-- END SEARCH CITY -->
                            
              <div class="col-md-3">
                <input type="submit" name="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
              </div>
            </div>
          </form>
        </div>  
        <!-- END OF SEARCHING THAT IS LEADING TO SEARCH.PHP -->
      </div>
    </div>



    <div class="site-section site-section-sm bg-light" id="property">
      <div class="container">
          <div class="row mb-5">
           <?php if (count($listings)> 0): ?>
            
            <?php foreach ($listings as $listing) : ?>
              <div class="col-md-6 col-lg-4 mb-4" >
                <div class="property-entry h-100">
                  <a href="property-details.php?id=<?= $listing['_id'] ?>" class="property-thumbnail">
                    <div class="offer-type-wrap">
                    <span class="d-inline-block bg-<?php if($listing["home_type"] == "Rent"){ echo "success";}else{echo "danger";}?> text-white px-3 mb-3 property-offer-type rounded"><?php echo $listing["home_type"]; ?> </span>
                    </div>
                    <img src="images/<?php echo $listing['image']; ?>" alt="Image" class="img-fluid">
                  </a>
                  <div class="p-4 property-body">
                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                    <h2 class="property-title"><a href="property-details.php?id=<?php echo $listing["_id"] ;?>"><?php echo $listing['name']; ?></a></h2>
                    <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $listing['_location']; ?></span>
                    <strong class="property-price text-primary mb-3 d-block text-success"><?php echo $listing['price']; ?></strong>
                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                      <li>
                        <span class="property-specs">Beds</span>
                        <span class="property-specs-number"><?php echo $listing['beds']; ?> <sup>+</sup></span>
                        
                      </li>
                      <li>
                        <span class="property-specs">Baths</span>
                        <span class="property-specs-number"><?php echo $listing['bath']; ?></span>
                        
                      </li>
                      <li>
                        <span class="property-specs">SQ FT</span>
                        <span class="property-specs-number"><?php echo $listing['sq_ft']; ?></span>
                        
                      </li>
                    </ul>

                  </div>
                </div>
              </div>              
              <?php endforeach ; ?>

            <?php else: ?>
              <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading font-weight-bold display-4">Hi, <?php if(isset($_SESSION['username'])){echo strtolower($_SESSION['username']) ;}else{ echo "User";}  ?></h4>
                <p class="lead">We apologize that you were unable to find the property you were looking for on our website. 
                  We take great pride in providing a wide selection of properties to meet our clients' demands. </p>  
                      <hr>
                <p>Thank you for your interest in our properties. We look forward to hearing from you soon.</p>
                <span class="lead"><a class="btn btn-danger btn-md text-white" href="search.php#back" role="button">Research</a></span>
              </div>
            <?php endif; ?>
          </div>

        </div>
    </div>

  



    <!-- <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2>Recent Blog</h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <a href="#"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="#">Art Gossip by Mike Charles</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem veniam quae sunt.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <a href="#"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="#">Art Gossip by Mike Charles</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem veniam quae sunt.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="300">
            <a href="#"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="#">Art Gossip by Mike Charles</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem veniam quae sunt.</p>
            </div>
          </div>

        </div>

      </div>
    </div> -->

  
    <?php require "inc/footer.php";?>
