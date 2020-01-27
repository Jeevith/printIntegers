<?php

class PrintNumberModel extends CI_Model {     
    
	/**
	 * This methos accepts Start and End number and Return Array to Print
	 * @params int start
	 * @params int end
	 * return array ret
	 */
	public function readyPrintArray(int $start, int $end) : array  {
		 if( (!$start) || (!$end) || ( $start == $end )) {
			 throw new Exception("Value must be in Proper Order!");
			 return array();
		 }
		 $ret = array();
		 for($i=$start; $i<=$end; $i++) {
			  switch($i) {
				case (($i%3 == 0) && ($i%5 == 0)) : 
					$ret[] = $this->config->item('MULTIPLEOFBOTH');//Values comes from configuration file
					break;
				case ($i%3 == 0):
					$ret[] = $this->config->item('MULTIPLEOF3');
					break;
				case ($i%5 == 0):
					$ret[] = $this->config->item('MULTIPLEOF5');
					break;
				default :
					$ret[] = $i;
			  }
		 }
		 return $ret;		 
	}
	
}