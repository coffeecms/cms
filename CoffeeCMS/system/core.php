<?php

function get_text_by_lang($inputStr='',$method='frontend')
{
    $langDir='en';

    if($method=='admin')
    {
        $langDir=Configs::$_['system_admin_lang'];
    }
    else
    {
        $langDir=Configs::$_['frontend_lang'];
    }

    if(!isset(Configs::$_['lang'][$langDir]))
    {
        Configs::$_['lang'][$langDir]=[];
    }

    if(!isset(Configs::$_['lang'][$langDir][$method]))
    {
        Configs::$_['lang'][$langDir][$method]=[];

    }

    $langPath=SYSTEM_PATH.'lang/'.$langDir.'/'.$method.'.php';

    if(file_exists($langPath))
    {
        require_once($langPath);
    }
    // print_r($inputStr);die();


    
    if(isset(Configs::$_['lang'][$langDir][$method][$inputStr]))
    {
        $inputStr=Configs::$_['lang'][$langDir][$method][$inputStr];
    }
    return $inputStr;
}

function load_hook_admin_panel($hook_zone,$inputData='')
{
    $savePath=PUBLIC_PATH.'caches/admin_hooks.php';

    if(!file_exists($savePath))
    {
        before_load_hook();
    }

    require_once($savePath);

    $result='';
    $funcNM='';

    if(isset(Configs::$_['hooks'][$hook_zone]))
    {
        $total=count(Configs::$_['hooks'][$hook_zone]);

        for ($i=0; $i < $total; $i++) { 
            $funcNM=Configs::$_['hooks'][$hook_zone][$i];

            if(function_exists($funcNM))
            {
                $result=$funcNM($inputData);
            }
        }
    }

    return $result;
}

function load_hook($hook_zone,$inputData='',$contentData=[])
{
    $savePath=PUBLIC_PATH.'caches/hooks.php';

    if(!file_exists($savePath))
    {
        before_load_hook();
    }

    require_once($savePath);

    $result=$inputData;
    $funcNM='';

    if(isset(Configs::$_['hooks'][$hook_zone]))
    {
        $total=count(Configs::$_['hooks'][$hook_zone]);

        for ($i=0; $i < $total; $i++) { 
            $funcNM=Configs::$_['hooks'][$hook_zone][$i];

            if(function_exists($funcNM))
            {
                $result=$funcNM($result,$contentData);
            }
        }
    }

    return $result;
}

function clear_hook()
{
    $savePath=PUBLIC_PATH.'caches/hooks.php';
    
    if(file_exists($savePath))
    {
        unlink($savePath);
    }

    $savePath=PUBLIC_PATH.'caches/admin_hooks.php';
    
    if(file_exists($savePath))
    {
        unlink($savePath);
    }

    $savePath=PUBLIC_PATH.'caches/shortcodes.php';
    
    if(file_exists($savePath))
    {
        unlink($savePath);
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


}

function clear_frontend_cache()
{
    $savePath=PUBLIC_PATH.'caches/categories.php';
    
    if(file_exists($savePath))
    {
        unlink($savePath);
    } 

    $savePath=PUBLIC_PATH.'caches/frontend_menu.php';
    
    if(file_exists($savePath))
    {
        unlink($savePath);
    } 
    
    
}

function before_load_hook()
{
    $savePath=PUBLIC_PATH.'caches/hooks.php';

    if(!file_exists($savePath))
    {
        $db=new Database();
        $queryStr=$db->query("select * from plugin_mst where status='1'");

        $total=count($queryStr);
        
        $hookFile='';
        
        $contents='';
        
        for ($i=0; $i < $total; $i++) { 
            $hookFile=PLUGINS_PATH.$queryStr[$i]['plugin_dir'].'/hooks.php';
            
            if(file_exists($hookFile))
            {
                $contents.="\r\n".trim(file_get_contents($hookFile));
                $contents=preg_replace('/^<\?php(.*?)$/s','$1',$contents);
                $contents=preg_replace('/\s+<\?php(.*?)$/s','$1',$contents);
            }
            
        }

        $queryStr=$db->query("select * from theme_mst where status='1'");
        
        $total=count($queryStr);
        
        for ($i=0; $i < $total; $i++) { 
            $hookFile=THEMES_PATH.$queryStr[$i]['theme_dir'].'/hooks.php';
            
            if(file_exists($hookFile))
            {
                $contents.=trim(file_get_contents($hookFile));
                $contents=preg_replace('/^\<\?php(.*?)$/s','$1',$contents);
                $contents=preg_replace('/^\}\<\?php(.*?)$/s','}$1',$contents);
                $contents=preg_replace('/\s+\}\<\?php(.*?)$/s','}$1',$contents);
            }
            
        }
        
        create_file($savePath,"<?php ".$contents);
    }

    before_load_shortcode();

}

function add_hook($hook_zone,$func_name)
{
    if(!isset(Configs::$_['hooks'][$hook_zone]))
    {
        Configs::$_['hooks'][$hook_zone]=[];
    }

    array_push(Configs::$_['hooks'][$hook_zone],$func_name);
}

function download($filePath = '', $fileName = null)
{
    if (file_exists($filePath)) {

        $fileName = is_null($fileName) ? basename($filePath) : $fileName;

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $fileName);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        ob_clean();
        flush();
        readfile($filePath);

    }

    return false;

}

function load_shortcode($inputData='')
{
    $savePath=PUBLIC_PATH.'caches/shortcodes.php';

    if(!file_exists($savePath))
    {
        before_load_shortcode();
    }

    require_once($savePath);

    $result='';
    $funcNM='';

    $total=count(Configs::$_['shortcodes']);

    for ($i=0; $i < $total; $i++) { 
        $funcNM=Configs::$_['shortcodes'][$i];

        if(function_exists($funcNM))
        {
            $result=$funcNM($inputData);
        }
    }

    return $result;
}

