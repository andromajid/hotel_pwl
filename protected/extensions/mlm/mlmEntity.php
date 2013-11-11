<?php

class mlmEntity {

    public $network_id;
    public $network_mid;
    public $network_position;
    public $network_position_text;
    public $network_upline_network_id;
    public $network_upline_network_mid;
    public $network_sponsor_network_id;
    public $network_sponsor_network_mid;
    public $network_right_node_network_id;
    public $network_left_node_network_id;
    public $password_value;
    public $serial_id;
    public $serial_pin;
    public $member_name;
    public $member_nickname;
    public $member_email;
    public $member_sex;
    public $member_address;
    public $member_city_id;
    public $member_state_id;
    public $member_zipcode;
    public $member_birth_place;
    public $member_birth_date;
    public $member_identity_type;
    public $member_identity_no;
    public $member_phone;
    public $member_mobilephone;
    public $member_fax;
    public $member_image;
    public $member_devisor_name;
    public $member_devisor_phone;
    public $member_devisor_relationship;
    public $member_bank_id;
    public $member_bank_city;
    public $member_bank_branch;
    public $member_bank_account_name;
    public $member_bank_account_no;
    public $member_password;
    public $member_tax_account_no;

//    /** 
//     * Magic Method buat geset network_id
//     */
//    public function __set($name, $value) {
//        if($name == 'network_upline_network_mid' || $name == 'network_sponsor_network_mid') {
//            $this->$name = $value;
//            $name = str_replace('m', '', $name);
//            $this->$name = dbHelper::getOne('network_id', 'mlm_network', 'network_mid = \''.$value.'\'');
//        }
//    }
}

?>
