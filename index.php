<?php
use App\View\Main;


require_once realpath("vendor/autoload.php");
require_once("../login/assets/ajax/login.actions.php");

use Dotenv\Dotenv;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
$main_page = new Main($_SESSION);
$curl = curl_init();
print $main_page->getMainPage();