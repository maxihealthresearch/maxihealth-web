<?php
$s = $_SERVER['DOCUMENT_ROOT'];

// magic quotes are off for forward compatibility - in version 6 of php this option is removed
ini_set("magic_quotes_gpc", "off");

if ($s{strlen($s)-1} == DIRECTORY_SEPARATOR)
	define ('DIR_ROOT', $_SERVER['DOCUMENT_ROOT']);
else
	define ("DIR_ROOT", $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR);
define ("WEB_ROOT", "http://".$_SERVER['HTTP_HOST']."/");
define ("DIR_INCLUDES", DIR_ROOT."includes".DIRECTORY_SEPARATOR);
define ("DIR_FUNCTIONS", DIR_INCLUDES."functions".DIRECTORY_SEPARATOR);
define ("DIR_CLASSES", DIR_INCLUDES."classes".DIRECTORY_SEPARATOR);
define ("DIR_SECTIONS", DIR_INCLUDES."sections".DIRECTORY_SEPARATOR);
define ("DIR_BOXES", DIR_INCLUDES."boxes".DIRECTORY_SEPARATOR);
define ("DIR_EMAILS", DIR_INCLUDES."emails".DIRECTORY_SEPARATOR);

define ('DIR_IMAGES', DIR_ROOT.'images'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_IMAGES', '/images/');
define ('DIR_WYSIWYG_IMAGES', DIR_IMAGES.'uploads'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_WYSIWYG_IMAGES', WEB_DIR_IMAGES.'uploads/');

/* Maxihealth specific */

define ('DIR_GALLERY_IMAGES', DIR_IMAGES.'gallery'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_GALLERY', WEB_DIR_IMAGES.'gallery/');

define ('DIR_IMAGES_PRODUCTS', DIR_IMAGES.'products'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_IMAGES_PRODUCTS', WEB_DIR_IMAGES.'products/');

define ('DIR_IMAGES_FEATURES', DIR_IMAGES.'features'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_IMAGES_FEATURES', WEB_DIR_IMAGES.'features/');

define ('DIR_IMAGES_FORMS', DIR_IMAGES.'forms'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_IMAGES_FORMS', WEB_DIR_IMAGES.'forms/');

define ('DIR_IMAGES_FRONT_PAGE_BANNERS', DIR_IMAGES.'fp-banners'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_IMAGES_FRONT_PAGE_BANNERS', WEB_DIR_IMAGES.'fp-banners/');

define ('DIR_IMAGES_ONLINE_STORES', DIR_IMAGES.'online-stores'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_IMAGES_ONLINE_STORES', WEB_DIR_IMAGES.'online-stores/');

define ('DIR_IMAGES_ADS', DIR_IMAGES.'ads'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_IMAGES_ADS', WEB_DIR_IMAGES.'ads/');

define ('DIR_ADS_PDFS', DIR_ROOT.'ads'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_ADS_PDFS', '/ads/');

/* ---- */

define ('DIR_DOCUMENTS', DIR_ROOT.'documents'.DIRECTORY_SEPARATOR);
define ('WEB_DIR_DOCUMENTS', WEB_ROOT.'documents'.DIRECTORY_SEPARATOR);

define ('EMAIL_FROM', '');
define ('EMAIL_FROM_NAME', '');

define ('NOTFICATIONS_RECIPIENT', 'contact@maxihealth.com');
define ('NOTIFICATION_CC', '');

define ('CONTACT_US_RECIPIENT', 'info@maxihealth.com');
define ('CONTACT_US_RECIPIENT_NAME', 'Maxihealth Info');

define ('POST_REVIEW_RECIPIENT', 'nutritionist@maxihealth.com');
define ('POST_REVIEW_RECIPIENT_NAME', 'Maxihealth Nutritionist');

define ('USE_RTL', strpos($_SERVER['SERVER_NAME'], 'rtl') === 0 || strpos($_SERVER['SERVER_NAME'], 'heb') === 0);

$GLOBALS['enable_db_pages'] = true;
$GLOBALS['enable_product_pages'] = false;


//because constants cant be re defined
$main_config['DB_USER'] = 'maxiheal_banj';
$main_config['DB_PASS'] = 'GbQh76gKEnX8';
$main_config['DB_NAME'] = 'maxiheal_db';
$main_config['DB_HOST'] = 'localhost';

$main_config['SMTP_USER'] = 'support@webster-solutions.com';
$main_config['SMTP_PASS'] = '';

if (file_exists('config.local.php')){
    include 'config.local.php';
}

define ('SMTP_HOST', 'ssl://smtp.gmail.com');
define ('SMTP_PORT', '465');
define ('SMTP_USER', $main_config['SMTP_USER']);
define ('SMTP_PASS', $main_config['SMTP_PASS']);
define ('SMTP_AUTH', true);


define ('DB_USER', $main_config['DB_USER']);
define ('DB_PASS', $main_config['DB_PASS']);
define ('DB_NAME', $main_config['DB_NAME']);
define ('DB_HOST', $main_config['DB_HOST']);

session_name('ql');

require_once DIR_FUNCTIONS."db.php";
require_once DIR_FUNCTIONS."shared.php";
require_once DIR_FUNCTIONS."http-build-url.php";
require_once DIR_CLASSES."section.php";
require_once DIR_FUNCTIONS."template_parser.php";
require_once DIR_FUNCTIONS."print-product.php";

?>