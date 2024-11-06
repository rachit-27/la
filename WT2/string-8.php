<?php
$string1 = "";
$string2 = "";

if (php_sapi_name() == "cli") {
    echo "Enter first string: ";
    $string1 = trim(fgets(STDIN)); 

    echo "Enter second string: ";
    $string2 = trim(fgets(STDIN)); 
} else {
    $string1 = "Hello";
    $string2 = "World!";
}

$greeting = $string1 . " " . $string2;
$length = strlen($greeting); 
$substring = substr($greeting, strlen($string1) + 1); 
$position = strpos($greeting, $string2); 
$replacedString = str_replace($string2, "PHP", $greeting); 
$uppercase = strtoupper($greeting); 
$lowercase = strtolower($greeting); 
$whitespaceString = "   $greeting   ";
$trimmedString = trim($whitespaceString); 
$stringArray = explode(" ", $greeting); 
$joinedString = implode(", ", $stringArray); 

echo "Concatenation: $greeting\n";
echo "Length of the string: $length\n";
echo "Substring: $substring\n";

if ($position !== false) {
    echo "'$string2' found at position: $position\n";
} else {
    echo "'$string2' not found\n";
}

echo "Replaced String: $replacedString\n";
echo "Uppercase: $uppercase\n";
echo "Lowercase: $lowercase\n";
echo "Trimmed String: '$trimmedString'\n";
echo "Array: ";
print_r($stringArray);
echo "Joined String: $joinedString\n";
?>
