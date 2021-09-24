<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require ROOT_PATH.'system/autoloads_class/PHPMailer/src/Exception.php';
require ROOT_PATH.'system/autoloads_class/PHPMailer/src/PHPMailer.php';
require ROOT_PATH.'system/autoloads_class/PHPMailer/src/SMTP.php';

class EmailSystem
{
    // Support variables: {{username}},{{fullname}},{{password}}
    public static function prepare_send_forgot_password($username,$toEmailList='')
    {
        // useClass('PHPMailer');

        $template_id=Configs::$_['email_forgotpassword_template'];

        if(!isset($template_id[2]))
        {
            return false;
        }
        if(!isset($toEmailList[2]))
        {
            return false;
        }

        $forgotPassword_Key=randNumber(24);

        $db=new Database();
        $userData=$db->query("select * from user_mst where user_id='".$username."' OR username='".$username."' OR email='".$username."'");

        if(!is_array($userData))
        {
            return false;
        }

        if(!isset($userData[0]))
        {
            return false;
        }

        $db->nonquery("update user_mst set forgot_password_c='".$forgotPassword_Key."' where username='".$username."' OR email='".$username."'");

        $templateData=$db->query("select * from email_template_data where template_id='".$template_id."'");

        $replaces=array(
            '{{username}}'=>$userData[0]['username'],
            '{{email}}'=>$userData[0]['email'],
            '{{fullname}}'=>$userData[0]['fullname'],
            '{{verify_forgotpassword_url}}'=>SITE_URL.'api/verify_forgotpassword?verify_c='.$forgotPassword_Key,
            '{{site_title}}'=>Configs::$_['site_title'],
            '{{site_url}}'=>SITE_URL,
        );

        $subject=$templateData[0]['subject'];
        $content=$templateData[0]['content'];

        if(!isset($content[10]))
        {
            return false;
        }
        
        $subject=str_replace(array_keys($replaces),array_values($replaces),$subject);
        $content=str_replace(array_keys($replaces),array_values($replaces),$content);

        $sendData=array(
            'subject'=>$subject,
            'content'=>$content,
            'to'=>$toEmailList,
        );

        try {
            self::send($sendData);
            echo '{"error":"no","data":"OK"}';
        } catch (\Throwable $ex) {
            echo '{"error":"yes","message":"'.$ex->getMessage().'","data":""}';
        }
        
        die();

    }
    
    public static function prepare_send_change_password($username,$newpassword)
    {
        // useClass('PHPMailer');

        $template_id=Configs::$_['email_change_password_template'];

        if(!isset($template_id[2]))
        {
            return false;
        }
        if(!isset($toEmailList[2]))
        {
            return false;
        }

        $forgotPassword_Key=randNumber(24);

        $db=new Database();
        $userData=$db->query("select * from user_mst where user_id='".$username."' OR username='".$username."' OR email='".$username."'");

        if(!is_array($userData))
        {
            return false;
        }

        if(!isset($userData[0]))
        {
            return false;
        }

        $templateData=$db->query("select * from email_template_data where template_id='".$template_id."'");

        $replaces=array(
            '{{username}}'=>$userData[0]['username'],
            '{{email}}'=>$userData[0]['email'],
            '{{fullname}}'=>$userData[0]['fullname'],
            '{{password}}'=>$newpassword,
            '{{site_title}}'=>Configs::$_['site_title'],
            '{{site_url}}'=>SITE_URL,
        );

        $subject=$templateData[0]['subject'];
        $content=$templateData[0]['content'];

        if(!isset($content[10]))
        {
            return false;
        }
        
        $subject=str_replace(array_keys($replaces),array_values($replaces),$subject);
        $content=str_replace(array_keys($replaces),array_values($replaces),$content);

        $sendData=array(
            'subject'=>$subject,
            'content'=>$content,
            'to'=>$toEmailList,
        );

        try {
            self::send($sendData);
            echo '{"error":"no","data":"OK"}';
        } catch (\Throwable $ex) {
            echo '{"error":"yes","message":"'.$ex->getMessage().'","data":""}';
        }
        
        die();
    }

    public static function prepare_send_newuser($userData=[])
    {
        // useClass('PHPMailer');

        $template_id=Configs::$_['email_new_user_template'];

        if(!isset($template_id[2]))
        {
            return false;
        }
        if(!isset($toEmailList[2]))
        {
            return false;
        }

        $db=new Database();

        $templateData=$db->query("select * from email_template_data where template_id='".$template_id."'");

        $replaces=array(
            '{{site_title}}'=>Configs::$_['site_title'],
            '{{site_url}}'=>SITE_URL,
            '{{username}}'=>$userData['username'],
            '{{email}}'=>$userData['email'],
            '{{fullname}}'=>$userData['fullname']
        );

        $subject=$templateData[0]['subject'];
        $content=$templateData[0]['content'];

        if(!isset($content[10]))
        {
            return false;
        }
        
        $subject=str_replace(array_keys($replaces),array_values($replaces),$subject);
        $content=str_replace(array_keys($replaces),array_values($replaces),$content);

        $sendData=array(
            'subject'=>$subject,
            'content'=>$content,
            'to'=>$toEmailList,
        );

        try {
            self::send($sendData);
            echo '{"error":"no","data":"OK"}';
        } catch (\Throwable $ex) {
            echo '{"error":"yes","message":"'.$ex->getMessage().'","data":""}';
        }
        
        die();      
    }

    public static function send($sendData=[])
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

            if(Configs::$_['email_smtp']!='no')
            {
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = Configs::$_['smtp_host'];                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = Configs::$_['smtp_username'];                     //SMTP username
                $mail->Password   = Configs::$_['smtp_password'];                                //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                // $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->Port       = Configs::$_['smtp_port'];                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            }

            //Recipients
            $mail->setFrom(Configs::$_['email_sender'],Configs::$_['email_sender_name']);

            $splitTo=explode(',',$sendData['to']);

            $total=count($splitTo);

            $toEmail='';

            for ($i=0; $i < $total; $i++) { 
                if(isset($splitTo[$i][2]))
                {
                    $toEmail=trim($splitTo[$i]);
                    $mail->addAddress($toEmail);               //Name is optional
                }
            }

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            if(isset($sendData['attach_files']))
            {
                $total=count($sendData['attach_files']);

                if($total > 0)
                {
                    for ($i=0; $i < $total; $i++) { 
                        $mail->addAttachment($sendData['attach_files'][$i]);
                    }
                }
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML

                
            $replaces=array(
                '{{site_title}}'=>Configs::$_['site_title'],
                '{{site_url}}'=>SITE_URL,
                //'{{username}}'=>$userData['username'],
                //'{{email}}'=>$userData['email'],
                //'{{fullname}}'=>$userData['fullname']
            );

            $sendData['subject']=str_replace(array_keys($replaces),array_values($replaces),$sendData['subject']);
            $sendData['content']=str_replace(array_keys($replaces),array_values($replaces),$sendData['content']);
                
            $mail->Subject = strip_tags($sendData['subject']);
            $mail->Body    = $sendData['content'];
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}