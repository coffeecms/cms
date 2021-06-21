<?php
ob_start();
//session_start();
error_reporting(-1);

date_default_timezone_set('America/Los_Angeles');

require_once('system/configs.php');
require_once('system/Database.php');
require_once('system/core.php');
require_once('system/routes.php');

load_hook('before_load_frontend');

loadSystemSetting();

Configs::$_['dirname']=basename(dirname(__FILE__));
Configs::$_['uri']=str_replace('/'.Configs::$_['dirname'].'/', '', $_SERVER['REQUEST_URI']);

Routes::get('api/(:word)/(:word)','api/Api/$1@$2');
Routes::get('api/(:word)','api/Api/$1');

Routes::get('go/(:word)','shorturl/ShortUrl/index@$1');

// Routes::get('admin/(:word)/(:word)','admin/Admin/$1@$2');

if(isset(Configs::$_['default_adminpage_url'][2]) && (Configs::$_['uri']=='admin' || Configs::$_['uri']=='admin/index'))
{
	Configs::$_['uri']=Configs::$_['default_adminpage_url'];

}

Routes::get('admin/(:word)','admin/Admin@$1');

// print_r(Configs::$_['uri']);
// die();

Routes::get('admin','admin/Admin@index');

// Configs::$_['uri']=$_SERVER['REQUEST_URI'];
Configs::$_['uri']=str_replace('/'.Configs::$_['dirname'].'/', '', $_SERVER['REQUEST_URI']);

if(is_dir(THEMES_PATH.Configs::$_['default_theme']))
{
	if(file_exists(THEMES_PATH.Configs::$_['default_theme'].'/routes.php'))
	{
		require_once(THEMES_PATH.Configs::$_['default_theme'].'/routes.php');
	}
	else
	{
		Routes::get('','basic/Home@index');
	}
}
else
{
	Routes::get('','basic/Home@index');
}

load_hook('after_load_frontend');
