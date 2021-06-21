<?php

class AdminMenu
{
	public static function add_before_id($parent_menu_id,$inputData=[])
	{
		$db=new Database(); 

		$parentData=$db->query("select * from admin_menu_data where menu_id='".$parent_menu_id."'");

		if(!is_array($parentData))
		{
			return false;
		}

		if(!isset($parentData[0]))
		{
			return false;
		}

	    $insertData=array(
	        'menu_id'=>$menu_id,
	        'title'=>addslashes(getPost('title')),
	        'page_url'=>addslashes(getPost('page_url')),
	        'parent_menu_id'=>'',
	        'is_url'=>$is_url,
	        'status'=>'1',
	    );

	    $queryStr=arrayToInsertStr('admin_menu_data',$insertData);
	    
	    $db->nonquery($queryStr); 

	    $queryStr="update admin_menu_data";  	
	    $queryStr.=" set sort_order=sort_order+1 ";  	
	    $queryStr.=" where ifnull(parent_menu_id,'')='' AND sort_order >='".$parentData[0]['sort_order']."'; ";  	

	    $db->nonquery($queryStr); 

	    $queryStr="update admin_menu_data";  	
	    $queryStr.=" set sort_order='".$parentData[0]['sort_order']."' ";  	
	    $queryStr.=" where menu_id='".$menu_id."'; ";  	

	    $db->nonquery($queryStr); 

	}

	public static function add_after_id($parent_menu_id,$inputData=[])
	{
		$db=new Database(); 

		$parentData=$db->query("select * from admin_menu_data where menu_id='".$parent_menu_id."'");

		if(!is_array($parentData))
		{
			return false;
		}

		if(!isset($parentData[0]))
		{
			return false;
		}

	    $insertData=array(
	        'menu_id'=>$menu_id,
	        'title'=>addslashes(getPost('title')),
	        'page_url'=>addslashes(getPost('page_url')),
	        'parent_menu_id'=>'',
	        'is_url'=>$is_url,
	        'status'=>'1',
	    );

	    $queryStr=arrayToInsertStr('admin_menu_data',$insertData);
	    
	    $db->nonquery($queryStr); 

	    $queryStr="update admin_menu_data";  	
	    $queryStr.=" set sort_order=sort_order-1 ";  	
	    $queryStr.=" where ifnull(parent_menu_id,'')='' AND sort_order <= '".$parentData[0]['sort_order']."'; ";  	

	    $db->nonquery($queryStr); 

	    $queryStr="update admin_menu_data";  	
	    $queryStr.=" set sort_order='".$parentData[0]['sort_order']."' ";  	
	    $queryStr.=" where menu_id='".$menu_id."'; ";  	

	    $db->nonquery($queryStr); 		
	}
	public static function add_in_parent_offset_top($parent_menu_id,$inputData=[])
	{
		$db=new Database(); 

		$parentData=$db->query("select * from admin_menu_data where menu_id='".$parent_menu_id."'");

		if(!is_array($parentData))
		{
			return false;
		}

		if(!isset($parentData[0]))
		{
			return false;
		}

	    $insertData=array(
	        'menu_id'=>$menu_id,
	        'title'=>addslashes(getPost('title')),
	        'page_url'=>addslashes(getPost('page_url')),
	        'parent_menu_id'=>$parent_menu_id,
	        'is_url'=>$is_url,
	        'status'=>'1',
	    );

	    $queryStr=arrayToInsertStr('admin_menu_data',$insertData);
	    
	    $db->nonquery($queryStr); 

	    $queryStr="update admin_menu_data";  	
	    $queryStr.=" set sort_order=sort_order+1 ";  	
	    $queryStr.=" where parent_menu_id='".$parent_menu_id."' AND sort_order >= '".$parentData[0]['sort_order']."'; ";  	

	    $db->nonquery($queryStr); 

	    $queryStr="update admin_menu_data";  	
	    $queryStr.=" set sort_order='".$parentData[0]['sort_order']."' ";  	
	    $queryStr.=" where menu_id='".$menu_id."'; ";  	

	    $db->nonquery($queryStr);
	}	

	public static function add_in_parent_offset_bottom($parent_menu_id,$inputData=[])
	{
		$db=new Database(); 

		$parentData=$db->query("select * from admin_menu_data where menu_id='".$parent_menu_id."'");

		if(!is_array($parentData))
		{
			return false;
		}

		if(!isset($parentData[0]))
		{
			return false;
		}

	    $insertData=array(
	        'menu_id'=>$menu_id,
	        'title'=>addslashes(getPost('title')),
	        'page_url'=>addslashes(getPost('page_url')),
	        'parent_menu_id'=>$parent_menu_id,
	        'is_url'=>$is_url,
	        'status'=>'1',
	    );

	    $queryStr=arrayToInsertStr('admin_menu_data',$insertData);
	    
	    $db->nonquery($queryStr); 

	    $queryStr="update admin_menu_data";  	
	    $queryStr.=" set sort_order=sort_order-1 ";  	
	    $queryStr.=" where parent_menu_id='".$parent_menu_id."' AND sort_order <= '".$parentData[0]['sort_order']."'; ";  	

	    $db->nonquery($queryStr); 

	    $queryStr="update admin_menu_data";  	
	    $queryStr.=" set sort_order='".$parentData[0]['sort_order']."' ";  	
	    $queryStr.=" where menu_id='".$menu_id."'; ";  	

	    $db->nonquery($queryStr);
	}



}