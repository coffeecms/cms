<?php 

class CoffeeProtectLogin
{
    public static function auto_detect_attack_login($username,$status=0)
    {
        $ip_hash=md5($_SERVER['REMOTE_ADDR']);

        $db=new Database();  

        if((int)$status==1)
        {
            if(is_dir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash))
            {
                rmdir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash);
            }

            $db->nonquery("delete from user_login_data where username='".$username."' AND status='0'");

            return true;
        }

        $loadData=$db->query("select count(*) as total from user_login_data where username='".$username."' AND status='0' AND ent_dt BETWEEN date_add(NOW(),interval -30 minute) AND NOW()");
        
        if(count($loadData) > 0)
        {
            if((int)$loadData[0]['total'] < 10)
            {
                $queryStr="";

                $queryStr.="insert into user_login_data(username,ip_add,user_agent,status)";
                $queryStr.=" VALUES('".$username."','".$_SERVER['REMOTE_ADDR']."','".$_SERVER['HTTP_USER_AGENT']."','".$status."')";
        
                $db->nonquery($queryStr);
    
                if(is_dir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash))
                {
                    rmdir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash);
                }
            }
            else
            {
                if(!is_dir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash))
                {
                    mkdir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash);
                }
                
            }

    
        }
        else
        {
            if(is_dir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash))
            {
                rmdir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash);
            }
        }

    }

    public static function is_blocked()
    {
        $ip_hash=md5($_SERVER['REMOTE_ADDR']);

        if(is_dir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash))
        {
            $mtime=filemtime(PUBLIC_PATH.'caches/protect_login/'.$ip_hash);

            $fileMinutes=(time()-$mtime)/60;

            if((int)$fileMinutes >= 2)
            {
                rmdir(PUBLIC_PATH.'caches/protect_login/'.$ip_hash);
            }

            return true;
        }

        return false;
    }

}