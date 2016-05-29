<?php

class GenericModel extends CI_Model {

    protected $table = '';

    public function __construct() {
        parent::__construct();
    }

    public function getAttr($property) {
        //var_dump(__METHOD__);
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function setAttr($property, $value) {
        //var_dump(__METHOD__);
        if (property_exists($this, $property)) {
            $this->$property = $value;
            $this->db->set($this);
        }
    }

    public function set($array) {
        $this->db->set($array);
    }

    public function get($id){
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert() {
        $this->db->insert($this->table, $this);
    }

    public function update($id) {
        $this->db->update($this->table, $this, array('id' => $id));
    }

    public function delete($id){
        $this->db->delete($this->table, array('id' => $id)); 
    }
}
