<?php
class Notes_test extends CI_Controller {

	private function init_test(){
		$this->load->library('unit_test');
        $this->unit->set_test_items(array('test_name', 'expected_result', 'result'));
        $str = '{rows}{item} : {result}<br />{/rows}<br/>';
        $this->unit->set_template($str); 

        $this->load->model('notes');
	}

	private function getterTest(){
		$test = $this->notes->getAttr('table');
		$expected_result = "notes";
		$test_name = "getter table name test";
		$this->unit->run($test, $expected_result, $test_name);
	}

	private function setterTest(){
		$this->notes->setAttr('note', "BLRBLRBLRPOIPOIPOI");
		$test = $this->notes->getAttr('note');
		$expected_result = "BLRBLRBLRPOIPOIPOI";
		$test_name = "setter table name test";
		$this->unit->run($test, $expected_result, $test_name);
	}

	public function test()
	{
		$this->init_test();
		$this->getterTest();
		$this->setterTest();
        echo $this->unit->report();
	}

}
