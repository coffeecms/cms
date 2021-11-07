<?php

load_hook('before_load_api');

isLogined();

class Api
{
	public static function index()
	{
		$post=new PostFuncs();

		$data = $post->test();

		return $this->response->setJSON($data);
	}



    // public static function plugin_api($plugin_name,$funcName)
    // {
    //     $pluginPath=$this->getBasePath().'Libraries/plugins/'.$plugin_name.'/';

    //     if(file_exists($pluginPath.'api.php'))
    //     {
    //         require_once($pluginPath.'api.php');

    //         if(!class_exists('PluginApi'))
    //         {
    //             echo responseData('Class PluginApi not exists','yes');
    //         }            

    //         $PluginApi=new PluginApi();

    //         if(!method_exists($PluginApi,$funcName))
    //         {
    //             echo responseData('Method '.$funcName.' not exists','yes');
    //         }

    //         $PluginApi->$funcName();
    //     }
    //     else
    //     {
    //         echo responseData('This plugin not support api!','yes');
    //     }
    // }

    // public static function theme_api($plugin_name,$funcName)
    // {
    //     $pluginPath=$this->getBasePath().'Views/themes/'.$plugin_name.'/';

    //     if(file_exists($pluginPath.'api.php'))
    //     {
    //         require_once($pluginPath.'api.php');

    //         if(!class_exists('PluginApi'))
    //         {
    //             echo responseData('Class PluginApi not exists','yes');
    //         }            

    //         $PluginApi=new PluginApi();

    //         if(!method_exists($PluginApi,$funcName))
    //         {
    //             echo responseData('Method '.$funcName.' not exists','yes');
    //         }

    //         $PluginApi->$funcName();
    //     }
    //     else
    //     {
    //         echo responseData('This plugin not support api!','yes');
    //     }
    // }

    // Api Key
    public static function insert_new_api_key()
    {

    }

    public static function update_api_key()
    {

    }

    // End api key

    public static function user_login()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $username=addslashes(getPost('username',''));
        
        $password=addslashes(getPost('password',''));

        if(!isset($username[1]) || !isset($password[1]))
        {
            echo responseData('ERROR','yes');
            return false;
        }

        if(isset($username[155]) || isset($password[155]))
        {
            echo responseData('ERROR','yes');
            return false;
        }

        $rePassword=md5($password);
        $db=new Database(); 
        $result=$db->query("select user_id,username,group_c,level_c from user_mst where (username='".$username."' OR email='".$username."') AND password='".$rePassword."'");

        if(!isset($result[0]))
        {
            saveActivities('user_login','Login failed',$username);
            echo responseData('ERROR','yes');
            return false;            
        }

        //Set cookie
        $parse=parse_url(SITE_URL);
        setcookie('cf_u', $username, time()+ 360000,'/', $parse['host']);
        setcookie('cf_p', $rePassword, time()+ 360000,'/', $parse['host']);

        $db->nonquery("update user_mst set last_logined=now() where (username='".$username."' OR email='".$username."') AND password='".$rePassword."'");

        createLoginSession($username,$rePassword);
        
