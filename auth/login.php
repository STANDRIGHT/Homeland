<?php include("../inc/header.php");?>
<?php include("../config/config.php");?>


<?php
  // if (isset($_SESSION['username'])) {
  //   header("location:" . BASEURL . "");
  // }
?>

<?php
  if(isset($_POST['submit'])){

      if (empty($_POST["email"]) || empty($_POST["password"])){
          echo "<script>alert=('please fill all fields')</script>";

      }else{
            //get values from the input
            $email = $_POST["email"];
            $password = $_POST["password"];

            //make query
            $login = $conn->query("SELECT * FROM users WHERE email='$email'");
            $login->execute();

            //fetch data
            $fetch = $login->fetch(PDO::FETCH_ASSOC);
            // $fetch = $login->fetchAll(PDO::FETCH_ASSOC);

            if($login->rowCount() > 0){
                if(password_verify($password, $fetch['mypassword'])){
                  $_SESSION['username'] = $fetch['username'];
                  $_SESSION['email'] = $fetch['email'];
                  $_SESSION['User_id'] = $fetch['_id'];


                  // Warning: Cannot modify header information - headers already sent by 
                  // (output started at /www/usr2345/htdocs/auth.php:52) in /www/usr2345/htdocs/index.php on line 100
                      //ABOVE is an error that resulted to header having issues
                  
                  // header("location: ".BASEURL."");
                  // header("location: index.php");
                  //  header("Location:".BASEURL."/index.php");
                  echo ("<script>location.href = '" . BASEURL . "index.php;</script>");

                  // NOTE THIS 4 HEADER WORK AS SAME IT IS JUST YOUR CHOICE 

                  }else{
                        echo "<script>alert=('email or password is wrong')</script>";
                  }

             }else{
                echo "<script>alert=('emailis wrong')</script>";
             }
      }

  }


?>

  
<!-- MENU HERE -->

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo BASEURL ;?>/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Log In</h1>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
            <h3 class="h4 text-black widget-title mb-3">Login</h3>
            
            <form action="login.php" method="POST" class="form-contact-agent">
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control">
              </div>

              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
              </div>

              <div class="form-group">
                  <input type="submit" name="submit" id="phone" class="btn btn-primary" value="Login">
              </div>
            </form>

          </div>
         
        </div>
      </div>
    </div>

   

<?php include("../inc/footer.php"); ?>
