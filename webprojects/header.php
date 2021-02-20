  `
 
 <?php
// Start the session


?>
 <header>
      <nav id="mainMenu">
         <ul>
           <li><a href="home.php">Home</a></li>

        <?php

            //Guest permition
             if (!isset($_SESSION['userType']) || $_SESSION['userType'] == 1) {
               echo '
                    
                     <li><a href="register.php">Register</a></li>
                      <li><a href="login.php">Login</a></li>

                ';

                    //Losin user permition
                   } else if ($_SESSION['userType'] == 2)  { 

                ?>


          <li>     <a href="Account.php" >  <?= $_SESSION['NameUser'] ?></a> </li>


                 <?php


            echo '
                     <li><a href="logout.php"> Logout</a> </li>
                ';
          }
           ?>
         </ul>   
      </nav>
         <img src="image/iconCars.png" alt="Portrait of Eleanor of Toledo"> 
           <h1>Car<span>Rent</span></h1>
    
        
      <nav id="secondaryMenu">
         <ul>
                <?php 
            if (isset($_SESSION['userType'])&&($_SESSION['userType'] == 3))  { 
                 echo '<li><a href="control.php">Control panel</a><li>';
            }
          ?>
           <li><a href="main.php">Search</a></li>
            <li><a href="contacts.php">Contacts</a></li>
           <li><a href="aboutus.php">About us</a></li>
        
         </ul>  
      </nav>
   </header>