function before_load_shortcode()
{
    $savePath=PUBLIC_PATH.'caches/shortcodes.php';

    if(!file_exists($savePath))
    {
        $db=new Database();
        $queryStr=$db->query("select * from plugin_mst where status='1'");

        $total=count($queryStr);
        
        $hookFile='';
        
        $contents='';
        
        for ($i=0; $i < $total; $i++) { 
            $hookFile=PLUGINS_PATH.$queryStr[$i]['plugin_dir'].'/shortcodes.php';
            
            if(file_exists($hookFile))
            {
                $contents.=trim(file_get_contents($hookFile));
                $contents=preg_replace('/^<\?php(.*?)$/s','$1',$contents);
                $contents=preg_replace('/\s+<\?php(.*?)$/s','$1',$contents);
            }
            
        }

        $queryStr=$db->query("select * from theme_mst where status='1'");
        
        $total=count($queryStr);
        
        for ($i=0; $i < $total; $i++) { 
            $hookFile=THEMES_PATH.$queryStr[$i]['theme_dir'].'/shortcodes.php';
            
            if(file_exists($hookFile))
            {
                $contents.=trim(file_get_contents($hookFile));
                $contents=preg_replace('/^\<\?php(.*?)$/s','$1',$contents);
                $contents=preg_replace('/^\}\<\?php(.*?)$/s','}$1',$contents);
                $contents=preg_replace('/\s+\}\<\?php(.*?)$/s','}$1',$contents);
            }
            
        }
        
        create_file($savePath,"<?php ".$contents);
    }

}


function add_shortcode($func_name)
{
    array_push(Configs::$_['shortcodes'],$func_name);
}

function parse_shortcode_data($scName='',$inputData='')
{
    $result=array();
    // Check if it is openclose
    if(!preg_match_all('/(\['.$scName.'(.*?)\](.*?)\[\/'.$scName.'\])/is', $inputData,$match))
    {
        // Alone parse process
        if(preg_match_all('/(\['.$scName.'(.*?)\])/i', $inputData,$match))
        {
            $listReal=$match[1];

            $listAttr=$match[2];	
            
            $total=count($listReal);

            for ($i=0; $i < $total; $i++) { 

                $result[$i]['source']=$listReal[$i];

                $result[$i]['attr']=array();

                $attr=$listAttr[$i];

                if(isset($attr[1]))
                {
                    // die($attr);
                    if(preg_match_all('/(\w+)\=(\'|\")(.*?)(\'|\")/i', $attr, $matchAttrs))
                    {

                        $totalAttr=count($matchAttrs[1]);

                        for ($j=0; $j < $totalAttr; $j++) { 
                            $theKey=$matchAttrs[1][$j];

                            $result[$i]['attr'][$theKey]=$matchAttrs[3][$j];
                        }
                    }
                }

            }							
        }
       
    }	
    else
    {
        // Openclose parse process


        $listReal=$match[1];

        $listAttr=$match[2];

        $listVal=$match[3];

        $total=count($listReal);

        // print_r($match[2]);

        for ($i=0; $i < $total; $i++) { 

            $result[$i]['source']=$listReal[$i];

            $result[$i]['value']=trim($listVal[$i]);

            $result[$i]['attr']=array();

            $attr=trim($listAttr[$i]);

       
            if(isset($attr[1]))
            {
                if($attr[0]=='=')
                {
                    $attr="value='".substr($attr,1,strlen($attr))."'";
                }
                // die($attr);
                if(preg_match_all('/(\w+)\=(\'|\")(.*?)(\'|\")/i', $attr, $matchAttrs))
                {
                    // print_r($matchAttrs);die();

                    $totalAttr=count($matchAttrs[1]);

                    for ($j=0; $j < $totalAttr; $j++) { 
                        $theKey=$matchAttrs[1][$j];

                        $result[$i]['attr'][$theKey]=$matchAttrs[3][$j];
                    }
                }
            }

        }

    }

    return $result;
}

function genUnionTables($tabletName,$from=1,$to=10)
{
    $result='select * from (';

    $randName=randAlpha(3);

    $from=(int)$from;
    $to=(int)$to;

    $li='';

    for ($i=$from; $i <= $to; $i++) { 
        $li.=' select * from '.$tabletName.'_'.$i.' union';
    }

    $li=substr($li,0,strlen($li)-5);

    $result=$result.$li.') '.$randName;

    return $result;
}

function increase_post_view($post_c='')
{
    if(isset($post_c[2]))
    {
        $queryStr='';

        $queryStr="update post_data set views=views+1 where post_c='".$post_c."';";
        $queryStr.=" insert into post_view_data(post_c,ip_add,user_agent) VALUES";
        $queryStr.=" ('".$post_c."','".$_SERVER['REMOTE_ADDR']."','".$_SERVER['HTTP_USER_AGENT']."');";

        $db=new Database();
        $db->nonquery($queryStr);
    }
}

function increase_post_tag_view($tag='')
{
    if(isset($tag[1]))
    {
        $queryStr='';

        $queryStr.=" insert into post_tag_view_data(tag) VALUES";
        $queryStr.=" ('".strtolower(trim($tag))."');";

        $db=new Database();
        $db->nonquery($queryStr);
    }
}


function add_admin_menu($menuData=[],$parent_menu_c='')
{
    $id=newID(8);
    $menuData['menu_id']=$id;
    $menuData['title']=addslashes($menuData['title']);
    
    $queryStr=arrayToInsertStr('admin_menu_data',$menuData);

    $db=new Database();
    $db->nonquery($queryStr);   

    return $id;
}

function add_permission($title)
{
    $permission_c=newID(8);

    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';

    $insertData=array(
        'permission_c'=>$permission_c,
        'title'=>addslashes($title),
        'status'=>'1',
        'user_id'=>$username
    );

    $queryStrPer='';

    $queryStr=arrayToInsertStr('permissions_mst',$insertData);

    $db=new Database();
    $db->nonquery($queryStr); 
    
    return true;
}

function redirect_to($reUrl = '')
{
    $url = $reUrl;
    if (!preg_match('/http/i', $reUrl)) {
        $url = SITE_URL . $reUrl;
    }
    
    // header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: " . $url);

    die();
}

