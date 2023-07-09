<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/404.css">
</head>

<body>
  <?php
  // $previous = "javascript:history.go(-1)";
  // if (isset($_SERVER['HTTP_REFERER'])) {
  //   $previous = $_SERVER['HTTP_REFERER'];
  // }
  
  ?>
  <div class="noise"></div>
  <div class="overlay"></div>
  <div class="terminal">
    <h1>Error <span class="errorcode">404</span></h1>
    <p class="output">The page you are looking for might have been removed, had its name changed or is temporarily
      unavailable.</p>
    <p class="output">Please try to <?php echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";?> or <a href="index.php">return to the homepage</a>.</p>
    <p class="output">Good luck.</p>

  </div>
</body>

</html>