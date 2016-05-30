<?php
include_once('GenericModel.php');

class Notes_model extends GenericModel {

    protected $table = 'notes';
    protected $note = "";
    protected $id_user = 0;


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_fav($user, $id){
    	$query = "INSERT INTO `favorites` (`user_id`, `notes_id`) VALUES('".$user."', '".$id."');";
    	$this->db->query($query);
    }

}
