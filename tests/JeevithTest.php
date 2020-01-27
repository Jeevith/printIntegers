<?php

require_once 'PHPUnit/Autoload.php';


class PrintNumberModelTest extends PHPUnit_Framework_TestCase {
   private $CI; 	
   
public function setUp() { 	
    $this->CI = &get_instance();
}

/*
 * This method is used to test the Success case for readyPrintArray
 *
 */
public function testreadyPrintArraySuccess() {
		$this->CI->load->model('PrintNumberModel');
		$posts = $this->CI->PrintNumberModel->readyPrintArray(10, 100);
		$this->assertTrue(is_array($posts));
	}
}

/*
* This method is used to test the failure case for readyPrintArray
*/
public function testreadyPrintArrayFail() {
		$this->CI->load->model('PrintNumberModel');
		$posts = $this->CI->PrintNumberModel->readyPrintArray();
		$this->assertTrue(!is_array($posts));
	}
}


?>