        saveActivities('user_login','Login success',$username);
        echo responseData('OK');
        
    }


    public static function user_logout()
    {
        //Set cookie
        setcookie('cf_u', '', time()- 360000, '/');
        setcookie('cf_p', '', time()- 360000, '/');


        echo responseData('OK');
        
    }
    public static function verify_forgotpassword()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $verify_c=getPost('verify_c','');
        

        if(!isset($verify_c[2]))
        {
            redirect_to(SITE_URL.'admin/reset_password?verify=failed&password=&username=');
            return false;
        }

        $db=new Database(); 
        
        $loadData=$db->query("select user_id,username from user_mst where forgot_password_c='".$verify_c."'");

        if(!is_array($loadData))
        {
            redirect_to(SITE_URL.'admin/reset_password?verify=failed&password=&username=');
            return false;            
        }

        if(!isset($loadData[0]))
        {
            redirect_to(SITE_URL.'admin/reset_password?verify=failed&password=&username=');
            return false;            
        }

        $password=newID(6);

        $db->nonquery("update user_mst set password='".md5($password)."',forgot_password_c='' where user_id='".$loadData[0]['user_id']."'");

        saveActivities('user_login','Verify password completed',$loadData[0]['username']);

        redirect_to(SITE_URL.'admin/reset_password?verify=success&username='.$loadData[0]['username'].'&password='.$password);

        return false;    

    }

    public static function clear_view_data_last_months()
    {
         //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $db=new Database(); 

        $db->nonquery("delete from post_tag_view_data where CAST(ent_dt as date) < '".date('Y-m-',strtotime("-3 months",time()))."01'");
        $db->nonquery("delete from post_view_data where CAST(ent_dt as date) < '".date('Y-m-',strtotime("-3 months",time()))."01'");
        
        // saveActivities('clear_view_data','Clear views data',$username);

        echo responseData('OK');

    }

    public static function clear_activities_data_last_months()
    {
         //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $db=new Database(); 

        $db->nonquery("delete from activities_data where CAST(ent_dt as date) < '".date('Y-m-',strtotime("-1 months",time()))."01'");
        
        // saveActivities('clear_view_data','Clear views data',$username);

        echo responseData('OK');

    }

    public static function clear_shorturls_not_working()
    {
         //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $db=new Database(); 

        $db->nonquery("delete from short_url_data where views='0'");
        
        // saveActivities('clear_view_data','Clear views data',$username);

        echo responseData('OK');

    }

    public static function update_system()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $updatePath=PUBLIC_PATH.'updates/update.php';

        saveActivities('system_update','Start updating...',$username);


        if(file_exists($updatePath))
        {
            Configs::$_['update_status']=false;

            require_once($updatePath);

            if(Configs::$_['update_status']==false)
            {
                saveActivities('system_update','Update failed',$username);

                echo responseData('FAILED','yes');
            }
            else
            {
                unlink($updatePath);
                saveActivities('system_update','Update completed',$username);

                echo responseData('OK');
            }
        }
        else
        {
            echo responseData('ERROR','yes');
        }

    }

    public static function add_new_permission()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $permission_c=newID(8);

        $insertData=array(
            'permission_c'=>$permission_c,
            'title'=>addslashes(getPost('title')),
            'status'=>'1',
            'user_id'=>$username
        );

        $queryStrPer='';

        $queryStr=arrayToInsertStr('permissions_mst',$insertData);

        $db=new Database(); 
        $db->nonquery($queryStr);

        clear_hook();

        saveActivities('permission_add','Add new permission '.$insertData['title'],$username);

        
        echo responseData('OK');

    }
    public static function edit_permission()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $permission_c=newID(8);

        $permission_c=getPost('permission_c');

        $db=new Database(); 
        $insertData=array(
            'update'=>array(
                'title'=>addslashes(getPost('title','')),
                'user_id'=>$username
            ),
            'where'=>array(
                'permission_c'=>"='".$permission_c."'",
            )

        );

        $queryStr=arrayToUpdateStr('permissions_mst',$insertData);

        $db->nonquery($queryStr); 
        
        clear_hook();

        saveActivities('permission_edit','Edit permission '.$insertData['update']['title'],$username);

        echo responseData('OK');

    }
    public static function remove_permission()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }
        $db=new Database(); 
        $permission_c=getPost('permission_c');

        $db->nonquery("delete from permissions_mst where permission_c='".$permission_c."'");

        clear_hook();

        saveActivities('permission_remove','Remove permission '.$permission_c,$username);

        echo responseData('Done!');
        
    }
    // Page api
    public static function insert_new_page()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $post_c=newID(9);
        $insertData=array(
            'page_c'=>$post_c,
            'title'=>addslashes(getPost('title')),
            'friendly_url'=>friendlyString(getPost('title'),'_')."_".$post_c,
            'content'=>addslashes(getPost('content')),
            'descriptions'=>addslashes(getPost('descriptions')),
            'keywords'=>addslashes(getPost('keywords')),
            'status'=>addslashes(getPost('status')),
            'page_type'=>addslashes(getPost('page_type')),
            'user_id'=>$username
        );

        if(!isset(Configs::$_['user_permissions']['post08']))
		{
			echo responseData('ERROR_01','yes');return false;
		}

        if(!isset(Configs::$_['user_permissions']['post06']))
		{
			$insertData['status']='0';
		}

        $queryStr=arrayToInsertStr('page_data',$insertData);
        $db=new Database(); 
        $db->nonquery($queryStr);

        load_hook('after_insert_page',$insertData);

        saveActivities('page_add','Add new page '.$insertData['title'],$username);

        echo responseData('OK');
        
    }

    public static function update_page_by_id()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $post_c=getPost('page_c');

        $updateData=array(
            'title'=>addslashes(getPost('title','')),
            'friendly_url'=>friendlyString(getPost('title',''),'_')."_".$post_c,
            'content'=>addslashes(getPost('content','')),
            'descriptions'=>addslashes(getPost('descriptions','')),
            'keywords'=>addslashes(getPost('keywords','')),
            'status'=>addslashes(getPost('status','')),
            'page_type'=>addslashes(getPost('page_type','')),
            'user_id'=>$username
        );

        if(!isset(Configs::$_['user_permissions']['post06']))
		{
			$updateData['status']='0';
		}

        $insertData=array(
            'update'=>$updateData,
            'where'=>array(
                'page_c'=>"='".$post_c."'",
            )

        );
        


        $db=new Database(); 
        $queryStr=arrayToUpdateStr('page_data',$insertData);

        $db->nonquery($queryStr);

        load_hook('after_update_page',$updateData);

        saveActivities('page_update','Update page '.$updateData['title'],$username);

        echo responseData('OK','no');
    }

    public static function get_list_page()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $cookie_username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        
        $start_date=addslashes(getPost('start_date',''));
        $end_date=addslashes(getPost('end_date',''));
        $page_c=addslashes(getPost('page_c',''));
        $status=addslashes(getPost('status',''));
        $page_type=addslashes(getPost('page_type',''));
        $user_id=addslashes(getPost('author_id',''));
        $username=addslashes(getPost('username',''));
        $title=addslashes(getPost('title',''));
        $content=addslashes(getPost('content',''));
        $limit=addslashes(getPost('limit','30'));
        $page_no=addslashes(getPost('page_no','1'));

        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*30;


        if($status=='all')
        {
            $status='';
        }
        if($page_type=='all')
        {
            $page_type='';
        }
        if($user_id=='all')
        {
            $user_id='';
        }


        $queryStr='';

        $queryStr=" select a.page_c,a.title,a.friendly_url,a.status,a.page_type,";

        if(isset($content[5]))
        {
            $queryStr.=" a.content,";
        }

        $queryStr.=" a.views,a.user_id as author_id,a.ent_dt,a.upd_dt,b.username as author_username,b.avatar as author_avatar";
        $queryStr.=" from page_data a";
        $queryStr.=" left join user_mst b ON a.user_id=b.user_id where a.page_c<>'' AND CAST(a.ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."' ";


        if(isset($page_c[5]))
        {
            $queryStr.=" AND a.page_c='".$page_c."' ";
        }        
        if(isset($status[0]))
        {
            $queryStr.=" AND a.status='".$status."' ";
        }
        if(isset($page_type[0]))
        {
            $queryStr.=" AND a.page_type='".$page_type."' ";
        }
        if(isset($user_id[5]))
        {
            $queryStr.=" AND a.user_id='".$user_id."' ";
        }
        if(isset($username[1]))
        {
            $queryStr.=" AND b.username='".$username."' ";
        }
        if(isset($title[0]))
        {
            $queryStr.=" AND a.title LIKE N'%".$title."%' ";
        }
        if(isset($content[0]))
        {
            $queryStr.=" AND a.content LIKE N'%".$content."%' ";
        }

        if(!isset(Configs::$_['user_permissions']['menu08']))
		{
			$queryStr.=" AND a.user_id='".$cookie_username."' ";
		}


        $queryStr.=" order by a.upd_dt desc limit ".$offset.",".$limit;

        $db=new Database(); 
        $result=$db->query($queryStr);

        echo responseData($result,'no');
    }

    public static function page_action_apply()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $list_post_c=addslashes(getPost('list_post_c',''));
        $action=addslashes(getPost('action',''));

        $split_post_c=explode(',', $list_post_c);

        $reformat_post_c='';

        $total=count($split_post_c);

        for ($i=0; $i < $total; $i++) { 
            $reformat_post_c.="'".$split_post_c[$i]."',";
        }

        $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);
        

        $queryStr='';


        if($action=='delete')
        {
            if(!isset(Configs::$_['user_permissions']['post09']))
            {
                echo responseData('ERROR_01','yes'); return false;
            }

            $queryStr="delete from page_data where page_c IN (".$reformat_post_c.")";

        }        
        elseif($action=='deactivate')
        {
                            
            if(!isset(Configs::$_['user_permissions']['post06']))
            {
                echo responseData('ERROR_02','yes'); return false;
            }

            $queryStr="update page_data set status='0' where page_c IN (".$reformat_post_c.")";
            
        }        
        elseif($action=='activate')
        {
                                        
            if(!isset(Configs::$_['user_permissions']['post06']))
            {
                echo responseData('ERROR_02','yes'); return false;
            }

            $queryStr="update page_data set status='1' where page_c IN (".$reformat_post_c.")";

        }

        $db=new Database(); 
        $db->nonquery($queryStr);

        if($action=='delete')
        {
            load_hook('after_delete_page',$split_post_c);

            saveActivities('page_remove','Remove page '.$split_post_c,$username);

        }        
        elseif($action=='deactivate')
        {
            load_hook('after_deactivate_page',$split_post_c);

            saveActivities('page_deactivate','Deactivate page '.$split_post_c,$username);


        }        
        elseif($action=='activate')
        {
            load_hook('after_activate_page',$split_post_c);

            saveActivities('page_activate','Activate page '.$split_post_c,$username);

        }

        echo responseData('OK','no');
    }

    // End page api

    // Comments api

    public static function get_list_comment()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        // try {
        //     isValidAccessAPI();
        // } catch (\Exception $e) {
        //     echo responseData($e->getMessage(),'yes');return false;
        // }
        $start_date=addslashes(getPost('start_date',''));
        $end_date=addslashes(getPost('end_date',''));
        $category_c=addslashes(getPost('category_c',''));
        $post_c=addslashes(getPost('post_c',''));
        $tags=addslashes(getPost('tags',''));
        $status=addslashes(getPost('status',''));
        $post_title=addslashes(getPost('post_title',''));
        $content=addslashes(getPost('content',''));
        $limit=addslashes(getPost('limit','30'));
        $page_no=addslashes(getPost('page_no','1'));

        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*100;

        if($category_c=='all')
        {
            $category_c='';
        }
        if($status=='all')
        {
            $status='';
        }

        $queryStr='';

        $queryStr.="SELECT a.comment_id,a.parent_comment_id,a.post_id,a.owner_id,a.content,a.status,a.ent_dt,b.title,b.category_c";
        $queryStr.=" FROM comment_data a left join post_data b ";        
        $queryStr.=" ON a.post_id=b.post_c where a.comment_id<>''  AND CAST(a.ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."' ";        

        if(isset($category_c[5]))
        {
            $queryStr.=" AND a.category_c='".$category_c."' ";
        }
        if(isset($status[0]))
        {
            $queryStr.=" AND a.status='".$status."' ";
        }        
        if(isset($post_c[0]))
        {
            $queryStr.=" AND a.post_id='".$post_c."' ";
        }

        if(isset($post_title[1]))
        {
            $queryStr.=" AND b.title LIKE N'%".$post_title."%' ";
        }
        if(isset($content[1]))
        {
            $queryStr.=" AND a.content LIKE N'%".$content."%' ";
        }
        if(isset($tags[0]))
        {
            $queryStr.=" AND b.tags LIKE N'%".$tags."%' ";
        }

        $queryStr.=" order by ent_dt desc limit ".$offset.",".$limit;
        $db=new Database(); 
        $result=$db->query($queryStr);
        
        echo responseData($result,'no');
    }

    public static function comment_action_apply()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $list_comment_id=addslashes(getPost('list_comment_id',''));
        $action=addslashes(getPost('action',''));

        $split_post_c=explode(',', $list_comment_id);

        $reformat_post_c='';

        $total=count($split_post_c);

        for ($i=0; $i < $total; $i++) { 
            $reformat_post_c.="'".$split_post_c[$i]."',";
        }

        $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);
        

        $queryStr='';



        if($action=='delete')
        {
            $queryStr="delete from comment_data where comment_id  IN (".$reformat_post_c.")";

            saveActivities('comment_remove','Remove comments '.$reformat_post_c,$username);

        }        
        elseif($action=='deactivate')
        {
            $queryStr="update comment_data set status='0' where comment_id  IN (".$reformat_post_c.")";
            
        }        
        elseif($action=='activate')
        {
            $queryStr="update comment_data set status='1' where comment_id  IN (".$reformat_post_c.")";

        }

        $db=new Database(); 
        $db->nonquery($queryStr);


        echo responseData('OK','no');
    }

    public static function insert_new_comment()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $comment_id=newID(12);

        $insertData=array(
            'comment_id'=>$comment_id,
            'parent_comment_id'=>addslashes(getPost('parent_comment_id','')),
            'content'=>addslashes(getPost('content')),
            'post_id'=>addslashes(getPost('post_id')),
            'user_id'=>$username,
        );

        $queryStr=arrayToInsertStr('comment_data',$insertData);
        $db=new Database(); 
        $db->nonquery($queryStr);
        $db->nonquery("update a set a.owner_id=b.user_id from comment_data a left join post_data b ON a.post_id=b.post_c where a.comment_id='".$comment_id."'");

        load_hook('after_insert_comment',$insertData);

        echo responseData('Done!');
        
    }
    // End comments api

    // Email template

    public static function insert_new_email()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $template_id=newID(6);
        $insertData=array(
            'template_id'=>$template_id,
            'title'=>addslashes(getPost('title')),
            'content'=>trim(addslashes(getPost('content',''))),
            'subject'=>trim(addslashes(getPost('subject',''))),
            'user_id'=>$username
        );
        $db=new Database(); 
        $queryStr=arrayToInsertStr('email_template_data',$insertData);

        $db->nonquery($queryStr);

        load_hook('after_insert_email_template',$insertData);

        echo responseData('Done!');
    }

    public static function insert_new_email_template()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $template_id=newID(6);
        $insertData=array(
            'template_id'=>$template_id,
            'title'=>addslashes(getPost('title')),
            'content'=>trim(addslashes(getPost('content',''))),
            'subject'=>trim(addslashes(getPost('subject',''))),
            'user_id'=>$username
        );
        $db=new Database(); 
        $queryStr=arrayToInsertStr('email_template_data',$insertData);

        $db->nonquery($queryStr);

        load_hook('after_insert_email_template',$insertData);

        echo responseData('Done!');
    }


    public static function email_template_action_apply()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $list_template_id=addslashes(getPost('list_template_id',''));
        $action=addslashes(getPost('action',''));

        $split_post_c=explode(',', $list_template_id);

        $reformat_post_c='';

        $total=count($split_post_c);

        for ($i=0; $i < $total; $i++) { 
            $reformat_post_c.="'".$split_post_c[$i]."',";
        }

        $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);
        

        $queryStr='';

        if($action=='delete')
        {
            $queryStr="delete from email_template_data where template_id IN (".$reformat_post_c.")";
        }        
     
        $db=new Database(); 
        $db->nonquery($queryStr);

        if($action=='delete')
        {
            load_hook('after_delete_post',$split_post_c);
        }        

        echo responseData('OK','no');
    }

    public static function update_email_template()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $template_id=getPost('template_id');

        $updateData=array(
            'title'=>addslashes(getPost('title','')),
            'subject'=>addslashes(getPost('subject','')),
            'content'=>addslashes(getPost('content','')),
            'user_id'=>$username
        );

        $insertData=array(
            'update'=>$updateData,
            'where'=>array(
                'template_id'=>"='".$template_id."'",
            )

        );
        $db=new Database(); 

        $queryStr=arrayToUpdateStr('email_template_data',$insertData);
       
        $db->nonquery($queryStr);

        saveActivities('email_template_update','Update email template '.$updateData['title'],$username);


        echo responseData('OK','no');
    }
    // End email template


    // Short Url api
    public static function insert_new_short_url()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        // print_r(Configs::$_['user_data']);die();

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $post_c=randAlpha(9);

        $insertData=array(
            'code'=>$post_c,
            'target_url'=>addslashes(getPost('target_url')),
        );

        //Can add new short url ?
		if(!isset(Configs::$_['user_permissions']['post11']))
		{
			echo responseData('ERROR','yes');return false;
		}

        $db=new Database(); 

        // $queryStr=arrayToInsertStr('post_data_'.$tableNumber,$insertData);
        $queryStr=arrayToInsertStr('short_url_data',$insertData);

        $db->nonquery($queryStr);

        saveActivities('short_url_add','Add new short url '.$post_c,$username);

        echo responseData($post_c);
        
    }

    public static function get_list_short_url()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $cookie_username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        // try {
        //     isValidAccessAPI();
        // } catch (\Exception $e) {
        //     echo responseData($e->getMessage(),'yes');return false;
        // }


        $limit=addslashes(getPost('limit','30'));
        $page_no=addslashes(getPost('page_no','1'));

        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*30;

        $queryStr='';


        $queryStr=" select * ";

        $queryStr.=" from short_url_data ";

        $queryStr.=" order by ent_dt desc limit ".$offset.",".$limit;
        
        $db=new Database(); 
        $result=$db->query($queryStr);
        
        echo responseData($result,'no');
    }
    public static function short_url_action_apply()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $list_code=addslashes(getPost('list_code',''));
        $action=addslashes(getPost('action',''));

        $split_post_c=explode(',', $list_code);

        $reformat_post_c='';

        $total=count($split_post_c);

        for ($i=0; $i < $total; $i++) { 
            $reformat_post_c.="'".$split_post_c[$i]."',";
        }

        $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);
        

        $queryStr='';


        $savePath='';
        if($action=='delete')
        {
            if(isset(Configs::$_['user_permissions']['post12']))
            {
                $queryStr="delete from short_url_data where code  IN (".$reformat_post_c.")";

                $savePath='';
                for ($i=0; $i < $total; $i++) { 

                    if(strlen($split_post_c[$i]) > 2)
                    {
                        $savePath=PUBLIC_PATH.'caches/short_urls/'.$split_post_c[$i].'.php';
                        
                        if(file_exists($savePath))
                        {
                            unlink($savePath);
                        }
                    }
       
                }
            }
        }        
        elseif($action=='deactivate')
        {
            if(isset(Configs::$_['user_permissions']['post10']))
            {
                $queryStr="update short_url_data set status='0' where code  IN (".$reformat_post_c.")";

                $savePath='';

                for ($i=0; $i < $total; $i++) { 

                    if(strlen($split_post_c[$i]) > 2)
                    {
                        $savePath=PUBLIC_PATH.'caches/short_urls/'.$split_post_c[$i].'.php';
                        
                        if(file_exists($savePath))
                        {
                            unlink($savePath);
                        }
                    }
       
                }
            }       
        }        
        elseif($action=='activate')
        {
            if(isset(Configs::$_['user_permissions']['post10']))
            {
                $queryStr="update short_url_data set status='1' where code  IN (".$reformat_post_c.")";
            } 
        }

        $db=new Database(); 
        $db->nonquery($queryStr);


        echo responseData('OK','no');
    }

    // End short url api

    // Post api
    //Hỗ trợ các kiểu insert
    //$type=1 Insert bằng user đã đăng nhập
    //$type=2 Insert bằng username và mật khẩu
    //$type=3 Insert bằng api_key

    

    public static function insert_new_post()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        // print_r(Configs::$_['user_data']);die();

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $tableNumber=rand(1,10);

        $post_c=$tableNumber.newID(Configs::$_['system_post_id_len']);

        $insertData=array(
            'post_c'=>$post_c,
            'title'=>addslashes(getPost('title')),
            'friendly_url'=>friendlyString(getPost('title'),'_')."_".$post_c,
            'content'=>addslashes(getPost('content')),
            'descriptions'=>addslashes(getPost('descriptions')),
            'keywords'=>addslashes(getPost('keywords')),
            'thumbnail'=>addslashes(getPost('thumbnail')),
            'tags'=>addslashes(getPost('tags')),
            'status'=>addslashes(getPost('status')),
            'post_type'=>addslashes(getPost('post_type')),
            'category_c'=>addslashes(getPost('category_c')),
            'user_id'=>$username
        );

        //Can add new post ?
		if(!isset(Configs::$_['user_permissions']['post05']))
		{
			echo responseData('ERROR','yes');return false;
		}

        //Can change post status ?
		if(!isset(Configs::$_['user_permissions']['post01']))
		{
			$insertData['status']='0';
		}



        $db=new Database(); 

        // $queryStr=arrayToInsertStr('post_data_'.$tableNumber,$insertData);
        $queryStr=arrayToInsertStr('post_data',$insertData);

        $tagArray=array();

        $tagArray=tagsToInsertStr($post_c,addslashes(getPost('tags')));

        $total=count($tagArray);


        $db->nonquery($queryStr);

        for ($i=0; $i < $total; $i++) { 
            $db->nonquery($tagArray[$i]);
        }

        load_hook('after_insert_post',$insertData);

        saveActivities('post_add','Add new post '.$insertData['title'],$username);

        echo responseData('Done!');
        
    }

    public static function get_list_post()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $cookie_username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        // try {
        //     isValidAccessAPI();
        // } catch (\Exception $e) {
        //     echo responseData($e->getMessage(),'yes');return false;
        // }
        $start_date=addslashes(getPost('start_date',''));
        $end_date=addslashes(getPost('end_date',''));
        $category_c=addslashes(getPost('category_c',''));
        $post_c=addslashes(getPost('post_c',''));
        $tags=addslashes(getPost('tags',''));
        $status=addslashes(getPost('status',''));
        $post_type=addslashes(getPost('post_type',''));
        $user_id=addslashes(getPost('author_id',''));
        $username=addslashes(getPost('username',''));
        $title=addslashes(getPost('title',''));
        $content=addslashes(getPost('content',''));
        $limit=addslashes(getPost('limit','30'));
        $page_no=addslashes(getPost('page_no','1'));
        $order_by=addslashes(getPost('order_by','upd_dt'));
        $order_type=addslashes(getPost('order_type','desc'));

        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*30;

        if($category_c=='all')
        {
            $category_c='';
        }
        if($status=='all')
        {
            $status='';
        }
        if($post_type=='all')
        {
            $post_type='';
        }
        if($user_id=='all')
        {
            $user_id='';
        }


        $queryStr='';

        $addFields=' a.post_c,a.title,a.friendly_url,a.thumbnail,a.tags,a.status,a.post_type, ';

        $queryStr=" select ".$addFields;

        if(isset($content[5]))
        {
            $queryStr.=" a.content,";
        }

        $queryStr.=" a.parent_post_c,a.views,a.category_c,a.user_id as author_id,a.ent_dt,a.upd_dt,b.username as author_username,b.avatar as author_avatar";
        $queryStr.=" from post_data a";
        $queryStr.=" left join user_mst b ON a.user_id=b.user_id where a.post_c<>''  AND CAST(a.ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."' ";

        if(isset($category_c[5]))
        {
            $queryStr.=" AND a.category_c='".$category_c."' ";
        }
        if(isset($post_c[5]))
        {
            $queryStr.=" AND a.post_c='".$post_c."' ";
        }        
        if(isset($status[0]))
        {
            $queryStr.=" AND a.status='".$status."' ";
        }
        if(isset($post_type[0]))
        {
            $queryStr.=" AND a.post_type='".$post_type."' ";
        }
        if(isset($user_id[5]))
        {
            $queryStr.=" AND a.user_id='".$user_id."' ";
        }
        if(isset($username[1]))
        {
            $queryStr.=" AND b.username='".$username."' ";
        }
        if(isset($title[0]))
        {
            $queryStr.=" AND a.title LIKE N'%".$title."%' ";
        }
        if(isset($content[0]))
        {
            $queryStr.=" AND a.content LIKE N'%".$content."%' ";
        }
        if(isset($tags[0]))
        {
            $queryStr.=" AND a.tags LIKE N'%".$tags."%' ";
        }

		if(!isset(Configs::$_['user_permissions']['menu08']))
		{
			$queryStr.=" AND a.user_id='".$cookie_username."' ";
		}

        $queryStr.=" order by a.".$order_by." ".$order_type." limit ".$offset.",".$limit;
        $db=new Database(); 
        $result=$db->query($queryStr);
        
        echo responseData($result,'no');
    }

    public static function post_action_apply()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }


        $list_post_c=addslashes(getPost('list_post_c',''));
        $action=addslashes(getPost('action',''));

        $split_post_c=explode(',', $list_post_c);

        $reformat_post_c='';

        $total=count($split_post_c);

        for ($i=0; $i < $total; $i++) { 
            $reformat_post_c.="'".$split_post_c[$i]."',";
        }

        $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);
        

        $queryStr='';

        $savePath='';

        $db=new Database(); 


        if($action=='delete')
        {

            if(!isset(Configs::$_['user_permissions']['post02']) || !isset(Configs::$_['user_permissions']['menu08']))
            {
                echo responseData('ERROR_03','yes');return false;
            }

            $queryStr.="delete from post_data where post_c IN (".$reformat_post_c.");";
            
            $loadData=$db->query("select friendly_url from post_data where post_c IN (".$reformat_post_c.")");

            $total=count($loadData);

            $savePath='';
            for ($i=0; $i < $total; $i++) { 

                $savePath=PUBLIC_PATH.'caches/posts/'.md5($loadData[$i]['friendly_url']).'.php';
                    
                if(file_exists($savePath))
                {
                    unlink($savePath);
                }
   
            }
           
        }        
        elseif($action=='deactivate')
        {

            if(!isset(Configs::$_['user_permissions']['post01']))
            {
                echo responseData('ERROR_01','yes');return false;
            }

            $queryStr.="update post_data set status='0' where post_c IN (".$reformat_post_c.");";

            $loadData=$db->query("select friendly_url from post_data where post_c IN (".$reformat_post_c.")");

            $total=count($loadData);

            $savePath='';
            for ($i=0; $i < $total; $i++) { 

                $savePath=PUBLIC_PATH.'caches/posts/'.md5($loadData[$i]['friendly_url']).'.php';
                    
                if(file_exists($savePath))
                {
                    unlink($savePath);
                }
   
            }
           
        }        
        elseif($action=='activate')
        {

            if(!isset(Configs::$_['user_permissions']['post01']))
            {
                echo responseData('ERROR_02','yes');return false;
            }

            $queryStr.="update post_data set status='1' where post_c IN (".$reformat_post_c.");";
          

        }


        $db->nonquery($queryStr);


        if($action=='delete')
        {
            load_hook('after_delete_post',$reformat_post_c);

            saveActivities('post_remove','Remove post '.$reformat_post_c,$username);

        }        
        elseif($action=='deactivate')
        {
            load_hook('after_deactivate_post',$reformat_post_c);

            saveActivities('post_deactivate','Deactivate post '.$reformat_post_c,$username);

        }        
        elseif($action=='activate')
        {
            load_hook('after_activate_post',$reformat_post_c); 

            saveActivities('post_activate','Activate post '.$reformat_post_c,$username);

        }

        echo responseData('OK','no');
    }

    public static function update_post_by_id()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $post_c=getPost('post_c');

        $tableNumber=substr($post_c,0,1);

        $updateData=array(
            'title'=>addslashes(getPost('title','')),
            'friendly_url'=>friendlyString(getPost('title',''),'_')."_".$post_c,
            'content'=>addslashes(getPost('content','')),
            'descriptions'=>addslashes(getPost('descriptions','')),
            'keywords'=>addslashes(getPost('keywords','')),
            'thumbnail'=>addslashes(getPost('thumbnail','')),
            'tags'=>addslashes(getPost('tags','')),
            'status'=>addslashes(getPost('status','')),
            'post_type'=>addslashes(getPost('post_type','')),
            'category_c'=>addslashes(getPost('category_c','')),
            'user_id'=>$username
        );

        if(!isset(Configs::$_['user_permissions']['post01']))
        {
            $updateData['status']='0';
        }        

        load_hook('before_update_post',$updateData);

        $insertData=array(
            'update'=>$updateData,
            'where'=>array(
                'post_c'=>"='".$post_c."'",
            )

        );

        $db=new Database(); 

        // print_r($insertData);die();

        // $queryStr=arrayToUpdateStr('post_data_'.$tableNumber,$insertData);
        $queryStr=arrayToUpdateStr('post_data',$insertData);

        $tagArray=array();

        $tagArray=tagsToInsertStr($post_c,addslashes(getPost('tags','')));

        $total=count($tagArray);

        if(isset(getPost('tags','')[1]))
        {
            $db->nonquery("delete from post_tag_data where post_c='".$post_c."'");
        }

        $db->nonquery($queryStr);

        for ($i=0; $i < $total; $i++) { 
            $db->nonquery($tagArray[$i]);
        }

        saveActivities('post_update','Update post '.$updateData['title'],$username);

        echo responseData('OK','no');
    }
    public static function remove_post()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

    }
    public static function upload_post_thumbnail()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }
    }
    public static function upload_post_xml_data()
    {

    }

    // End post api

    
    // Project api
   
    public static function add_calendar()
    {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

       $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }


       $calendar_id=newID(24);
       $id=newID(60);

       $color_c='#5DB7D1';

       $insertData=array(
           'calendar_id'=>$calendar_id,
           'title'=>addslashes(getPost('event')),
           'start_dt'=>addslashes(getPost('start_date')),
           'end_dt'=>addslashes(getPost('end_date')),
           'all_day'=>addslashes(getPost('allday')),
           'status'=>addslashes(getPost('status')),
           'color_c'=>$color_c,
       );

       $queryStr=arrayToInsertStr('calendar_data',$insertData);

       $db=new Database(); 
       $db->nonquery($queryStr);   

       saveActivities('add_calendar','Add new calendar '.$insertData['title'],$username);

       echo responseData('OK');
   }

