
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
if(!isset($_GET['id'])&& !isset( $_SESSION['idUs'])) {
    header("location:main.php");

}
else if(!isset( $_SESSION['idUs'])) {
  $_SESSION['idUs'] = $_GET['id'];
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
  
    <title>Rent</title>


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
        <form class="form1" action="FinalRented.php" method="post">
            <h2 id="h">Rent</h2>

                    <select name="color">
                        <option selected disabled>Color</option>
                        <option value="Red" >Red</option>
                        <option value="white">white</option>
                            <option value="Black">Black</option>
                                  <option value="Selver">Selver</option>
  
                          </select>

            <br>
                <label>Color: </label>

          
                            <br>      <br> 
                           <label>Additions:</label>
                             <br>   <br> 

                          <input type="checkbox" id="GPS" name="GPS" value="GPS">GPS</input>
                          <br>   <br> 
                         
                          <input type="checkbox" id="seats" name="seats" value="baby seats">Baby</input> 
                           <br>   <br> 
                         
                         <input type="checkbox" id="Radio" name="Radio" value="Radio">Radio</input>  
                   
                           <br>   <br> 
      

             
                               <label>Number of:</label>< <input type="search" name="day" placeholder="13">    
            
                
            <br>    
            <button class="button" type="submit" name = "rente">Final Rente</button>
        </form>
    </div>
</div>
<?php

   if($_SERVER['REQUEST_METHOD'] === 'POST' ) {


  
     // if(!empty($_GET['color']  )&& ! empty($_GET['date'] ) && !empty($_GET['day'] )){
             if(!empty($_POST['color']  )&& !empty($_POST['day'] )){

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
           
           $sqlID= "SELECT `cId`, `cType`, `cYear`, `cPrice`, `cCouuntry`, `isRented` FROM `cars` WHERE cId ='". $_SESSION['idUs']."'";
             $result = $pdo->query($sqlID);
             $price=0;
        while ($row = $result->fetch()) {
             $price = $row['cPrice'];                              
        }

        //To calculate  final price to rateing  
         $FinalPrice =  ( $_POST['day']*  $price ) + ($counter * 10);

         //Find id to user
         $idUser = getID($_SESSION['email'] );   

        // Add to renting to SQl, table rented 
         $Res;
         $rr=1;


     
            $Res = (addRented($FinalPrice/1000, $idUser ," ", $_SESSION['idUs'])==1);
  

           $add= updatesCar($_POST['color'], $_SESSION['idUs']);

            
        if ($Res && $add){
    echo "<script>
      alert('You rented a car, and the final price = ".$FinalPrice."');
      document.location.href='main.php';
      </script>";
    }

        else{
            echo "<script>
      alert('Error,Finisghing');
      document.location.href='main.php';
      </script>";
    }
        }
    
  
     else{
      
      echo"<script>
      alert('color = ".$_POST['color']." day = ".$_POST['day']." ,Somthing not inculde');
      document.location.href='FinalRented.php?id=".$_GET['id']."';
      </script>";
      
      /*
      echo "<script>
      alert('Error,Somthing not inculde');
      document.location.href='FinalRented.php?id=".$_GET['id']."';
      </script>";
      */

     }
      

    
   
    
}

?>






</footer>


  

</html>

