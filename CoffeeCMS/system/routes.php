<?php

class Routes
{
    public static $isMatch=false;

    public static function get($inputPattern,$function)
    {
    	//(:num)=\d+
    	//(:any)=.*?

    	//$function

        if(self::$isMatch==true)
        {
            return false;
        }

        if(isset(Configs::$_['uri'][0]) && (Configs::$_['uri'][0]=='/' || Configs::$_['uri'][0]=='\/'))
        {
        	Configs::$_['uri']=substr(Configs::$_['uri'],1,strlen(Configs::$_['uri'])-1);
        }     

    	if(strlen($inputPattern) > 0)
    	{
	    	$replaces=array(
	    		'\\'=>'\/',
	    		'/'=>'\/',
	    		'(:num)'=>'(\d+)',
	    		'(:word)'=>'(\w+)',
                '(:id)'=>'(\w+)',
	    		'(:any)'=>'(.*?)',

	    	);
	    	
	    	$inputPattern=str_replace(array_keys($replaces), array_values($replaces),$inputPattern);


	    	if(!preg_match('/'.$inputPattern.'/i', Configs::$_['uri'],$matchUriPattern))
	    	{
	    		return false;
	    	}    		

	    	if(is_string($function))
	    	{
		    	$total=count($matchUriPattern);

		    	for ($i=1; $i < $total; $i++) { 
		    		$function=str_replace('$'.$i, $matchUriPattern[$i], $function);
		    	}
	    	}

    	}
    	if(is_object($function))
    	{
    		$function(Configs::$_['uri']);
    	}
    	else
    	{
    		//theme_folder/controllers

    		$themePath='';
    		$modelPath='';
    		$controllerName='Home';
    		$methodName='index';
            $paramete='';

    		// preg_match('/'.$inputPattern.'/i', $_SERVER['REQUEST_URI'],$matchUriPattern);
			Configs::$_['view_path']=THEMES_PATH.'basic/views/';
			Configs::$_['controllers_path']=THEMES_PATH.'basic/controllers/';
			Configs::$_['model_path']=THEMES_PATH.'basic/model/';

			//theme_folder/controllers
    		if(preg_match('/^(\w+)\/(\w+)$/i', $function,$matchPath))
    		{
    			Configs::$_['view_path']=THEMES_PATH.$matchPath[1].'/views/';
				Configs::$_['controllers_path']=THEMES_PATH.$matchPath[1].'/controllers/';
				Configs::$_['model_path']=THEMES_PATH.$matchPath[1].'/model/';

    			$controllerName=$matchPath[2];
    			$themePath=THEMES_PATH.$matchPath[1].'/controllers/'.$matchPath[2].'.php';
    		}    	

			//theme_folder/controllers/method
    		elseif(preg_match('/^(\w+)\/(\w+)\@(\w+)$/i', $function,$matchPath))
    		{
    			Configs::$_['view_path']=THEMES_PATH.$matchPath[1].'/views/';
				Configs::$_['controllers_path']=THEMES_PATH.$matchPath[1].'/controllers/';
				Configs::$_['model_path']=THEMES_PATH.$matchPath[1].'/model/';

				$controllerName=$matchPath[2];
				$methodName=$matchPath[3];
    			$themePath=THEMES_PATH.$matchPath[1].'/controllers/'.$matchPath[2].'.php';
    		}
    		elseif(preg_match('/^(\w+)\/(\w+)\/(\w+)$/i', $function,$matchPath))
    		{
    			Configs::$_['view_path']=THEMES_PATH.$matchPath[1].'/views/';
				Configs::$_['controllers_path']=THEMES_PATH.$matchPath[1].'/controllers/';
				Configs::$_['model_path']=THEMES_PATH.$matchPath[1].'/model/';

				$controllerName=$matchPath[2];
				$methodName=$matchPath[3];
    			$themePath=THEMES_PATH.$matchPath[1].'/controllers/'.$matchPath[2].'.php';
    		}
            elseif(preg_match('/^(\w+)\/(\w+)\/(\w+)\@(\w+)$/i', $function,$matchPath))
            {
                Configs::$_['view_path']=THEMES_PATH.$matchPath[1].'/views/';
                Configs::$_['controllers_path']=THEMES_PATH.$matchPath[1].'/controllers/';
                Configs::$_['model_path']=THEMES_PATH.$matchPath[1].'/model/';

                $controllerName=$matchPath[2];
                $methodName=$matchPath[3];
                $themePath=THEMES_PATH.$matchPath[1].'/controllers/'.$matchPath[2].'.php';
            }

            Configs::$_['controller_name']=$controllerName;
            Configs::$_['controller_method']=$methodName;
            Configs::$_['controller_variable']=isset($matchPath[4])?$matchPath[4]:'';

            // print_r(Configs::$_['controller_variable']);
            // print_r(Configs::$_);
            // die();
    
    		if(is_file($themePath))
    		{

    			require_once($themePath);

    			if(file_exists(Configs::$_['model_path'].$controllerName.'.php'))
    			{
    				require_once(Configs::$_['model_path'].$controllerName.'.php');
    			}

    			if(class_exists($controllerName)  && method_exists(new $controllerName, $methodName))
    			{
                    self::$isMatch=true;
                    
					if(isset(Configs::$_['controller_variable'][1]))
					{
						$controllerName::$methodName(Configs::$_['controller_variable']);die();
					}
					else
					{
						$controllerName::$methodName();die();
					}
    				
    			}
    			else
    			{
    				die('Controller '.$controllerName.' or method '.$methodName.' not exists.');
    			}
    		}
			else
			{
				return false;
			}    		
    	}

    }
}