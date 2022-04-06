<?php 

function apikey_data()
{
	$apikey=trim(getPost('apikey',''));

    $db=new Database(); 

    $queryStr='';
    
    $loadData=$db->query("select * from user_api_key_permission_data where api_key='".$apikey."'");

    echo responseData($loadData,'no');die();
}