public static function project_action_apply()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $list_project_c=addslashes(getPost('list_project_c',''));
    $action=addslashes(getPost('action',''));

    $split_post_c=explode(',', $list_project_c);

    $reformat_post_c='';

    $total=count($split_post_c);

    for ($i=0; $i < $total; $i++) { 
        $reformat_post_c.="'".$split_post_c[$i]."',";
    }

    $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);


    $queryStr='';

    $db=new Database(); 

    if($action=='delete')
    {
        $loadData=$db->query("select * from kanban_board_mst where project_c IN (".$reformat_post_c.")");

        $total=count($loadData);

        $listBoard_c='';
        $listNote='';

        for ($i=0; $i < $total; $i++) { 
            $listBoard_c.="'".$loadData[$i]['board_c']."',";
        }

        $loadData=$db->query("select * from kanban_board_data where board_c IN (".$listBoard_c.")");

        $total=count($loadData);

        $listNote='';

        for ($i=0; $i < $total; $i++) { 
            $listNote.="'".$loadData[$i]['message_id']."',";
        }

        $listNote=substr($listNote,0,strlen($listNote)-1);

        $queryStr="delete from kanban_board_project_mst where project_c IN (".$reformat_post_c.");";
        $queryStr.="delete from kanban_board_mst where project_c IN (".$reformat_post_c.");";
        $queryStr.="delete from kanban_board_data where board_c IN (".$listBoard_c.");";
        $queryStr.="delete from kanban_board_comment_data where message_id IN (".$listNote.");";
    }        


    
    $db->nonquery($queryStr);

    saveActivities('project_remove','Remove project '.$reformat_post_c,$username);

    echo responseData('OK','no');
}

    public static function edit_kanban_board_project()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $project_c=getPost('project_c');
        $title=getPost('title','');

        $updateData=array(
            'title'=>addslashes(getPost('title','')),
        );

        $insertData=array(
            'update'=>$updateData,
            'where'=>array(
                'project_c'=>"='".$project_c."'",
            )

        );

        $queryStr=arrayToUpdateStr('kanban_board_project_mst',$insertData);
        $db=new Database(); 
        $db->nonquery($queryStr);   

        saveActivities('project_update','Update project '.$updateData['title'],$username);

        echo responseData('OK');

     }

    public static function update_kanban_board_task()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $task_id=getPost('task_id','');

        $updateData=array();

        if(!isset(Configs::$_['user_permissions']['per1101101']))
        {
            $updateData=array(
                'progress'=>addslashes(getPost('progress','0')),
            );
        }
        else
        {
            $updateData=array(
                'title'=>addslashes(getPost('title','')),
                'start_date'=>addslashes(getPost('start_date','')),
                'end_date'=>addslashes(getPost('end_date','')),
                'progress'=>addslashes(getPost('progress','0')),
                'assigned_to'=>addslashes(getPost('assign_to','')),
            );
        }


        $insertData=array(
            'update'=>$updateData,
            'where'=>array(
                'task_id'=>"='".$task_id."'",
            )

        );

        $queryStr=arrayToUpdateStr('kanban_task_data',$insertData);

        $db=new Database(); 

        // $loadData=$db->query("select * from kanban_task_data where user_id='".$username."'"); 


        $db->nonquery($queryStr);   

        saveActivities('project_task_update','Update task '.$updateData['title'],$username);

        echo responseData('OK');

     }

    public static function delete_kanban_board_task()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $cookie_username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $task_id=getPost('task_id','');

        $addqueryStr='';

        
       if(!isset(Configs::$_['user_permissions']['per1101103']))
       {
        $addqueryStr=" AND user_id='".$cookie_username."' ";
       }
      
        $db=new Database(); 

        $db->nonquery("delete from kanban_task_data where task_id='".$task_id."' ".$addqueryStr);   

        saveActivities('project_task_delete','Delete task '.$task_id,$cookie_username);

        echo responseData('OK');

     }

     public static function add_new_kanban_board_project()
     {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }


        $project_c=newID(14);

        $insertData=array(
            'project_c'=>$project_c ,
            'title'=>addslashes(getPost('title')),
            'status'=>'1',
            'user_id'=>$username,
        );

        $queryStr=arrayToInsertStr('kanban_board_project_mst',$insertData);

        $db=new Database(); 
        $db->nonquery($queryStr);   

        saveActivities('project_add','Add new project '.$insertData['title'],$username);

        echo responseData('OK');
    }

     public static function add_new_kanban_board_task()
     {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        if(!isset(Configs::$_['user_permissions']['per1101105']))
        {
            echo responseData('ERROR_01','yes');return false;
        }

        $insertData=array(
            'task_id'=>newID(18),
            'project_c'=>addslashes(getPost('project_c')),
            'title'=>addslashes(getPost('title')),
            'start_date'=>addslashes(getPost('start_date')),
            'end_date'=>addslashes(getPost('end_date')),
            'progress'=>addslashes(getPost('progress')),
            'assigned_to'=>addslashes(getPost('assign_to')),
            'user_id'=>$username,
        );

        $queryStr=arrayToInsertStr('kanban_task_data',$insertData);
 
        $db=new Database(); 
        $db->nonquery($queryStr);   

        saveActivities('project_task_add','Add new task '.$insertData['title'],$username);

        echo responseData('OK');
    }

     public static function delete_kanban_board()
     {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }


        $board_c=getPost('board_c','');

        if(!isset($board_c[2]))
        {
            echo responseData('ERROR','yes');return false;
        }

        $loadData=$db->query("select * from kanban_board_data where board_c='".$board_c."'");

        $total=count($loadData);

        $listNote='';

        for ($i=0; $i < $total; $i++) { 
            $listNote.="'".$loadData[$i]['message_id']."',";
        }

        $listNote=substr($listNote,0,strlen($listNote)-1);

        $db=new Database(); 
        $db->nonquery("delete from kanban_board_mst where board_c='".$board_c."'");   
        $db->nonquery("delete from kanban_board_data where board_c='".$board_c."'");   

        $db->nonquery("delete from kanban_board_comment_data where message_id IN (".$listNote.")");   

        saveActivities('kanban_remove','Remove kanban board '.$board_c,$username);

        echo responseData('OK');
    }

     public static function delete_kanban_board_message()
     {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }


        $message_id=getPost('message_id','');

        if(!isset($message_id[2]))
        {
            echo responseData('ERROR','yes');return false;
        }

    
        $db=new Database(); 
        $db->nonquery("delete from kanban_board_data where message_id='".$message_id."'");   

        saveActivities('kanban_message_remove','Remove kanban board message '.$message_id,$username);

        echo responseData('OK');
    }

    public static function move_kanban_board_message_to_new_board()
    {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
   
   
       $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }
   
       $message_id=addslashes(getPost('message_id',''));
       $new_board_c=addslashes(getPost('new_board_c',''));
       $before_message_id=addslashes(getPost('before_message_id',''));

       if(!isset($message_id[1]) || !isset($new_board_c[1]))
       {
            echo responseData('ERROR','yes');return false;
       }

       $newOrder=0;
   
       $db=new Database(); 

       if(isset($before_message_id[2]))
       {
            $loadBeforeItemData=$db->query("select * from kanban_board_data where message_id='".$before_message_id."'");

            $newOrder=(int)$loadBeforeItemData[0]['sort_order']+1;

            $db->nonquery("update kanban_board_data set sort_order=sort_order+1 where board_c='".$new_board_c."' AND  sort_order >'".$loadBeforeItemData[0]['sort_order']."'");
       }
  
       $db->nonquery("update kanban_board_data set sort_order='".$newOrder."',board_c='".$new_board_c."' where message_id='".$message_id."'");

       echo responseData('OK');
   }

    public static function move_kanban_board_message()
    {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
   
   
       $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }
   
       $message_id=addslashes(getPost('message_id',''));
       $board_c=addslashes(getPost('board_c',''));
       $begin_order=addslashes(getPost('begin_order',''));
       $end_order=addslashes(getPost('end_order',''));

       if(!isset($message_id[1]) || !isset($board_c[1]) || !isset($begin_order[0]) || !isset($end_order[0]))
       {
            echo responseData('ERROR','yes');return false;
       }
   
       $db=new Database(); 

    //    echo "update kanban_board_data set sort_order=sort_order-1 where board_c='".$board_c."' AND  sort_order <='".$end_order."'";

    //    echo "update kanban_board_data set sort_order='".$end_order."' where message_id='".$message_id."'";
    //    die();

       if((int)$begin_order > (int)$end_order)
       {
            // move up
            $db->nonquery("update kanban_board_data set sort_order=sort_order+1 where board_c='".$board_c."' AND  sort_order >='".$end_order."'");

            $db->nonquery("update kanban_board_data set sort_order='".$end_order."' where message_id='".$message_id."'");
       }
       else
       {
            if((int)$end_order==99999)
            {
                // move down
                // $db->nonquery("update kanban_board_data set sort_order=sort_order-1 where board_c='".$board_c."'");

                $loadData=$db->query("select ifnull(MAX(sort_order),'0') as sort_order from kanban_board_data where board_c='".$board_c."'");
                $newOrder=(int)$loadData[0]['sort_order']+1;

                $db->nonquery("update kanban_board_data set sort_order='".$newOrder."' where message_id='".$message_id."'");
                    
            }
            else
            {
                // move down
                $db->nonquery("update kanban_board_data set sort_order=sort_order-1 where board_c='".$board_c."' AND  sort_order <'".$end_order."'");
                $db->nonquery("update kanban_board_data set sort_order='".$end_order."' where message_id='".$message_id."'");
                            
            }
   
       }
   
       echo responseData('OK');
   }

    public static function move_kanban_board()
    {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
   
   
       $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }
   
       $project_c=addslashes(getPost('project_c',''));
       $board_c=addslashes(getPost('board_c',''));
       $begin_order=addslashes(getPost('begin_order',''));
       $end_order=addslashes(getPost('end_order',''));

       if(!isset($project_c[1]) || !isset($board_c[1]) || !isset($begin_order[0]) || !isset($end_order[0]))
       {
            echo responseData('ERROR','yes');return false;
       }
   
       $db=new Database(); 

       if((int)$begin_order < (int)$end_order)
       {
            // left to right
            $db->nonquery("update kanban_board_mst set sort_order=sort_order-1 where sort_order >='".$end_order."'");
            $db->nonquery("update kanban_board_mst set sort_order='".$end_order."' where board_c='".$board_c."'");
            
       }
       else
       {
            // right to left
            $db->nonquery("update kanban_board_mst set sort_order=sort_order+1 where sort_order >='".$end_order."'");
            $db->nonquery("update kanban_board_mst set sort_order='".$end_order."' where board_c='".$board_c."'");
            
       }
   
       echo responseData('OK');
   }

   public static function get_kanban_board_task()
   {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
   
   
       $cookie_username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }
   
       $project_c=addslashes(getPost('project_c',''));
       $year=addslashes(getPost('year',''));
   
       $queryStr='';
       $addqueryStr='';

       if(!isset(Configs::$_['user_permissions']['per1101102']))
       {
        $addqueryStr=" AND (a.user_id='".$cookie_username."' OR a.assigned_to='".$cookie_username."') ";
       }

       $queryStr="select a.*,b.username from kanban_task_data as a join user_mst as b ON a.user_id=b.user_id where project_c='".$project_c."' AND YEAR(a.start_date)='".$year."' ".$addqueryStr." order by a.ent_dt asc";

       $db=new Database(); 
       $result=$db->query($queryStr);
   
       echo responseData($result,'no');
   }

   public static function get_list_kanban_board_comment()
   {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
   
   
       $cookie_username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }
   
       $message_id=addslashes(getPost('message_id',''));
   
       $queryStr='';
   
       $queryStr=" SELECT *";
       $queryStr.=" FROM kanban_board_comment_data";
       $queryStr.=" WHERE message_id='".$message_id."'";
       $queryStr.=" order by ent_dt desc";
   
       $db=new Database(); 
       $result=$db->query($queryStr);
   
       echo responseData($result,'no');
   }
   
    public static function add_new_kanban_board()
    {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
   
   
       $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }
   
       $board_c=getPost('board_c','');

       if(!isset($board_c[2]))
       {
            $board_c=newID(14);
       }

       $project_c=addslashes(getPost('project_c'));

       $insertData=array(
           'board_c'=>$board_c ,
           'project_c'=>addslashes(getPost('project_c')),
           'title'=>addslashes(getPost('title')),
           'user_id'=>$username,
       );
   
       $db=new Database(); 

       $loadData=$db->query("select ifnull(MAX(sort_order),'0') as sort_order from kanban_board_mst where project_c='".$project_c."'");

       $newOrder=(int)$loadData[0]['sort_order']+1;

       $insertData['sort_order']=$newOrder;

       $queryStr=arrayToInsertStr('kanban_board_mst',$insertData);

       $db->nonquery($queryStr);   
   
       saveActivities('kanban_add','Add new kanban board '.$insertData['title'],$username);


       echo responseData('OK');
   }
   
    public static function add_new_kanban_board_comment()
    {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
   
   
       $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }
   
       $message_id=getPost('message_id','');


       $insertData=array(
           'message_id'=>$message_id ,
           'content'=>addslashes(getPost('content')),
           'user_id'=>$username,
       );
   
       $db=new Database(); 
       $queryStr=arrayToInsertStr('kanban_board_comment_data',$insertData);

       $db->nonquery($queryStr);   
   
       saveActivities('kanban_comment_add','Add new kanban board comment',$username);

       echo responseData('OK');
   }

    public static function add_new_kanban_board_message()
    {
           //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
   
   
       $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
       try {
           isValidAccessAPI();
       } catch (\Exception $e) {
           echo responseData($e->getMessage(),'yes');return false;
       }
   
       $message_id=getPost('message_id','');

       if(!isset($message_id[2]))
       {
        $message_id=newID(18);
       }
       

       $board_c=addslashes(getPost('board_c'));
   
       $insertData=array(
           'message_id'=>$message_id ,
           'content'=>addslashes(getPost('content')),
           'board_c'=>addslashes(getPost('board_c')),
           'user_id'=>$username,
       );
   
       $db=new Database(); 

       $loadData=$db->query("select ifnull(MIN(sort_order),'0') as sort_order from kanban_board_data where board_c='".$board_c."'");

       $newOrder=(int)$loadData[0]['sort_order']-1;

       $insertData['sort_order']=$newOrder;

       $queryStr=arrayToInsertStr('kanban_board_data',$insertData);

       $db->nonquery($queryStr);   
   
       saveActivities('kanban_message_add','Add new kanban board message '.$insertData['message_id'],$username);

       echo responseData('OK');
   }
     public static function update_kanban_board_message()
     {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }


        $message_id=getPost('message_id','');
        $content=getPost('content','');
        $board_c=getPost('board_c','');

        if(!isset($message_id[2]))
        {
            echo responseData('ERROR','yes');return false;
        }

        if(!isset($content[2]))
        {
            echo responseData('ERROR','yes');return false;
        }

        $updateData=array(
            'content'=>addslashes($content),
        );

        //If change board
        if(isset($board_c[2]))
        {
            $updateData['board_c']=addslashes($board_c);
        }

        $insertData=array(
            'update'=>$updateData,
            'where'=>array(
                'message_id'=>"='".$message_id."'",
            )

        );
    
        $queryStr=arrayToUpdateStr('kanban_board_data',$insertData);
        $db=new Database(); 
        $db->nonquery($queryStr);   

        saveActivities('kanban_message_update','Update kanban board message '.$message_id,$username);

        echo responseData('OK');
    }

    // End project api
    // User api
    
    public static function edit_user()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        useClass('EmailSystem');

        $user_id=newID(16);


        $user_c=getPost('user_c');
        $password=getPost('password','');
        $newpassword=getPost('newpassword','');
        $newrepassword=getPost('newrepassword','');

        $updateData=array(
            'fullname'=>addslashes(getPost('fullname','')),
            'email'=>addslashes(getPost('email','')),
            'group_c'=>addslashes(getPost('group_c','')),
            'level_c'=>addslashes(getPost('level_c','')),
        );

        $insertData=array(
            'update'=>$updateData,
            'where'=>array(
                'user_id'=>"='".$user_c."'",
            )

        );

        if(isset($newpassword[1]) && $newpassword<>$newrepassword)
        {
            echo responseData('ERROR 01','yes');return false;
        }

        if(!isset(Configs::$_['user_permissions']['menu07']))
        {
            echo responseData('ERROR 02','yes');return false;
        }  

        $db=new Database(); 

        $canUpdate=compareGroupPriorityByUserId(Configs::$_['user_data']['user_id'],$user_c);

        if($canUpdate==false)
        {
            echo responseData('You not have permission to do this action','yes');return false;
        }


        if(isset($newpassword[1]) && $newpassword==$newrepassword)
        {
            $insertData['update']['password']=md5(addslashes(getPost('newpassword','')));
        }

        $queryStr=arrayToUpdateStr('user_mst',$insertData);
        
        $db->nonquery($queryStr);   

        load_hook('after_update_user',$updateData);

        saveActivities('user_update','Update user '.$user_c,$username);


        if(isset($newpassword[1]) && $newpassword==$newrepassword)
        {
            EmailSystem::prepare_send_change_password($user_c,$newpassword);
        }
        


        echo responseData('OK');

 }

 public static function add_new_user()
 {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    useClass('EmailSystem');

    $user_id=newID(Configs::$_['system_user_id_len']);

    $insertData=array(
        'user_id'=>$user_id ,
        'group_c'=>addslashes(getPost('group_c')),
        'level_c'=>addslashes(getPost('level_c')),
        'email'=>addslashes(getPost('email')),
        'password'=>md5(addslashes(getPost('password'))),
        'username'=>addslashes(getPost('username')),
        'fullname'=>addslashes(getPost('fullname','')),
        'status'=>'1',
    );

    $queryStr=arrayToInsertStr('user_mst',$insertData);
    $db=new Database(); 
    $db->nonquery($queryStr);   

    load_hook('after_insert_user',$insertData);

    saveActivities('user_add','Add new user '.$insertData['username'],$username);



    EmailSystem::prepare_send_newuser($insertData);

    echo responseData('OK');
}

 public static function register_new_user()
 {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

    useClass('EmailSystem');

    if(Configs::$_['register_user_status']=='no')
    {
        echo responseData('ERROR','yes');       
    }

    $user_id=newID(Configs::$_['system_user_id_len']);

    $insertData=array(
        'user_id'=>$user_id ,
        'group_c'=>Configs::$_['default_member_groupid'],
        'level_c'=>Configs::$_['default_member_levelid'],
        'email'=>addslashes(getPost('email')),
        'password'=>md5(addslashes(getPost('password'))),
        'username'=>addslashes(getPost('username')),
        'fullname'=>addslashes(getPost('fullname','')),
        'status'=>'1',
    );

    $queryStr=arrayToInsertStr('user_mst',$insertData);
    $db=new Database(); 
    $db->nonquery($queryStr);   

    load_hook('after_insert_user',$insertData);


    EmailSystem::prepare_send_newuser($insertData);

    echo responseData('OK');
}
 public static function request_forgot_password()
 {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

    useClass('EmailSystem');

    if(Configs::$_['register_user_status']=='no')
    {
        echo responseData('ERROR','yes');       
    }

    $user_id=newID(Configs::$_['system_user_id_len']);

    $username=addslashes(getPost('username'));

    $db=new Database(); 
    $loadData=$db->query("select user_id,username,group_c,level_c from user_mst where (username='".$username."' OR email='".$username."')");   

    EmailSystem::prepare_send_forgot_password($username,$loadData[0]['email']);

    echo responseData('OK');
}