function isLogined()
{
    $result=false;

    $ip_add=$_SERVER['REMOTE_ADDR'];

    $user_agent=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';

    $sessionid=md5($ip_add.$user_agent);

    $savePath=ROOT_PATH.'public/login/'.$sessionid.'.php';    

    if(isset(Configs::$_['user_data']['user_id']) && Configs::$_['user_data']['user_id']=='GUEST')
    {
        if(file_exists($savePath))
        {
            unlink($savePath);
        }
    }
    
    if(file_exists($savePath))
    {
        $result=true;
        require_once($savePath);

        $_COOKIE['cf_u']=Configs::$_['cf_u'];
        $_COOKIE['cf_p']=Configs::$_['cf_p'];

        user_load_data_when_logined();
    }

    return $result;
}


function removeLoginSession()
{
    $ip_add=$_SERVER['REMOTE_ADDR'];

    $user_agent=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';

    $sessionid=md5($ip_add.$user_agent);

    $savePath=ROOT_PATH.'public/login/'.$sessionid.'.php';


    if(file_exists($savePath))
    {

        
        unlink($savePath);
    }

}
function createLoginSession($user,$pass)
{
    $ip_add=$_SERVER['REMOTE_ADDR'];

    $user_agent=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';

    $sessionid=md5($ip_add.$user_agent);

    $savePath=ROOT_PATH.'public/login/'.$sessionid.'.php';

    $content='';
    $content.="Configs::\$_['cf_u']='".$user."';";
    $content.="Configs::\$_['cf_p']='".$pass."';";

    create_file($savePath,"<?php ".$content);
}

function user_has_permission($permission_c='')
{
    $result=false;

    if(isset(Configs::$_['user_permissions'][$permission_c]))
    {
        $result=true;
    }

    return $result;
}

function strtodate($format,$dateStr)
{
    // $result=date('d M, Y',strtotime($date_added));
    $result=date($format,strtotime($dateStr));

    return $result;
}

function user_load_data_when_logined()
{
    $db=new Database();
    $queryStr='';
    $queryStr.="select a.user_id,a.username,a.fullname,a.group_c,a.level_c,b.title as group_title,c.title as level_title ";
    $queryStr.=" from user_mst a left join user_group_mst b ON a.group_c=b.group_c ";
    $queryStr.=" left join user_level_mst c ON a.level_c=c.level_id ";
    $queryStr.=" where (a.username='".Configs::$_['cf_u']."' OR a.email='".Configs::$_['cf_u']."') AND a.password='".Configs::$_['cf_p']."'";

    $result=$db->query($queryStr);

    if(isset($result[0]))
    {
        load_user_group_permissions_data();

        $total=count(Configs::$_['user_group_permissions'][$result[0]['group_c']]);

        $listPer=[];

        $group_c=$result[0]['group_c'];

        for ($i=0; $i < $total; $i++) { 
            Configs::$_['user_permissions'][Configs::$_['user_group_permissions'][$group_c][$i]]='1';
        }

        Configs::$_['user_data']=$result[0];

        load_hook('after_load_user_data');

    }
}

function load_user_group_permissions_data()
{
    $savePath=PUBLIC_PATH.'caches/user_group_permissions.php';

    if(!file_exists($savePath))
    {
        $queryStr="";

        $db=new Database();

        $queryStr.="SELECT a.group_c,a.title,b.permission_c ";
        $queryStr.=" FROM user_group_mst a inner join group_permission_data b ";
        $queryStr.=" ON a.group_c=b.group_c ";

        $result=$db->query($queryStr);

        $listGroups=$db->query("select * from user_group_mst");

        $total=count($result);

        $contents='';
    
        $contents.="Configs::\$_['user_group_permissions']=[];";

        for ($i=0; $i < count($listGroups); $i++) { 
            $contents.="Configs::\$_['user_group_permissions']['".trim($listGroups[$i]['group_c'])."']=[];";
        }

        for ($i=0; $i < $total; $i++) { 
            // Configs::$_[$result[$i]['key_c']]=$result[$i]['key_value'];
            $contents.="Configs::\$_['user_group_permissions']['".trim($result[$i]['group_c'])."'][]='".$result[$i]['permission_c']."';";
        }

        create_file($savePath,"<?php ".$contents);
    }

    load_user_group_menu_permissions_data();

    require_once($savePath);

}

function has_exists_user($username)
{
    $savePath=PUBLIC_PATH.'caches/users/'.$username.'.php';

    $result=false;

    if(!file_exists($savePath))
    {
        $queryStr="";

        $db=new Database();

        $queryStr.="SELECT * from user_mst where (username='".$username."' OR email='".$username."') ";

        $result=$db->query($queryStr);
    
        $contents.="Configs::\$_['user_'".$username."]='".$result[0]['user_id']."';";

        create_file($savePath,"<?php ".$contents);

        $result=true;
    }

    require_once($savePath);

    return $result;
}

function load_shorturl_cache($shortUrlCode='')
{
    if(!isset($shortUrlCode[2]))
    {
        return false;
    }

    $savePath=PUBLIC_PATH.'caches/short_urls/'.$shortUrlCode.'.php';

    if(!file_exists($savePath))
    {
        $queryStr="";

        $db=new Database();

        $queryStr.="SELECT * from short_url_data where code='".$shortUrlCode."' AND status='1' ";

        $result=$db->query($queryStr);

        if(is_array($result) && count($result) > 0)
        {
            $contents='';
    
            $contents.="Configs::\$_['short_url_code']='".$shortUrlCode."';";
            $contents.="Configs::\$_['short_url_target']='".$result[0]['target_url']."';";

            create_file($savePath,"<?php ".$contents);
        }

    }

    require_once($savePath);
}

function post_exists($friendlyUrl)
{
    $result=false;

    load_post_data($friendlyUrl);

    if(isset(Configs::$_['post_data']) && isset(Configs::$_['post_data']['post_c']))
    {
        $result=true;
    }

    return $result;
}

