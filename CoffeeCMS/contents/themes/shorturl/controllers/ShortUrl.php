<?php

class ShortUrl
{
    public static function index($id)
    {
        $db=new Database(); 

        $result=$db->query("select code,target_url from short_url_data where code='".$id."' AND status='1'");

        if(!is_array($result))
        {
            echo responseData('ERROR','yes');
        }
        else
        {
            if(!isset($result[0]))
            {
                echo responseData('ERROR','yes');
            }
            else
            {
                header("HTTP/1.1 301 Moved Permanently"); 
                header("Location: " . $result[0]['target_url']);die();
            }
        }

    }
}