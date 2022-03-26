<?php
$n=10;
$n1=100;
$sum=$n+$n1;

echo "<i>Sum is</i> <span style='color:red;'> 
".$sum."</span>";
echo  "<br>";
$ar3 = ["Argentina","Belgium","Canada"];
echo "$ar3";
echo  "<br>";
echo count($ar3);
echo  "<br>";
echo print_r($ar3);
echo  "<br>";
echo print_r(asort($ar3));
echo  "<br>";
echo ksort($ar3);
echo  "<br>";

$ar=[11,5,89,117,56,200];
echo "</br>From while() loop:</br>";
$i=0;
while($i<count($ar))
{
    echo $ar[$i]." ";
    $i++;
}
echo "</br>";
echo "</br>From for() loop sorted array:</br>";
sort($ar);
for($i=0;$i<count($ar);$i++)
{echo $ar[$i]." ";
}
echo "</br>";
echo "</br>From foreach() loop assotiative array:</br>";
foreach($ar as $k => $v)
{
    echo "Key:".$k." value:".$v."<br/>";
}
echo "</br>";
$headers = apache_request_headers();
foreach ($headers as $header => $value) {
    echo "$header: $value <br />\n";
}
