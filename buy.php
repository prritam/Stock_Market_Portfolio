 <?php 
session_start();
$uname=$_GET['username'];
include "db_conn.php";

if (isset($_SESSION['user_name'])) {
	// $uname=$_SESSION['user_name'];
 ?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	 <style>
		/* CSS for popup card */
		.popup-card {
			position: fixed;
			top: 50%;
			left: 50%;
			width: 300px;
			height: 400px;
			transform: translate(-50%, -50%);
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
			display: none;
			z-index: 9999;
		}
		h2{
			text-align: center;
		}

		/* CSS for blur effect */
		.blur-effect {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			backdrop-filter: blur(5px);
			display: none;
			z-index: 9998;
		}.card_item{
			
			padding: 5px;
			
			

		}.card_inner{
			border-style: groove;
			border-radius: 5px;
			color:brown;

		}.wrapper{
			background-color:bisque;
		}.card_inner:hover{
			background-color:silver;
			text-transform: capitalize;
			text-decoration: underline;
		}.nav-link:hover{
			text-decoration: underline;
		}
	</style>
	<script>
		/* JavaScript functions to show/hide popup card and blur effect */
		function showPopup() {
			document.querySelector('.blur-effect').style.display = 'block';
			document.querySelector('.popup-card').style.display = 'block';
		}

		function hidePopup() {
			document.querySelector('.blur-effect').style.display = 'none';
			document.querySelector('.popup-card').style.display = 'none';
		}
	</script>
  
</head>
<body>
	 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Logo</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="test.php" style="margin-left: 120px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buy.php?username=<?php echo $un?>"style="margin-left: 250px;">Buy Shares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"style="margin-left: 250px;"onclick="showPopup()">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"style="margin-left: 250px;">Logout</a>
                </li>
            </ul>
	</div>
</nav>
	<?php
	$data = json_decode(file_get_contents("prices.json"), true);
	$price_array = array();
	foreach ($data as $ticker) {
		$url = "https://query1.finance.yahoo.com/v8/finance/chart/$ticker?region=US&lang=en-US&includePrePost=false&interval=1m&useYfid=true&range=1d";
		$stock_data = json_decode(file_get_contents($url), true);
		$current = $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
		$price_array[] = $current;
		
	}
	
	?>
<div class="wrapper">
	<div class="cards_wrap">
				<form action="add_shares.php" method="post">
					<div class="card_item">
						<div class="card_inner">
							<img src="image/tcs.png">
							<div class="role_name"><?php echo $data[0]?></div>
							<div class="real_name"><?php echo $data[0]?></div>
							<input type="hidden" name="hname" value="<?php echo $data[0]?>">
							<input type="hidden" name="hprice" value="<?php echo $price_array[0]?>">
							<input type="hidden" name="uname" value="<?php echo $uname?>">
							<div class="info">

							
								<!-- <h3>your balance</h3>
								<span>$3663.56</span>
								<h4>coins</h4>
								<span>2.7877</span> -->
								<h5>price</h5>
								<span><?php echo $price_array[0]?></span>
								<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>

								
							</div>
							
						</div>
					</div>
				</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/titan.png">
								<div class="role_name"><?php echo $data[1]?></div>
								<div class="real_name"><?php echo $data[1]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[1]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[1]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<!-- <h3>your balance</h3>
									<span>$3663.56</span>
									<h4>coins</h4>
									<span>2.7877</span> -->
									<h5>price</h5>
									<span><?php echo $price_array[1]?></span>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
							</div>
						</div>
			</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/infy.png">
								<div class="role_name"><?php echo $data[2]?></div>
								<div class="real_name"><?php echo $data[2]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[2]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[2]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<!-- <h3>your balance</h3>
									<span>$3663.56</span>
									<h4>coins</h4>
									<span>2.7877</span> -->
									<h5>price</h5>
									<span><?php echo $price_array[2]?></span>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
							</div>
				</div>
			</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/tata.png">
								<div class="role_name"><?php echo $data[3]?></div>
								<div class="real_name"><?php echo $data[3]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[3]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[3]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<!-- <h3>your balance</h3>
									<span>$3663.56</span>
									<h4>coins</h4>
									<span>2.7877</span> -->
									<h5>price</h5>
									<span><?php echo $price_array[3]?></span>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
							</div>
						</div>
			</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/itc.png">
								<div class="role_name"><?php echo $data[4]?></div>
								<div class="real_name"><?php echo $data[4]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[4]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[4]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<h5>price</h5>
									<span><?php echo $price_array[4]?></span>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
						    </div>
				 </div>
			</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/bajaj.png">
								<div class="role_name"><?php echo $data[5]?></div>
								<div class="real_name"><?php echo $data[5]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[5]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[5]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<!-- <h3>your balance</h3>
									<span>$3663.56</span>
									<h4>coins</h4>
									<span>2.7877</span> -->
									<h5>price</h5>
									<span><?php echo $price_array[5]?></span>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
							</div>
				 </div>
			</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/eichermot.png">
								<div class="role_name"><?php echo $data[6]?></div>
								<div class="real_name"><?php echo $data[6]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[6]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[6]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<!-- <h3>your balance</h3>
									<span>$3663.56</span>
									<h4>coins</h4>
									<span>2.7877</span> -->
									<h5>price</h5>
									<span><?php echo $price_array[6]?></span>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
							</div>
				 </div>
			</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/icici.png">
								<div class="role_name"><?php echo $data[7]?></div>
								<div class="real_name"><?php echo $data[7]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[7]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[7]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<!-- <h3>your balance</h3>
									<span>$3663.56</span>
									<h4>coins</h4>
									<span>2.7877</span> -->
									<h5>price</h5>
									<span><?php echo $price_array[7]?></span>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
							</div>
						</div>
			</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/axis.jpg">
								<div class="role_name"><?php echo $data[8]?></div>
								<div class="real_name"><?php echo $data[8]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[8]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[8]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<!-- <h3>your balance</h3>
									<span>$3663.56</span>
									<h4>coins</h4>
									<span>2.7877</span> -->
									<h5>price</h5>
									<span><?php echo $price_array[8]?></span>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
							</div>
						</div>
			</form>
			<form action="add_shares.php" method="post">
				<div class="card_item">
							<div class="card_inner">
								<img src="image/kotak.png">
								<div class="role_name"><?php echo $data[9]?></div>
								<div class="real_name"><?php echo $data[9]?></div>
								<input type="hidden" name="hname" value="<?php echo $data[9]?>">
								<input type="hidden" name="hprice" value="<?php echo $price_array[9]?>">
								<input type="hidden" name="uname" value="<?php echo $uname?>">
								<div class="info">
									<!-- <h3>your balance</h3>
									<span>$3663.56</span>
									<h4>coins</h4>
									<span>2.7877</span> -->
									<h5>price</h5>
									<p><?php echo $price_array[9]?></p>
									<h6><button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="click to buy this share">Buy</button></h6>
								</div>
								
							</div>
						</div>
			</form>
	</div>
</div> 
</div>
     <?php 
	 $whereColumn = "uname";
	 $whereValue = $uname;
	 $sql = "SELECT Name,Price FROM shares Where $whereColumn='$whereValue'";
	 $result = mysqli_query($conn, $sql);
	 $spa=array();
	 $cpa=array();
	 if(mysqli_num_rows($result)>0){
		 while($row=mysqli_fetch_array(($result))){
				$ticker=$row['Name'];
                $url = "https://query1.finance.yahoo.com/v8/finance/chart/$ticker?region=US&lang=en-US&includePrePost=false&interval=1m&useYfid=true&range=1d";
                $stock_data = json_decode(file_get_contents($url), true);
                $current = $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
				$spa[]=$row['Price'];
                $cpa[]=$current;

		 }
		
		}
				if(count($spa)>0)
                $tpl=round((array_sum($cpa)-array_sum($spa))/array_sum($spa),4)*100;
                else
                $tpl=0;
	 
	 
	 
	 ?>
	 <div class="blur-effect"></div>

	<div class="popup-card">
		<h2><?php echo $uname;?></h2>
		<p>Gain:<?php echo $tpl . '%';?></p>
		<p>Value:<?php echo array_sum($cpa)?></p>
		<button onclick="hidePopup()">Close</button>
	</div>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>