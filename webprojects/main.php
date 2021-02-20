
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

   <link href="css/FinalStyle.css" rel="stylesheet">

  
</head>


  <header>
  	<?php
   include 'header.php';
?>


   </header>
    
      
 <body>
       <form action="main.php" method="get" id="Rent">
    <fieldset>
       <legend><Strong>List of available cars
       </Strong></legend>

       <div id="searchBox">
           <input type="search" name="priceBox" placeholder="Max price E.X 3000000">
           <input type="search" name="YearBox" placeholder="year Manufacture E.X 2020">


                    <select name="Country">
                        <option selected disabled>Country car</option>
                        <option value="Germany" >Germany</option>
                        <option value="France">France</option>
    
                        <option value="American">American</option>
                        <option value="Britain">Britain</option>
                        <option value="China">China</option>
                         <option value="Japan">Japan</option>
                          </select>

                           
                                    <select name="Type">
                    <option selected disabled>Type</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="BMW">BMW</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Volkswagen">Peugeot</option>
                    <option value="Seat">Seat</option>
                    <option value="Nissan">Nissan</option>
                    <option value="KIA">KIA</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Ford">Ford</option>
                         </select>

              <button class="button" type="submit" name = "Filter">Filter</button>
               

       </div>


 
            
        <div id="paintingBox">
                <table>
                    <caption>Paintings</caption>
                    <thead >
                        <tr  id="BoxNNN">
                           
                            <th>Type</th>
                            <th>Year</th>
                            <th>price</th>
                            <th>Country</th>
                          
                          
                            <th>  </th>
                        </tr>
                    </thead>
                    <tbody>
  <?php

    if($_SERVER['REQUEST_METHOD'] != 'POST' ) {
     //  echo  $_GET['YearBox'];
   


       if (!isset($_GET['Filter'])) {


      $sql= "SELECT * FROM `cars` WHERE 1";
     
      $result = $pdo->query($sql);
      $count=0;
      while ($row = $result->fetch()) {

         if(!$row['isRented']){
            echo "<tr>";
            //$=1;
         
            echo"<td> ".$row['cType']."</td>";
            echo"<td> ".$row['cYear']."</td>";
            echo"<td>".$row['cPrice']."</td>";
            echo"<td> ".$row['cCouuntry']."</td>";
        
                echo "<td><a href='FinalRented.php?id=" . $row['cId'] . "' class='button' style='text-decoration:none;padding-top:5px'>Rent</a></td></tr>";
         
      }
               
                        
       }
    }

     else {

      
      if(!empty($_GET['Country']  )&& ! empty($_GET['Type'] ) && !empty($_GET['priceBox'] )&& !empty($_GET['YearBox'])){
      
           $sql= "SELECT `cId`, `cType`, `cYear`, `cPrice`, `cCouuntry`, `isRented` FROM `cars` WHERE cYear ='".$_GET['YearBox']."' && cPrice ='".$_GET['priceBox']."' && cCouuntry ='".$_GET['Country']."' && isRented = 0 ";
     
      $result = $pdo->query($sql);
   //   $count=0;
      while ($row = $result->fetch()) {

         if(!$row['isRented']){
            echo "<tr>";
            //$=1;

            echo"<td> ".$row['cType']."</td>";
            echo"<td> ".$row['cYear']."</td>";
            echo"<td>".$row['cPrice']."</td>";
            echo"<td> ".$row['cCouuntry']."</td>";
    
          
                echo "<td><a href='FinalRented.php?id=" . $row['cId'] . "' class='button' style='text-decoration:none;padding-top:5px'>Rent</a></td></tr>";
    
      }                     
                        
       }
    }
      else{
               
            
       echo "<script>
      alert('Error,Somthing not inculde');
      document.location.href='main.php';
      </script>";
      
        //document.location.href='login.php';
        
      }
     
      

    }
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