function load_post_data($friendlyUrl)
{
    if(!isset($friendlyUrl[2]))
    {
        return false;
    }

    $savePath=PUBLIC_PATH.'caches/posts/'.md5($friendlyUrl).'.php';

    if(!file_exists($savePath))
    {
        $queryStr="";

        $db=new Database();

        $queryStr.="SELECT a.*,b.username,c.title as category_title,c.friendly_url as category_friendly_url  from post_data as a join user_mst as b ON a.user_id=b.user_id ";
        $queryStr.=" join category_mst as c ON a.category_c=c.category_c ";
        $queryStr.=" where a.friendly_url='".$friendlyUrl."' AND a.status='1' ";

        $result=$db->query($queryStr);

        if(is_array($result) && count($result) > 0)
        {
            $contents='';
    
            $contents.="Configs::\$_['post_data']=[];";
            $contents.="Configs::\$_['post_data']['post_c']='".$result[0]['post_c']."';";
            $contents.="Configs::\$_['post_data']['title']='".addslashes($result[0]['title'])."';";
            $contents.="Configs::\$_['post_data']['content']='".addslashes($result[0]['content'])."';";
            $contents.="Configs::\$_['post_data']['descriptions']='".addslashes($result[0]['descriptions'])."';";
            $contents.="Configs::\$_['post_data']['keywords']='".addslashes($result[0]['keywords'])."';";
            $contents.="Configs::\$_['post_data']['thumbnail']='".addslashes($result[0]['thumbnail'])."';";
            $contents.="Configs::\$_['post_data']['tags']='".addslashes($result[0]['tags'])."';";
            $contents.="Configs::\$_['post_data']['post_type']='".addslashes($result[0]['post_type'])."';";
            $contents.="Configs::\$_['post_data']['parent_post_c']='".addslashes($result[0]['parent_post_c'])."';";
            $contents.="Configs::\$_['post_data']['views']='".addslashes($result[0]['views'])."';";
            $contents.="Configs::\$_['post_data']['category_c']='".addslashes($result[0]['category_c'])."';";
            $contents.="Configs::\$_['post_data']['user_id']='".addslashes($result[0]['user_id'])."';";
            $contents.="Configs::\$_['post_data']['ent_dt']='".addslashes($result[0]['ent_dt'])."';";
            $contents.="Configs::\$_['post_data']['upd_dt']='".addslashes($result[0]['upd_dt'])."';";
            $contents.="Configs::\$_['post_data']['username']='".addslashes($result[0]['username'])."';";
            $contents.="Configs::\$_['post_data']['category_title']='".addslashes($result[0]['category_title'])."';";
            $contents.="Configs::\$_['post_data']['category_friendly_url']='".addslashes($result[0]['category_friendly_url'])."';";

            create_file($savePath,"<?php ".$contents);
        }

    }

    require_once($savePath);
    
}

function load_user_group_menu_permissions_data()
{
    $savePath=PUBLIC_PATH.'caches/user_group_menu_permissions.php';

    if(!file_exists($savePath))
    {
        $queryStr="";

        $db=new Database();

        $queryStr.="SELECT a.group_c,a.title,b.menu_id ";
        $queryStr.=" FROM user_group_mst a inner join user_permission_menu_data b ";
        $queryStr.=" ON a.group_c=b.group_c ";

        $result=$db->query($queryStr);

        $listGroups=$db->query("select * from user_group_mst");

        $total=count($result);

        $contents='';
    
        $contents.="Configs::\$_['user_group_menu_permissions']=[];";

        for ($i=0; $i < count($listGroups); $i++) { 
            $contents.="Configs::\$_['user_group_menu_permissions']['".trim($listGroups[$i]['group_c'])."']=[];";
        }

        for ($i=0; $i < $total; $i++) { 
            // Configs::$_[$result[$i]['key_c']]=$result[$i]['key_value'];

            $contents.="Configs::\$_['user_group_menu_permissions']['".trim($result[$i]['group_c'])."']['".trim($result[$i]['menu_id'])."']='';";
        }

        create_file($savePath,"<?php ".$contents);
    }

    require_once($savePath);

    // print_r(Configs::$_['user_group_menu_permissions']);die();
}

function load_category_data_from_cache()
{
    $savePath=PUBLIC_PATH.'caches/categories.php';

    if(!file_exists($savePath))
    {
        $queryStr="";

        $db=new Database();

        $listCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')='' order by sort_order asc");

        $listSubCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')<>'' order by parent_category_c,sort_order asc");

        $contents='';
    
        $contents.="Configs::\$_['category_data']=[];";
        $contents.="Configs::\$_['sub_category_data']=[];";
        $contents.="Configs::\$_['category_data_json']='".json_encode($listCategories)."';";
        $contents.="Configs::\$_['sub_category_data_json']='".json_encode($listSubCategories)."';";

        create_file($savePath,"<?php ".$contents);
    }

    require_once($savePath);

    Configs::$_['category_data']=json_decode(Configs::$_['category_data_json'],true);
    Configs::$_['sub_category_data']=json_decode(Configs::$_['sub_category_data_json'],true);
}


function load_menu_data_from_cache()
{
    $savePath=PUBLIC_PATH.'caches/frontend_menu.php';

    if(!file_exists($savePath))
    {
        $queryStr="";

        $db=new Database();
        
        $listCategories=$db->query("select * from menu_data where ifnull(parent_menu_id,'')='' order by sort_order asc");
        
        $listSubCategories=$db->query("select * from menu_data where ifnull(parent_menu_id,'')<>'' order by parent_menu_id,sort_order asc");

        $contents='';
    
        $contents.="Configs::\$_['menu_data']=[];";
        $contents.="Configs::\$_['sub_menu_data']=[];";
        $contents.="Configs::\$_['menu_data_json']='".json_encode($listCategories)."';";
        $contents.="Configs::\$_['sub_menu_data_json']='".json_encode($listSubCategories)."';";

        create_file($savePath,"<?php ".$contents);
    }

    require_once($savePath);

    Configs::$_['menu_data']=json_decode(Configs::$_['menu_data_json'],true);
    Configs::$_['sub_menu_data']=json_decode(Configs::$_['sub_menu_data_json'],true);
}


