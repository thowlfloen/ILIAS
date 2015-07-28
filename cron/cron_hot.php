<?php
chdir(dirname(__FILE__));
chdir('..');

include_once "Services/Context/classes/class.ilContext.php";
ilContext::init(ilContext::CONTEXT_CRON);

include_once 'Services/Authentication/classes/class.ilAuthFactory.php';
ilAuthFactory::setContext(ilAuthFactory::CONTEXT_CRON);

$_COOKIE["ilClientId"] = $_SERVER['argv'][3];
$_POST['username'] = $_SERVER['argv'][1];
$_POST['password'] = $_SERVER['argv'][2];

if($_SERVER['argc'] < 4)
{
	die("Usage: cron.php username password client\n");
}

include_once './include/inc.header.php';

require_once("Services/Utilities/classes/class.ilUtil.php");
define("ILIAS_HTTP_PATH", ilUtil::_getHttpPath());

include_once './Services/Cron/classes/class.ilCronManager.php';
ilCronManager::runJobManual("dct_creation");

?>