<?php 

function apikey_edit()
{
	$username=trim(getPost('username',''));
	$apikey=trim(getPost('apikey',''));
	$start_date=trim(getPost('start_date',''));
	$end_date=trim(getPost('end_date',''));
    $status=trim(getPost('status',''));
    $list_per_add=trim(getPost('list_per_edit',''));

    if(strlen($apikey)==0)
    {
        $apikey=randAlpha(68);
    }
    
    $db=new Database(); 

    $queryStr='';


    $userData=$db->query("select user_id from user_mst where user_id='".$username."' OR username='".$username."' OR email='".$username."'");

    if(count($userData)==0)
    {
        echo responseData('User not exists in system.','yes');die();        
    }

    $apiData=$db->query("select user_id from user_api_key_data where user_id='".$userData[0]['user_id']."' AND api_key= '".$apikey."'");

    if(count($apiData) == 0)
    {
        echo responseData('This api key not exists in system','yes');die();     
    }

    $updateData=array(
        'status'=>$status,
        'start_date'=>$start_date,
        'end_date'=>$end_date,
    );

    $insertData=array(
        'update'=>$updateData,
        'where'=>array(
            'api_key'=>"='".$apikey."'",
        )

    );    

    $queryStr=arrayToUpdateStr('user_api_key_data',$insertData);

  
    $db->nonquery($queryStr);

    $db->nonquery("delete from user_api_key_permission_data where api_key='".$apikey."'");

    if(isset($list_per_add[5]))
    {
        $splitPers=explode('||',$list_per_add);

        $total=count($splitPers);

        $queryStr='';

        for ($i=0; $i < $total; $i++) { 
            if(strlen($splitPers[$i]) > 2)
            {
                $insertData=array(
                    'api_key'=>$apikey,
                    'permission_c'=>$splitPers[$i],
                );

                $queryStr.=arrayToInsertStr('user_api_key_permission_data',$insertData);
            }
        }

        if(isset($queryStr[5]))
        {
            $db->nonquery($queryStr);
        }        
    }


    echo responseData('OK','no');die();
}