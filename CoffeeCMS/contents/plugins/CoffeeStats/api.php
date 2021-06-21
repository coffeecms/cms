<?php

function cs_get_views_by_date()
{
        
    $start_date=getPost('start_date','');
    $end_date=getPost('end_date','');

    if(!isset($start_date[2]) || !isset($end_date[2]))
    {
        return 'ERROR';
    }

    $result=[];

    $queryStr='';
    $db=new Database();
    
    $queryStr=" select CAST(ent_dt as date) as work_date,count(*) as total";
    $queryStr.=" from cs_visitor_data";
    $queryStr.=" where CAST(ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."'";
    $queryStr.=" group by CAST(ent_dt as date)";
    $queryStr.=" order by CAST(ent_dt as date) asc";

    $result['views_by_date']=$db->query($queryStr);
    
    $queryStr=" select work_date,count(*) as total";
    $queryStr.=" from (";
    $queryStr.=" select  CAST(ent_dt as date) as work_date,ip_add";
    $queryStr.=" from cs_visitor_data";
    $queryStr.=" where CAST(ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."'";
    $queryStr.=" group by  CAST(ent_dt as date),ip_add";
    $queryStr.=" ) as a";
    $queryStr.=" group by work_date";
    $queryStr.=" order by work_date asc";

    $result['visitor_by_date']=$db->query($queryStr);
    
    // $queryStr=" select DATE_FORMAT(ent_dt, '%m/%Y') as work_date,count(*) as total";
    // $queryStr.=" from cs_visitor_data";
    // $queryStr.=" where CAST(ent_dt as date) BETWEEN '".date("Y-m-d", strtotime('-12 months'))."' AND '".date("Y-m-d")."'";
    // $queryStr.=" group by DATE_FORMAT(ent_dt, '%m/%Y')";
    // $queryStr.=" order by DATE_FORMAT(ent_dt, '%m/%Y') asc";

    // $result['views_by_month']=$db->query($queryStr);
    
    // $queryStr=" select work_date,count(*) as total";
    // $queryStr.=" from (";
    // $queryStr.=" select  DATE_FORMAT(ent_dt, '%m/%Y') as work_date,ip_add";
    // $queryStr.=" from cs_visitor_data";
    // $queryStr.=" where CAST(ent_dt as date) BETWEEN '".date("Y-m-d", strtotime('-12 months'))."' AND '".date("Y-m-d")."'";
    // $queryStr.=" group by  DATE_FORMAT(ent_dt, '%m/%Y'),ip_add";
    // $queryStr.=" ) as a";
    // $queryStr.=" group by work_date";
    // $queryStr.=" order by work_date asc";

    // $result['visitor_by_month']=$db->query($queryStr);


    $queryStr=" select referrer_site,count(*) as total";
    $queryStr.=" from cs_visitor_data";
    $queryStr.=" where CAST(ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."'";
    $queryStr.=" group by referrer_site";
    $queryStr.=" order by referrer_site  asc";

    $result['traffic_source_by_referrer']=$db->query($queryStr);

    $queryStr=" select browser_title,count(*) as total";
    $queryStr.=" from cs_visitor_data";
    $queryStr.=" where CAST(ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."'";
    $queryStr.=" group by browser_title";
    $queryStr.=" order by browser_title  asc";

    $result['traffic_source_by_browsers']=$db->query($queryStr);

    $queryStr=" select os_title,count(*) as total";
    $queryStr.=" from cs_visitor_data";
    $queryStr.=" where CAST(ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."'";
    $queryStr.=" group by os_title";
    $queryStr.=" order by os_title  asc";

    $result['traffic_source_by_os']=$db->query($queryStr);

    $queryStr=" SELECT page_url,count(*) as total";
    $queryStr.=" FROM cs_visitor_page_data";
    $queryStr.=" WHERE CAST(ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."'";
    $queryStr.=" group by page_url";
    $queryStr.=" order by total desc";
    $queryStr.=" limit 0,30";

    $result['top_page_views_by_date']=$db->query($queryStr);

    $queryStr=" select page_url,count(*) as total";
    $queryStr.=" from (";
    $queryStr.=" select a.session_id,b.page_url";
    $queryStr.=" FROM cs_visitor_data as a join cs_visitor_page_data as b ON a.session_id=b.session_id";
    $queryStr.=" WHERE CAST(a.ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."' AND a.referrer_site<>'direct'";
    $queryStr.=" ) as d";
    $queryStr.=" group by page_url";
    $queryStr.=" order by total DESC";
    $queryStr.=" limit 0,30";
    
    $result['top_page_ref_by_date']=$db->query($queryStr);




    return $result;
}
function cs_add_new_tracking()
{
    $username=isset(Configs::$_['user_data']['user_id'])?Configs::$_['user_data']['user_id']:'';
   
    try {
        isValidAccessAPI();
    } catch (\Exception $e) {
        echo responseData($e->getMessage(),'yes');return false;
    }

    $tracking_id=randAlpha(8);

    $insertData=array(
        'tracking_id'=>$tracking_id,
        'title'=>addslashes(getPost('title')),
        'user_id'=>$username,
    );

    $db=new Database(); 
    $queryStr=arrayToInsertStr('cs_tracking_data',$insertData);

    $db->nonquery($queryStr);   

    saveActivities('coffeestats_add_post','Add new tracking id',$username);

    return $tracking_id;
}

