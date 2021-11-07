<?php 
class ThemeFuncs
{
  
    public function test()
    {
        return array('error'=>'yes');
    }

 	public static function getList()
    {
    	$dirs=listDir(THEMES_PATH);

    	$total=count($dirs);

    	$result=array();

    	$pluginData="";
    	$lines;

    	$themeNo=0;

    	for ($i=0; $i < $total; $i++) { 

    		if($dirs[$i]=='admin' || $dirs[$i]=='api' || $dirs[$i]=='shorturl')
    		{
    			continue;
    		}

    		$result[$themeNo]['dir']=$dirs[$i];
    		$result[$themeNo]['title']=$dirs[$i];
    		$result[$themeNo]['descriptions']="";
    		$result[$themeNo]['version']="";
    		$result[$themeNo]['url']="";
    		$result[$themeNo]['author']="";
    		$result[$themeNo]['thumbnail']="public/images/no_screenshot.jpg";
			$result[$themeNo]['install_file']="no";
    		$result[$themeNo]['path']=THEMES_PATH.$dirs[$i].'/';

    		if(file_exists($result[$themeNo]['path'].'/info.txt'))
    		{
	    		$pluginData=file($result[$themeNo]['path'].'/info.txt');

	    		$result[$themeNo]['title']=trim($pluginData[0]);
	    		$result[$themeNo]['descriptions']=trim($pluginData[1]);
	    		$result[$themeNo]['version']=trim($pluginData[2]);
	    		$result[$themeNo]['url']=trim($pluginData[3]);
	    		$result[$themeNo]['author']=trim($pluginData[4]);	    		   			
    		}

			if(file_exists($result[$themeNo]['path'].'/thumbnail.jpg'))
			{
				$result[$themeNo]['thumbnail']=THEMES_PATH.$dirs[$i].'/thumbnail.jpg';
			}

			if(file_exists($result[$themeNo]['path'].'/admin/install.php'))
			{
				$result[$themeNo]['install_file']="yes";
			}
			
			if(file_exists($result[$themeNo]['path'].'/admin/setting.php'))
			{
				$result[$themeNo]['setting_file']="yes";
			}

			$themeNo+=1;
    	}


    	return $result;
    
    }

	public static function add_hook($hook_zone,$func_name)
	{
		$plugin_dir='';

        $db = \Config\Database::connect();

        $queryStr="";
        $queryStr.="insert into theme_hook_data(theme_dir,hook_key,func_call) VALUES";
        $queryStr.="('".$plugin_dir."','".$hook_zone."','".$func_name."')";

        $db->simpleQuery($queryStr);  
       
	}

	public static function load_hook($hook_zone,$inputData='')
	{
		if(isset($inputData[1]))
		{
			$inputData=trim($inputData);
		}

		if(!isset(SettingFuncs::$settingData['theme_hook'][$hook_zone]))
		{
			if(isset($inputData[1]))
			{
				return $inputData;
			}
			
			return false;
		}

		$total=count(SettingFuncs::$settingData['theme_hook'][$hook_zone]);

		$pluginPath='';
		$func_name='';

		for ($i=0; $i < $total; $i++) { 
			$func_name=SettingFuncs::$settingData['theme_hook'][$hook_zone]['func_call'];
			$pluginPath=APPPATH."Views/themes/".SettingFuncs::$settingData['theme_hook'][$hook_zone]['theme_dir']."/";

			if(file_exists($pluginPath.'hook.php'))
			{
				if(function_exists($func_name))
				{
					if(isset($inputData[1]))
					{
						$inputData=$func_name($inputData);
					}
					else
					{
						$func_name();
					}
				}
			}
		}

		if(isset($inputData[1]))
		{
			return $inputData;
		}

		return true;
	}
		
	public static function load_shortcode_js()
	{
		if(is_file(THEMES_PATH.Configs::$_['default_theme'].'/shortcode_js.php'))
		{
			require_once(THEMES_PATH.Configs::$_['default_theme'].'/shortcode_js.php');
		}  
	}
}


