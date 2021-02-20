

<?php
 session_name( 'name' );
session_start();

include 'methods.php';
if (isset($_GET['new'])) {
    session_destroy();
    header('Location: register.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Register</title>

<link rel="stylesheet" href="css/reset.css" />

   <link href="css/style.css" rel="stylesheet"> 
   <link href="css/body.css" rel="stylesheet">  
   <link href="css/login.css" rel="stylesheet">

  
</head>


  <header>
    <?php
   include 'header.php';
?>


   </header>
    <body>
 <div class="form">
        <form class="form1" action="" method="post">
            <h2 id="h"> register Form</h2>
            <label> NAME :</label> <input type="text" name="name" placeholder="Enter your name" required=""
                                          value=""/><br>

            <label>EMAIL :</label> <input type="email" name="email" placeholder="Enter Email Address" required=""
                                          value="" />
                                            <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 1) echo "<sup style=" . "color:red;margin-left:180px;" . ";> email already exist </sup>"; ?>
                        <br>

            <label>Mobile Number :</label><input type="tel" name="Mobile" placeholder="Enter your Mobile Number :" required=""
                                         value=""
                                         pattern="[0-9]*"/><br>
                   <label>Telephone Number :</label><input type="tel" name="Telephone" placeholder="Enter your Telephone Number" required=""
                                         value=""
                                         pattern="[0-9]*"/><br>


            <label>Address :</label> <input type="text" name="address" placeholder="Enter your address" required=""
                                            value=""/><br>

            <label>DOB :</label><input type="date" name="dob" placeholder="Enter birth of date" required=""
                                       value=""
                                       id="dob"/><br>
            <button class="button" type="submit">Register
            </button>

        </form>
    </div>
    

<footer>
   <?php
include 'footer.php';

?>
</footer>


  

</html>
 
 <?php
  
    // Check if request is POST
    if($_SERVER['REQUEST_METHOD'] === 'POST' ) {


    $_SESSION['emailr'] = $_POST['email'];
    $_SESSION['dob'] = $_POST['dob'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['Mobile'] = $_POST['Mobile'];
     $_SESSION['Telephone'] = $_POST['Telephone'];
    $_SESSION['name'] = $_POST['name'];
       $NotRegister = checkRegister($_POST['email']);
        if ($NotRegister != 0) {
            unset($_SESSION['added']);
            $_SESSION['error'] = $NotRegister;
               $_SESSION['error1'] = $NotRegister;
            header('Location: register.php');


        } else {

            unset($_SESSION['error']);
           header('Location: profileRegister.php');

        }
    }
      ?>