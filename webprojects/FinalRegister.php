

<?php
 session_name( 'name' );
session_start();

include 'methods.php';

if (!isset($_POST)) {
    header("location:register.php");
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
   <link href="css/FinalStyle.css" rel="stylesheet">


  
</head>


  <header>
    <?php
   include 'header.php';
?>


   </header>
    <body>
<div id="container">
    <div class="form">
        <form class="form1" action="" method="post">
            <h2 id="h"> register Form</h2>
            <label> NAME :</label> <input type="text" name="name" placeholder="Enter your name" required=""
                                         value="<?php echo(isset($_SESSION['name']) ? $_SESSION['name'] : ''); ?>"/><br>

            <label>EMAIL :</label> <input type="email" name="email" placeholder="Enter Email Address" required=""
                                             value="<?php echo(isset($_SESSION['emailr']) ? $_SESSION['emailr'] : ''); ?>"/>  
                                               <?php if (isset($_SESSION['errorc']) && $_SESSION['errorc'] == 1) echo "<sup style=" . "color:red;margin-left:180px;" . ";> email already exist </sup>"; ?>
                                                <br>

                                      <label>Username :</label> <input type="text" name="username" required=""
                                             value="<?php echo(isset($_SESSION['username']) ? $_SESSION['username'] : ''); ?>"/>>




                                             <br>



            <label>Mobile Number :</label><input type="tel" name="Mobile" placeholder="Enter your Mobile Number :" required=""        pattern="[0-9]*"
                                          value="<?php echo(isset($_SESSION['Mobile']) ? $_SESSION['Mobile'] : ''); ?>"/><br>
                            
                   <label>Telephone Number :</label><input type="tel" name="Telephone" placeholder="Enter your Telephone Number" required=""     pattern="[0-9]*"
                                          value="<?php echo(isset($_SESSION['Telephone']) ? $_SESSION['Telephone'] : ''); ?>"/><br>
                                    


            <label>Address :</label> <input type="text" name="address" placeholder="Enter your address" required=""
                                           value="<?php echo(isset($_SESSION['address']) ? $_SESSION['address'] : ''); ?>"/><br>

            <label>DOB :</label><input type="date" name="dob" placeholder="Enter birth of date" required=""     id="dob"
                                    value="<?php echo(isset($_SESSION['dob']) ? $_SESSION['dob'] : ''); ?>"/><br>
                                     
            <button class="button" type="submit">Register
            </button>

        </form>
    </div>

</div>

</body>
    

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
    $_SESSION['username'] = $_POST['username'];
       $error = checkEmailAndUserName($_SESSION['emailr'], $_SESSION['username']);
        if ($error != 0) {
          unset($_SESSION['added']);
            $_SESSION['errorc'] = $error;
         //   header('Location: FinalRegister.php');

          }
            else{
               unset($_SESSION['errorc']);
        if (addUser($_SESSION['name'], $_SESSION['emailr'], $_SESSION['username'], $_SESSION['Mobile'], $_SESSION['Telephone'] , md5($_SESSION['password']), $_SESSION['address'], $_SESSION['dob'], $_SESSION['id']) == 1) {
            $_SESSION['userType'] = 2;
            $_SESSION['NameUser'] = $_SESSION['name'];
            echo("<script LANGUAGE='JavaScript'>
    window.alert('Your resgister'); window.location.href='main.php';
    </script>");

        } 
    }
  }
      ?>