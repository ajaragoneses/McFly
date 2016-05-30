<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';


class Notes extends REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('notes_model');
    }

    public function notes_get()
    {
        $id = $this->get('id');
        if ($id === NULL){
            $notes_ret = $this->notes_model->get_all();
            $this->set_response($notes_ret, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
    }

    public function notes_post()
    {
        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function notes_delete()
    {
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }
}
