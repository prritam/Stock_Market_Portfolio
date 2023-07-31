<?php    
include "db_conn.php";
include "test1.php";
session_start();
if (isset($_SESSION['user_name']))
{
$un=$_SESSION['user_name'];}
else
{
    header("Location: logout.php");
	exit();
}
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Wallet</title>
    <style>
		/* CSS for popup card */
		.popup-card {
			position: fixed;
			top: 50%;
			left: 50%;
            width: 200px;
			height: 300px;
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
		}
	</style>
    <style>
		.card1 {
			display: inline-block;
			margin: 10px;
			padding: 10px;
			border: 2px solid #ddd;
			border-radius: 5px;
            border-style: double;
			width: 300px;
			height: 350px;
			overflow: hidden;
            background-color:black;
            color:cadetblue;
            
		}
		.card1 h3 {
			font-size: 20px;
            text-align: center;
            text-decoration:underline;
            color:blue;
            
			margin: 10px 0;
		}
		.card1 p {
			font-size: 20px;
			margin: 5px 0;
            text-align: justify;
            text-decoration:wavy;
            color:white;
            
            
            
		}
	</style>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel="stylesheet" type="text/css" href="hstyle.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
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
        // $sa=array(
        //     1=>"d1",2=>"d2",3=>"d3",4=>"d4",5=>"d5",6=>"d6",7=>"d7",8=>"d8",9=>"d9",10=>"d10",11=>"d11",12=>"d12",13=>"d13",14=>"d14",15=>"d15",
        //     16=>"d16",17=>"d17",18=>"d18",19=>"d19",20=>"d20",21=>"d21",22=>"d22",23=>"d23",24=>"d24",25=>"d25",26=>"d26",27=>"d27",28=>"d28",29=>"d29",30=>"d30"
        // );
        $k=0;
        $spa=array();
        $cpa=array();
        $whereColumn = "uname";
        $whereValue = $un;
        $sql = "SELECT Name,Price,PD,C,Q FROM shares Where $whereColumn='$whereValue'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $w=update_and_weight($un,$conn);
            while($row=mysqli_fetch_array(($result))){
    //             $diff = strtotime(date("Y-m-d")) - strtotime($row['PD']);
  
    //   // 1 day = 24 hours
    //   // 24 * 60 * 60 = 86400 seconds
    //             $nc=$row['C'];
    //             if (abs(round($diff / 86400))>$nc){
    //                 $nc=abs(round($diff / 86400));
    //             }
    //             $di=$nc%30;
    //             if ($di==0 && $nc!=0)
    //             $di=30;
                $ticker=$row['Name'];
                $url = "https://query1.finance.yahoo.com/v8/finance/chart/$ticker?region=US&lang=en-US&includePrePost=false&interval=1m&useYfid=true&range=1d";
                $stock_data = json_decode(file_get_contents($url), true);
                $current = $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
                $spa[]=$row['Price'];
                $cpa[]=$current*$row['Q'];
                echo '<div class="card1">';
				echo '<h3>' . $ticker . '</h3>';
				echo "Price:" . '<p>' . $current . '</p>';
                $pc=round(($current*$row['Q']-$row['Price'])/$row['Price'],4);
                // if ($di!=0)
                // {$column = $sa[$di];
                // $col2="C";
                // $val2=$nc; // specify the column name to update
                // $value = $pc*100; // specify the new value for the column
                // $whereColumn = "Name"; // specify the column name to use in the where clause
                // $whereValue = $row['Name']; // specify the value to use in the where clause
                // $whereColumn1 = "uname"; // specify the column name to use in the where clause
                // $whereValue1 = $un;
                // $sql1 = "UPDATE shares SET $column='$value',$col2='$val2' WHERE $whereColumn='$whereValue' and $whereColumn1='$whereValue1'";
                // $result1=mysqli_query($conn,$sql1);
                // }
			    echo "Gain/Loss" . "<p>" . $pc*100 . '%' . "</p>";
                if (count($w)!=0)
                echo "Weight" . "<p>" . $w[$k]*100 . '%' . "</p>";
                else
                echo "Weight" . "<p>" . 1*100 . '%' . "</p>";
                $k++;

				echo '</div>';
            }
        }       if(count($spa)>0)
                $tpl=round((array_sum($cpa)-array_sum($spa))/array_sum($spa),4)*100;
                else
                $tpl=0;


        ?>
        <script>
        function calculateProfitLoss() {
            // Get the difference value from PHP variable
            var difference = <?php echo round(array_sum($cpa)-array_sum($spa),2)?>;

            // Get the paragraph element by its ID
            var paragraph = document.getElementById('profit-loss');

            // Check if the difference is positive or negative
            if (difference > 0) {
                paragraph.innerHTML = 'Profit: ' + difference;
                paragraph.style.color = 'green';

            } else if (difference < 0) {
                paragraph.innerHTML = 'Loss: ' + Math.abs(difference);
                paragraph.style.color = 'red';
            } else {
                paragraph.innerHTML = 'No profit or loss';
            }
        }
    </script>
        <div class="blur-effect"></div>

        <div class="popup-card">
		<h2><?php echo $un;?></h2>
		<p>Gain:<?php echo $tpl . '%';?></p>
		<p>Value:<?php echo array_sum($cpa)?></p>
        <p>Investment:<?php echo array_sum($spa)?></p>
        <P id="profit-loss"></P>
		<button onclick="hidePopup()">Close</button>
	    </div>
        <script>
        // Call the function to calculate profit/loss
        calculateProfitLoss();
    </script>
</body>
</html>