<?php
$sa=array();
session_start();
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
if(isset($_POST["hname"]) && isset($_POST["hprice"]) && isset($_POST["uname"]))
{
$sname = validate($_POST["hname"]);
$price = validate($_POST["hprice"]);
$uname=validate($_POST["uname"]);

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add shares</title>
	<link rel="stylesheet" type="text/css" href="add_share.css">
</head>
<body>
    <form action="home1.php" method="post">
        <div class="popup">

            <h1><?php echo $sname?></h1>
            <h1><?php echo $price?></h1>
            <input type="hidden" name="hname" value="<?php echo $sname?>">
			<input type="hidden" name="hprice" value="<?php echo $price?>">
            <input type="hidden" name="uname" value="<?php echo $uname?>">
            <h5><button type="submit" class="btn btn-success" name='by'>Buy</button></h5>
                
                
        </div>
    </form>
</body>
</html>