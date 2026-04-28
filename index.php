<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', 0);

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('libs/smarty/Smarty.class.php');
require_once('core/Router.php');

$smarty = new Smarty();
$smarty->template_dir = 'Views/templates/';
$smarty->compile_dir = 'Views/templates_c/';
$smarty->config_dir = 'Views/configs/';
$smarty->cache_dir = 'Views/cache/';

$router = new Router();
$route = $router->run();

$smarty->assign('tpl', $route['template']);
$smarty->assign('vue', $route['data']);
$smarty->assign('sessionUser', $_SESSION['user'] ?? null);
$smarty->display('index.tpl');
