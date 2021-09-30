<?php

function load_menu_data()
{
    $db=new Database();
    Configs::$_['menu_data']=$db->query("select * from admin_menu_data where ifnull(parent_menu_id,'')='' order by sort_order asc");    

    Configs::$_['sub_menu_data']=$db->query("select * from admin_menu_data where ifnull(parent_menu_id,'')<>'' order by parent_menu_id,sort_order asc");
}

function menu_hasChild($menu_id)
{
    $total=count(Configs::$_['sub_menu_data']);

    for ($i=0; $i < $total; $i++) { 
        if(Configs::$_['sub_menu_data'][$i]['parent_menu_id']==$menu_id)
        {
            return true;
        }
    }

    return false;
}    

function menu_allChild($menu_id)
{
    $total=count(Configs::$_['sub_menu_data']);

    $result=array();

    for ($i=0; $i < $total; $i++) { 
        if(Configs::$_['sub_menu_data'][$i]['parent_menu_id']==$menu_id)
        {
            array_push($result, Configs::$_['sub_menu_data'][$i]);
        }
    }

    return $result;
}