function cs_tracking()
{
    $tracking_id=getGet('tracking_id','');

    if(!isset($tracking_id[2]))
    {
        return '';
    }

    useClass('UserAgent');
    useClass('Mobile_Detect');

    $useragent = UserAgentFactory::analyze($_SERVER['HTTP_USER_AGENT']);
 
    $referrer=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
    $referrer=is_null($referrer)?'':$referrer;
    $referrer=isset($referrer[5])?$referrer:'direct';

    $referrer_site='';

    if(preg_match('/^http/i',$referrer))
    {
        $url_data=parse_url($referrer);

        $referrer_site=$url_data['host'];
    }
   

    $ip_add=$_SERVER['REMOTE_ADDR'];
    $ent_dt=date('Y-m-d H:i:s');
    $user_agent=isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
    $user_agent=is_null($user_agent)?'':$user_agent;

    $session_hash=md5($ip_add.$user_agent.$ent_dt);


    $is_mobile='0';
    $is_tablet='0';
    $is_windows='0';
    $is_ios='0';
    $is_android='0';
    $detect = new Mobile_Detect;

    if ( $detect->isMobile() ) {
        $is_mobile='1';
    }

    if ( $detect->isTablet() ) {
        $is_tablet='1';
    }

    if ( $detect->isiOS() ) {
        $is_ios='1';
    }

    if ( $detect->isAndroidOS() ) {
        $is_android='1';
    }

    if ( $detect->isWindowsMobileOS() ) {
        $is_windows='1';
    }

    if ( $detect->isWindowsPhoneOS() ) {
        $is_windows='1';
    }

    $os_title=$useragent->platform['name'];
    $os_version=$useragent->platform['version'];
    $browser_title=$useragent->browser['name'];
    $browser_version=$useragent->browser['version'];
    // $browser_version=$useragent->browser['name'];

    if(strtoupper($os_title)=='WINDOWS')
    {
        $is_windows='1';
    }

    $referrer_type='website';

    $insertData=array(
        'session_id'=>$session_hash,
        'tracking_id'=>$tracking_id,
        'ip_add'=>$ip_add,
        'ip_long'=>ip2long($ip_add),
        'user_agent'=>$user_agent,
        'referrer_url'=>$referrer,
        'referrer_site'=>$referrer_site,
        'referrer_type'=>$referrer_type,
        'os_title'=>$os_title,
        'os_version'=>$os_version,
        'browser_title'=>$browser_title,
        'browser_version'=>$browser_version,
        'is_mobile'=>$is_mobile,
        'is_tablet'=>$is_tablet,
        'is_ios'=>$is_ios,
        'is_android'=>$is_android,
        'is_windows'=>$is_windows,
        'ent_dt'=>$ent_dt,
        'upd_dt'=>$ent_dt,
    );

    $db=new Database(); 
    $queryStr=arrayToInsertStr('cs_visitor_data',$insertData);

    $db->nonquery($queryStr);   

    $result="
        var cs_tracking_id='".$tracking_id."';
        var cs_tracking_api_url='".SITE_URL."api/plugin_api?plugin=CoffeeStats&func=cs_update_tracking';
        var cs_tracking_url='".$tracking_id."';
        var cs_new_page='yes';
        var cs_session_id='".$session_hash."';
        var cs_page_url=location.href;
       
        function genSendVar(inputList) {

            if(inputList==null)
            {
                return '';
            }
            
            var listKey = Object.keys(inputList);
            
            var li = '';
            
            // console.log(listKey);
            
            var total = listKey.length;
            
            for (var i = 0; i < total; i++) {
                li .= listKey[i] + '=' + encodeURIComponent(inputList[listKey[i]]) + '&';
            }
            
            li = li.substring(0, li.length - 1);
            
            return li;
            }
        
        async function postData(url = '', data = {}) {
        // Default options are marked with *
       
        var sendData=genSendVar(data);
        const response = await fetch(url, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: 'follow',
            
            body: sendData 
            
        });
        
       
        return response.json(); // parses JSON response into native JavaScript objects
        }

      function cs_update_tracking()
      {
        postData(cs_tracking_api_url+'&session_hash=".$session_hash."&tracking_id=".$tracking_id."',{
            'page_url':cs_page_url,
            'new_page':cs_new_page
        });

        cs_new_page='no';
      }

      setInterval( function() { cs_update_tracking(); }, 5000 );

      ";

    header("Access-Control-Allow-Origin: *");

    echo $result;die();

}

function cs_update_tracking()
{
    $tracking_id=getGet('tracking_id','');
    $page_url=getPost('page_url','');
    $new_page=getPost('new_page','no');
    $session_hash=getGet('session_hash','');

    if(!isset($tracking_id[2]))
    {
        return 'ERROR';
    }    

    if(!isset($session_hash[2]))
    {
        return 'ERROR';
    }    

    $db=new Database(); 
    $queryStr="update cs_visitor_data";
    $queryStr.=" set live_time=live_time+5, upd_dt=now()";
    $queryStr.=" where session_id='".$session_hash."';";

    if($new_page=='yes')
    {
        $queryStr.="insert into cs_visitor_page_data(session_id,page_url) VALUES('".$session_hash."','".addslashes($page_url)."');";
    }
    else
    {
        $queryStr.="update cs_visitor_page_data";
        $queryStr.=" set live_time=live_time+5, upd_dt=now()";
        $queryStr.=" where session_id='".$session_hash."';";
    
    }

    $db->nonquery($queryStr);   

    header("Access-Control-Allow-Origin: *");

    return 'OK';

}



