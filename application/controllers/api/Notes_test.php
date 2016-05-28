<?php
class Notes_test extends CI_Controller {

	private function init_test(){
		$this->load->library('unit_test');
        $this->unit->set_test_items(array('test_name', 'expected_result', 'result'));
        $str = '{rows}{item} : {result}<br />{/rows}<br/>';
        $this->unit->set_template($str); 
	}

	private function sumaCorrectaTest(){
		$test = 1 + 1;
        $expected_result = 2;
        $test_name = 'Adds one plus one';
        $this->unit->run($test, $expected_result, $test_name);
	}

	private function sumaIncorrectaTest(){
		$test = 1 + 1;
        $expected_result = 3;
        $test_name = 'Adds one plus one';
        $this->unit->run($test, $expected_result, $test_name);
	}


	public function test()
	{
		$this->init_test();
		$this->sumaCorrectaTest();
		$this->sumaIncorrectaTest();
        echo $this->unit->report();
	}

}
?>