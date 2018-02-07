<?php
session_start();
if(!isset($_SESSION["uid"])){
  header("location:index.php");
}
//Check whether session data correct with database.
?>

<?php
$uid = $_SESSION["uid"];
$name = $_SESSION["name"];
if(isset($_POST["totalAmt"])){
	$total = $_POST["totalAmt"];
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Credit card validation with card.js</title>
  
  
  
      <link rel="stylesheet" href="css/paymentStyle.css">

  
</head>

<body>
  <form method="POST" action="paymentProcess.php">
    <div class="form-container">
      <div class="personal-information">
        <h1>Payment Information</h1><hr/>
        <h3>Amount: <b>Rs. <?php echo $total;?></b></h3>
      </div> <!-- end of personal-information -->
    
        <div class="card-wrapper"></div>
          <input id="column-left" type="text" name="first-name" placeholder="First Name"/>
          <input id="column-right" type="text" name="last-name" placeholder="Surname"/>
          <input id="input-field" type="text" name="number" placeholder="Card Number"/>
          <input id="column-left" type="text" name="expiry" placeholder="MM / YY"/>
          <input id="column-right" type="text" name="cvc" placeholder="CCV"/>
          <input type="hidden" name="amt" value="<?php echo $total;?>" id="amt"/>
          <input id="input-button" type="submit" value="Submit"/>
  </form>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script>

    <script src="js/pay.js"></script>

</body>
</html>