public static function get_list_user()
{
    //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

    $cookie_username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $user_id=addslashes(getPost('user_id',''));
    $email=addslashes(getPost('email',''));
    $username=addslashes(getPost('username',''));
    $user_id=addslashes(getPost('author_id',''));
    $username=addslashes(getPost('username',''));
    $group_c=addslashes(getPost('group_c',''));
    $level_c=addslashes(getPost('level_c',''));
    $limit=addslashes(getPost('limit','30'));
    $page_no=addslashes(getPost('page_no','1'));
    $start_date=addslashes(getPost('start_date',''));
    $end_date=addslashes(getPost('end_date',''));

    if((int)$page_no > 0)
    {
        $page_no=(int)$page_no-1;
    }
    if((int)$page_no<=0)
    {
        $page_no=0;
    }

    $offset=(int)$page_no*30;

    if($user_id=='all')
    {
        $user_id='';
    }
    if($group_c=='all')
    {
        $group_c='';
    }
    if($level_c=='all')
    {
        $level_c='';
    }


    $queryStr='';

    $queryStr=" SELECT a.*,b.title as group_title, c.title as level_title";
    $queryStr.=" FROM user_mst a left join user_group_mst b ON a.group_c=b.group_c";
    $queryStr.=" left join user_level_mst c ON a.level_c=c.level_id  WHERE a.user_id<>''  AND CAST(a.ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."' ";

    if(isset($user_id[5]))
    {
        $queryStr.=" AND a.user_id='".$user_id."' ";
    }
    if(isset($username[1]))
    {
        $queryStr.=" AND a.username='".$username."' ";
    }
    if(isset($group_c[5]))
    {
        $queryStr.=" AND a.group_c='".$group_c."' ";
    }
    if(isset($level_c[5]))
    {
        $queryStr.=" AND a.level_c='".$level_c."' ";
    }
    if(isset($email[5]))
    {
        $queryStr.=" AND a.email='".$email."' ";
    }

    $queryStr.=" order by a.upd_dt desc limit ".$offset.",".$limit;

    $db=new Database(); 
    $result=$db->query($queryStr);

    echo responseData($result,'no');
}

