<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintNumber extends CI_Controller {


	
	/**
	 * This is Default Controller
	 * This page loads HTML page asking limits 
	 *
	 */
	public function index()
	{ 
		$this->load->view('enterLimits');
	}
	
	/**
	 * This Method is Called to Verify the number entered and to generate and display the Numbers
	 * 
	 */
	public function displayLimitedNumbers() { 
	
	
		 $this->load->model('printNumberModel'); // Load Model
		 
		 if(!isset($_REQUEST["startingNumber"]) || ! isset($_REQUEST["endingNumber"])) {
			throw new Exception("Missing Values!");
		 }
		 
		 
		 if($_REQUEST["startingNumber"] > $_REQUEST["endingNumber"]) {
		 
			 log_message('error', __METHOD__ .":". __LINE__ ." : Message => Enter Valid Limit.");//Log the message
			 
			 $data['errorMessage'] = "Enter Valid Limit"; //Send Error message to View
			 $this->load->view('enterLimits', $data);
			 
		 } else {
			 $data['printFrom'] = $_REQUEST["startingNumber"];
			 $data['printTo'] = $_REQUEST["endingNumber"];
			 $res = "";
			 try {
				//Get values from Model
				$res = $this->printNumberModel->readyPrintArray($data['printFrom'], $data['printTo']);
				
				$data['res'] = $res;
				$this->load->view("printGivenNumbers", $data );//Send the values to View page
				
			 } catch(exception $e) {
				log_message('error', __METHOD__ .":". __LINE__ ." : Message => Invalid Input.");//Log the message
				$data['errorMessage'] = "Enter Valid Limit"; //Send Error message to View
				$this->load->view('enterLimits', $data);
			 }
			 
		 }
		 
	} 

}
