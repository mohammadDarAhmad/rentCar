
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
   <title>Account information</title>
<link rel="stylesheet" href="reset.css" />
   <link href="css/style.css" rel="stylesheet"> 
   <link href="css/FinalStyle.css" rel="stylesheet">
</head>
  <header>
    <?php
   include 'header.php';
?>
   </header>
    <body>
      
 <body>
       <form action="Account.php" method="get" id="Rent">
    <fieldset>
       <legend><Strong>information account
       </Strong></legend>


 
       
  <?php

  

     //  echo  $_GET['YearBox'];
   
               
                       ?>

                  <div id="paintingBox">
                <table>
                    <caption>Paintings</caption>
                    <thead >
                        <tr  id="BoxNNN">
                           
                            <th>name</th>
                            <th>email</th>
                            <th>Mobile</th>
                            <th>address</th>
                          
                          
                            <th>  </th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php
                                 $sql=   "SELECT * FROM `user` WHERE email = '" . $_SESSION['email'] . "'";


      $result = $pdo->query($sql);
   //   $count=0;
      while ($row = $result->fetch()) {

            echo "<tr>";
            //$=1;

            echo"<td> ".$row['name']."</td>";
            echo"<td> ".$row['email']."</td>";
            echo"<td>".$row['username']."</td>";
            echo"<td> ".$row['Mobile Number']."</td>";
            echo"<td> ".$row['address']."</td>";

    
          
               
    
      }                     
                        
   

   ?>
                      
                    </tbody>
                </table>
           </div>   
   
    </fieldset>  
</form>
</body>
<footer>
   <?php
include 'footer.php';

?>


</footer>
  

</html>

