<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<?php 
	// $conn = mysqli_connect($sname, $unmae, $password, $db_name);
	// $sql2 = "SELECT * FROM purchases";
	// $result2 = mysqli_query($conn, $sql2);
	
	
?>
<body>
	
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>

	 <div class="wrapper">
	<div class="header">HOME</div>

	<div class="cards_wrap">
		<div class="card_item">
			<div class="card_inner">
				<img src="image\Bitcoin.png">
				<div class="role_name">BTC</div>
				<div class="real_name">BITCOIN</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		<!-- </div>
		<div class="card_item">
			<div class="card_inner">
				<img src="image\eth.png">
				<div class="role_name">ETH</div>
				<div class="real_name">ETHERIUM</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="image\xrp.png">
				<div class="role_name">XRP</div>
				<div class="real_name">RIPPLE</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="Bitcoin.png">
				<div class="role_name">BTC</div>
				<div class="real_name">BITCOIN</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="eth.png">
				<div class="role_name">ETH</div>
				<div class="real_name">ETHERIUM</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="xrp.png">
				<div class="role_name">XRP</div>
				<div class="real_name">RIPPLE</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="Bitcoin.png">
				<div class="role_name">BTC</div>
				<div class="real_name">BITCOIN</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="eth.png">
				<div class="role_name">ETH</div>
				<div class="real_name">ETHERIUM</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="xrp.png">
				<div class="role_name">XRP</div>
				<div class="real_name">RIPPLE</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="Bitcoin.png">
				<div class="role_name">BTC</div>
				<div class="real_name">BITCOIN</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="eth.png">
				<div class="role_name">ETH</div>
				<div class="real_name">ETHERIUM</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="xrp.png">
				<div class="role_name">XRP</div>
				<div class="real_name">RIPPLE</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="Bitcoin.png">
				<div class="role_name">BTC</div>
				<div class="real_name">BITCOIN</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="eth.png">
				<div class="role_name">ETH</div>
				<div class="real_name">ETHERIUM</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="Bitcoin.png">
				<div class="role_name">BTC</div>
				<div class="real_name">BITCOIN</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="eth.png">
				<div class="role_name">ETH</div>
				<div class="real_name">ETHERIUM</div>
				<div class="info">
					<h3>your balance</h3>
					<span>$3663.56</span>
					<h4>coins</h4>
					<span>2.7877</span>
					<h5>price</h5>
					<span>$6234.75</span>
				</div>
			</div>
		</div> -->

	</div>
</div> 
    </div>  

	<a href="buy.php" class="ca">Buy shares</a>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>