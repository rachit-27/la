<?php
$age=18;
$day="Thursday";
echo "Age Eligibility:\n";
if($age>=18){
    echo "You are eligible to vote\n";
}else{
    echo "You are not eligible to vote\n";
}
echo "\n Switch statement to check day type:\n";

switch($day){
    case "Monday":
        echo "Very Boaring Day\n";
        break;
    case "Wednesday":
        echo "Hump Day\n";
        break;
    case "Friday":
        echo "Almost weekend\n";
        break;
    case "Saturday":
    case "Sunday":
        echo "It's Weekend!\n";
        break;
    default:
        echo "It's Noraml Day\n";
}
echo "\nWhile loop example (print numbers from 1 to 5):\n";
$count = 1;
while ($count <= 5) {
    echo "Number: $count\n";
    $count++;
}
echo "\nDo-While loop example (print numbers from 1 to 3):\n";
$count = 1;
do {
    echo "Number: $count\n";
    $count++;
} while ($count <= 3);
echo "\nFor loop example (print even numbers from 2 to 10):\n";
for ($i = 2; $i <= 10; $i += 2) {
    echo "Even number: $i\n";
}
?>