function mergeContentFiles($inputFiles=[])
{
    $total=count($inputFiles);

    $result='';

    for ($i=0; $i < $total; $i++) { 
        $result.=file_get_contents(THEMES_PATH.Configs::$_['default_name'].'/'.$inputFiles[$i])+"\r\n";
    }

    return $result;
}

function loadSystemSetting()
{
    $savePath=PUBLIC_PATH.'caches/system_setting.php';

    if(!file_exists($savePath))
    {
        $db=new Database();
        $result=$db->query('select key_c,key_value from setting_data');
    
        $total=count($result);

        $contents='';
    
        for ($i=0; $i < $total; $i++) { 
            Configs::$_[$result[$i]['key_c']]=$result[$i]['key_value'];

            $contents.="Configs::\$_['".$result[$i]['key_c']."']='".$result[$i]['key_value']."';";
        }

        // print_r($contents);die();

        create_file($savePath,"<?php ".$contents);
    }

    require_once($savePath);

    load_hook('after_load_system_setting');

}

function useClass($className)
{
    //Only load from system/autoloads folder
    if(file_exists(SYSTEM_PATH.'autoloads/'.$className.'.php'))
    {
        require_once(SYSTEM_PATH.'autoloads/'.$className.'.php');
    }
}

function view($viewName,$variables=array())
{
	$result='';
	if(file_exists(Configs::$_['view_path'].$viewName.'.php'))
	{
		extract($variables);
		
		require_once(Configs::$_['view_path'].$viewName.'.php');

	}

	// return $result;
}

function base_url($addUrl='')
{
	$result=SITE_URL.$addUrl;

	return $result;
}

function register_plugin_shortcode_js($inputData=array())
{
    
    $addData=array(
        'code'=>'',
        'title'=>'',
        'css_embed'=>'',
        'html_embed'=>'',
        'js_embed'=>'',
        'thumbnail'=>'',
    );

    $htmlData=array(
        'code'=>'',
        'title'=>'',
        'thumbnail'=>'',
    );

    if(isset($inputData['code']))
    {
        $addData['code']=$inputData['code'];
        $htmlData['code']=$inputData['code'];
        $htmlData['thumbnail']=isset($inputData['thumbnail'])?$inputData['thumbnail']:'';
    }

    if(isset($inputData['title']))
    {
        $addData['title']=$inputData['title'];
        $htmlData['title']=$inputData['title'];
    }

    if(isset($inputData['css_embed']))
    {
        $addData['css_embed']=$inputData['css_embed'];

        array_push(Configs::$_['admin_head'], $inputData['css_embed']);

    }

    if(isset($inputData['html_embed']))
    {
        $addData['html_embed']=$inputData['html_embed'];

        array_push(Configs::$_['admin_head'], $inputData['html_embed']);

    }

    if(isset($inputData['js_embed']))
    {
        $addData['js_embed']=$inputData['js_embed'];

        array_push(Configs::$_['admin_head'], $inputData['js_embed']);

    }

    array_push(Configs::$admin_plugin_shortcode_js, $addData);

    $htmlData="<script>masterDB['plugin_shortcode'].push(".json_encode($htmlData).");</script>";
    array_push(Configs::$_['admin_head'], $htmlData);


}

// function render_plugins_shortcode_js()
// {
//     $li='';

//     $jsData=array();

//     $total=count(SettingFuncs::$admin_plugin_shortcode_js);

//     for ($i=0; $i < $total; $i++) { 
//         array_push($jsData, array(
//             'code'=>SettingFuncs::$admin_plugin_shortcode_js[$i]['code'],
//             'title'=>SettingFuncs::$admin_plugin_shortcode_js[$i]['title']
//         ));
//     }

//     return $jsData;
// }

function saveActivities($key_c,$content,$userid='Auto')
{


    $queryStr="";
    $queryStr.="insert into activities_data(activity_c,activity_content,user_id) VALUES";
    $queryStr.="('".$key_c."','".addslashes($content)."','".$userid."')";

    $db=new Database();
    $db->nonquery($queryStr);
    
}

//Render admin page & home page header/footer .css/.js files

function coffee_admin_head()
{
    $resultData='';

    $total=count(Configs::$_['admin_head']);

    for ($i=0; $i < $total; $i++) { 
        $replaces=array(
            '{{THEME_URL}}'=>THEMES_URL.Configs::$_['default_theme'].'/',
            '{{THEMES_URL}}'=>THEMES_URL,
            '{{SITE_URL}}'=>SITE_URL,
            '{{PLUGINS_URL}}'=>PLUGINS_URL,

        );

        Configs::$_['admin_head'][$i]=str_replace(array_keys($replaces),array_values($replaces),Configs::$_['admin_head'][$i]);
        
        if(preg_match('/.*?\.css$/i', Configs::$_['admin_head'][$i]))
        {
            $resultData.='<link rel="stylesheet" href="'.Configs::$_['admin_head'][$i].'?v='.date("is").'">'."\r\n";
        }            
        elseif(preg_match('/.*?\.js$/i', Configs::$_['admin_head'][$i]))
        {
            $resultData.='<script src="'.Configs::$_['admin_head'][$i].'?v='.date("is").'"></script>'."\r\n";
        }
        elseif(preg_match('/.*?\.txt$/i', Configs::$_['admin_head'][$i]))
        {
            if(is_file(Configs::$_['admin_head'][$i]))
            {
                $resultData.=file_get_contents(Configs::$_['admin_head'][$i]);
            }
        }
        else
        {


            $resultData.=Configs::$_['admin_head'][$i]."\r\n";
        }
        
    }

    echo $resultData;
} 

