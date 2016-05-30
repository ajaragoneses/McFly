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
        if ($id == null){
            $notes_ret = $this->notes_model->get_all();
            if($notes_ret == null){
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            } else {
                $this->set_response($notes_ret, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        } else {            
            $note_ret = $this->notes_model->get($id);
            if($note_ret == null){
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            } else {
                $this->set_response($note_ret, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }
    }

    public function notes_post()
    {
        $arr = array(
            'note' => $this->post('note'),
            'id_user' => $this->post('user'), 
            'date' => date('Y-m-d')
            );
        $this->notes_model->insert($arr);
        $this->set_response($this->notes_model, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function notes_delete()
    {
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

    public function fav_get(){
        $id = $this->get('id');
        if ($id == null){
            $this->response([
                'status' => FALSE,
                'message' => 'No id were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        } else {            
            $note_ret = $this->notes_model->get($id);
            if($note_ret == null){
                $this->response([
                    'status' => FALSE,
                    'message' => 'No note were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            } else {
                //
                $user = $this->get('user');
                if($user == null){
                    $this->response([
                        'status' => FALSE,
                        'message' => 'No user were found'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                } else {
                    $this->notes_model->add_fav($user, $id);
                    $this->set_response(NULL, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                }
            }
        }
    }
}
