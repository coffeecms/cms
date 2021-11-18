<?php
ob_start();
//session_start();
// error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

// echo date('Y-m-',strtotime("-3 months",time()))."01";die();
require_once('system/configs.php');
require_once('system/Database.php');
require_once('system/core.php');
require_once('system/routes.php');

Configs::$_['visitor_data']=[];
Configs::$_['visitor_data']['ip']=$_SERVER['REMOTE_ADDR'];
Configs::$_['visitor_data']['user_agent']=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
Configs::$_['visitor_data']['session_id']=md5($_SERVER['REMOTE_ADDR'].Configs::$_['visitor_data']['user_agent']);

load_hook('before_load_system');

loadSystemSetting();

date_default_timezone_set(Configs::$_['timezone']);

Configs::$_['dirname']=basename(dirname(__FILE__));
Configs::$_['uri']=str_replace(SITE_URL, '', current_url());

Routes::get('api/(:word)/(:word)','api/Api/$1@$2');
Routes::get('api/(:word)','api/Api/$1');

Routes::get('go/(:word)','shorturl/ShortUrl/index@$1');

// Routes::get('admin/(:word)/(:word)','admin/Admin/$1@$2');

if(isset(Configs::$_['default_adminpage_url'][2]) && (Configs::$_['uri']=='admin' || Configs::$_['uri']=='admin/index'))
{
	Configs::$_['uri']=Configs::$_['default_adminpage_url'];

}

Routes::get('^admin/(:word)','admin/Admin@$1');

Routes::get('^admin','admin/Admin@index');


// Configs::$_['uri']=$_SERVER['REQUEST_URI'];
Configs::$_['uri']=str_replace('/'.Configs::$_['dirname'].'/', '', $_SERVER['REQUEST_URI']);


if(isset(Configs::$_['default_page'][2]) && !isset(Configs::$_['uri'][2]))
{
	Configs::$_['uri']=Configs::$_['default_page'];
}

if(is_dir(THEMES_PATH.Configs::$_['default_theme']))
{
	load_hook('before_view_frontend');

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
	load_hook('before_view_frontend');

	Routes::get('','basic/Home@index');
}

load_hook('after_load_frontend');