function coffee_content_hook($hook_zone)
{
    $resultData='';

    if(!isset(Configs::$_[$hook_zone]))
    {
        echo '';return false;
    }

    $total=count(Configs::$_[$hook_zone]);

    for ($i=0; $i < $total; $i++) { 
        $replaces=array(
            '{{THEME_URL}}'=>THEMES_URL.Configs::$_['default_theme'].'/',
            '{{THEMES_URL}}'=>THEMES_URL,
            '{{SITE_URL}}'=>SITE_URL,
            '{{ADMIN_URL}}'=>SITE_URL.'admin/',
            '{{PLUGINS_API_URL}}'=>SITE_URL.'api/plugin_api/',
            '{{THEMES_API_URL}}'=>SITE_URL.'api/theme_api/',
            '{{PLUGIN_PAGE_URL}}'=>SITE_URL.'admin/plugin_page_url',
            '{{THEME_PAGE_URL}}'=>SITE_URL.'admin/theme_page_url',
            '{{PLUGINS_URL}}'=>PLUGINS_URL,
        );

        Configs::$_[$hook_zone][$i]=str_replace(array_keys($replaces),array_values($replaces),Configs::$_[$hook_zone][$i]);
        
        $resultData.=Configs::$_[$hook_zone][$i]."\r\n";
        
    }

    echo $resultData;
} 
function coffee_admin_footer()
{
    $resultData='';

    $total=count(Configs::$_['admin_footer']);

    for ($i=0; $i < $total; $i++) { 

        if(preg_match('/.*?\.css$/i', Configs::$_['admin_footer'][$i]))
        {
            $resultData.='<link rel="stylesheet" href="'.THEMES_URL.Configs::$_['default_theme'].'/'.Configs::$_['admin_footer'][$i].'">'."\r\n";
        }            
        elseif(preg_match('/.*?\.js$/i', Configs::$_['admin_footer'][$i]))
        {
            $resultData.='<script src="'.THEMES_URL.Configs::$_['default_theme'].'/'.Configs::$_['admin_footer'][$i].'"></script>'."\r\n";
        }
        elseif(preg_match('/.*?\.txt$/i', Configs::$_['admin_footer'][$i]))
        {
            if(is_file(Configs::$_['admin_footer'][$i]))
            {
                $resultData.=file_get_contents(Configs::$_['admin_footer'][$i]);
            }
        }
        else
        {
            $resultData.=Configs::$_['admin_head'][$i]."\r\n";
        }
        
    }

    echo $resultData;
}    
function coffee_head()
{
    $resultData='';

    $total=count(Configs::$_['website_head']);

    for ($i=0; $i < $total; $i++) { 

        if(preg_match('/.*?\.css$/i', Configs::$_['website_head'][$i]))
        {
            $resultData.='<link rel="stylesheet" href="'.base_url().Configs::$_['website_head'][$i].'">'."\r\n";
        }            
        elseif(preg_match('/.*?\.js$/i', Configs::$_['website_head'][$i]))
        {
            $resultData.='<script src="'.base_url().Configs::$_['website_head'][$i].'"></script>'."\r\n";
        }
        elseif(preg_match('/.*?\.txt$/i', Configs::$_['website_head'][$i]))
        {
            if(is_file(Configs::$_['website_head'][$i]))
            {
                $resultData.=file_get_contents(Configs::$_['website_head'][$i]);
            }
        }
        else
        {
            $resultData.=Configs::$_['admin_head'][$i]."\r\n";
        }
        
    }

    echo $resultData;
}    
function coffee_footer()
{
    $resultData='';

    $total=count(Configs::$_['website_footer']);

    for ($i=0; $i < $total; $i++) { 

        if(preg_match('/.*?\.css$/i', Configs::$_['website_footer'][$i]))
        {
            $resultData.='<link rel="stylesheet" href="'.base_url().Configs::$_['website_footer'][$i].'">'."\r\n";
        }            
        elseif(preg_match('/.*?\.js$/i', Configs::$_['website_footer'][$i]))
        {
            $resultData.='<script src="'.base_url().Configs::$_['website_footer'][$i].'"></script>'."\r\n";
        }
        elseif(preg_match('/.*?\.txt$/i', Configs::$_['website_footer'][$i]))
        {
            if(is_file(Configs::$_['website_footer'][$i]))
            {
                $resultData.=file_get_contents(Configs::$_['website_footer'][$i]);
            }
        }
        else
        {
            $resultData.=Configs::$_['admin_head'][$i]."\r\n";
        }
    }

    echo $resultData;
}
//End render admin page & home page header/footer .css/.js files


function getLastCategoriesSortOrder()
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM category_mst where ifnull(parent_category_c,'')=''");

    return $result[0]['sort_order'];
}
function getLastSubCategoriesSortOrder()
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM category_mst where ifnull(parent_category_c,'')<>''");

    return $result[0]['sort_order'];
}
function getLastSubCategoriesSortOrderInParent($parent_category_c)
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM category_mst where parent_category_c='".$parent_category_c."'");

    return $result[0]['sort_order'];
}

function getLastMenuSortOrder()
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM menu_data where ifnull(parent_menu_id,'')=''");

    return $result[0]['sort_order'];
}
function getLastSubMenuSortOrder()
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM menu_data where ifnull(parent_menu_id,'')=''");

    return $result[0]['sort_order'];
}
function getLastSubMenuSortOrderInParent($parent_menu_id)
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM menu_data where parent_menu_id='".$parent_menu_id."'");
    
    return $result[0]['sort_order'];
}

function getLastAdminMenuSortOrder()
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM admin_menu_data where ifnull(parent_menu_id,'')=''");

    return $result[0]['sort_order'];
}
function getLastAdminSubMenuSortOrder()
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM admin_menu_data where ifnull(parent_menu_id,'')<>''");

    return $result[0]['sort_order'];
}
function getLastAdminSubMenuSortOrderInParent($parent_menu_id)
{
    $db=new Database();

    $result=$db->query("SELECT MAX(sort_order) as sort_order FROM admin_menu_data where parent_menu_id='".$parent_menu_id."'");

    return $result[0]['sort_order'];
}

function encrypt($pure_string,$secretKey='') 
{

    $secretKey=isset($secretKey[5])?$secretKey:ENCRYPT_SECRET_KEY;
        
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $secretKey, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);

    $encrypted_string=base64_encode($encrypted_string);

    return $encrypted_string;   
}

function decrypt($encrypted_string,$secretKey='') 
{
    $secretKey=isset($secretKey[5])?$secretKey:ENCRYPT_SECRET_KEY;

    $encrypted_string=base64_decode($encrypted_string);

    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $secretKey, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;

}

