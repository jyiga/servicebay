<?php

class mailDirector{

    public static function buildMail(mailBuilder $mailBuilder,$sendMail,$emails)
    {
        $mail=NULL;
        $mail.=$mailBuilder->getEmailHeader();
        $mail.=$mailBuilder->getEmailBody();
        $mail.=$mailBuilder->getEmailFooter();
        
        $sendMail->Body=$mail;
        $emailToSend=explode(',',$emails);
        if(sizeof($emailToSend)>0)
        {
            for($i=0;$i<sizeof($emailToSend);$i++)
            {
                $sendMail->AddAddress($emailToSend[$i]);

            }

        }else{
            $sendMail->AddAddress($emails);
        }
        $sendMail->AddCC('james2yiga@gmail.com');
        if(!empty($mailBuilder->getAttachment()))
        {
            $sendMail->AddAttachment('export/invoice/'.$mail->getAttachment(),$mail->getAttachment());
        }

        

        if(!$sendMail->Send()){
            error_log(date('Y m d :g:i:s:a ') .  $sendMail->ErrorInfo."\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'emailerror.log');
            return false;
        }else{
            error_log(date('Y m d :g:i:s:a ') .  "Sent=>\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'emailerror.log');
            return true;
        }
        
    }
}