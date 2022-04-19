<!DOCTYPE html>
<html>
<head>
	<title>Payment Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/payport.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<?php
		require_once '../php_scripts/connect.php';
		session_start();

		if(!empty($_SESSION['logged_user'])){
			$current_user = $_SESSION['logged_user'];
		}
		mysqli_select_db($conn, $dbname);

		echo "<div class='topnav'>";

		echo "<a href='user_account.php'>Hello " . $current_user . "!</a>";
		echo "<a href='user_account.php'>Account</a>";
		//echo "<a href='logout.php'>Logout</a>";
		echo "<a href='art_gallery.php'>Gallery</a>";
		echo "<a href='home.php'>Home</a> </div>";

		echo "</div>";
	?>
</head>
<body>
<div align="center" class="main">
	<h1>Payment Portal</h1>
	<div class="row" style="width:50%">
	  <div class="col-75">
	    <div class="container">
	      <form action="" method="POST">
	        <div class="row">
	          <div class="col-50" align="left">
	            <br>
	            <label for="fname">Accepted Cards</label>
	            <div class="icon-container">
	              <i class="fa fa-cc-visa" style="color:navy;"></i>
	              <i class="fa fa-cc-amex" style="color:blue;"></i>
	              <i class="fa fa-cc-mastercard" style="color:red;"></i>
	              <i class="fa fa-cc-discover" style="color:orange;"></i>
	            </div>
	            <label for="cname">Name on Card</label>
	            <input type="text" id="cname" name="cardname" placeholder="Elon Musk">
	            <label for="ccnum">Credit card number</label>
	            <input type="text" id="ccnum" name="cardnumber" placeholder="6969-6969-6969-6969">
	            <label for="expmonth">Exp Month</label>
	            <input type="text" id="expmonth" name="expmonth" placeholder="January">
	            <div class="row">
	              <div class="col-50">
	                <label for="expyear">Exp Year</label>
	                <input type="text" id="expyear" name="expyear" placeholder="2028">
	              </div>
	              <div class="col-50">
	                <label for="cvv">CVV</label>
	                <input type="text" id="cvv" name="cvv" placeholder="669">
	              </div>
	            </div>
	          </div>
	        </div>
	        <input type="submit" value="Continue to checkout" class="btn" name="submit">
	      </form>
	    </div>
	  </div>
	</div>
</div>

<?php
	if(isset($_POST['submit'])){
		if(empty($_POST['cardname']) || empty($_POST['cardnumber']) || empty($_POST['expmonth']) || empty($_POST['expyear']) || empty($_POST['cvv'])){
			echo "<script>alert('Please fill all the fields !!!'); </script>";
		}
		else{
			echo "<script>alert('Payment Sucessfull. Redirecting to user account.'); </script>";
			header( 'Location: user_account.php' );
		}
	}
?>

</body>
</html>