public static function user_action_apply()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $list_user_id=addslashes(getPost('list_user_id',''));
    $action=addslashes(getPost('action',''));

    $split_post_c=explode(',', $list_user_id);

    $reformat_post_c='';

    $total=count($split_post_c);

    $canUpdate=false;
    
    for ($i=0; $i < $total; $i++) { 
        if(strlen($split_post_c[$i]) < 2)
        {
            continue;
        }

        $canUpdate=compareGroupPriorityByUserId(Configs::$_['user_data']['user_id'],$split_post_c[$i]);

        if($canUpdate==false)
        {
            continue;
        }

        $reformat_post_c.="'".$split_post_c[$i]."',";
    }

    $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);


    $queryStr='';


    if($action=='delete')
    {
        $queryStr="delete from user_mst where user_id IN (".$reformat_post_c.")";
    }  
          
    $db=new Database(); 
    $db->nonquery($queryStr);

    load_hook('after_delete_user',$split_post_c);

    saveActivities('user_remove','Remove user '.$split_post_c,$username);


    echo responseData('OK','no');
}

    // End user api

    // Email marketing api
    
    public static function add_new_email_marketing_group()
    {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
    
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
    
        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }
    
        $group_id=newID(6);
    
        $email_list=getPost('email_list','');
    
        $insertData=array(
            'group_id'=>$group_id,
            'title'=>addslashes(getPost('title'))
        );
    
        $queryStrPer='';

        // $email_list=str_replace("\r\n",',',$email_list);
    

        if(isset($email_list[1]))
        {
            $email_list = preg_replace('~[\r\n]+~', ',', $email_list);

            $split=explode(',', $email_list);
    
            $total=count($split);
    
            $insertPerQuery='';
    
            for ($i=0; $i < $total; $i++) { 
    
                if(!isset($split[$i][1]))
                {
                    continue;
                }
    
                $insertPerQuery=array(
                    'group_id'=>$group_id,
                    'email'=>$split[$i]
                );                
    
                $queryStrPer.=arrayToInsertStr('emailmarketing_email_data',$insertPerQuery);
            }
    
        }
    
        $queryStr=arrayToInsertStr('emailmarketing_group_data',$insertData);

        $db=new Database(); 
        $db->nonquery($queryStr.$queryStrPer);   
    
        saveActivities('emailmarketing_group_add','Add new email marketing group '.$insertData['title'],$username);
    
        echo responseData('OK');
        
    }

        
    public static function edit_email_marketing_group()
    {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }


        $group_id=getPost('group_id');

        $insertData=array(
            'update'=>array(
                'title'=>addslashes(getPost('title','')),
            ),
            'where'=>array(
                'group_id'=>"='".$group_id."'",
            )

        );

        $queryStr=arrayToUpdateStr('emailmarketing_group_data',$insertData);

        $queryStrPer='';
        $db=new Database(); 
        $db->nonquery($queryStr);   

        saveActivities('emailmarketing_group_update','Update email marketing group '.$insertData['update']['title'],$username);

        echo responseData('OK');
        
    }

    
    public static function get_list_email_marketing_emailist()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $group_id=addslashes(getPost('group_id',''));
        $keywords=addslashes(getPost('keywords',''));
       
        $limit=addslashes(getPost('limit','100'));
        $page_no=addslashes(getPost('page_no','1'));

        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*100;

        $queryStr='';

		$queryStr="SELECT a.*,b.title ";
		$queryStr.=" FROM emailmarketing_email_data as a left join ";
		$queryStr.=" emailmarketing_group_data as b ";
		$queryStr.=" ON a.group_id=b.group_id";
		$queryStr.=" where a.email<>'' ";

        if(strtolower($group_id)!='all')
        {
    		$queryStr.=" AND a.group_id='".$group_id."'";
        }
        if(isset($keywords[5]))
        {
    		$queryStr.=" AND a.email='".$keywords."'";
        }

        $queryStr.=" order by a.ent_dt desc limit ".$offset.",".$limit;

        $db=new Database(); 
        $result=$db->query($queryStr);

        echo responseData($result,'no');
    }    
    
    public static function email_marketing_tracking_image()
    {
        $job_id=addslashes(getGet('job_id',''));
        $email=addslashes(getGet('email',''));

        $file=ROOT_PATH.'public/confirm.png';

        if(!isset($job_id[2]) || !isset($email[2]))
        {
            $type = 'image/png';
            header('Content-Type:'.$type);
            header('Content-Length: ' . filesize($file));
            readfile($file);
            die();    
        }

        $db=new Database(); 

        $db->nonquery("update emailmarketing_sent_data set is_readed='1' where job_id='".trim($job_id)."' AND to_email='".trim($email)."'");

        $type = 'image/png';
        header('Content-Type:'.$type);
        header('Content-Length: ' . filesize($file));
        readfile($file);

    }

    public static function get_list_email_marketing_histories()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

     
        $limit=addslashes(getPost('limit','100'));
        $page_no=addslashes(getPost('page_no','1'));

        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*100;

        $queryStr='';

		// $queryStr="SELECT a.*,b.subject ";
		// $queryStr.=" FROM emailmarketing_sent_data as a left join ";
		// $queryStr.=" email_template_data as b ";
		// $queryStr.=" ON a.template_id=b.template_id";

        // $queryStr.=" order by a.ent_dt desc limit ".$offset.",".$limit;

        
		$queryStr=" select a.*,c.title as group_title,d.title as template_title,d.subject";
		$queryStr.=" from emailmarketing_sent_data as a";
		$queryStr.=" join emailmarketing_jobs_data as b ON a.job_id=b.job_id";
		$queryStr.=" join emailmarketing_group_data as c ON b.group_id=c.group_id";
		$queryStr.=" join email_template_data as d ON b.template_id=d.template_id";
		$queryStr.=" order by a.ent_dt desc limit ".$offset.",".$limit;

        $db=new Database(); 
        $result=$db->query($queryStr);

        echo responseData($result,'no');
    }    

    public static function get_list_activities()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

     
        $limit=addslashes(getPost('limit','100'));
        $page_no=addslashes(getPost('page_no','1'));

        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*100;

        $queryStr='';

		// $queryStr="SELECT a.*,b.subject ";
		// $queryStr.=" FROM emailmarketing_sent_data as a left join ";
		// $queryStr.=" email_template_data as b ";
		// $queryStr.=" ON a.template_id=b.template_id";

        // $queryStr.=" order by a.ent_dt desc limit ".$offset.",".$limit;

        
		$queryStr=" select * from activities_data";
		$queryStr.=" order by ent_dt desc limit ".$offset.",".$limit;

        $db=new Database(); 
        $result=$db->query($queryStr);

        echo responseData($result,'no');
    }    
    
    public static function get_list_email_marketing_unsubscrible()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

     
        $limit=addslashes(getPost('limit','100'));
        $page_no=addslashes(getPost('page_no','1'));
        $keywords=addslashes(getPost('keywords',''));



        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*100;

        $queryStr='';

		$queryStr="SELECT * ";
		$queryStr.=" FROM emailmarketing_unsubscrible_data where email<>''";

        if(isset($keywords[5]))
        {
            $queryStr.=" AND email LIKE '%".$keywords."%' ";
        }

        $queryStr.=" order by ent_dt desc limit ".$offset.",".$limit;

        $db=new Database(); 
        $result=$db->query($queryStr);

        echo responseData($result,'no');
    }    
    
    public static function email_marketing_load_email_for_send()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

     
        $limit=addslashes(getPost('limit','100'));
        $page_no=addslashes(getPost('page_no','1'));
        $job_id=addslashes(getPost('job_id',''));

        if((int)$page_no > 0)
        {
            $page_no=(int)$page_no-1;
        }
        if((int)$page_no<=0)
        {
            $page_no=0;
        }

        $offset=(int)$page_no*100;

        $queryStr='';

		$queryStr="SELECT * ";
		$queryStr.=" FROM emailmarketing_sent_data where job_id='".$job_id."'";
        $queryStr.=" order by ent_dt desc limit 0,10000";

        $db=new Database(); 
        $result=$db->query($queryStr);

        echo responseData($result,'no');
    }    
    
    public static function email_marketing_sendemail()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }
        useClass('EmailSystem');
            
     
        $limit=addslashes(getPost('limit','100'));
        $page_no=addslashes(getPost('page_no','1'));
        $job_id=addslashes(getPost('job_id',''));
        $email=addslashes(getPost('email',''));

        if(!isset($job_id[2]) || !isset($email[2]))
        {
            echo responseData('ERROR','yes');
            return false;
        }

        $queryStr=" select a.*,b.title,b.subject,b.content";
        $queryStr.=" from emailmarketing_jobs_data as a join email_template_data as b";
        $queryStr.=" ON a.template_id=b.template_id";
        $queryStr.=" where a.job_id='".$job_id."'";

        $db=new Database(); 
        $result=$db->query($queryStr);

        $addImageTracking="<img src='".SITE_URL."api/email_marketing_tracking_image?job_id=".$job_id."&email=".$email."' style='width:1px;height:1px;' />";

        try {
            $sendData=array(
                'to'=>$email,
                'subject'=>$result[0]['subject'],
                'content'=>$result[0]['content'].$addImageTracking
            );
    
            EmailSystem::send($sendData);

            $db->nonquery("update emailmarketing_sent_data set status='1' where job_id='".$job_id."' AND to_email='".$email."'");

        } catch (\Throwable $th) {
            //throw $th;
            $db->nonquery("update emailmarketing_sent_data set status='2' where job_id='".$job_id."' AND to_email='".$email."'");

        }

        echo responseData('OK','no');
    }    

    
    public static function email_marketing_emaillist_action_apply()
    {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $list_email=addslashes(getPost('list_email',''));
        $action=addslashes(getPost('action',''));

        $split_post_c=explode(',', $list_email);

        $reformat_post_c='';



        $queryStr='';


        if($action=='delete')
        {
            $total=count($split_post_c);

            $splitEmailData='';

            for ($i=0; $i < $total; $i++) { 
                $reformat_post_c.="'".$split_post_c[$i]."',";

                if(isset($split_post_c[$i][2]))
                {
                    $splitEmailData=explode('||',$split_post_c[$i]);

                    $queryStr.="delete from emailmarketing_email_data where group_id='".trim($splitEmailData[1])."' AND email='".trim($splitEmailData[0])."';";
                }
                
            }

            if(isset($queryStr[2]))
            {
                $db=new Database(); 
                $db->nonquery($queryStr);
            }

            
        }        

        echo responseData('OK','no');
    }

    public static function email_marketing_group_action_apply()
    {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $list_group_id=addslashes(getPost('list_group_id',''));
        $action=addslashes(getPost('action',''));

        $split_post_c=explode(',', $list_group_id);

        $reformat_post_c='';

        $total=count($split_post_c);

        for ($i=0; $i < $total; $i++) { 
            $reformat_post_c.="'".$split_post_c[$i]."',";
        }

        $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);


        $queryStr='';


        if($action=='delete')
        {
            $queryStr="delete from emailmarketing_group_data where group_id IN (".$reformat_post_c.");";
            $queryStr.="delete from emailmarketing_email_data where group_id IN (".$reformat_post_c.");";
        }        

        if($action=='deleteallemail')
        {
            $queryStr.="delete from emailmarketing_email_data where group_id IN (".$reformat_post_c.");";
        }        

        $db=new Database(); 
        $db->nonquery($queryStr);

        echo responseData('OK','no');
    }

    public static function email_marketing_unsubscrible_action_apply()
    {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $list_id=addslashes(getPost('list_id',''));
        $action=addslashes(getPost('action',''));

        $split_post_c=explode(',', $list_id);

        $reformat_post_c='';

        $total=count($split_post_c);

        for ($i=0; $i < $total; $i++) { 
            $reformat_post_c.="'".$split_post_c[$i]."',";
        }

        $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);


        $queryStr='';


        if($action=='delete')
        {
            $queryStr="delete from emailmarketing_unsubscrible_data where id IN (".$reformat_post_c.");";
        }        

        $db=new Database(); 
        $db->nonquery($queryStr);

        echo responseData('OK','no');
    }

    public static function email_marketing_add_new_job()
    {
            //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $group_id=addslashes(getPost('group_id',''));
        $template_id=addslashes(getPost('template_id',''));

        $job_id=newID(11);

        $insertData=array(
            'job_id'=>$job_id,
            'group_id'=>$group_id,
            'template_id'=>$template_id,
        );

        $queryStr='';

        $queryStr=arrayToInsertStr('emailmarketing_jobs_data',$insertData);

        $db=new Database(); 
        $db->nonquery($queryStr);

        //Create email will send data
        //Insert all email of group to emailmarketing_sent_data
        $queryStr=" insert into emailmarketing_sent_data(job_id,to_email)";
        $queryStr.=" select a.job_id,b.email";
        $queryStr.=" from emailmarketing_jobs_data as a";
        $queryStr.=" join emailmarketing_email_data as b ON a.group_id=b.group_id";
        $queryStr.=" where a.job_id='".$job_id."'";

        $db->nonquery($queryStr);

        $queryStr='';

        //Update job infor
        $queryStr.='update emailmarketing_jobs_data as a  ';
        $queryStr.=' join (select group_id,count(*) as total_email from emailmarketing_email_data group by group_id) as b ';
        $queryStr.=' ON a.group_id=b.group_id ';
        $queryStr.=' set a.total_email=b.total_email ';
        $queryStr.=" where a.job_id='".$job_id."' ";

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

        $loadData=$db->query("select * from emailmarketing_jobs_data where job_id='".$job_id."'");

        echo responseData($loadData,'no');
    }
    // End email marketing api

    // Group user api

