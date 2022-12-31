<?php
//initialize core files

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'home1' . DS . 'paulmlin' . DS . 'public_html' . DS . 'Bookstore-API');

defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
defined('CORE_PATH')? null : define('CORE_PATH', SITE_ROOT.DS.'core');

//load config
require_once(INC_PATH.DS.'config.php');

//core classes
require_once(CORE_PATH . DS . 'book.php');
