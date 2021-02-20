
<?php
include 'methods.php';
 session_name( 'name' );
session_start();

if ($_SESSION['userType'] != 3 && $_SESSION['userType'] != 2) {
    echo "<script>
          alert('You must log in');
      document.location.href='login.php';
      </script>";

    header("Location:login.php");
}


if (!isset($_GET['id'])) {
    header("location:main.php");
}



$server = "localhost";

$username = "root";
$password = "";
$dbname = "dbschema_1161721";
$conn = "mysql:host=$server;dbname=$dbname";

$pdo = null;
try {
    $pdo = new PDO($conn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Car Rent</title>

<link rel="stylesheet" href="reset.css" />

   <link href="css/style.css" rel="stylesheet"> 
   <link href="css/main.css" rel="stylesheet">

  
</head>


  <header>
  	<?php
   include 'header.php';
?>


   </header>
   	<body>

 
    
      
 <body>
       <form ction="main.php" method="get" id="Rent">
    <fieldset>
       <legend><Strong>List of available cars
       </Strong></legend>

       <div id="searchBox">
           <input type="search" name="day" placeholder="Max price E.X 3000000">
      


                    <select name="color">
                        <option selected disabled>Country car</option>
                        <option value="Germany" >red</option>
                   
                          </select>

                           
                    

              <button class="button" type="submit" name = "rente">Filter</button>
               

       </div>


 
    </body>        
    
  <?php

    if($_SERVER['REQUEST_METHOD'] === 'POST' ) {
     //  echo  $_GET['YearBox'];
      if (isset($_GET['rente'])) {
              echo "<script>
      alert('Error, no get');
      document.location.href='FinalRented.php?id=".$_GET['id']."';
      </script>";
    }
else{

  
   
 if(!empty($_GET['color']  )&& !empty($_GET['day'] )){

     //  if( !empty($_GET['color'] ) && !empty($_GET['date'] )&& !empty($_GET['day'])){
        
          // Counter to count the number of check box --> additions
          $addition ="";
        $counter = 0;
         if( empty($_POST['GPS'])){
             $counter++;
            //$addition=$addition+"GPS";
        }
        if(empty($_POST['seats'])){
          //   if(   $counter != 0)
          //  $addition+=",seats";
       // else
          //  $addition+="seats";
           $counter++;
        }
          if(empty($_POST['Radio'])){
            // if(   $counter != 0)
            //$addition+=",Radio";
      //  else
           // $addition+="Radio";
           $counter++;
        }
          // Find price from table cars, using GET id
              $price = 0;
          $FinalPric=0;
           $sqlID= "SELECT `cId`, `cType`, `cYear`, `cPrice`, `cCouuntry`, `isRented` FROM `cars` WHERE cId ='".$_GET['id']."'";
             $result = $pdo->query($sqlID);
        while ($row = $result->fetch()) {

          if(!$row['isRented']){

 
             $price = $row['cPrice'];
           
    
          }                     
                        
        }

        //To calculate  final price to rateing  
         $FinalPrice =  ( $_GET['day'] *  $price ) + ($counte * 10);

         //Find id to user
         $idUser = getID($ $_SESSION['email'] );   

        // Add to renting to SQl, table rented 
        $sql= "INSERT INTO `rented`( `rPrice`, `cId`, `radd`, `uid`) VALUES ".$FinalPrice.",".$_GET['id'].",".$addition.",".$idUser."";

      $result = $pdo->query($sql);
      // $count=0;
      while ($row = $result->fetch()) {

         if(!$row['isRented']){
            echo "<tr>";
          }
       }
    echo "<script>
      alert('Error,Finisghing');
      document.location.href='main.php';
      </script>";


  }
}




   ?>
                      
     
<footer>
   <?php
include 'footer.php';

?>


</footer>
  

</html>


<?php

function getID($email)
{

    global $pdo;

    return $pdo->query("select uid from user where email = '" . $email . "';");
}
?>