public static function add_new_groupuser()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $group_c=newID(8);

    $permission_list=getPost('permission_list','');
    $menu_list=getPost('menu_list','');
    $left_str=getPost('left_str','');
    $right_str=getPost('right_str','');
    $priority=getPost('priority','0');

    $insertData=array(
        'group_c'=>$group_c,
        'left_str'=>$left_str,
        'right_str'=>$right_str,
        'priority'=>$priority,
        'title'=>addslashes(getPost('title')),
        'status'=>'1',
        'user_id'=>$username
    );

    $queryStrPer='';

    if(isset($permission_list[1]))
    {
        $split=explode(',', $permission_list);

        $total=count($split);

        $insertPerQuery='';

        for ($i=0; $i < $total; $i++) { 

            if(!isset($split[$i][1]))
            {
                continue;
            }

            $insertPerQuery=array(
                'group_c'=>$group_c,
                'permission_c'=>$split[$i],
                'user_id'=>$username
            );                

            $queryStrPer.=arrayToInsertStr('group_permission_data',$insertPerQuery);
        }

    }

    if(isset($menu_list[1]))
    {
        $split=explode(',', $menu_list);

        $total=count($split);

        $insertPerQuery='';

        for ($i=0; $i < $total; $i++) { 

            if(!isset($split[$i][1]))
            {
                continue;
            }

            $insertPerQuery=array(
                'group_c'=>$group_c,
                'menu_id'=>$split[$i]
            );                

            $queryStrPer.=arrayToInsertStr('user_permission_menu_data',$insertPerQuery);
        }

    }

    $queryStr=arrayToInsertStr('user_group_mst',$insertData);
    $db=new Database(); 
    $db->nonquery($queryStr.$queryStrPer);   

    load_hook('after_insert_groupuser',$insertData);

    // clear_hook();

    clear_hook();
    

    saveActivities('usergroup_add','Add new user group '.$insertData['title'],$username);

    // self::system_cache_clear();return;
    echo responseData('OK');
    
}

public static function edit_groupuser()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $group_c=newID(8);

    $group_c=getPost('group_c');

    $permission_list=getPost('permission_list','');
    $menu_list=getPost('menu_list','');

    $left_str=getPost('left_str','');
    $right_str=getPost('right_str','');
    $priority=getPost('priority','0');

    $insertData=array(
        'update'=>array(
            'left_str'=>$left_str,
            'right_str'=>$right_str,
            'priority'=>$priority,
            'title'=>addslashes(getPost('title','')),
            'user_id'=>$username
        ),
        'where'=>array(
            'group_c'=>"='".$group_c."'",
        )

    );

    $queryStr=arrayToUpdateStr('user_group_mst',$insertData);

    $queryStrPer='';

    if(isset($permission_list[1]))
    {
        $split=explode(',', $permission_list);

        $total=count($split);

        $insertPerQuery='';

        for ($i=0; $i < $total; $i++) { 

            if(!isset($split[$i][1]))
            {
                continue;
            }

            $insertPerQuery=array(
                'group_c'=>$group_c,
                'permission_c'=>$split[$i],
                'user_id'=>$username
            );                

            $queryStrPer.=arrayToInsertStr('group_permission_data',$insertPerQuery);
        }

    }        

    
    if(isset($menu_list[1]))
    {
        $split=explode(',', $menu_list);

        $total=count($split);

        $insertPerQuery='';

        for ($i=0; $i < $total; $i++) { 

            if(!isset($split[$i][1]))
            {
                continue;
            }

            $insertPerQuery=array(
                'group_c'=>$group_c,
                'menu_id'=>$split[$i]
            );                

            $queryStrPer.=arrayToInsertStr('user_permission_menu_data',$insertPerQuery);
        }

    }

    $db=new Database(); 
    $db->nonquery("delete from group_permission_data where group_c='".$group_c."'");   
    $db->nonquery("delete from user_permission_menu_data where group_c='".$group_c."'");   

    $db->nonquery($queryStr.$queryStrPer);   

    // clear_hook();

    // sleep(2);

    saveActivities('usergroup_update','Update user group '.$insertData['update']['title'],$username);


    // self::system_cache_clear();return;
    echo responseData('OK');
    
}

public static function groupuser_action_apply()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $list_group_c=addslashes(getPost('list_group_c',''));
    $action=addslashes(getPost('action',''));

    $split_post_c=explode(',', $list_group_c);

    $reformat_post_c='';

    $total=count($split_post_c);

    for ($i=0; $i < $total; $i++) { 
        $reformat_post_c.="'".$split_post_c[$i]."',";
    }

    $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);


    $queryStr='';


    if($action=='delete')
    {
        $queryStr="delete from user_group_mst where group_c IN (".$reformat_post_c.");";
        $queryStr.="delete from group_permission_data where group_c IN (".$reformat_post_c.");";
        $queryStr.="delete from user_permission_menu_data where group_c IN (".$reformat_post_c.");";

    }        


    $db=new Database(); 
    $db->nonquery($queryStr);

    // clear_hook();

    clear_hook();

    saveActivities('usergroup_remove','Remove user group '.$reformat_post_c,$username);

    // self::system_cache_clear();return;

    echo responseData('OK','no');
}
    // End group user api

    // Level user api
public static function add_new_leveluser()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $level_id=newID(8);

    $insertData=array(
        'level_id'=>$level_id,
        'title'=>addslashes(getPost('title')),
        'status'=>'1',
        'user_id'=>$username
    );

    $queryStr=arrayToInsertStr('user_level_mst',$insertData);


    $db=new Database(); 
    $db->nonquery($queryStr);   

    clear_frontend_cache();

    saveActivities('userlevel_add','Add new user level'.$insertData['title'],$username);


    echo responseData('OK');
    
}
public static function edit_leveluser()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $level_id=getPost('level_id');

    $insertData=array(
        'update'=>array(
            'title'=>addslashes(getPost('title','')),
            'user_id'=>$username
        ),
        'where'=>array(
            'level_id'=>"='".$level_id."'",
        )

    );

    $queryStr=arrayToUpdateStr('user_level_mst',$insertData);


    $db=new Database(); 
    $db->nonquery($queryStr);   

    clear_frontend_cache();

    saveActivities('userlevel_update','Update user level'.$insertData['update']['title'],$username);


    echo responseData('OK');
    
}
public static function leveluser_action_apply()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $list_level_id=addslashes(getPost('list_level_id',''));
    $action=addslashes(getPost('action',''));

    $split_post_c=explode(',', $list_level_id);

    $reformat_post_c='';

    $total=count($split_post_c);

    for ($i=0; $i < $total; $i++) { 
        $reformat_post_c.="'".$split_post_c[$i]."',";
    }

    $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);


    $queryStr='';


    if($action=='delete')
    {
        $queryStr="delete from user_level_mst where level_id IN (".$reformat_post_c.")";

    }        


    $db=new Database(); 
    $db->nonquery($queryStr);

    clear_frontend_cache();

    saveActivities('userlevel_remove','Remove user level'.$reformat_post_c,$username);


    echo responseData('OK','no');
}
    // End level user api

    // Menu api
