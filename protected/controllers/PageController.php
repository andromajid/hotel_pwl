<?php
set_time_limit(0);
class PageController extends Controller {

    
    public function actionIndex($id) {
        
        $id = (isset($_GET['id'])) ? $_GET['id'] : 1;
        $page_model = site_page::model()->findByPk(intval($id));
        if($page_model!=null)
        {
            $title=$page_model->page_title;
            $description=$page_model->page_content;
            $this->seo($title,$description,$description);
        }
        $this->render('page', array('page_model' => $page_model));
    }
    public function actionShow($id,$title='') {
        
        $id = (isset($_GET['id'])) ? intval($_GET['id']) : 0;
        $page_model = site_page::model()->findByPk($id);
        if($page_model!=null)
        {
            $title=$page_model->page_title;
            $description=$page_model->page_content;
            $this->seo($title,$description,$description);
        }
        $this->render('page', array('page_model' => $page_model));
    }
    
    public function actionSupport()
    {
        $this->render('support');
    }
    
    public function actionContact()
    {
        $page=new site_page;
        
        $title='Contact Us';
        $description='Contact Us';
        $this->seo($title,$description,$description);
        
        $office=$page->findByPk(8);
        $call=$page->findByPk(9);
        
        $this->render('contact',array(
            'office'=>$office,
            'call'=>$call,
        ));
        
    }

    public function actionContact_send()
    {
    $post=0;    
    $errors=0;
    //Retrieve form data. 
    //GET - user submitted data using AJAX
    //POST - in case user does not support javascript, we'll use POST instead
    $name = ($_GET['name']) ? $_GET['name'] : $_GET['name'];
    $email = ($_GET['email']) ?$_GET['email'] : $_GET['email'];
    $website = ($_GET['website']) ?$_GET['website'] : $_GET['website'];
    $comment = ($_GET['comment']) ?$_GET['comment'] : $_GET['comment'];

    //flag to indicate which method it uses. If POST set it to 1
    //if ($_POST) $post=1;

    //Simple server side validation for POST data, of course, you should validate the email
    if (!$name) $errors[count($errors)] = 'Please enter your name.';
    if (!$email) $errors[count($errors)] = 'Please enter your email.'; 
    if (!$comment) $errors[count($errors)] = 'Please enter your comment.'; 

    //if the errors array is empty, send the mail
    if (!$errors) {

            //recipient
            $to = 'Tejo Murti <tejo.murti@inolabs.net>';	
            //sender
            $from = $name . ' <' . $email . '>';

            //subject and the html message
            $subject = '[UKM] Comment from ' . $name;	
            $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head></head>
            <body>
            <table>
                    <tr><td>Name</td><td>' . $name . '</td></tr>
                    <tr><td>Email</td><td>' . $email . '</td></tr>
                    <tr><td>Website</td><td>' . $website . '</td></tr>
                    <tr><td>Comment</td><td>' . nl2br($comment) . '</td></tr>
            </table>
            </body>
            </html>';

            //send the mail
            $result = $this->sendmail($to, $subject, $message, $from);

            //if POST was used, display the message straight away
            if ($_POST) {
                    if ($result) echo 'Thank you! We have received your message.';
                    else echo 'Sorry, unexpected error. Please try again later';

            //else if GET was used, return the boolean value so that 
            //ajax script can react accordingly
            //1 means success, 0 means failed
            } else {
                    echo $result;	
            }

    //if the errors array has values
    } else {
            //display the errors message
            for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
            echo '<a href="form.php">Back</a>';
            exit;
    }


   

    }
    
     //Simple mail function with HTML header
    private function sendmail($to, $subject, $message, $from) {
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= 'From: ' . $from . "\r\n";

            $result = mail($to,$subject,$message,$headers);

            if ($result) return 1;
            else return 0;
    }
    
    private function seo($title='',$description='',$keywords='')
    {
       $this->content_title=$title;
       $this->content_description=function_lib::build_description($description);
       $this->content_keywords=  function_lib::build_keywords($keywords);
    }
}
