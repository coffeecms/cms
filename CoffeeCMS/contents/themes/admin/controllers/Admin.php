<?php

useClass('PluginFuncs');
useClass('ThemeFuncs');


PluginFuncs::load_plugins_activated(true);
ThemeFuncs::load_shortcode_js();
load_hook('before_view_admin');

// clear_hook();
before_load_hook();

class Admin
{

	public static function index()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}
		else
		{
			redirect_to(SITE_URL.'admin/dashboard');
		}

	}

	public static function dashboard()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}
		
		$theData=array(

		);

		// useClass('UserAgent');

		// $useragent = UserAgentFactory::analyze($_SERVER['HTTP_USER_AGENT']);
		// print_r($useragent->browser);die();

		$queryStr='';
		$db=new Database();
		
		$queryStr.=" select 'User' as TargetCol,count(*) as Total ";
		$queryStr.=" from user_mst ";
		$queryStr.=" union ";
		$queryStr.=" select 'Post',count(*) as Total from post_data ";
		$queryStr.=" union ";
		$queryStr.=" select 'Page',count(*) as Total ";
		$queryStr.=" from page_data ";
		$queryStr.=" union ";
		$queryStr.=" select 'Comment',count(*) as Total ";
		$queryStr.=" from comment_data ";
		$queryStr.=" union ";
		$queryStr.=" select 'Categories',count(*) as Total ";
		$queryStr.=" from category_mst ";
		$queryStr.=" union ";
		$queryStr.=" select 'PluginActivated',count(*) as Total ";
		$queryStr.=" from plugin_mst where status='1' ";
		$queryStr.=" union ";
		$queryStr.=" select 'PostViews',ifnull(sum(views),'0') as Total from post_data ";

		$theData['total_data']=$db->query($queryStr);
		
		$queryStr=" select CAST(ent_dt as date) as work_date,count(*) as total";
		$queryStr.=" from post_view_data";
		$queryStr.=" where CAST(ent_dt as date) BETWEEN '".date("Y-m-d", strtotime('-30 days'))."' AND '".date("Y-m-d")."'";
		$queryStr.=" group by CAST(ent_dt as date)";
		$queryStr.=" order by CAST(ent_dt as date) asc";

		$theData['stats_30days']=$db->query($queryStr);

		$queryStr=" select a.title,a.group_c,count(*) as total_users";
		$queryStr.=" from user_group_mst a join user_mst b";
		$queryStr.=" ON a.group_c=b.group_c";
		$queryStr.=" group by a.title,a.group_c";
		$queryStr.=" order by a.title asc limit 0,50";

		$theData['top_user_group_stats']=$db->query($queryStr);

		$queryStr=" select post_c,title,views";
		$queryStr.=" from post_data";
		$queryStr.=" order by views desc limit 0,50";
		
		$theData['top_50_popular_post']=$db->query($queryStr);

		$queryStr=" select a.user_id,a.username,count(*) as total_post";
		$queryStr.=" from user_mst a join post_data b";
		$queryStr.=" ON a.user_id=b.user_id";
		$queryStr.=" group by a.user_id,a.username";
		$queryStr.=" order by total_post desc limit 0,50";
		
		$theData['top_50_writers']=$db->query($queryStr);

	
		echo view('header');
		echo view('left');
		echo view('dashboard',$theData);
		echo view('footer');
	}	

	public static function project_task_report()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		$theData=array(

		);

		// useClass('UserAgent');

		// $useragent = UserAgentFactory::analyze($_SERVER['HTTP_USER_AGENT']);
		// print_r($useragent->browser);die();

		$queryStr='';
		$db=new Database();
		
		$queryStr=" select MONTH(ent_dt) as work_month,YEAR(ent_dt) as work_year ,count(*) as total";
		$queryStr.=" from post_view_data";
		$queryStr.=" where CAST(ent_dt as date) BETWEEN '".date("Y-m-d", strtotime('-11 months'))."' AND '".date("Y-m-d")."'";
		$queryStr.=" group by MONTH(ent_dt),YEAR(ent_dt)";
		$queryStr.=" order by MONTH(ent_dt),YEAR(ent_dt) asc";

		$theData['stats_12months']=$db->query($queryStr);

		$queryStr=" select CAST(ent_dt as date) as work_date,count(*) as total";
		$queryStr.=" from post_view_data";
		$queryStr.=" where CAST(ent_dt as date) BETWEEN '".date("Y-m-d", strtotime('-30 days'))."' AND '".date("Y-m-d")."'";
		$queryStr.=" group by CAST(ent_dt as date)";
		$queryStr.=" order by CAST(ent_dt as date) asc";

		$theData['stats_30days']=$db->query($queryStr);

		$queryStr=" select a.title,a.group_c,count(*) as total_users";
		$queryStr.=" from user_group_mst a join user_mst b";
		$queryStr.=" ON a.group_c=b.group_c";
		$queryStr.=" group by a.title,a.group_c";
		$queryStr.=" order by a.title asc limit 0,50";

		$theData['top_user_group_stats']=$db->query($queryStr);

		$queryStr=" select post_c,title,views";
		$queryStr.=" from post_data";
		$queryStr.=" order by views desc limit 0,50";
		
		$theData['top_50_popular_post']=$db->query($queryStr);

		$queryStr=" select a.user_id,a.username,count(*) as total_post";
		$queryStr.=" from user_mst a join post_data b";
		$queryStr.=" ON a.user_id=b.user_id";
		$queryStr.=" group by a.user_id,a.username";
		$queryStr.=" order by total_post desc limit 0,50";
		
		$theData['top_50_writers']=$db->query($queryStr);

	
		echo view('header');
		echo view('left');
		echo view('project_task_report',$theData);
		echo view('footer');
	}	

	public static function login()
	{
		// print_r(Configs::$_);die();
		// var_dump(isLogined());die();

		echo view('header_login');
		echo view('login');
		echo view('footer_login');
	}

	public static function notfound()
	{
		// print_r(Configs::$_);die();
		// var_dump(isLogined());die();

		echo view('header_login');
		echo view('notfound');
		echo view('footer_login');
	}

	public static function forgot_password()
	{
		echo view('header_login');
		echo view('forgot_password');
		echo view('footer_login');
	}

	public static function reset_password()
	{

		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'verify'=>'failed',
			'password'=>'',
			'username'=>'',
			'alert'=>'',
		);

		$theData['verify']=getGet('verify','failed');
		$theData['password']=getGet('password','');
		$theData['username']=getGet('username','');

		echo view('header_login');
		echo view('reset_password',$theData);
		echo view('footer_login');
	}

	public static function user_logout()
	{
        //Set cookie
        setcookie('username', '', time()- 360000, '/');
        setcookie('user_id', '', time()- 360000, '/');
        setcookie('group_c', '', time()- 360000, '/');
        setcookie('level_c', '', time()- 360000, '/');

		removeLoginSession();

		redirect_to(SITE_URL.'admin/login');
	}

	public static function register()
	{
		echo view('header_login');
		echo view('register');
		echo view('footer_login');
	}	

	public static function plugin_page_url()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		$pluginName=getGet('plugin');

		$pageName=getGet('page');

		$pagePath=PLUGINS_PATH.$pluginName.'/admin/'.$pageName.'.php';

		$libsPath=PLUGINS_PATH.$pluginName.'/core.php';

		if(file_exists($libsPath))
		{
			require_once($libsPath);
		}
		$libsPath=PLUGINS_PATH.$pluginName.'/libs.php';

		if(file_exists($libsPath))
		{
			require_once($libsPath);
		}		


		view('header');
		view('left');
		require_once($pagePath);
		view('footer');
	}	

	public static function theme_page_url()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}
				
		$themeName=getGet('theme');

		$pageName=getGet('page');

		$pagePath=THEMES_PATH.$themeName.'/admin/'.$pageName.'.php';

		if(!is_file($pagePath))
		{
			redirect_to(SITE_URL.'admin');
		}
		$libsPath=THEMES_PATH.$themeName.'/core.php';

		if(file_exists($libsPath))
		{
			require_once($libsPath);
		}
		$libsPath=THEMES_PATH.$themeName.'/libs.php';

		if(file_exists($libsPath))
		{
			require_once($libsPath);
		}

		view('header');
		view('left');
		require_once($pagePath);
		view('footer');
	}	

	public static function calendar()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		view('header');
		view('left');
		view('calendar');
		view('footer');
	}	

	// public static function install()
	// {
	// 	// Detect installed or not 
	// 	$systemPath=dirname(dirname(__FILE__)).'/';

	// 	die('Done!');

	// 	$theData=array(
	// 		'listCat'=>[],
	// 		'theList'=>[],
	// 		'totalPost'=>0,
	// 		'totalPage'=>0,
	// 		'pages'=>'',
	// 		'step'=>'1',
	// 	);

	// 	$theData['step']=getGet('step','1');

	// 	echo view('header_login');
	// 	echo view('install',$theData);
	// 	echo view('footer_login');
	// }

	public static function email_templates()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';


		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu05']))
		{
			redirect_to(SITE_URL.'admin');
		}		

        $db=new Database();    
      
		$queryStr="";

		$queryStr=" select * from email_template_data order by upd_dt desc";

        $result=$db->query($queryStr);

        $theData['theList']=json_encode($result);

        // $theData['totalPost']=count($result);

		view('header');
		view('left');
		view('email_templates',$theData);
		view('footer');
	}

	public static function newsletter()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';


		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu05']))
		{
			redirect_to(SITE_URL.'admin');
		}		

		

        $db=new Database();    
      
		$queryStr="";

		$queryStr=" select * from kanban_board_project_mst order by title desc";

        $result=$db->query($queryStr);

        $theData['theList']=json_encode($result);

        // $theData['totalPost']=count($result);

		view('header');
		view('left');
		view('newsletter',$theData);
		view('footer');
	}

	public static function new_email()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';


		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu05']))
		{
			redirect_to(SITE_URL.'admin');
		}		

        $db=new Database();    
      
		$queryStr="";

		$queryStr=" select * from kanban_board_project_mst order by title desc";

        $result=$db->query($queryStr);

        $theData['theList']=json_encode($result);

        // $theData['totalPost']=count($result);

		view('header');
		view('left');
		view('new_email',$theData);
		view('footer');
	}

	public static function projects()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';


		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu05']))
		{
			redirect_to(SITE_URL.'admin');
		}		

        $db=new Database();    
      
		$queryStr="";

		$queryStr=" select * from kanban_board_project_mst order by title desc";

        $result=$db->query($queryStr);

        $theData['theList']=json_encode($result);

        // $theData['totalPost']=count($result);

		view('header');
		view('left');
		view('projects',$theData);
		view('footer');
	}

	public static function projects_task()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';


		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu05']))
		{
			redirect_to(SITE_URL.'admin');
		}		

        $db=new Database();    
      
		$queryStr="";

		$queryStr=" select * from kanban_board_project_mst order by title desc";

        $result=$db->query($queryStr);

        $theData['theList']=json_encode($result);

        // $theData['totalPost']=count($result);

		view('header');
		view('left');
		view('projects_task',$theData);
		view('footer');
	}

	public static function quick_maintain()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $savePath=PUBLIC_PATH.'caches/user_group_permissions.php';

		if(file_exists($savePath))
		{
			unlink($savePath);
		}
        $savePath=PUBLIC_PATH.'caches/user_group_menu_permissions.php';

		if(file_exists($savePath))
		{
			unlink($savePath);
		}
        $savePath=PUBLIC_PATH.'caches/system_setting.php';

		if(file_exists($savePath))
		{
			unlink($savePath);
		}
        $savePath=PUBLIC_PATH.'caches/hooks.php';

		if(file_exists($savePath))
		{
			unlink($savePath);
		}
        $savePath=PUBLIC_PATH.'caches/frontend_menu.php';

		if(file_exists($savePath))
		{
			unlink($savePath);
		}

		redirect_to(SITE_URL.'admin/dashboard');

	}

	public static function tasks()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

		$project_c=getGet('project_c','');

		if(!isset($project_c[2]))
		{
			redirect_to(SITE_URL.'admin/projects');
		}

		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu05']))
		{
			redirect_to(SITE_URL.'admin');
		}		

        $db=new Database();    
      
		$queryStr="";

		$theData['theProject']=$db->query("select * from kanban_board_project_mst where project_c='".$project_c."'");
		$theData['listUsers']=$db->query("select username,user_id from user_mst order by username asc");
		$theData['listTask']=$db->query("select a.*,b.username from kanban_task_data as a join user_mst as b ON a.user_id=b.user_id where project_c='".$project_c."' order by a.ent_dt asc");

        $theData['project_c']=$project_c;
        // $theData['totalPost']=count($result);

		view('header');
		view('left');
		view('tasks',$theData);
		view('footer');
	}

	public static function kanban_board()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

		$project_c=getGet('project_c','');

		if(!isset($project_c[2]))
		{
			redirect_to(SITE_URL.'admin/projects');
		}

		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu05']))
		{
			redirect_to(SITE_URL.'admin');
		}		

        $db=new Database();    
      
		$queryStr="";

		$theData['theProject']=$db->query("select * from kanban_board_project_mst where project_c='".$project_c."'");
		$theData['theListBoard']=$db->query("select * from kanban_board_mst where project_c='".$project_c."' order by sort_order asc");


		$queryStr="SELECT * ";
		$queryStr.=" FROM kanban_board_data ";
		$queryStr.=" WHERE board_c in( select board_c from kanban_board_mst where project_c='".$project_c."') order by sort_order asc";
		$theData['theListMessage']=$db->query($queryStr);

        $theData['project_c']=$project_c;
        // $theData['totalPost']=count($result);

        // print_r($queryStr);die();

		view('header');
		view('left');
		view('kanban_board',$theData);
		view('footer');
	}

	public static function add_email_template()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu06']))
		{
			redirect_to(SITE_URL.'admin');
		}

		$db=new Database();

		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		echo view('header');
		echo view('left');
		echo view('add_email_template',$theData);
		echo view('footer');
	}	


	public static function edit_email_template()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}


		if(!isset(Configs::$_['user_permissions']['menu06']))
		{
			redirect_to(SITE_URL.'admin');
		}		
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

		$template_id=getGet('template_id','');

		$theData=array(
			'listCat'=>[],
			'edit'=>[],
			'theList'=>[],
			'thePost'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

	    $db=new Database();	

        $result=$db->query("select * from email_template_data where template_id='".$template_id."'");

       	if(!is_array($result))
        {
			redirect_to(SITE_URL.'admin');
        }        
        if(!isset($result[0]))
        {
			redirect_to(SITE_URL.'admin');
        }

        $theData['thePost']=json_encode($result[0]);
        $theData['template_id']=$template_id;
 
		echo view('header');
		echo view('left');
		echo view('edit_email_template',$theData);
		echo view('footer');
	}	

	public static function posts()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';


		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu06']))
		{
			redirect_to(SITE_URL.'admin');
		}		

		if(!isset(Configs::$_['user_permissions']['menu08']))
		{
			$addqueryStr.=" AND a.user_id='".$username."' ";
		}


        $db=new Database();    
        $listCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')='' order by sort_order asc");

        $listSubCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')<>'' order by parent_category_c,sort_order asc");

		$result=genListNestedCategories($listCategories,$listSubCategories);

        $theData['listCat']=json_encode($result);

		$postFrom=getPost('from','0');

		$queryStr="";

		$queryStr=" select a.post_c,a.title,a.friendly_url,a.thumbnail,a.tags,a.status,a.post_type,";
		$queryStr.=" a.parent_post_c,a.views,a.category_c,a.user_id as author_id,a.ent_dt,a.upd_dt,b.username as author_username,b.avatar as author_avatar";
		// $queryStr.=" from (".genUnionTables('post_data',1,10).") a";
		$queryStr.=" from post_data a";
		$queryStr.=" left join user_mst b ON a.user_id=b.user_id where a.post_c<>'' ";
		$queryStr.=$addqueryStr;
		$queryStr.=" order by a.upd_dt desc  limit ".$postFrom.",30";

        $result=$db->query($queryStr);

        $theData['listPost']=json_encode($result);

        // $theData['totalPost']=count($result);

		view('header');
		view('left');
		view('posts',$theData);
		view('footer');
	}

	public static function new_post()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu06']))
		{
			redirect_to(SITE_URL.'admin');
		}		

		$db=new Database();
		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);


		
        
        $listPostType=$db->query("select * from post_type_data order by title asc");

        $listCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')='' order by sort_order asc");
        
        $listSubCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')<>'' order by parent_category_c,sort_order asc");

		$result=genListNestedCategories($listCategories,$listSubCategories);

        $theData['listCat']=json_encode($result);
        $theData['listPostType']=$listPostType;

		echo view('header');
		echo view('left');
		echo view('new_post',$theData);
		echo view('footer');
	}	
	
	public static function edit_post()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}


		if(!isset(Configs::$_['user_permissions']['menu06']))
		{
			redirect_to(SITE_URL.'admin');
		}		

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

		$post_c=getGet('post_c','1111111');

		$theData=array(
			'listCat'=>[],
			'edit'=>[],
			'theList'=>[],
			'thePost'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$tableName=substr($post_c,0,1);

	    $db=new Database();	
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu08']))
		{
			$addqueryStr.=" AND user_id='".$username."' ";
		}

     	$listPostType=$db->query("select * from post_type_data order by title asc");
   
        $listCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')='' order by sort_order asc");

        $listSubCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')<>'' order by parent_category_c,sort_order asc");

		$result=genListNestedCategories($listCategories,$listSubCategories);

        $theData['listCat']=json_encode($result);

        $result=$db->query("select * from post_data where post_c='".$post_c."'".$addqueryStr);
       	if(!is_array($result))
        {
			redirect_to(SITE_URL.'admin');
        }        
        if(!isset($result[0]))
        {
			redirect_to(SITE_URL.'admin');
        }

        $theData['thePost']=json_encode($result[0]);
     	$theData['listPostType']=$listPostType;

		echo view('header');
		echo view('left');
		echo view('edit_post',$theData);
		echo view('footer');
	}	
	public static function pages()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		$username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$queryStr="";
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu01']))
		{
			redirect_to(SITE_URL.'admin');
		}		
		$db=new Database();

		if(!isset(Configs::$_['user_permissions']['menu02']))
		{
			$addqueryStr.=" AND a.user_id='".$username."' ";
		}
		

		$postFrom=getPost('from','0');

		$queryStr="";

		$queryStr=" select a.page_c,a.title,a.friendly_url,a.status,a.page_type,";
		$queryStr.=" a.views,a.user_id as author_id,a.ent_dt,a.upd_dt,b.username as author_username,b.avatar as author_avatar";
		$queryStr.=" from page_data a";
		$queryStr.=" left join user_mst b ON a.user_id=b.user_id where a.page_c<>'' ";
		$queryStr.=$addqueryStr;
		$queryStr.=" order by a.upd_dt desc  limit ".$postFrom.",30";

        $result=$db->query($queryStr);

        $theData['listPost']=json_encode($result);

		echo view('header');
		echo view('left');
		echo view('pages',$theData);
		echo view('footer');
	}

	public static function new_page()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu04']))
		{
			redirect_to(SITE_URL.'admin');
		}		

		// if(!isset(Configs::$_['user_permissions']['post08']))
		// {
		// 	redirect_to(SITE_URL.'admin');
		// }		

		$db=new Database();
		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		        
        $listPostType=$db->query("select * from post_type_data order by title asc");
		$theData['listPostType']=$listPostType;

		echo view('header');
		echo view('left');
		echo view('new_page',$theData);
		echo view('footer');
	}	
	public static function edit_page()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu04']))
		{
			redirect_to(SITE_URL.'admin');
		}	
		
		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
		$page_c=getGet('page_c','');
		
		$addqueryStr="";

		if(!isset(Configs::$_['user_permissions']['menu02']))
		{
			$addqueryStr.=" AND user_id='".$username."' ";
		}

        $result=$db->query("select * from page_data where page_c='".$page_c."'".$addqueryStr);

        if(!is_array($result))
        {
			redirect_to(SITE_URL.'admin');
        }        
        if(!isset($result[0]))
        {
			redirect_to(SITE_URL.'admin');
        }

        $theData['thePost']=json_encode($result[0]);
        
        $listPostType=$db->query("select * from post_type_data order by title asc");

     	$theData['listPostType']=$listPostType;

		echo view('header');
		echo view('left');
		echo view('edit_page',$theData);
		echo view('footer');
	}


	public static function categories()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['category01']))
		{
			redirect_to(SITE_URL.'admin');
		}	

		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
        $listCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')='' order by sort_order asc");
        
        $listSubCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')<>'' order by parent_category_c,sort_order asc");

		$result=genListNestedCategories($listCategories,$listSubCategories);

        $theData['listCat']=json_encode($result);

		echo view('header');
		echo view('left');
		echo view('categories',$theData);
		echo view('footer');
	}
	
	public static function edit_menu()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu04']))
		{
			redirect_to(SITE_URL.'admin');
		}	

		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
		

        
        $listCategories=$db->query("select * from menu_data where ifnull(parent_menu_id,'')='' order by sort_order asc");
        
        $listSubCategories=$db->query("select * from menu_data where ifnull(parent_menu_id,'')<>'' order by parent_menu_id,sort_order asc");

		$result=genListNestedMenu($listCategories,$listSubCategories);

        $theData['listMenu']=json_encode($result);

		echo view('header');
		echo view('left');
		echo view('edit_menu',$theData);
		echo view('footer');
	}


	public static function comments()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
		$queryStr='';


        $listCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')='' order by sort_order asc");
        
        $listSubCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')<>'' order by parent_category_c,sort_order asc");

		$result=genListNestedCategories($listCategories,$listSubCategories);

        $theData['listCat']=json_encode($result);
        
		$queryStr.="SELECT a.comment_id,a.parent_comment_id,a.post_id,a.owner_id,a.content,a.status,a.ent_dt,b.title,b.category_c";
		$queryStr.=" FROM comment_data a left join post_data b ";        
		$queryStr.=" ON a.post_id=b.post_c ";        
		$queryStr.=" order by ent_dt desc limit 0,100 ";

        $result=$db->query($queryStr);

		// print_r($result);
		// die();

        $theData['theList']=$result;

		echo view('header');
		echo view('left');
		echo view('comments',$theData);
		echo view('footer');
	}	
	public static function activities_logs()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
		

        $result=$db->query('select * from activities_data order by ent_dt desc limit 0,100');

		// print_r($result);
		// die();

        $theData['theList']=$result;


		echo view('header');
		echo view('left');
		echo view('activities_logs',$theData);
		echo view('footer');
	}	

	
	public static function email_marketing_group()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
		

		$queryStr="SELECT a.*,ifnull(b.Total,'0') as Total ";
		$queryStr.=" FROM emailmarketing_group_data as a left join ";
		$queryStr.=" (select group_id ,count(id) as Total ";
		$queryStr.=" from emailmarketing_email_data group by group_id) as b ";
		$queryStr.=" ON a.group_id=b.group_id";
		$queryStr.=" order by a.title asc";

        $result=$db->query($queryStr);

        $theData['theList']=$result;

        $result=$db->query("select * from emailmarketing_group_data");

        $theData['listGroupPermissions']=$result;

		echo view('header');
		echo view('left');
		echo view('email_marketing_group',$theData);
		echo view('footer');
	}	
	

	
	public static function email_marketing_jobs()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theData'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);


		$db=new Database();

        $queryStr='';

        $queryStr.='update emailmarketing_jobs_data as a  ';
        $queryStr.=' join (select group_id,count(*) as total_email from emailmarketing_email_data group by group_id) as b ';
        $queryStr.=' ON a.group_id=b.group_id ';
        $queryStr.=' set a.total_email=b.total_email ';

		$db->nonquery($queryStr);

		$queryStr=" update emailmarketing_jobs_data as a";
		$queryStr.=" join (select job_id,count(*) as total_sended from emailmarketing_sent_data where status='1' group by job_id) as b";
		$queryStr.=" ON a.job_id=b.job_id";
		$queryStr.=" set a.total_sended=b.total_sended";

		$db->nonquery($queryStr);

		$queryStr=" update emailmarketing_jobs_data as a";
		$queryStr.=" join (select job_id,count(*) as total_readed from emailmarketing_sent_data where is_readed='1' group by job_id) as b";
		$queryStr.=" ON a.job_id=b.job_id";
		$queryStr.=" set a.total_readed=b.total_readed";

		$db->nonquery($queryStr);

		$queryStr="select distinct a.*,c.subject,d.title as group_title ";
		$queryStr.=" from emailmarketing_jobs_data as a ";
		$queryStr.=" join email_template_data as c ON a.template_id=c.template_id ";
		$queryStr.=" join emailmarketing_group_data d ON a.group_id=d.group_id ";
		$queryStr.=" order by a.ent_dt desc limit 0,100";

        $result=$db->query($queryStr);

        $theData['theList']=$result;

		echo view('header');
		echo view('left');
		echo view('email_marketing_jobs',$theData);
		echo view('footer');
	}	
	
	public static function email_marketing_emaillist()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
		

		$queryStr="SELECT a.*,b.title ";
		$queryStr.=" FROM emailmarketing_email_data as a left join ";
		$queryStr.=" emailmarketing_group_data as b ";
		$queryStr.=" ON a.group_id=b.group_id";
		$queryStr.=" order by a.ent_dt desc limit 0,100";

        $result=$db->query($queryStr);

        $theData['theList']=$result;
        $theData['listGroups']=$db->query("select * from emailmarketing_group_data order by title asc");

		echo view('header');
		echo view('left');
		echo view('email_marketing_emaillist',$theData);
		echo view('footer');
	}	
	
	public static function email_marketing_histories()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();

		$queryStr='';
		

		// $queryStr="SELECT a.*,b.subject ";
		// $queryStr.=" FROM emailmarketing_sent_data as a left join ";
		// $queryStr.=" email_template_data as b ";
		// $queryStr.=" ON a.template_id=b.template_id";
		// $queryStr.=" order by a.ent_dt desc limit 0,100";

		$queryStr=" select a.*,c.title as group_title,d.title as template_title,d.subject";
		$queryStr.=" from emailmarketing_sent_data as a";
		$queryStr.=" join emailmarketing_jobs_data as b ON a.job_id=b.job_id";
		$queryStr.=" join emailmarketing_group_data as c ON b.group_id=c.group_id";
		$queryStr.=" join email_template_data as d ON b.template_id=d.template_id";
		$queryStr.=" order by a.ent_dt desc limit 0,100";


        $result=$db->query($queryStr);

        $theData['theList']=$result;

		echo view('header');
		echo view('left');
		echo view('email_marketing_histories',$theData);
		echo view('footer');
	}	
	
	public static function email_marketing_dashboard()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);


		$queryStr='';
		$db=new Database();

		
        $queryStr='';

        $queryStr.='update emailmarketing_jobs_data as a  ';
        $queryStr.=' join (select group_id,count(*) as total_email from emailmarketing_email_data group by group_id) as b ';
        $queryStr.=' ON a.group_id=b.group_id ';
        $queryStr.=' set a.total_email=b.total_email ';

		$db->nonquery($queryStr);

		$queryStr=" update emailmarketing_jobs_data as a";
		$queryStr.=" join (select job_id,count(*) as total_sended from emailmarketing_sent_data where status='1' group by job_id) as b";
		$queryStr.=" ON a.job_id=b.job_id";
		$queryStr.=" set a.total_sended=b.total_sended";

		$db->nonquery($queryStr);

		$queryStr=" update emailmarketing_jobs_data as a";
		$queryStr.=" join (select job_id,count(*) as total_readed from emailmarketing_sent_data where is_readed='1' group by job_id) as b";
		$queryStr.=" ON a.job_id=b.job_id";
		$queryStr.=" set a.total_readed=b.total_readed";

		$db->nonquery($queryStr);

		// $queryStr="select DATE_FORMAT(ent_dt, '%d%m%Y') as Day,count(post_c) as Total";
		// $queryStr.=" from post_view_data ";
		// $queryStr.=" where ent_dt > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) ";
		// $queryStr.=" group by DATE_FORMAT(ent_dt, '%d%m%Y') ";
		// $queryStr.=" order by DATE_FORMAT(ent_dt, '%d%m%Y') asc ";

		// $theData['list_post_views']=$db->query($queryStr);

		$queryStr='';

		$queryStr.=" select 'Jobs' as TargetCol,count(*) as Total ";
		$queryStr.=" from emailmarketing_jobs_data ";
		$queryStr.=" union ";
		$queryStr.=" select 'Groups',count(*) as Total from emailmarketing_group_data ";
		$queryStr.=" union ";
		$queryStr.=" select 'Emails',count(*) as Total ";
		$queryStr.=" from emailmarketing_email_data ";
		$queryStr.=" union ";
		$queryStr.=" select 'UnSubscrible',count(*) as Total ";
		$queryStr.=" from emailmarketing_unsubscrible_data ";
		$queryStr.=" union ";
		$queryStr.=" select 'Sended',count(*) as Total ";
		$queryStr.=" from emailmarketing_sent_data where status='1' ";
		$queryStr.=" union ";
		$queryStr.=" select 'NotSend',count(*) as Total ";
		$queryStr.=" from emailmarketing_sent_data where status='0' ";
		$queryStr.=" union ";
		$queryStr.=" select 'Readed',count(*) as Total ";
		$queryStr.=" from emailmarketing_sent_data where is_readed='1' ";
		$queryStr.=" union ";
		$queryStr.=" select 'NotRead',count(*) as Total ";
		$queryStr.=" from emailmarketing_sent_data where is_readed='0' ";

		$theData['total_data']=$db->query($queryStr);

		$queryStr=" select CAST(ent_dt as date) as work_date,count(*) as total_sended";
		$queryStr.=" from emailmarketing_sent_data";
		$queryStr.=" where CAST(ent_dt as date) BETWEEN '".date("Y-m-d", strtotime('-30 days'))."' AND '".date("Y-m-d")."' AND status='1'";
		$queryStr.=" group by CAST(ent_dt as date)";
		$queryStr.=" order by CAST(ent_dt as date) asc";
		
		$theData['send_data']=$db->query($queryStr);

		$queryStr=" select CAST(ent_dt as date) as work_date,count(*) as total_sended";
		$queryStr.=" from emailmarketing_sent_data";
		$queryStr.=" where CAST(ent_dt as date) BETWEEN '".date("Y-m-d", strtotime('-30 days'))."' AND '".date("Y-m-d")."' AND is_readed='1'";
		$queryStr.=" group by CAST(ent_dt as date)";
		$queryStr.=" order by CAST(ent_dt as date) asc";

		$theData['read_data']=$db->query($queryStr);

		// print_r($theData['send_data']);die();

		echo view('header');
		echo view('left');
		echo view('email_marketing_dashboard',$theData);
		echo view('footer');
	}	
	
	public static function email_marketing_unsubscrible()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
		

		$queryStr="SELECT * ";
		$queryStr.=" FROM emailmarketing_unsubscrible_data ";
		$queryStr.=" order by ent_dt desc limit 0,100";

        $result=$db->query($queryStr);

        $theData['theList']=$result;

		echo view('header');
		echo view('left');
		echo view('email_marketing_unsubscrible',$theData);
		echo view('footer');
	}	
	
	public static function email_marketing_send()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}

		$job_id=getGet('job_id','');


		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();
		

		$queryStr="SELECT * ";
		$queryStr.=" FROM emailmarketing_unsubscrible_data ";
		$queryStr.=" order by ent_dt desc limit 0,100";

        $result=$db->query($queryStr);

        $theData['theList']=$result;
        $theData['listGroups']=$db->query("select * from emailmarketing_group_data order by title asc");
        $theData['listTemplates']=$db->query("select * from email_template_data order by title asc");

		
        $theData['theData']=$db->query("select * from emailmarketing_jobs_data where job_id='".$job_id."'");

		echo view('header');
		echo view('left');
		echo view('email_marketing_send',$theData);
		echo view('footer');
	}	


	public static function users()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
			'user_data'=>'',
		);
		$db=new Database();

		$postFrom=getPost('from','0');
		$user_c_edit=getGet('user_c','');

		$queryStr=" select * from user_group_mst order by title asc ";

        $theData['listGroup']=$db->query($queryStr);

		$queryStr=" select * from user_level_mst  order by title asc";

        $theData['listLevel']=$db->query($queryStr);

		$queryStr=" SELECT a.*,b.title as group_title, c.title as level_title";
		$queryStr.=" FROM user_mst a left join user_group_mst b ON a.group_c=b.group_c";
		$queryStr.=" left join user_level_mst c ON a.level_c=c.level_id  WHERE a.user_id<>''";
		$queryStr.=" order by a.upd_dt desc  limit ".$postFrom.",30";

        $theData['listUser']=$db->query($queryStr);

		if(isset($user_c_edit[2]))
		{
			$queryStr="select * from user_mst where user_id='".$user_c_edit."'";

			$theData['user_data']=$db->query($queryStr);
		}

		echo view('header');
		echo view('left');
		echo view('users',$theData);
		echo view('footer');
	}	
	
	public static function group_user()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}

		clear_hook();
   
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();

		$db->nonquery("delete from group_permission_data where permission_c NOT IN (select permission_c from permissions_mst)");

		$queryStr="SELECT a.*,ifnull(b.Total,'0') as Total,ifnull(d.total,'0') as Total_Users ";
		$queryStr.=" FROM user_group_mst as a left join ";
		$queryStr.=" (select group_c ,count(permission_c) as Total ";
		$queryStr.=" from group_permission_data group by group_c) as b ";
		$queryStr.=" ON a.group_c=b.group_c";
		$queryStr.=" left join (select group_c,count(*) as total from user_mst group by group_c) as d ON a.group_c=d.group_c";
		$queryStr.=" order by a.title asc";

        $result=$db->query($queryStr);

        $theData['theList']=$result;

        $result=$db->query("select * from permissions_mst order by title asc");

        $theData['listPermissions']=$result;

        $result=$db->query("select * from group_permission_data");

        $theData['listGroupPermissions']=$result;

        $result=$db->query("select * from user_permission_menu_data");

        $theData['listMenuPermissions']=$result;

		        

        $listMenu=$db->query("select * from admin_menu_data where ifnull(parent_menu_id,'')='' order by sort_order asc");
        
        $listSubMenu=$db->query("select * from admin_menu_data where ifnull(parent_menu_id,'')<>'' order by parent_menu_id,sort_order asc");

		$theData['listMenu']=genListNestedMenu($listMenu,$listSubMenu);

		echo view('header');
		echo view('left');
		echo view('group_user',$theData);
		echo view('footer');
	}	

	public static function level_user()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$db=new Database();		

		$queryStr="select * from user_level_mst order by title asc";

        $result=$db->query($queryStr);

		// print_r($result);
		// die();

        $theData['theList']=$result;

		echo view('header');
		echo view('left');
		echo view('level_user',$theData);
		echo view('footer');
	}

	public static function global_permission()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();       
        $result=$db->query('select * from permissions_mst order by ent_dt desc');

		// print_r($result);
		// die();

        $theData['theList']=$result;

		echo view('header');
		echo view('left');
		echo view('global_permission',$theData);
		echo view('footer');
	}	

	public static function short_urls()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu07']))
		{
			redirect_to(SITE_URL.'admin');
		}
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$db=new Database();       

        $result=$db->query('select * from short_url_data order by ent_dt desc limit 0,100');

		// print_r($result);
		// die();

        $theData['theList']=$result;

		echo view('header');
		echo view('left');
		echo view('short_urls',$theData);
		echo view('footer');
	}	

	public static function themes()
	{
		// print_r(Configs::$_);die();
		
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu04']))
		{
			redirect_to(SITE_URL.'admin');
		}

		clear_hook();

		$installPlugin=getGet('install','');
		$uninstallPlugin=getGet('uninstall','');

		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();

		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$listPlugins=ThemeFuncs::getList();

		$theData['theList']=$listPlugins;
		$theData['default_theme']=Configs::$_['default_theme'];

		$result=$db->query('select * from theme_mst');

		$theData['listInstalled']=$result;

		echo view('header');
		echo view('left');
		echo view('themes',$theData);
		echo view('footer');
	}	

	public static function theme_edit()
	{
		// print_r(Configs::$_);die();
		
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		$themeName='';
		if(!preg_match('/theme_edit\/(\w+)/i',Configs::$_['uri'],$match))
		{
			// redirect to 404 page
			redirect_to(SITE_URL.'admin/notfound');
		}

		// print_r(getGet('path'));die();

		$path=getGet('path','');
		$file=getGet('file','');

		$themeName=$match[1];

		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);



		$db=new Database();

		$theData=array(
			'listFiles'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'path'=>'',
			'file'=>'',
			'alert'=>'',
			'file_content'=>'',
		);

		$theData['path']=$path;

		$theData['theme_name']=$themeName;
		
		$path=str_replace("../..",'',$path);
		$path=str_replace("..\..",'',$path);
		$path=str_replace("..\/..",'',$path);

		$theData['path']=$path;
		$theData['file']=$file;

		$theData['listFiles']=scandir(THEMES_PATH.$themeName.'/'.$path);

		if(isset($theData['file'][2]) && strpos($file,'.')>0)
		{
			$theData['file_content']=file_get_contents(THEMES_PATH.$themeName.'/'.$path.'/'.$file);
		}

		// print_r($theData['file_content']);die();


		echo view('header');
		echo view('left');
		echo view('theme_edit',$theData);
		echo view('footer');
	}	

	public static function plugin_edit()
	{
		// print_r(Configs::$_);die();
		
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		$pluginName='';
		if(!preg_match('/plugin_edit\/(\w+)/i',Configs::$_['uri'],$match))
		{
			// redirect to 404 page
			redirect_to(SITE_URL.'admin/notfound');
		}

		// print_r(getGet('path'));die();

		$path=getGet('path','');
		$file=getGet('file','');

		$pluginName=$match[1];

		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$db=new Database();

		$theData=array(
			'listFiles'=>[],
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'path'=>'',
			'file'=>'',
			'alert'=>'',
			'file_content'=>'',
		);

		$theData['path']=$path;

		$theData['plugin_name']=$pluginName;
		
		$path=str_replace("../..",'',$path);
		$path=str_replace("..\..",'',$path);
		$path=str_replace("..\/..",'',$path);

		$theData['path']=$path;
		$theData['file']=$file;

		$theData['listFiles']=scandir(PLUGINS_PATH.$pluginName.'/'.$path);

		// print_r(PLUGINS_PATH.$pluginName.'/'.$path);die();

		if(isset($theData['file'][2]) && strpos($file,'.')>0)
		{
			$theData['file_content']=file_get_contents(PLUGINS_PATH.$pluginName.'/'.$path.'/'.$file);
		}

		// print_r($theData['file_content']);die();

		echo view('header');
		echo view('left');
		echo view('plugin_edit',$theData);
		echo view('footer');
	}	

	public static function import_theme()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}
		
		echo view('header');
		echo view('left');
		echo view('import_theme');
		echo view('footer');
	}

	public static function plugins()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu03']))
		{
			redirect_to(SITE_URL.'admin');
		}

		clear_hook();

		$installPlugin=getGet('install','');
		$uninstallPlugin=getGet('uninstall','');

		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();

		// echo $db->addPrefix(file_get_contents(ROOT_PATH.'test.txt'));

		
		// if(isset($installPlugin[1]))
		// {
		// 	//if go to install plugin page
			
		// 	$theData['dir']=$installPlugin;
		// 	$theData['path']=APPPATH.'Libraries/plugins/'.$theData['dir'].'/';
		// 	$theData['installpath']=$theData['path'].'admin/install.php';
		// 	$theData['hasInstallFile']='no';

		// 	$pluginData=file($theData['path'].'info.txt');

		// 	$theData['title']=$pluginData[0];
		// 	// print_r($theData);
		// 	// die();

		// 	if(file_exists($theData['path'].'install.php'))
		// 	{
		// 		$theData['hasInstallFile']='yes';
		// 	}

		// 	if($theData['hasInstallFile']=='no')
		// 	{
		// 		return redirect()->to(SITE_URL.'admin/plugins');
		// 	}
			
		// 	echo view('header');
		// 	echo view('left');
		// 	echo view('installPlugin',$theData);
		// 	echo view('footer');			
		// }

		// if(isset($uninstallPlugin[1]))
		// {
		// 	$theData['dir']=$installPlugin;
		// 	$theData['path']=APPPATH.'Libraries/plugins/'.$theData['dir'].'/';
		// 	$theData['installpath']=$theData['path'].'uninstall.php';
		// 	$theData['hasInstallFile']='no';

		// 	$pluginData=file($theData['path'].'info.txt');

		// 	$theData['title']=$pluginData[0];
		// 	// print_r($theData);
		// 	// die();

		// 	if(file_exists($theData['path'].'uninstall.php'))
		// 	{
		// 		$theData['hasInstallFile']='yes';
		// 	}

		// 	if($theData['hasInstallFile']=='no')
		// 	{
		// 		return redirect()->to(SITE_URL.'admin/plugins');
		// 	}
			
		// 	echo view('header');
		// 	echo view('left');
		// 	echo view('uninstallPlugin',$theData);
		// 	echo view('footer');				
		// }
		
		$theData=array(
			'theList'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		$listPlugins=PluginFuncs::getList();

		$theData['theList']=$listPlugins;

		// $total=count($theData['theList']);

		// // for ($i=0; $i < $total; $i++) { 
		// // 	$theData['theList'][$i]['install_file']='no';
		// // 	if(file_exists($theData['theList'][$i]['path'].'admin/install.php'))
		// // 	{
		// // 		$theData['theList'][$i]['install_file']='yes';
		// // 	}
		// // }

		// print_r($theData['theList']);die();

		
		$result=$db->query('select * from plugin_mst');

		$theData['listInstalled']=$result;

		echo view('header');
		echo view('left');
		echo view('plugins',$theData);
		echo view('footer');




	}	


	public static function import_plugin()
	{
		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		echo view('header');
		echo view('left');
		echo view('import_plugin');
		echo view('footer');
	}	

	public static function setting_general()
	{

		if(!isLogined())
		{
			redirect_to(SITE_URL.'admin/login');
		}

		if(!isset(Configs::$_['user_permissions']['menu05']))
		{
			redirect_to(SITE_URL.'admin');
		}

		
		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'usergroups'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);
		$db=new Database();

		$result=$db->query('select * from setting_data');

		$theData['settingData']=json_encode($result);
		
		$result=$db->query('select * from user_group_mst');

		$theData['user_group_mst']=json_encode($result);
		
		$result=$db->query('select * from user_level_mst');

		$theData['user_level_mst']=json_encode($result);
		
		$result=$db->query('select * from email_template_data');

		$theData['email_template_data']=json_encode($result);

		$updatePath=PUBLIC_PATH.'updates/update.php';

		$theData['has_update']=false;
		$theData['update_info']='';
		if(file_exists($updatePath))
		{
			$theData['has_update']=true;
			$theData['update_info']=file_get_contents(PUBLIC_PATH.'updates/changes_log.txt');
		}

		// print_r(timezone_identifiers_list());die();

		$theData['listTimeZones']=timezone_identifiers_list();
		
		echo view('header');
		echo view('left');
		echo view('setting_general',$theData);
		echo view('footer');
	}	

}