public static function add_new_menu()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $menu_id=newID(12);

    $is_url=0;

    if(preg_match('/^http/i', getPost('page_url')))
    {
        $is_url=1;
    }

    $parent_menu_id=addslashes(getPost('parent_menu_id',''));
    $insertData=array(
        'menu_id'=>$menu_id,
        'title'=>addslashes(getPost('title')),
        'page_url'=>addslashes(getPost('page_url')),
        'parent_menu_id'=>$parent_menu_id,
        'is_url'=>$is_url,
        'status'=>'1',
    );

    $queryStr=arrayToInsertStr('menu_data',$insertData);
    $db=new Database(); 
    $db->nonquery($queryStr);   

    $loadData=array();

    $query='';

    $newSortOrder=99999;

    $loadData=[];

    if(strlen($parent_menu_id) > 0)
    {
        $loadData=$db->query("select sort_order from menu_data where parent_menu_id='".$parent_menu_id."' order by sort_order desc limit 0,1");  
    }
    else
    {
        $loadData=$db->query("select sort_order from menu_data order by sort_order desc limit 0,1");  
    }

    if(isset($loadData[0]))
    {
        $newSortOrder=(int)$loadData[0]['sort_order']+1;
    }

    $db->nonquery("update menu_data set sort_order='".$newSortOrder."' where menu_id='".$menu_id."'");   

    clear_frontend_cache();

    echo responseData('OK');
    
}

public static function load_menu_data()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $menu_id=addslashes(getPost('menu_id',''));



    $loadData=array();

    $query='';
    $db=new Database(); 
    $loadData=$db->query("select * from menu_data where menu_id='".$menu_id."' ");  

    if(isset($loadData[0]))
    {
        echo responseData($loadData[0]);

        return true;

    }

    // clear_frontend_cache();

    echo responseData('Not found','yes');

}

public static function update_menu()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $insertData=array(
        'update'=>array(
            'title'=>addslashes(getPost('title')),
            'parent_menu_id'=>getPost('parent_menu_id',''),
            'is_url'=>addslashes(getPost('is_url','1')),
            'page_url'=>addslashes(getPost('page_url','')),
            'status'=>addslashes(getPost('status','1')),
            'upd_dt'=>date("Y-m-d H:i:s"),
        ),
        'where'=>array(
            'menu_id'=>"='".getPost('menu_id','')."'"
        )

    );

    $queryStr=arrayToUpdateStr('menu_data',$insertData);
    $db=new Database(); 
    $db->nonquery($queryStr);        

    clear_frontend_cache();

    echo responseData('OK');
    
}

public static function menu_sort_down()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $menu_id=getPost('menu_id');
    $db=new Database(); 
    $query=$db->query("select * from menu_data where menu_id='".$menu_id."'");   

    $loadData=$query->getResult('array');

        // return json_encode($loadData[0]);

    if(isset($loadData[0]))
    {
        $parent_id=$loadData[0]['parent_menu_id'];

        $loadData=$db->query("select sort_order from menu_data where parent_menu_id='".$parent_id."'  AND menu_id<>'".$menu_id."' order by sort_order desc limit 0,1");   

        $newSortOrder=(int)$loadData[0]['sort_order']+1;

        $db->nonquery("update menu_data set sort_order='".$newSortOrder."' where menu_id='".$menu_id."'");
    }

    clear_frontend_cache();

    echo responseData('OK');
    
}

public static function menu_sort_up()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $menu_id=getPost('menu_id');
    $db=new Database(); 

    $loadData=$db->query("select menu_id,sort_order,ifnull(parent_menu_id,'') as parent_menu_id from menu_data where menu_id='".$menu_id."'");   

    $oldSortOrder=0;
    $newSortOrder=0;

    if(is_array($loadData) && isset($loadData[0]))
    {
        $parent_id=$loadData[0]['parent_menu_id'];
        $oldSortOrder=$loadData[0]['sort_order'];

        if(!isset($parent_id[1]))
        {
            $lastestSortOrder=getLastSubMenuSortOrder();

            $newSortOrder=(int)$lastestSortOrder-1;

            $db->nonquery("update menu_data set sort_order='".$newSortOrder."' where menu_id='".$menu_id."'");        
            $db->nonquery("update menu_data set sort_order='".$oldSortOrder."' where sort_order='".$lastestSortOrder."' AND ifnull(parent_menu_id,'')=''");    
        }
        else
        {
            $lastestSortOrder=getLastSubMenuSortOrderInParent($parent_id);

            $newSortOrder=(int)$lastestSortOrder-1;

            $db->nonquery("update menu_data set sort_order='".$newSortOrder."' where menu_id='".$menu_id."'");        
            $db->nonquery("update menu_data set sort_order='".$oldSortOrder."' where sort_order='".$lastestSortOrder."' AND ifnull(parent_menu_id,'')='".$parent_id."'");   

        }

    }

    clear_frontend_cache();

    echo responseData('OK');
    
}

public static function menu_action_apply()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $list_menu_id=addslashes(getPost('list_menu_id',''));
    $action=addslashes(getPost('action',''));

    $split_post_c=explode(',', $list_menu_id);

    $reformat_post_c='';

    $total=count($split_post_c);

    for ($i=0; $i < $total; $i++) { 
        $reformat_post_c.="'".$split_post_c[$i]."',";
    }

    $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);
    $db=new Database(); 

    $queryStr='';

    if($action=='delete')
    {
        $queryStr="delete from menu_data where menu_id IN (".$reformat_post_c.")";
    }        

    $db->nonquery($queryStr);

    clear_frontend_cache();

    echo responseData('OK','no');
}


    // End menu api

    // Category API

public static function category_action_apply()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false
    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $list_category_c=addslashes(getPost('list_category_c',''));
    $action=addslashes(getPost('action',''));

    $split_post_c=explode(',', $list_category_c);

    $reformat_post_c='';

    $total=count($split_post_c);

    for ($i=0; $i < $total; $i++) { 
        $reformat_post_c.="'".$split_post_c[$i]."',";
    }

    $reformat_post_c=substr($reformat_post_c, 0,strlen($reformat_post_c)-1);
    $db=new Database(); 

    $queryStr='';

    if($action=='delete')
    {
        $queryStr="delete from category_mst where category_c IN (".$reformat_post_c.")";
    }        

    $db->nonquery($queryStr);

    clear_frontend_cache();

    saveActivities('category_remove','Remove category '.$reformat_post_c,$username);


    echo responseData('OK','no');
}

public static function add_new_category()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $category_c=newID(Configs::$_['system_category_id_len']);

    $parent_category_c=addslashes(getPost('parentid',''));
    $insertData=array(
        'category_c'=>$category_c,
        'title'=>addslashes(getPost('title')),
        'parent_category_c'=>$parent_category_c,
        'friendly_url'=>friendlyString(getPost('title')),
        'descriptions'=>addslashes(getPost('descriptions','')),
        'keywords'=>addslashes(getPost('keywords','')),
        'thumbnail'=>addslashes(getPost('thumbnail','')),
        'status'=>'1',
        'user_id'=>$username
    );

    $queryStr=arrayToInsertStr('category_mst',$insertData);
    $db=new Database(); 


    $db->nonquery($queryStr);   

    $loadData=array();

    $query='';

    $newSortOrder=99999;

    if(strlen($parent_category_c) > 0)
    {
        $query=$db->query("select sort_order from category_mst where parent_category_c='".$parent_category_c."' order by sort_order desc limit 0,1");  
    }
    else
    {
        $query=$db->query("select sort_order from category_mst order by sort_order desc limit 0,1");  
    }

    $loadData=$query->getResult('array');

    if(isset($loadData[0]))
    {
        $newSortOrder=(int)$loadData[0]['sort_order']+1;
    }

    $db->nonquery("update category_mst set sort_order='".$newSortOrder."' where category_c='".$category_c."'");   

    clear_frontend_cache();

    saveActivities('category_add','Add new category '.$insertData['title'],$username);



    echo responseData('Done!');
    
}

public static function load_category_data()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $category_c=addslashes(getPost('category_c',''));

    $db=new Database(); 

    $loadData=array();

    $query='';

    $loadData=$db->query("select * from category_mst where category_c='".$category_c."' ");  

    if(isset($loadData[0]))
    {
        echo responseData($loadData[0]);

    }

    // clear_frontend_cache();

    echo responseData('Not found','yes');

}

public static function update_category()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $insertData=array(
        'update'=>array(
            'title'=>addslashes(getPost('title')),
            'parent_category_c'=>getPost('parentid',''),
            'friendly_url'=>friendlyString(getPost('title')),
            'descriptions'=>addslashes(getPost('descriptions','')),
            'keywords'=>addslashes(getPost('keywords','')),
            'thumbnail'=>addslashes(getPost('thumbnail','')),
            'status'=>'1',
            'upd_dt'=>date("Y-m-d H:i:s"),
            'user_id'=>$username
        ),
        'where'=>array(
            'category_c'=>"='".getPost('category_c','')."'"
        )

    );

    $queryStr=arrayToUpdateStr('category_mst',$insertData);

    $db=new Database(); 

    $db->nonquery($queryStr); 
    
    clear_frontend_cache();

    saveActivities('category_update','Update category '.$insertData['title']['title'],$username);

    echo responseData('Done!');
    
}

public static function category_sort_down()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $category_c=getPost('category_c');
    $db=new Database(); 

    $query=$db->query("select * from category_mst where category_c='".$category_c."'");   

    $loadData=$query->getResult('array');

        // return json_encode($loadData[0]);

    if(isset($loadData[0]))
    {
        $parent_id=$loadData[0]['parent_category_c'];

        $loadData=$db->query("select sort_order from category_mst where parent_category_c='".$parent_id."'  AND category_c<>'".$category_c."' order by sort_order desc limit 0,1");   

        $newSortOrder=(int)$loadData[0]['sort_order']+1;

        $db->nonquery("update category_mst set sort_order='".$newSortOrder."' where category_c='".$category_c."'");        
        
    }

    clear_frontend_cache();

    echo responseData('OK');
    
}

public static function category_sort_up()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $category_c=getPost('category_c');


    $loadData=$db->query("select * from category_mst where category_c='".$category_c."'");   

    $oldSortOrder=0;

    if(isset($loadData[0]))
    {
        $parent_id=$loadData[0]['parent_category_c'];
        $oldSortOrder=$loadData[0]['sort_order'];


        $loadData=$db->query("select category_c,sort_order from category_mst where parent_category_c='".$parent_id."' AND category_c<>'".$category_c."' order by sort_order desc limit 0,1");   

        $newSortOrder=(int)$loadData[0]['sort_order'];

        if((int)$newSortOrder==(int)$oldSortOrder)
        {
            $oldSortOrder=(int)$oldSortOrder+1;
        }
        $db=new Database(); 
            // return "select category_c,sort_order from category_mst where parent_category_c='".$parent_id."' AND category_c<>'".$category_c."' order by sort_order desc limit 0,1";


        $db->nonquery("update category_mst set sort_order='".$newSortOrder."' where category_c='".$category_c."'");        
        $db->nonquery("update category_mst set sort_order='".$oldSortOrder."' where category_c='".$loadData[0]['category_c']."'");        
        
    }

    clear_frontend_cache();

    echo responseData('OK');
    
}


    // End category api


    // Upload media
