<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadImageForm
 *
 * @author andro dan santi
 */
class UploadImageForm extends CFormModel {
    public $member_image;

    public function rules() {
        return array(
            array('member_image', 'file', 'types' => 'jpg,jpeg,gif,png', 'allowEmpty' => true),
        );
    }

    //put your code here
}

?>
