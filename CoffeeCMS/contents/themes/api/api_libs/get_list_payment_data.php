<?php 

function get_list_payment_data()
{
	$username=trim(getPost('username',''));
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
    $queryStr.="select a.*,c.username ";
    $queryStr.=" from payment_data as a ";
    $queryStr.=" left join user_mst as c ON a.user_id=c.user_id";
    $queryStr.=" where a.id<>'' ";

    if(isset($username[2]))
    {
		$queryStr.=" AND a.user_id IN (select user_id from user_mst where user_id='".$username."' OR username='".$username."' OR email='".$username."') ";
    }

    if(isset($start_date[2]) && isset($end_date[2]))
    {
		$queryStr.=" AND CAST(a.ent_dt as date) BETWEEN '".$start_date."' AND '".$end_date."' ";
    }

	$queryStr.=" order by a.ent_dt desc limit ".$offset.",".$limit;

    $loadData=$db->query($queryStr);

    echo responseData($loadData,'no');die();
}