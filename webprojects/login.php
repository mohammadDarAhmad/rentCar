
<?php
include 'methods.php';
 session_name( 'name' );
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Login</title>


<link rel="stylesheet" href="css/reset.css" />

   <link href="css/style.css" rel="stylesheet"> 
   <link href="css/body.css" rel="stylesheet">  
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
            <h2 id="h"> login Form</h2>
            <label>Email: </label><input type="email" name="email"
                                          value=""
                                          placeholder="Email Address"
                                          required=""/>            <br><br>
            <label>Password: </label><input type="password" name="password" placeholder="Password"
                                            required=""
                                            value=""/> 
                
            <br>
            <button class="button" type="submit">Login</button>
        </form>
    </div>
</div>
 <body>

</body>
<footer>
   <?php
include 'footer.php';

?>


</footer>


  

</html>
<?php

    // Check if request is POST
if (!empty($_POST)) {

      
      $count=0;
       if (checkEmail($_POST['email']) == 0) {
          $_SESSION['wrong'] = 1;
       }
      
      if (checkAdmine($_POST['email'], $_POST['password'])> 0) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['userType'] = 3;
          $_SESSION['NameUser'] = $name;
      header("Location:main.php");
    } elseif (checkUser($_POST['email'],  md5($_POST['password'])) > 0) {
        $_SESSION['userType'] = 2;
        $_SESSION['email'] = $_POST['email'];

      $customer = getUserName($_SESSION['email']);
        $name = "";
        if ($row = $customer->fetch()) {
            $name = $row['name'];
            $_SESSION['NameUser'] = $name;
               $_SESSION['userType'] = 2;
        }
    header("Location:main.php");

    } else {
        $_SESSION['wrong'] = 1;
        $_SESSION['email'] = $_POST['email'];
          echo "<script>(function(){alert('Wrong email or password');})();</script>";
      // header("Location:login.php?");
    }
  }
  

      ?>