

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
   <title>Car Rent</title>

  <link rel="stylesheet" href="reset.css" />
   <link href="css/aa.css" rel="stylesheet">

  
</head>


  <header>
    <?php
   include 'header.php';
?>


   </header>
    <body>

<div class="homeCont">

  <p class="FHead">Welcome to the car rental company, we have a great experience in the field of car rental, where we deal with car rental with a one-day account, and also here we will show you the best agencies that we have
  </p>
  <br>
  <hr>
 
    <div class="FAgency">
     
      <h3 class="top">BMW</h3>
       <img class="pohotoBMW" src="image/BMw1.jpg" alt="BMW">
      <p class="firstMiddleP">We have a BMW car agency since 2000 and these companies are one of the best auto companies in the world and we rent and sell their cars as well and is one of the best sports cars</p>
    </div>


      <div class ="SAgency">
           <br>
        <hr>
        <br>
        <img class="photoMarces" src="image/MARCEDES.jpg" alt="MARCEDES">
      <h3>MARCEDES</h3>
      <p class="firstMiddleP">We have a Mercedes Cars Agency, where we have had this agency since 2004, and Mercedes cars are distinguished by their strength and durability</p>
    <br>
    
        </div>
  
  </div> 
    

 

</body>
<footer>
   <?php
include 'footer.php';

?>


</footer>
  

</html>

