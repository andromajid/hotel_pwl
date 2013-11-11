<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StaticController
 *
 * @author tejomurti
 */
class StaticController extends Controller{
    //put your code here
    
    public function actionIndex()
    {
        $this->render('index');
    }
    
}

?>
