<?php

class Post
{
	public static function index()
	{

		$url=Configs::$_['uri'];

		$split=explode('_',$url);

		$post_c=explode('.',$split[count($split)-1])[0];

				
		$theData=array(
			'listCat'=>[],
			'theList'=>[],
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

		$postFrom=getPost('from','0');

		$queryStr="";

        $result=$db->query("select a.*,c.title as category_title,c.friendly_url as category_friendly_url from post_data a  left join category_mst c ON a.category_c=c.category_c where a.post_c='".$post_c."'");

		if(!is_array($result) && !is_array($result[0]))
		{
			redirect_to(SITE_URL.'404page.html');
		}

        $theData['listPost']=$result;

		echo view('header');
		echo view('post',$theData);
		echo view('footer');
	}	
}