<?php

define('ROOT_PATH', dirname(dirname(__FILE__)) . '/');
define('CONTENTS_PATH', ROOT_PATH . 'contents/');
define('PUBLIC_PATH', ROOT_PATH . 'public/');
define('CACHES_PATH', ROOT_PATH . 'public/caches/');
define('SYSTEM_PATH', ROOT_PATH . 'system/');
define('APP_PATH', ROOT_PATH . 'system/app/');
define('APPPATH', ROOT_PATH . 'system/app/');
define('THEMES_PATH', CONTENTS_PATH . 'themes/');
define('PLUGINS_PATH', CONTENTS_PATH . 'plugins/');

define('SITE_URL', 'http://localhost/lioncms/');
define('CONTENTS_URL', SITE_URL . 'contents/');
define('THEMES_URL', CONTENTS_URL . 'themes/');
define('PLUGINS_URL', CONTENTS_URL . 'plugins/');

header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

class Configs {
	public static $_ = array(
		'ready' => true,
		'version' => '1.0',
		'plugin_hook' => [],
		'theme_hook' => [],
		'lang' => [],
		'hooks' => [],
		'plugins' => [],
		'shortcodes' => [],
		'setting' => [],
		'controllers_path' => '',
		'model_path' => '',
		'default_lang' => 'en',
		'uri' => '',
		'view_path' => '',
		'site_title' => '',
		'view_path' => '',
		'system_admin_lang' => '',
		'frontend_lang' => '',
		'hide_admin_menu' => [],
		'user_data' => [],
		'admin_head' => [],
		'admin_footer' => [],
		'website_head' => [],
		'website_footer' => [],

	);

	public static $admin_plugin_shortcode_js = array();

}

spl_autoload_register(function ($classname) {
	require_once (SYSTEM_PATH . 'autoloads_class/' . $classname . '.php');
});