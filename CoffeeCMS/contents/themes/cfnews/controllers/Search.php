<?php

class Search
{
	public static function index()
	{

		$url=Configs::$_['uri'];

		$split=explode('_',$url);

		$category_c=explode('.',$split[count($split)-1])[0];

				
		$theData=array(
			'listCat'=>[],
			'theList'=>[],
			'listPost'=>[],
			'totalPost'=>0,
			'totalPage'=>0,
			'pages'=>'',
			'alert'=>'',
		);

		
        $db=new Database();    

		load_category_data_from_cache();
		load_menu_data_from_cache();

        // $listCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')='' order by sort_order asc");

        // $listSubCategories=$db->query("select * from category_mst where ifnull(parent_category_c,'')<>'' order by parent_category_c,sort_order asc");

        $theData['listTags']=$db->query("SELECT DISTINCT tag FROM post_tag_data");

		$theData['listCat']=genListNestedCategories(Configs::$_['category_data'],Configs::$_['sub_category_data']);


		$postFrom=getGet('page','0');
		$keywords=getGet('k','');

		$theData['keywords']=$keywords;

		$theData['page']=$postFrom;
		$theData['page_prev']=(int)$postFrom-1;
		$theData['page_next']=(int)$postFrom+1;

		$postFrom=(int)$theData['page']*30;

		if((int)$theData['page_prev']<0)
		{
			$theData['page_prev']='0';
		}
        
		$queryStr="";

		if(strlen($keywords) > 0)
		{
			$queryStr=" select a.post_c,a.title,a.friendly_url,a.content,a.thumbnail,a.tags,a.status,a.post_type,";
			$queryStr.=" a.parent_post_c,a.views,c.title as category_title,c.friendly_url as category_friendly_url,a.category_c,a.user_id as author_id,a.ent_dt,a.upd_dt,b.username as author_username,b.avatar as author_avatar";
			$queryStr.=" from post_data a";
			$queryStr.=" left join category_mst c ON a.category_c=c.category_c ";
			$queryStr.=" left join user_mst b ON a.user_id=b.user_id where a.post_c<>'' AND a.content LIKE '%".$keywords."%' ";
	
			$queryStr.=" order by a.upd_dt desc  limit ".$postFrom.",30";
	
			$result=$db->query($queryStr);
	
			$theData['listPost']=$result;
		}


		echo view('header');
		echo view('search',$theData);
		echo view('footer');
	}	
}