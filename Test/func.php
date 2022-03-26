<?php
function AddNumbersColor($n1, $n2, $color)
{
    echo "Sum is: <span style='color:" . $color . ";'>" .
        ($n1 + $n2) . "</span><br/>";
}

AddNumbersColor(110, 50000, "blue");
echo "<br>";
function AddNumbers($n1, $n2)
{
    return ($n1+$n2);
}
$total = AddNumbers(1,2)+AddNumbers(100,10000);
echo $total;
