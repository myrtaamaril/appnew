<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
	 		redirect(base_url("Auth/index"));
	 	}
	 			$this->load->model('M_Auth');
	}
	
	public function index()
	{		
			$data['side'] = 'dashboard';	
			$data['page'] = '';	
			$data['judul'] = 'Dashboard';	 
			$data['rekapkelompok'] = $this->M_Auth->getrekapkelompok()->result();
			$data['rekapkelompok2'] = $this->M_Auth->getrekapkelompok2()->result();
			$this->template->load('kerangka','isi',$data) ; 
		    
	}
}
