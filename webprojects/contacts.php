

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

 
    
 <body>
       <form >
    <fieldset>
       <legend><Strong> Contact us
       </Strong></legend>
<br />
  <div class="elem-group">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="visitor_name" placeholder="Mohammed  dar ahmad" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">Your E-mail</label>
    <input type="email" id="email" name="visitor_email" placeholder="mohammedhamid757@gmail.com" required>
  </div>
  <div class="elem-group">
    <label for="department-selection">Choose Concerned Department</label>
  
  </div>
  <div class="elem-group">
    <label for="title">Reason For Contacting Us</label>
    <input type="text" id="title" name="email_title" required placeholder="Unable to Reset my Password" pattern=[A-Za-z0-9\s]{8,60}>
  </div>
  <div class="elem-group">
    <label for="message">Write your message</label>
    <textarea id="message" name="visitor_message" placeholder="Say whatever you want." required></textarea>
  </div>
  <button type="submit">Send Message</button><br /><br />
    </fieldset>  
</form>
</body>
<footer>
   <?php
include 'footer.php';

?>


</footer>


  

</html>