public static function upload_media()
{
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    // try {
    //     isValidAccessAPI();
    // } catch (\Exception $e) {
        
    // }

    if(!isset($username[2]))
    {
        echo responseData($e->getMessage(),'yes');return false;
    }

    // print_r($_FILES['medias']);

    $listResult=[];

    $dirPath=trim(getPost('path',''));

    $uploadPath=ROOT_PATH.'public/uploads/medias/'.$dirPath;

    if (!empty($_FILES)) 
    {
        $totalFile=count($_FILES['medias']['tmp_name']);

        for ($i=0; $i < $totalFile; $i++) { 
            // print_r($_FILES['file']);die();
            if(isset($_FILES['medias']['tmp_name'][$i]))
            {
                $tempFile = $_FILES['medias']['tmp_name'][$i];          //3 

                $onyName=explode('.',$_FILES['medias']['name'][$i])[0];
                
                $newName=friendlyString($onyName,'_').'_'.newID(9);
    
                $fileID=newID(24);
                // $newName=newID(3).time();
    
                $ext = pathinfo($_FILES['medias']['name'][$i], PATHINFO_EXTENSION);
    
                $targetFile =  $uploadPath.$newName.'.'.$ext;  //5

                // if(file_exists($targetFile))
                // {
                //     $targetFile =  $uploadPath.$newName.'.'.$ext;  //5
                // }
    
                move_uploaded_file($tempFile,$targetFile); //6
    
                $listResult[]=SITE_URL.'public/uploads/medias/'.$dirPath.$newName.'.'.$ext; 
            }

        }
        
    }

    echo json_encode($listResult);die();
}

    
    public static function download_media()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        if(!isset($username[2]))
        {
            echo responseData('ERROR_01','yes');die();
        }

        $fileHash=getGet('hash','');

        if(!isset($fileHash[2]))
        {
            echo responseData('ERROR_02','yes');die();
        }

        $filePath=ROOT_PATH.base64_decode($fileHash);

        $fileName=basename($filePath);
       
        if(!file_exists($filePath))
        {
            echo responseData('ERROR_03','yes');die();
        }
            
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$fileName);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        ob_clean();
        flush();
        readfile($filePath);
        exit;        

        
    }

    public static function delete_media()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        if(!isset($username[2]))
        {
            echo responseData('ERROR_01','yes');die();
        }

        $fileHash=getPost('hash','');
        $dirPath=getPost('path','');

        if(!isset($fileHash[2]))
        {
            echo responseData('ERROR_02','yes');die();
        }

        $filePath=ROOT_PATH.base64_decode($fileHash);

        // print_r($filePath);die();

        $fileName=basename($filePath);
       
        if(file_exists($filePath))
        {
            unlink($filePath);
        }

        echo responseData('OK','no');
        
    }

    public static function get_list_media()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        // if(!isset($username[2]))
        // {
        //     echo responseData('You have not permission to access!'.$username,'yes');return false;
        // }

        $target_path=getPost('path','');


        $result = scandir(ROOT_PATH.'public/uploads/medias/'.$target_path, 1);

        echo responseData($result,'no');
    }

    public static function plugin_activate()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $plugin_name=getPost('plugin_name','');
        $db=new Database(); 
        $queryStr="";
        $queryStr.="delete from plugin_mst where plugin_dir='".$plugin_name."'";

        $db->nonquery($queryStr);   

        $db->nonquery("delete from plugin_hook_data where plugin_dir='".$plugin_name."'");        

        $queryStr="";
        $queryStr.="insert into plugin_mst(plugin_dir,status,user_id) VALUES";
        $queryStr.="('".$plugin_name."','1','".$username."')";

        $db->nonquery($queryStr);  

        $dbPath=PLUGINS_PATH.$plugin_name.'/sql_install.sql';

        // die($dbPath);
        $requireFile=PLUGINS_PATH.$plugin_name.'/activate.php';

        // if(file_exists($dbPath))
        // {
        //     $content=file_get_contents($dbPath);

        //     if(isset($content[5]))
        //     {
        //          $db->nonquery(trim($content));   
        //     }
           
           
        // }
        if(file_exists($requireFile))
        {
            require_once($requireFile);
        }

        // before_load_hook();

        // self::system_cache_clear();

        clear_hook();

        echo responseData('Done!','no');

    }

    public static function save_theme_file_content()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $path=getPost('path','');
        $file=getPost('file','');
        $content=getPost('content','');
        $theme_name=getPost('theme_name','');

        $savePath=THEMES_PATH.$theme_name.'/'.$path.$file;

        // print_r($savePath);die();

        if(file_exists($savePath))
        {
            create_file($savePath,$content);
        }

        echo responseData('Done!','no');

    }

    public static function save_plugin_file_content()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $path=getPost('path','');
        $file=getPost('file','');
        $content=getPost('content','');
        $plugin_name=getPost('plugin_name','');

        $savePath=PLUGINS_PATH.$plugin_name.'/'.$path.$file;

        // print_r($savePath);die();

        if(file_exists($savePath))
        {
            create_file($savePath,$content);
        }

        echo responseData('Done!','no');

    }

    public static function plugin_deactivate()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        $plugin_name=getPost('plugin_name','');
        $db=new Database(); 
        

        $db->nonquery("delete from plugin_mst where plugin_dir='".$plugin_name."'");        
        $db->nonquery("delete from plugin_hook_data where plugin_dir='".$plugin_name."'");        

        $dbPath=PLUGINS_PATH.$plugin_name.'/sql_uninstall.sql';
        $requireFile=PLUGINS_PATH.$plugin_name.'/deactivate.php';

        // if(file_exists($dbPath))
        // {
        //     $content=file_get_contents($dbPath);

        //     if(isset($content[5]))
        //     {
        //          $db->nonquery(trim($content));   
        //     } 
           
        // }
        if(file_exists($requireFile))
        {
            require_once($requireFile);
        }

        // before_load_hook();

        // self::system_cache_clear();

        clear_hook();

        saveActivities('plugin_deactivate','Deactivate plugin '.$plugin_name,$username);


        echo responseData('Done!','no');
    }

    public static function import_theme()
    {
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $db=new Database(); 
        $list_files=getPost('list_files','');

        $splitLine=explode('|||',$list_files);

        $total=count($splitLine);

        $fileExt='';

        $savePath=ROOT_PATH.'public/uploads/';

        $filePath='';

        $fileName='';

        for ($i=0; $i < $total; $i++) { 

            $filePath=ROOT_PATH.str_replace(SITE_URL,'',$splitLine[$i]);

            $fileName=explode('.',basename($splitLine[$i]));

            if(!preg_match('/\.zip$/i',$filePath))
            {
                continue;
            }

            if(file_exists($filePath))
            {
                // copy($filePath,$savePath.'file_'.$i.'.zip');

                $zip = new Unzip($filePath);

                $zip->setTargetLocation(ROOT_PATH.'contents/themes/');

                $zip->extract();

                if(is_dir(ROOT_PATH.'contents/themes/'.$fileName[0]))
                {
                    rmdir(ROOT_PATH.'contents/themes/'.$fileName[0]);
                }
            }
            
        }

        echo responseData('Done!','no');
    }

    public static function import_plugin()
    {
        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $db=new Database(); 
        $list_files=getPost('list_files','');

        $splitLine=explode('|||',$list_files);

        $total=count($splitLine);

        $fileExt='';

        $savePath=ROOT_PATH.'public/uploads/';

        $filePath='';

        $fileName='';

        for ($i=0; $i < $total; $i++) { 

            $filePath=ROOT_PATH.str_replace(SITE_URL,'',$splitLine[$i]);

            $fileName=explode('.',basename($splitLine[$i]));

            if(!preg_match('/\.zip$/i',$filePath))
            {
                continue;
            }

            if(file_exists($filePath))
            {
                // copy($filePath,$savePath.'file_'.$i.'.zip');

                $zip = new Unzip($filePath);

                $zip->setTargetLocation(ROOT_PATH.'contents/plugins/');

                $zip->extract();

                if(is_dir(ROOT_PATH.'contents/plugins/'.$fileName[0]))
                {
                    rmdir(ROOT_PATH.'contents/plugins/'.$fileName[0]);
                }
            }
            
        }

        echo responseData('Done!','no');
    }

    public static function theme_activate()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }
        $db=new Database(); 
        $theme_name=getPost('theme_name','');

        $parse=parse_url(SITE_URL);
        setcookie('cf_theme', '', time()- 360000,'/', $parse['host']);

        $queryStr="";
        $queryStr.="delete from theme_mst;";
        $queryStr.="delete from theme_hook_data;";
        $queryStr.="insert into theme_mst(theme_dir,status,user_id) VALUES";
        $queryStr.="('".$theme_name."','1','".$username."');";
        $queryStr.="update setting_data set key_value='".$theme_name."' where key_c='default_theme';";

        $db->nonquery($queryStr);  
     
        $dbPath=THEMES_PATH.$theme_name.'/sql_install.sql';
        $requireFile=THEMES_PATH.$theme_name.'/activate.php';

        // if(file_exists($dbPath))
        // {
        //     $content=file_get_contents($dbPath);

        //     if(isset($content[5]))
        //     {
        //          $db->nonquery(trim($content));   
        //     }
           
        // }
        if(file_exists($requireFile))
        {
            require_once($requireFile);
        }
        // before_load_hook();

        // self::system_cache_clear();

        clear_hook();

        saveActivities('theme_activate','Activate theme '.$theme_name,$username);

        echo responseData('Done!','no');

    }

    public static function theme_deactivate()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        $theme_name=getPost('theme_name','');
        $db=new Database(); 
        $db->nonquery("delete from theme_mst where theme_dir='".$theme_name."'");        
        
        $queryStr="";
        $queryStr.="delete from theme_hook_data where theme_dir='".$theme_name."';";
        $queryStr.="update setting_data set key_value='basic' where key_c='default_theme';";

        $db->nonquery($queryStr);   
     
        $dbPath=THEMES_PATH.$theme_name.'/sql_uninstall.sql';
        $requireFile=THEMES_PATH.$theme_name.'/deactivate.php';

        // if(file_exists($dbPath))
        // {
        //     $content=file_get_contents($dbPath);

        //     if(isset($content[5]))
        //     {
        //          $db->nonquery(trim($content));   
        //     } 
           
        // }        
        if(file_exists($requireFile))
        {
            require_once($requireFile);
        }

        // before_load_hook();

        // self::system_cache_clear();

        clear_hook();

        saveActivities('theme_deactivate','Deactivate theme '.$theme_name,$username);

        echo responseData('Done!','no');
    }

    public static function insert_new_setting()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false

        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $insertData=array(
            'key_c'=>addslashes(getPost('key_c')),
            'title'=>addslashes(getPost('title')),
            'key_value'=>addslashes(getPost('key_value','')),
        );
        $db=new Database(); 
        $queryStr=arrayToInsertStr('setting_data',$insertData);

        $db->nonquery($queryStr);

        $savePath=PUBLIC_PATH.'caches/system_setting.php';

        if(file_exists($savePath))
        {
            unlink($savePath);
        }

        clear_hook();
      
        
        echo responseData('Done!');
        
    }

    
    public static function system_cache_clear()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        clear_hook();

        $savePath=PUBLIC_PATH.'caches/system_setting.php';

        if(file_exists($savePath))
        {
            unlink($savePath);
        }

        echo responseData('Done!','no');
    }

    public static function system_setting_update()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $save_data=getPost('save_data','');
        $db=new Database(); 
        // print_r($save_data);die();

        if(!isset($save_data[1]))
        {
            echo responseData('Data not valid!','yes');
        }
        
        $jsonDecode=json_decode($save_data,true);

        $queryStr="";

        $listKey=array_keys($jsonDecode);

        $total=count($listKey);

        for ($i=0; $i < $total; $i++) { 
            $queryStr.="update setting_data set key_value='".$jsonDecode[$listKey[$i]]."' where key_c='".$listKey[$i]."';";
        }

        $db->nonquery($queryStr);   

        $savePath=PUBLIC_PATH.'caches/system_setting.php';

        if(file_exists($savePath))
        {
            unlink($savePath);
        }

        clear_hook();

        echo responseData('Save changes successfull!','no');
    }

    // End Upload media

    //Post back
    public static function post_back($type=1,$content="")
    {
        //Load all hooked functions...
        //send Type + Content to hooked functions

    }
    
    public static function theme_post_back()
    {
        //Load all hooked functions...
        //send Type + Content to hooked functions
        $themeName=getGet('theme','');
        $funcName=getGet('func','');

        $postBackPath=THEMES_PATH.$themeName.'/postback.php';

        $result='ERROR';

        if(file_exists($postBackPath))
        {
            require_once($postBackPath);

            $result=$funcName();
        }
        
        echo responseData($result,'no');
    }

    public static function plugin_post_back()
    {
        //Load all hooked functions...
        //send Type + Content to hooked functions
        $pluginName=getGet('plugin','');
        $funcName=getGet('func','');

        $postBackPath=PLUGINS_PATH.$pluginName.'/postback.php';

        $result='ERROR';

        if(file_exists($postBackPath))
        {
            require_once($postBackPath);

            $result=$funcName();
        }
        
        echo responseData($result,'no');        
    }
    
    public static function theme_api()
    {
        //Load all hooked functions...
        //send Type + Content to hooked functions
        $themeName=getGet('theme','');
        $funcName=getGet('func','');

        $postBackPath=THEMES_PATH.$themeName.'/api.php';

        $result='ERROR';

        if(file_exists(THEMES_PATH.$themeName.'/core.php'))
        {
            require_once(THEMES_PATH.$themeName.'/core.php');
        }

        if(file_exists($postBackPath))
        {
            require_once($postBackPath);

            $result=$funcName();
        }
        
        echo responseData($result,'no');
    }

    public static function plugin_api()
    {
        //Load all hooked functions...
        //send Type + Content to hooked functions
        $pluginName=getGet('plugin','');
        $funcName=getGet('func','');

        $postBackPath=PLUGINS_PATH.$pluginName.'/api.php';

        $result='ERROR';

        if(file_exists(PLUGINS_PATH.$pluginName.'/core.php'))
        {
            require_once(PLUGINS_PATH.$pluginName.'/core.php');

        }

        if(file_exists($postBackPath))
        {
            require_once($postBackPath);

            $result=$funcName();
        }
        
        echo responseData($result,'no');        
    }

    // End post back

    // Plugin

    public static function plugin_install()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $save_data=getPost('save_data','');

    }    

    public static function plugin_uninstall()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $save_data=getPost('save_data','');
        
    }    

    public static function theme_install()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $save_data=getPost('save_data','');

    }    

    public static function theme_uninstall()
    {
        //Kiểm tra Cookie, nếu ko đăng nhập thì trả về false


        $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

        try {
            isValidAccessAPI();
        } catch (\Exception $e) {
            echo responseData($e->getMessage(),'yes');return false;
        }

        $save_data=getPost('save_data','');
        
    }    

    public static function start_cronjob()
    {
        load_hook('cronjob');
    }
}