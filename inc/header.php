
<?php

define("BASEURL", "http://localhost/UDEMY%20COURSES/Homeland/");
session_start();

include dirname(dirname(__FILE__)) . "/Config/config.php";



// echo __DIR__;
//echo dirname(__FILE__);

//NOTE: echo __DIR__ AND echo dirname(__FILE__) performs the same task so take note.. and the essence of this is when you include
// file can not be found esppecially when u want to include your connection varrible inside your header.

//echo dirname(dirname(__FILE__)); //THIS IS TO GET THE actual directory;

// make query
$categories= $conn->query("SELECT * from categories");
$categories ->execute();


// fetch as associative array
$allcategories= $categories->fetchAll(PDO:: FETCH_ASSOC);
print_r($allcategories);
// die();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Homeland &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/mediaelementplayer.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/aos.css">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>/css/style.css">
    
  </head>
  <body>


  <!-- <div class="site-loader"></div> -->
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="<?php echo BASEURL ?>/index.php" class="text-white h2 mb-0"><strong>Homeland<span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="active">
                    <a href="<?php echo BASEURL ?>/index.php">Home</a>
                  </li>

                  <li><a href="<?php echo BASEURL ?>/index.php?type=sale">Sale</a></li>
                  <li><a href="<?php echo BASEURL ?>/index.php?type=rent">Rent</a></li>
                  <li class="has-children"><a href="#">Properties</a>
                      <ul class="dropdown arrow-top">
                        <?php foreach($allcategories as $category) :?>
                          <li><a href="index.php?id=<?php echo $category["Pid"] ?>"><?php echo str_replace('-', ' ', $category["Pname"]) ;?></a></li>
                        <?php endforeach ;?>
                      </ul>
                  </li>

                  <li><a href="<?php echo BASEURL ?>/about.php">About</a></li>
                  <li><a href="<?php echo BASEURL ?>/contact.php">Contact</a></li>
                  
                  <?php if(isset($_SESSION["username"])) : ?>
                  <li class="has-children">
                      <a href="#" style="padding-right:1rem; color:yellow;"><?php echo strtolower($_SESSION['username']); ?></a>
                      <ul class="dropdown arrow-top">
                        <li><a href="<?php echo BASEURL; ?>/auth/logout.php">logout</a></li>
                      </ul>
                  </li>
                  
                  <?php else : ?>
                  <li><a href="<?php echo BASEURL ?>/auth/login.php">Login</a></li>
                  <li><a href="<?php echo BASEURL ?>/auth/register.php">Register</a></li>

                  <?php endif; ?>
                </ul>
                  

              </nav>
            </div>
           
          </div>
        </div>
      </div>
    </div>
