<?php
Yii::import('application.modules.member.components.Member_auth_lib');
class WidgetLogin extends CWidget {
    
    public function run() {

        if(!session_id())
        {
            session_start();
        }
        
        $loginAuth=new Member_auth_lib;
        
        $processLogin=$loginAuth->validateMemberLogin();
        if(isset($_POST['member']))
        {
            
            if($processLogin['status']==200)
            {
                //echo '<meta http-equiv="refresh" content="0;url='.Yii::app()->baseUrl.'/member/profile'.'">';
                echo '<meta http-equiv="refresh" content="0;url='.Yii::app()->baseUrl.'/'.'">';
                //$this->redirect();
                exit;
            }
            else
            {
                 echo '<meta http-equiv="refresh" content="0;url='.Yii::app()->baseUrl.'/member/login'.'">';
                //$this->redirect();
                exit;
            }
        }
        
        $this->render('login');
    }

    
}

?>
