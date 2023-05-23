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
                    <h5 class="card-title mb-5 d-inline">Create Properties</h5>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                        </div>    
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="location" id="form2Example1" class="form-control" placeholder="location" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="beds" id="form2Example1" class="form-control" placeholder="beds" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="baths" id="form2Example1" class="form-control" placeholder="baths" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="sq_ft" id="form2Example1" class="form-control" placeholder="SQ/FT" />
                        </div>   
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="year_built" id="form2Example1" class="form-control" placeholder="Year Build" />
                        </div> 
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price_sqft" id="form2Example1" class="form-control" placeholder="Price Per SQ FT" />
                        </div> 
                        
                        <select name="home_type" class="form-control form-select" aria-label="Default select example">
                            <option selected>Select Home Type</option>
                            <option value="1">Condo</option>
                            <option value="2">Condo</option>
                            <option value="3">Condo</option>
                        </select>   
                        <select name="type" class="form-control mt-3 mb-4 form-select" aria-label="Default select example">
                            <option selected>Select Type</option>
                            <option value="1">Rent</option>
                            <option value="2">Sale</option>
                            <option value="3">Condo</option>
                        </select>  
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea placeholder="Description" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Property Thumbnail</label>
                            <input name="thumbnail" class="form-control" type="file" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Gallery Images</label>
                            <input name="images" class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
                
                    </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php include "component/footer.php" ?>

</body>
</html>