<?php 

function get_list_categories()
{
	$username=trim(getPost('username',''));
	$apikey=trim(getPost('apikey',''));
	$start_date=trim(getPost('start_date',''));
	$end_date=trim(getPost('end_date',''));
    
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

    $db=new Database(); 

    $queryStr='';
    $queryStr.="select a.*,ifnull(b.total_per,'0') as total_per,c.username ";
    $queryStr.=" from user_api_key_data as a ";
    $queryStr.=" left join (select api_key,count(*) as total_per from user_api_key_permission_data group by api_key) as b ON a.api_key=b.api_key ";
    $queryStr.=" left join user_mst as c ON a.user_id=c.user_id";
    $queryStr.=" where a.api_key<>'' ";

    if(isset($username[2]))
    {
		$queryStr.=" AND a.user_id IN (select user_id from user_mst where user_id='".$username."' OR username='".$username."' OR email='".$username."') ";
    }
    if(isset($apikey[2]))
    {
		$queryStr.=" AND a.api_key='".$apikey."' ";
    }    
    if(isset($start_date[2]) && isset($end_date[2]))
    {
		$queryStr.=" AND a.end_date BETWEEN '".$start_date."' AND '".$end_date."' ";
    }

	$queryStr.=" order by a.ent_dt desc limit ".$offset.",".$limit;

    $loadData=$db->query($queryStr);

    echo responseData($loadData,'no');die();
}