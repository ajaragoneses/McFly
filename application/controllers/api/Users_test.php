<?php
class Users_test extends CI_Controller {

	private function init_test(){
		$this->load->library('unit_test');
        $this->unit->set_test_items(array('test_name', 'expected_result', 'result'));
        $str = '{rows}{item} : {result}<br />{/rows}<br/>';
        $this->unit->set_template($str); 

        $this->load->model('users');
	}

	private function getterTest(){
		$test = $this->users->getAttr('table');
		$expected_result = "users";
		$test_name = "getter table name test";
		$this->unit->run($test, $expected_result, $test_name);
	}

	private function setterTest(){
		$this->users->setAttr('email', "biff@example.com");
		$test = $this->users->getAttr('email');
		$expected_result = "biff@example.com";
		$test_name = "setter table name test";
		$this->unit->run($test, $expected_result, $test_name);
	}

	private function selectTest(){
		$test = $this->users->get('1')->email;
		$expected_result = "martymcfly@example.com";
		$test_name = "Simple select test";
		$this->unit->run($test, $expected_result, $test_name);
	}

	private function saveUserTest(){
		$array_data = array(
			"name" => "Biff Tannen",
			"email" => "biff@example.com",
			);
		$this->users->set($array_data);
		$this->users->insert();

		$test = $this->users->get('3')->email;
		$expected_result = "biff@example.com";
		$test_name = "Simple create user test";
		$this->unit->run($test, $expected_result, $test_name);
	}

	public function test()
	{
		$this->init_test();
		$this->getterTest();
		$this->setterTest();
		$this->selectTest();
		$this->saveUserTest();
        echo $this->unit->report();
	}

}