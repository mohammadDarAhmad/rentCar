

<?php
 session_name( 'name' );
session_start();

if (!isset($_POST)) {
    header("location:register.php");
}

include 'methods.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Register</title>

<link rel="stylesheet" href="css/reset.css" />

   <link href="css/style.css" rel="stylesheet"> 
   <link href="css/FinalStyle.css" rel="stylesheet">


  
</head>


  <header>
    <?php
   include 'header.php';
?>


   </header>
 <body>

<div class="form">
    <form class="form1" action="" method="post">
        <h2 id="h"> E-Account</h2>
        <label>Username :</label> <input type="text" name="username" placeholder="Enter username" required=""
                                         value=""/>
                          <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 6) echo "<sup style=" . "color:red;margin-left:180px;" . ";> user name already exist </sup>"; 
                      if (isset($_SESSION['error']) && $_SESSION['error'] == 1) echo "<sup style=" . "color:red;margin-left:180px;" . ";> user length should between  3 to 20 </sup>"; 
                            



                           ?>


                        



                <br>

        <label>PASSWORD :</label> <input type="password" name="password" placeholder="Enter password" required=""/><br>
              <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 2) echo "<sup style=" . "color:red;margin-left:180px;" . ";> password not identical </sup>"; 
                      if (isset($_SESSION['error']) && $_SESSION['error'] == 3) echo "<sup style=" . "color:red;margin-left:180px;" . ";> password length should between 6 to 15 </sup>"; 
                      if (isset($_SESSION['error']) && $_SESSION['error'] == 4) echo "<sup style=" . "color:red;margin-left:180px;" . ";> should  end lower case </sup>"; 
                      if (isset($_SESSION['error']) && $_SESSION['error'] == 5) echo "<sup style=" . "color:red;margin-left:180px;" . ";> ppassword should start with digit </sup>"; 
                            



                           ?>


        <label>CONFIRM PASSWORD:</label> <input type="password" name="cpassword" placeholder="Confirm password"
                                                required=""/>     
               
                                                  <br>


        <button class="button" type="submit">Create Account
        </button>


    </form>
</div>
 </body>
<footer>
   <?php
include 'footer.php';

?>
</footer>


  

</html>



<?php

     if($_SERVER['REQUEST_METHOD'] === 'POST' ) {

          $_SESSION['username'] = $_POST['username'];

    $notAccount = checkEAccount($_POST['username'], $_POST['password'], $_POST['cpassword']);

    if ($notAccount != 0) {
        unset($_SESSION['added']);
        $_SESSION['error'] = $notAccount;
          header('Location: profileRegister.php');
    } else {
        $_SESSION['password'] = $_POST['password'];

        if (FirstUser())
            $_SESSION['id'] = 100000000;

        else {
            $_SESSION['id'] = FindMaxId() + 1;
        }
        header('Location: FinalRegister.php');
    }


}
?>
