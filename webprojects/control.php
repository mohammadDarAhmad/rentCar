
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
       <form action="control.php" method="get" id="Rent">
    <fieldset>
       <legend><Strong>control panel admine
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
                  <br>

                    <select name="admine">
                        <option selected disabled>Choose</option>
                         <option value="1">User</option>
                        <option value="2">car rented</option>
                        <option value="3">car not rented</option>
                  
                          </select>

               <button class="button" type="submit" name = "shUser">Show user</button>
               

       </div>


 
       
  <?php

    if($_SERVER['REQUEST_METHOD'] !='POST' ) {

     //  echo  $_GET['YearBox'];
   
   
   
       if (isset($_GET['Filter'])) {


      
      if(!empty($_GET['Country']  )&& ! empty($_GET['Type'] ) && !empty($_GET['priceBox'] )&& !empty($_GET['YearBox'])){
          ?>

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
                    <tbody>"
                      <?php
      
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
      document.location.href='control.php';
      </script>";
      
        //document.location.href='login.php';
        
      }  
      
    }
       if (isset($_GET['shUser'])) {
          if(!empty($_GET['admine'] )){
                    if($_GET['admine']==1){
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
                    <tbody>"
                      <?php

               $sql= "SELECT * FROM `user` WHERE 1";
     
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
                        
       }
         else if($_GET['admine']==2){
                   ?>

                  <div id="paintingBox">
                <table>
                    <caption>Paintings</caption>
                    <thead >
                        <tr  id="BoxNNN">
                           
                            <th>Type</th>
                            <th>Year</th>
                            <th>Price perDay</th>
                            <th>Couuntry</th>
                              <th>color</th>
                          
                          
                            <th>  </th>
                        </tr>
                    </thead>
                    <tbody>"
                      <?php

               $sql= "SELECT * FROM `cars` WHERE `isRented`= 0";
     
      $result = $pdo->query($sql);
   //   $count=0;
      while ($row = $result->fetch()) {

            echo "<tr>";
            //$=1;

            echo"<td> ".$row['cType']."</td>";
            echo"<td> ".$row['cYear']."</td>";
            echo"<td>".$row['cPrice']."</td>";
            echo"<td> ".$row['cCouuntry']."</td>";
   
        
          }

          }

        else   if($_GET['admine']==3){
                   ?>

                  <div id="paintingBox">
                <table>
                    <caption>Paintings</caption>
                    <thead >
                        <tr  id="BoxNNN">
                           
                            <th>Type</th>
                            <th>Year</th>
                            <th>Price per day</th>
                            <th>Couuntry</th>
                              <th>color</th>
                          
                          
                            <th>  </th>
                        </tr>
                    </thead>
                    <tbody>"
                      <?php

               $sql= "SELECT * FROM `cars` WHERE `isRented`= 1";
     
      $result = $pdo->query($sql);
   //   $count=0;
      while ($row = $result->fetch()) {

            echo "<tr>";
            //$=1;

            echo"<td> ".$row['cType']."</td>";
            echo"<td> ".$row['cYear']."</td>";
            echo"<td>".$row['cPrice']."</td>";
            echo"<td> ".$row['cCouuntry']."</td>";
   
          }

          }
        
          else{

       echo "<script>
      alert('Error, please choose any thing');
      document.location.href='control.php';
      </script>";
          }



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

