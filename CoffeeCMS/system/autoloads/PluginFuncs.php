<?php 
class PluginFuncs
{
  
    public function test()
    {
        return array('error'=>'yes');
    }

    public static function getList()
    {
    	$dirs=listDir(PLUGINS_PATH);

    	$total=count($dirs);

    	$result=array();

    	$pluginData="";
    	$lines;

    	$itemNo=0;
    	for ($i=0; $i < $total; $i++) { 
    		$result[$itemNo]['dir']=$dirs[$i];
    		$result[$itemNo]['title']=$dirs[$i];
    		$result[$itemNo]['descriptions']="";
    		$result[$itemNo]['version']="";
    		$result[$itemNo]['url']="";
    		$result[$itemNo]['author']="";
    		$result[$itemNo]['thumbnail']="";
    		$result[$itemNo]['install_file']="no";
    		$result[$itemNo]['setting_file']="no";
    		$result[$itemNo]['path']=PLUGINS_PATH.$dirs[$i];

    		if(file_exists($result[$itemNo]['path'].'/info.txt'))
    		{
	    		$pluginData=file($result[$itemNo]['path'].'/info.txt');

	    		$result[$itemNo]['title']=trim($pluginData[0]);
	    		$result[$itemNo]['descriptions']=trim($pluginData[1]);
	    		$result[$itemNo]['version']=trim($pluginData[2]);
	    		$result[$itemNo]['url']=trim($pluginData[3]);
	    		$result[$itemNo]['author']=trim($pluginData[4]);	    		   			
    		}

			if(file_exists($result[$itemNo]['path'].'/admin/install.php'))
			{
				$result[$itemNo]['install_file']="yes";
			}

			if(file_exists($result[$itemNo]['path'].'/admin/setting.php'))
			{
				$result[$itemNo]['setting_file']="yes";
			}

			$itemNo+=1;
    	}

    	return $result;
    
    }

    public static function load_plugins_activated($onlyAdmin=false)
    {
		$db=new Database();
        $result=$db->query('select plugin_dir from plugin_mst');

        $total=count($result);

        $pluginPath='';
        $themePath='';

        $listAdminHeadFiles=array();
        $listAdminFooterFiles=array();
        $listWebsiteHeadFiles=array();
        $listWebsiteFooterFiles=array();

        $totalFiles=0;

        $listFiles=array();


        for ($i=0; $i < $total; $i++) { 
            $pluginPath=PLUGINS_PATH.$result[$i]['plugin_dir'].'/';

            if(is_dir($pluginPath.'admin_head'))
            {
                $listFiles=listFiles($pluginPath.'admin_head');

                if(is_array($listFiles))
                {
					$totalFiles=count($listFiles);

					for ($i=0; $i < $totalFiles; $i++) { 
						array_push(Configs::$_['admin_head'],'contents/plugins/'.$result[$i]['plugin_dir'].'/'.$listFiles[$i]);
					}

                    // Configs::$_['admin_head']=array_merge($listFiles,Configs::$_['admin_head']);
                }
            }           
            if(is_dir($pluginPath.'admin_footer'))
            {
                $listFiles=listFiles($pluginPath.'admin_footer');

                if(is_array($listFiles))
                {
					$totalFiles=count($listFiles);

					for ($i=0; $i < $totalFiles; $i++) { 
						array_push(Configs::$_['admin_head'],'contents/plugins/'.$result[$i]['plugin_dir'].'/'.$listFiles[$i]);
					}

                    // Configs::$_['admin_footer']=array_merge($listFiles,Configs::$_['admin_footer']);
                }
            }


        }

		if($onlyAdmin==false)
		{
			$themePath=THEMES_PATH.Configs::$_['default_theme'].'/';

			if(is_dir($themePath.'website_head'))
			{
				$listFiles=listFiles($themePath.'website_head');

				if(is_array($listFiles))
				{
					$totalFiles=count($listFiles);

					for ($i=0; $i < $totalFiles; $i++) { 
						array_push(Configs::$_['website_head'],'contents/themes/'.Configs::$_['default_theme'].'/'.$listFiles[$i]);
					}
					// Configs::$_['website_head']=array_merge($listFiles,Configs::$_['website_head']);
				}
			}
			if(is_dir($themePath.'website_footer'))
			{
				$listFiles=listFiles($themePath.'website_footer');

				if(is_array($listFiles))
				{
					$totalFiles=count($listFiles);

					for ($i=0; $i < $totalFiles; $i++) { 
						array_push(Configs::$_['website_footer'],'contents/themes/'.Configs::$_['default_theme'].'/'.$listFiles[$i]);
					}
					// Configs::$_['website_footer']=array_merge($listFiles,Configs::$_['website_footer']);
				}
			}      

        
		}		

		if($onlyAdmin==true)
		{
            self::load_shortcode_js();  
		}

		$db=new Database();
        $result=$db->query("select plugin_dir,hook_key,func_call from plugin_hook_data where status='1'");

        $total=count($result);

        $theData=array();

        for ($i=0; $i < $total; $i++) { 
            array_push(Configs::$_['plugin_hook'], $result[$i]);
        }

    }

    public static function load_shortcode_js()
    {
		$db=new Database();
        $result=$db->query('select plugin_dir from plugin_mst');

        $total=count($result);

        $pluginPath='';
        $themePath='';

       
        $totalFiles=0;

        $listFiles=array();

        for ($i=0; $i < $total; $i++) { 
            $pluginPath=ROOT_PATH.'contents/plugins/'.$result[$i]['plugin_dir'].'/';

            if(is_file($pluginPath.'shortcode_js.php'))
            {
                require_once($pluginPath.'shortcode_js.php');
            }           

        }

    }

	public static function add_hook($hook_zone,$func_name)
	{
		$plugin_dir='';

        $queryStr="";
        $queryStr.="insert into plugin_hook_data(plugin_dir,hook_key,func_call) VALUES";
        $queryStr.="('".$plugin_dir."','".$hook_zone."','".$func_name."')";

		$db=new Database();
        $db->query($queryStr);  
       
	}

	public static function load_hook($hook_zone,$inputData='')
	{
		if(isset($inputData[1]))
		{
			$inputData=trim($inputData);
		}

		if(!isset(Configs::$_['plugin_hook'][$hook_zone]))
		{
			if(isset($inputData[1]))
			{
				return $inputData;
			}
			
			return false;
		}

		$total=count(Configs::$_['plugin_hook'][$hook_zone]);

		$pluginPath='';
		$func_name='';

		for ($i=0; $i < $total; $i++) { 
			$func_name=Configs::$_['plugin_hook'][$hook_zone]['func_call'];
			$pluginPath=ROOT_PATH."contents/plugins/".Configs::$_['plugin_hook'][$hook_zone]['plugin_dir']."/";

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



}
