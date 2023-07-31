<?php 
function std_deviation($my_arr)
{
           $no_element = count($my_arr);
           $var = 0.0;
           $avg = array_sum($my_arr)/$no_element;
           foreach($my_arr as $i)
           {
              $var += pow(($i - $avg), 2);
           }
           return (float)sqrt($var/$no_element);
}

function update_and_weight($un,$conn){
    $stdarr=array();
    $warr=array();
    $whereColumn = "uname";
    $whereValue = $un;
    $sa=array(
        1=>"d1",2=>"d2",3=>"d3",4=>"d4",5=>"d5",6=>"d6",7=>"d7",8=>"d8",9=>"d9",10=>"d10",11=>"d11",12=>"d12",13=>"d13",14=>"d14",15=>"d15",
        16=>"d16",17=>"d17",18=>"d18",19=>"d19",20=>"d20",21=>"d21",22=>"d22",23=>"d23",24=>"d24",25=>"d25",26=>"d26",27=>"d27",28=>"d28",29=>"d29",30=>"d30"
    );
    $sql = "SELECT Name,Price,PD,C,Q FROM shares Where $whereColumn='$whereValue'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array(($result))){
            $diff = strtotime(date("Y-m-d")) - strtotime($row['PD']);


  // 1 day = 24 hours
  // 24 * 60 * 60 = 86400 seconds
            $nc=$row['C'];
            if (abs(round($diff / 86400))>$nc){
                $nc=abs(round($diff / 86400));
            }
            $di=$nc%30;
            if ($di==0 && $nc!=0)
            $di=30;
            $ticker=$row['Name'];
            $url = "https://query1.finance.yahoo.com/v8/finance/chart/$ticker?region=US&lang=en-US&includePrePost=false&interval=1m&useYfid=true&range=1d";
            $stock_data = json_decode(file_get_contents($url), true);
            $current = $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
            $whereColumn1 = "uname"; // specify the column name to use in the where clause
            $whereValue1 = $un;
            $pc=round(($current*$row['Q']-$row['Price'])/$row['Price'],4);
                if ($di!=0)
                {$column = $sa[$di];
                $value = $pc*100;
                $col2="C";
                $val2=$nc; 
                $whereColumn = "Name"; 
                $whereValue = $row['Name'];
                
                $sql1 = "UPDATE shares SET $column='$value',$col2='$val2' WHERE $whereColumn='$whereValue' and $whereColumn1='$whereValue1'";
                $result1=mysqli_query($conn,$sql1);
                }
         }
    }
    $sql1="SELECT Name,C from shares Where $whereColumn1='$whereValue1'";
    $result1 = mysqli_query($conn, $sql1);
    $usa=array();
    if(mysqli_num_rows($result1)>0){
        while($row=mysqli_fetch_array(($result1))){
            $usa[]=$row['Name'];
        }
    }
    $ai=0;
    $arr=array();
    while($ai<count($usa)){
        $whereColumn = "Name"; // specify the column name to use in the where clause
        $whereValue = $usa[$ai]; 
        // specify the value to use in the where clause
        $whereColumn1 = "uname"; // specify the column name to use in the where clause
        $whereValue1 = $un;
        
        $sql2 = "SELECT * FROM shares WHERE $whereColumn='$whereValue' and $whereColumn1='$whereValue1'";
        $result2 = mysqli_query($conn,$sql2);
        if(mysqli_num_rows($result2)>0){
            while($row=mysqli_fetch_array(($result2))){
                $nc=$row[4];
                if($nc<31){
                    for($j=5;$j<=$nc+4;$j++)
                    {
                        $arr[]=round($row[$j],4);
                    }
                    }
                    else{
                        for($j=5;$j<35;$j++)
                        {
                            $arr[]=round($row[$j],4);
                        }
                    }
                    
        
            



    }
}if ($nc!=0 && std_deviation($arr)!=0)
{$stdarr[]=round(1/std_deviation($arr),4);}
else
{$stdarr[]=0;}
unset($arr);
$ai++;
}
for($k=0;$k<count($stdarr);$k++)
{       if ($stdarr[$k]!=0)
        $warr[]=round($stdarr[$k]/array_sum($stdarr),4);
        else
        $warr[]=0;
}
return $warr;
}
?>
