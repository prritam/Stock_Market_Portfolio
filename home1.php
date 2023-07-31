<?php 
session_start();
include "db_conn.php";
$sn=$_POST["hname"];
$pp=$_POST["hprice"];
$un=$_POST["uname"];
$c=0;
$pd=date("Y-m-d");
$nma=array();
$whereColumn = "uname";
$whereValue = $un;
$sql2 = "SELECT  Name FROM shares Where $whereColumn='$whereValue'";
$result1 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($result1)>0){
 while($row=mysqli_fetch_row(($result1))){
    $nma[]=$row[0];

 }
}
if(!in_array($sn,$nma))
{   $z=floatval(0);
    $sql3 = "INSERT INTO shares(uname, Name, Price, PD, C, d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13, d14, d15, d16, d17, d18, d19, d20, d21, d22, d23, d24, d25, d26, d27, d28, d29, d30) VALUES('$un', '$sn', '$pp', '$pd', '$c', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z', '$z')";
    $result2 = mysqli_query($conn, $sql3);
    if ($result2){
        header("Location: test.php");
        exit();
    
    }
    else{
        header("Location: add_shares.php?error=Incorect User name or password");
        exit();
    }
    
}
else{
    $whereColumn1 = "Name";
    $whereValue1 = $sn;
    $sql4="SELECT  Price,Q FROM shares Where $whereColumn='$whereValue' and $whereColumn1='$whereValue1'";
    $result = mysqli_query($conn, $sql4);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array(($result))){
            $ci=$row['Price']+$pp;
            $q=$row['Q']+1;
        }
    }
    $column="Price";
    $value=$ci;
    $col2='Q';
    $val2=$q;
    $sql5 = "UPDATE shares SET $column='$value',$col2='$val2' WHERE $whereColumn='$whereValue' and $whereColumn1='$whereValue1'";
    $result5=mysqli_query($conn,$sql5);
    header("Location: test.php?success=Your account has been created successfully");
	exit();
}



?>