<?php
class Notes_test extends CI_Controller {

	private function init_test(){
		$this->load->library('unit_test');
        $this->unit->set_test_items(array('test_name', 'expected_result', 'result'));
        $str = '{rows}{item} : {result}<br />{/rows}<br/>';
        $this->unit->set_template($str); 

        $this->load->model('notes_model');
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

	private function selectTest(){
		$test = $this->notes->get('1')->note;
		$expected_result = "\"Nadie... me llama... ¡gallina!\"";
		$test_name = "Simple select test";
		$this->unit->run($test, $expected_result, $test_name);
	}

		private function saveNoteTest(){
		$array_data = array(
			"note" => "PRUEBA 1 2 3",
			"id_user" => 1,
			'date' => '2016-5-29'
			);
		$this->notes->set($array_data);
		$this->notes->insert();

		$test = $this->notes->get('5')->id_user;
		$expected_result = "1";
		$test_name = "Simple create note test";
		$this->unit->run($test, $expected_result, $test_name);
	}

	public function test()
	{
		$this->init_test();
		$this->getterTest();
		$this->setterTest();
		$this->selectTest();
		$this->saveNoteTest();
        echo $this->unit->report();
	}

}
