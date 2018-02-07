<?php 

session_start();
if(!isset($_SESSION["uid"])){
  header("location:index.php");
}

$user = $_SESSION["uid"];

include "dbscripts/connection.php";


$expiry = $_POST["expiry"];
$amount = $_POST["amt"];
$number = $_POST["number"];
$cvv = $_POST["cvc"];

if(empty($expiry) || empty($amount) || empty($number) || empty($cvv)){

	//Details not filled=0
	header("location:payment_failed.php?errorcode=0");
	exit();


}else{
	

	//Get expiry
	$date = preg_replace('/\s+/', '', $expiry);
	$date_arr = explode("/", $date);
	$month = $date_arr[0];
	$year = $date_arr[1];
	//Get card number
	$cardnumber = preg_replace('/\s+/', '', $number);

	$cardType="NF";
	//Check card type identify
	$creditcard = array(  "visa"=>"/^4[0-9]{12}(?:[0-9]{3})?$/",
							"mastercard"=>"/^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]2720)[0-9]{12}$/",
							"discover"=>"/^6011?d{4}?d{4}?d{4}$/",
							"amex"=>"/^3[4,7]d{13}$/",
							"diners"=>"/^3[0,6,8]d{12}$/",
							"bankcard"=>"/^5610?d{4}?d{4}?d{4}$/",
							"jcb"=>"/^[3088|3096|3112|3158|3337|3528]d{12}$/",
							"enroute"=>"/^[2014|2149]d{11}$/",
							"switch"=>"/^[4903|4911|4936|5641|6333|6759|6334|6767]d{12}$/");
	$match=false;
	foreach($creditcard as $type=>$pattern) {
		if(preg_match($pattern,$cardnumber) == 1) {
			$match=true;
			$cardType = $type;
			break;
		}
	}
	if(!$match) {
		//Invalid card number. Please check creditcard number = 11
		header("location:payment_failed.php?errorcode=11");
		exit();	
	}

	//Type found check the checksum value
	else{
		$checksum = 0;
			for ($i=(2-(strlen($ccnum) % 2)); $i<=strlen($ccnum); $i+=2)
			{
				$checksum += (int)($ccnum{$i-1});
			}
		    for ($i=(strlen($ccnum)% 2) + 1; $i<strlen($ccnum); $i+=2) 
			{
		  		$digit = (int)($ccnum{$i-1}) * 2;
		  		if ($digit < 10) { 
		  			$checksum += $digit; 
		  		}
		  		else { 
		  			$checksum += ($digit-9); 
		  		}
	    	}
	    	if (($checksum % 10) != 0){
	    		//Invalid card number. Please check creditcard number = 12
	    		header("location:payment_failed.php?errorcode=12");
	    		exit();
	    	}
	}//card number is valid

	//Check expiry date
	$expTs = mktime(0, 0, 0, $month + 1, 1, $year);
	$curTs = time();
	$maxTs = $curTs + (30 * 365 * 24 * 60 * 60);
	if (!($expTs > $curTs) || !($expTs < $maxTs)) {
		//Invalid Expiry Month/Year = 2
		header("location:payment_failed.php?errorcode=2");
		exit();
	}

	//Check cvv
	$count = ($cardType == 'amex') ? 4 : 3;
	if(!(preg_match('/^[0-9]{'.$count.'}$/', $cvv))) {
		//Invalid cvv. Please check cvv = 3
		header("location:payment_failed.php?errorcode=3");
		exit();
	}

	$today = date('Y-m-d H:i:s');

	//Update bill table
	$bill_sql = "INSERT INTO bill VALUES (NULL, $user, '$today', $amount)";
	$billQuery = mysqli_query($con, $bill_sql);
	if($bill_sql){

		$billId = mysqli_insert_id($con);

		$cart_sql = "SELECT * FROM cart WHERE user_id = '$user' AND isInCart = 1";
		$cartQuery = mysqli_query($con, $cart_sql);
		if(mysqli_num_rows($cartQuery) > 0){
			while($rw = mysqli_fetch_array($cartQuery)){
				$cid = $rw["cart_id"];
				$cartUpdate = "UPDATE cart SET isInCart = 0, bill_id = $billId WHERE cart_id = $cid";
				$updateQuery = mysqli_query($con, $cartUpdate);
			}
		}
	}

	header("location:payment_success.php");
}




?>