function genListNestedCategories($listCategories=array(),$listSubCategories=array())
{

    $result=array();

    $total=count($listCategories);
    $totalSub=count($listSubCategories);

    for ($i=0; $i < $total; $i++) { 
        if($listCategories[$i]['parent_category_c']==null || strlen($listCategories[$i]['parent_category_c'])==0)
        {
            array_push($result,$listCategories[$i]);
        }
        
        for ($j=0; $j < $totalSub; $j++) { 
            if($listCategories[$i]['category_c']==$listSubCategories[$j]['parent_category_c'])
            {
                $listSubCategories[$j]['title']=$listCategories[$i]['title'].' > '.$listSubCategories[$j]['title'];

                array_push($result,$listSubCategories[$j]);
            }
        }
    }

    return $result;
}

function genListNestedMenu($listCategories=array(),$listSubCategories=array())
{

    $result=array();

    $total=count($listCategories);
    $totalSub=count($listSubCategories);

    for ($i=0; $i < $total; $i++) { 
        if($listCategories[$i]['parent_menu_id']==null || strlen($listCategories[$i]['parent_menu_id'])==0)
        {
            array_push($result,$listCategories[$i]);
        }
        
        for ($j=0; $j < $totalSub; $j++) { 
            if($listCategories[$i]['menu_id']==$listSubCategories[$j]['parent_menu_id'])
            {
                $listSubCategories[$j]['title']=$listCategories[$i]['title'].' > '.$listSubCategories[$j]['title'];

                array_push($result,$listSubCategories[$j]);
            }
        }
    }

    return $result;
}

function getPost($varName,$defaultVal='')
{
    $result=isset($_POST[$varName])?$_POST[$varName]:$defaultVal;

    $result=($result==null)?$defaultVal:$result;

    $result=isset($result[0])?$result:$defaultVal;

    return $result;
}

function getGet($varName,$defaultVal='')
{

    // $vars=parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    $vars=parse_url(Configs::$_['uri'], PHP_URL_QUERY);

    parse_str($vars, $output);

    $result=isset($output[$varName])?$output[$varName]:$defaultVal;

    $result=($result==null)?$defaultVal:$result;

    $result=isset($result[0])?$result:$defaultVal;

    return $result;
}

function responseData($dataResponse,$errorStatus='no')
{
    header("Content-Type: application/json; charset=UTF-8");
    $result=array(
        'error'=>$errorStatus,
        'data'=>$dataResponse,
    );

    return json_encode($result);
}

function arrayToInsertStr($tabletName,$insertData)
{
    $listKey=array_keys($insertData);

    $total=count($listKey);

    $theKeys='';
    $theVal='';

    $queryStr='';

    if($total > 0)
    {
        for ($i=0; $i < $total; $i++) { 
            $theKeys.=$listKey[$i].',';

            if(strtoupper($insertData[$listKey[$i]])=='NOW()')
            {
                $theVal.=$insertData[$listKey[$i]].",";
            }
            else
            {
                $theVal.="'".$insertData[$listKey[$i]]."',";
            }
            
        }

        $theKeys=substr($theKeys,0,strlen($theKeys)-1);
        $theVal=substr($theVal,0,strlen($theVal)-1);

        $queryStr="insert into ".$tabletName."(".$theKeys.") VALUES(".$theVal.");";
    }

    return $queryStr;
}

function arrayToUpdateStr($tabletName,$insertData)
{
// $insertData=array(
//     'update'=>array(
//         'title'=>'test',
//         'title'=>'test',
//     ),
//     'where'=>array(
//         'id'=>"='123213213'",
//         'category_c'=>"='123213213'"
//     )
// );

    
    $listKey=array_keys($insertData['update']);

    $updateStr='';
    $whereStr='';

    $total=count($listKey);

    $theKeys='';
    $theVal='';

    $queryStr='';

    if($total > 0)
    {
        for ($i=0; $i < $total; $i++) {
            if(strtoupper($insertData['update'][$listKey[$i]])=='NOW()')
            {
                $updateStr.=$listKey[$i]."=NOW(),";
            }
            else
            {
                $updateStr.=$listKey[$i]."='".addslashes($insertData['update'][$listKey[$i]])."',";
            }
            
        }

        $updateStr=substr($updateStr,0,strlen($theKeys)-1);

        if(isset($insertData['where']))
        {
            $listKey=array_keys($insertData['where']);
            $total=count($listKey);

            if($total > 0)
            {
                for ($i=0; $i < $total; $i++) { 
                    $whereStr.=$listKey[$i].$insertData['where'][$listKey[$i]]." AND ";
                }

                $whereStr=substr($whereStr,0,strlen($whereStr)-4);
            }
        }
        
        $queryStr="update ".$tabletName." set ".$updateStr." where ".$whereStr.";";
    }

    return $queryStr;
}


function tagsToInsertStr($post_c,$tags='')
{
    $result=array();

    $queryStr="";

    if(isset($tags[1]))
    {
        $splitTags=explode(',',$tags);

        $total=count($splitTags);

        for ($i=0; $i < $total; $i++) { 
            $queryStr=arrayToInsertStr('post_tag_data',array(
                'post_c'=>$post_c,
                'tag'=>trim($splitTags[$i])
            ));

            array_push($result,$queryStr);
        }
    }

    return $result;
}

function isValidAccessAPI()
{

    $username=isset(Configs::$_['cf_u'])?Configs::$_['cf_u']:'';
    $password=isset(Configs::$_['password'])?Configs::$_['password']:'';
    $type=trim(getPost('type'));

    if(isset($type[0]))
    {
        if((int)$type==1)
        {
            if(!isset($username[2]))
            {
                throw new \Exception('Error 01: Data not valid!');
            }

            user_load_data_when_logined();
        }
        if((int)$type==2)
        {
        // $username=isset(Configs::$_['cf_u'])?Configs::$_['cf_u']:'';
        // $password=isset(Configs::$_['password'])?Configs::$_['password']:'';

            if(!isset($username[2]) && !isset($password[2]))
            {
                throw new \Exception('Error 02: Data not valid!');
            }
        }

    }
    else
    {
        throw new \Exception('Error 03: Data not valid!');
    }

}

