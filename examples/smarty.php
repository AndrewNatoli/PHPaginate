<?php
//There are these mystical $error and $fail variables in PHPaginate that if you change or remove, the entire
//thing breaks... will need to figure out later.
error_Reporting(0);

//Include phpaginate
require_once("../phpaginate.php");

//Include smarty
require_once("inc/smarty/Smarty.class.php");
$smarty = new Smarty();

//Set the template directory
$smarty->setTemplateDir(array(
    'default' => 'inc/smarty/templates/default'
));

//Current Page
if(!empty($_GET['p']))
    $currentPage = $_GET['p'];
else
    $currentPage = 1;

$totalPages = 15;

//get_pagination_numbers($currentPage,$totalPages);
$smarty->assign("pageNumbers",get_pagination_numbers($currentPage,$totalPages));
$smarty->assign("currentPage",$currentPage);
$smarty->assign("totalPages",$totalPages);

//Display the page
$smarty->display('phpaginate.tpl');