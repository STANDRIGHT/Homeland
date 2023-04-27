<?php //include "../inc/header.php";?>
<?php include "../config/config.php";?>

<?php

//persiting date
$name=$email=$phone="";

//error messages
$errors =array('empty'=>"", 'name'=>"", 'email'=>"", 'phone'=>"");


// authentication of input
  if(isset($_POST['submit'])){

      if (empty($_POST["Requestname"]) || empty($_POST["Requestemail"]) || empty($_POST["Requestphone"])){
        // $errors["empty"]="please fill all fields";
        echo ("<script>alert('forms are empty');</script>");
        

      }else{

        //get values from the input
        $name = $_POST["Requestname"];
        $email = $_POST["Requestemail"];
        $phone = $_POST["Requestphone"];
        
        //check for valid email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //make query using PDO
          $insert  = $conn->prepare("INSERT INTO request (_name, email, phone) VALUES(:Requestname, :Requestemail, :Requestphone)");
          $insert->execute(array(
            ':Requestname'=> $name,
            ':Requestemail' => $email,
            ':Requestphone' => $phone
          ));
          echo ("<script>alert('request sent sucessfully');</script>");
          // echo ("<script>location.href = '" . BASEURL . "/index.php'</script>");

        }else{
            // $errors["empty"]="User error try logging in again";        
            echo ("<script>alert('User error try logging in again');</script>");

            
            echo "<script>window.location.href ='".BASEURL."/property-details.php?id=$prop_id'</script>";

        } 
          
      }      
  }else{
    $errors["empty"]="Messagr error";

  }
?>