function convertToSize($size)
{
//convert(memory_get_usage(true)); // 123 kb

    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

function stripUnicode($str)
{
    if (!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ|Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
    );
    foreach ($unicode as $nonUnicode => $uni) $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    return $str;
}
function friendlyString($inputStr='',$type='-')
{
    if(!isset($inputStr[2]))
    {
        return $inputStr;
    }

// $retext=preg_replace('/\U/i', '', $inputStr);

    $retext=stripUnicode($inputStr);

    preg_match_all('/([a-zA-Z0-9]+)/i', $retext,$matches);

    $retext=implode($type, $matches[1]);

    return $retext;
}   




function utf8ToLower($inputData)
{
    $inputData=mb_convert_case(trim($inputData), MB_CASE_LOWER, "UTF-8");
}

function utf8ToUpper($inputData)
{
    $inputData=mb_convert_case(trim($inputData), MB_CASE_UPPER, "UTF-8");
}

function utf8ToTitle($inputData)
{
    $inputData=mb_convert_case(trim($inputData), MB_CASE_TITLE, "UTF-8");
}

function newID($len = 24)
{
    $str_start = '123456123456789123456789123456789123456789789112345678912345678912345678912345671234567891234567891234567891234567898923456789123456789123456789';
    $str = '012010123456789234560123450123456789234560123456789789345012345601234567892345601234567897893450123456678978934501234567896789';

    $str_start = substr(str_shuffle($str_start), 0, $len);
    $str = substr(str_shuffle($str), 0, $len);

    return $str_start[0].$str;
}
//  function newCategoryID()
// {
//     $str = self::newID('13'.22);

//     return $str;
// }
//  function newPageID()
// {
//     $str = self::newID('12'.22);

//     return $str;
// }
//  function newPostID()
// {
//     $str = self::newID('11'.22);

//     return $str;
// }
//  function newUserID()
// {
//     $str = self::newID('14'.22);

//     return $str;
// }
//  function newGroupID()
// {
//     $str = self::newID('15'.22);

//     return $str;
// }

function strip_tags_blacklist($html, $tags) {
    // print_r($tags);die();
    foreach ($tags as $tag) {
        $regex = '#<\s*' . $tag . '[^>]*>.*?<\s*/\s*'. $tag . '>#msi';
        $html = preg_replace($regex, '', $html);
    }
    return $html;
}

function randNumber($len = 10)
{
    $str = '012010123456789234560123450123456789234560123456789789345012345601234567892345601234567897893450123456678978934501234567896789';

    $str = substr(str_shuffle($str), 0, $len);

    return $str;

}

function randAlpha($len = 10)
{
    $str = 'abcdefghijklmnopfghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUqrstufghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $str = substr(str_shuffle($str), 0, $len);

    return $str;

}

function randText($len = 10)
{
    $str = 'abcdefghijkl0123456789mnopqrstuvwxyzhijklmnopqrs0123456789tuvwxyzABCDEFGHIJKLM0123456789NOPQRSTUVWXYZ01234567ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    $str = substr(str_shuffle($str), 0, $len);

    return $str;

}
// function download($filePath,$fileName='')
// {
//     $filePath=trim($filePath);
   
//     if(!preg_match('/([a-zA-Z0-9_\-\s\w]+)\.(\w+)$/i', $filePath,$match))
//     {
//         return false;
//     }

//     $fileName=friendlyString($match[1]).'.'.$match[2];
        
//     header('Content-Description: File Transfer');
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename='.$fileName);
//     header('Content-Transfer-Encoding: binary');
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//     header('Pragma: public');
//     header('Content-Length: ' . filesize($filePath));
//     ob_clean();
//     flush();
//     readfile($filePath);
//     exit;
    
// }
function spinText($inputData='')
{
    if(preg_match_all('/(\{([a-zA-Z0-9_\-\|\;\:\,\(\)\.\'\"\r\n\_\/\?\&\_\s\^\!\@\#\$\%\*\=\+\<\>\[\]]+)\})/is', $inputData,$match))
    {
        $total=count($match[1]);

        for ($i=0; $i < $total; $i++) { 

            $item=$match[1][$i];

            $itemContent=$match[2][$i];

            if(preg_match_all('/\{.*?\}/i', $itemContent,$itemMatch))
            {
                $inputData=Strings::spinText($itemContent);
            }
            else
            {
                $split=explode('|', $itemContent);

                shuffle($split);

                $inputData=str_replace($item, $split[0], $inputData);
            }

        }

        $inputData=Strings::spinText($inputData);
    }


    return $inputData;

}


function listDir($dirPath = '')
{
    if (is_dir($dirPath)) {
        $files= scandir($dirPath);

        $total=count($files);

        $dir=array();

        for($i=0;$i<$total;$i++)
        {
            if(preg_match('/^[a-zA-Z0-9_\-\_\s]+$/i', $files[$i]))
            {
                $dir[]= $files[$i];
            }

        }

        return $dir;
    }

    return false;        
}
function listFiles($dirPath = '')
{
    if (is_dir($dirPath)) {
        $files= scandir($dirPath);

        $total=count($files);

        $dir=array();

        for($i=0;$i<$total;$i++)
        {
            if(preg_match('/^.*?\.\w+$/i', $files[$i]))
            {
                $dir[]= $files[$i];
            }

        }

        return $dir;
    }

    return false;        
}

function create_file($filePath = '', $fileData = '', $writeMode = 'w')
{

    // $filePath=str_replace('/', DIRECTORY_SEPARATOR, $filePath);

    $filePath = strval(str_replace("\0", "", $filePath));

    if(file_exists($filePath))
    {
        chmod($filePath, 0666);
    }
    
    $fp = fopen($filePath, $writeMode);
    fwrite($fp, $fileData);
    fclose($fp);

    chmod($filePath, 0644);

    return $filePath;

}