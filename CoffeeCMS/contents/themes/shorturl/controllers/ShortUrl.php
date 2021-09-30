<?php

class ShortUrl
{
    public static function index($id)
    {
        load_shorturl_cache($id);

        if(!isset(Configs::$_['short_url_target']))
        {
            echo responseData('ERROR','yes');
        }
        else
        {
            $db=new Database();

            $db->nonquery("update short_url_data set views=views+1 where code='".$id."'");
            // header("HTTP/1.1 301 Moved Permanently"); 
            header("Location: " . Configs::$_['short_url_target']);die();
        }

    }
}