<?php
$totalPrice = 0;
$toppingCount = 0;
$orderComplete = false;

echo "Choose your pizza type: <br>";
echo "1. Margherita ($5) <br>";
echo "2. Pepperoni ($10) <br>";
echo "3. Veggie Supreme ($15) <br>";

$pizzaChoice = 2;

switch($pizzaChoice){
    case 1;
        $totalPrice += 5;
        break;
    case 2;
        $totalPrice += 10;
        break;
    case 3;
        $totalPrice += 15;
        break;
        case 4;
        $totalPrice += 
        
    ;
    break;

}
default:
    echo "Invalid pizza choice. <br>";
    break;
}