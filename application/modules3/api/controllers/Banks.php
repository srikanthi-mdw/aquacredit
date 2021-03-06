<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Banks extends CI_Controller 
{
	function __construct()
	{		
		parent::__construct();
		
		$this->load->library('session');		
		$this->load->model('api/Admin_model');		
		$this->load->model('api/Banks_model');
		
		setlocale(LC_MONETARY, 'en_IN');		
		
		header('Access-Control-Allow-Origin: *');
	}

	//all type accunts
	public function index($id = "")
	{
		echo $response = $this->Banks_model->getCashAccounts($id);
	}
	//bank accounts
	public function banks($id = "")
	{
		echo $response = $this->Banks_model->getBanksdata($id);
	}
	//cash account
	public function cash_accounts($id = "")
	{
		echo $response = $this->Banks_model->getCashdata($id);
	}

	public function check_balance()
	{
		echo $response = $this->Banks_model->getAccountBal($_POST);
	}
}
?>