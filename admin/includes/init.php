<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', '/var/www/' . 'oophp' . DS . 'gallery');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS . 'admin' . DS . 'includes');

require_once("includes/functions.php");
require_once("includes/config_site.php");
require_once("includes/database.php");
require_once("includes/db_object.php");
require_once("includes/user.php");
require_once("includes/photo.php");
require_once("includes/session.php");
require_once("includes/comments.php");
?>