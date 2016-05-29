<?php
include_once('GenericModel.php');

class Notes extends GenericModel {

    protected $table = 'notes';
    protected $note = "";
    protected $id_user = 0;


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

}
