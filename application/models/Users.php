<?php
include_once('GenericModel.php');

class Users extends GenericModel {

    protected $table = 'users';
    protected $name = "";
    protected $email = "";


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

}
