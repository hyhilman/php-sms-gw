<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMS extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index($table = 'inbox')
	{
		$data['table'] = $table;
		$this->load->view('tables',$data);
	}
}
