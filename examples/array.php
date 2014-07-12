<?php
//There are these mystical $error and $fail variables in PHPaginate that if you change or remove, the entire
//thing breaks... will need to figure out later.
error_Reporting(0);

//Include phpaginate
require_once("../phpaginate.php");

$currentPage = 5;
$totalPages = 15;

echo "Sample array for PHPaginate if we're on page 5 of 15:<br/>";

echo "<pre>";
print_r(get_pagination_numbers($currentPage,$totalPages));
echo "</pre>";
echo "<br/><br/>";
echo "We loop through that array to ultimately generate something like <a href='smarty.php?p=5'>this!</a>";