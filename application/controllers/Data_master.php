<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Master extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->model('M_Data_Master');
	
	
		if($this->session->userdata('status') != "login"){
	 		redirect(base_url("Auth/index"));
	 	}
	}

	public function User_Login()
	{
		$data['side'] = 'data_master-login';
		$data['page'] = 'Master Data User Login';
	
		$this->load->view('master/user_login/index', $data);
	}

	public function kelompok()
	{
		$data['side'] = 'data_master-kelompok';
		$data['page'] = 'Master Data kelompok';

		$this->load->view('master/kelompok/index', $data);
	}

	public function Anggota()
	{
		$data['side'] = 'data_master-anggota';
		$data['page'] = 'Master Data Anggota';

		$this->load->view('master/Anggota/index', $data);
	}

	public function getTabelUserLogin()
	{
		$filSearch = $this->input->post("filSearch");
		$data['data'] = $this->M_Data_Master->getDataUserLogin($filSearch)->result();
		$this->load->view('master/user_login/tabel', $data);
	}
		public function getTabelkelompok()
	{
		$filSearch = $this->input->post("filSearch");
		$data['data'] = $this->M_Data_Master->getDatakelompok($filSearch)->result();
		$this->load->view('master/kelompok/tabel', $data);
	}
		public function getTabelanggota()
	{
		$filSearch = $this->input->post("filSearch");
		$data['data'] = $this->M_Data_Master->getdataanggota($filSearch)->result();
		$this->load->view('master/Anggota/tabel', $data);
	}

	public function getcompanyname()
	{
		$cari = $this->input->post("cari");
		$sql = $this->M_Data_Master->getcompanyname($cari);
		$item = $sql->result_array();
		$data = array();
		foreach ($item as $key) {
			$data[] = array('id' =>$key['id_customer'] , 'text' =>$key['companyname']);
		}
		echo json_encode($data);
	}

	public function hapuskelompok()
	{
	$id_kelompok = $this->input->post("id_kelompok");
	$data = $this->M_Data_Master->hapuskelompok($id_kelompok);
	echo json_encode($data);
	}

		public function hapusanggota()
	{
	$id_anggota = $this->input->post("id_anggota");
	$data = $this->M_Data_Master->hapusanggota($id_anggota);
	echo json_encode($data);
	}

	public function tambahdatakelompok()
	{
		$id_kelompok = $this->input->post("id_kelompok");
		$kelompok = $this->input->post("kelompok");
		
		if($id_kelompok!=''){
		$data = $this->M_Data_Master->editkelompok($id_kelompok,$kelompok);
		}else{
		$data = $this->M_Data_Master->tambahkelompok($kelompok);
		}
		echo json_encode($data);
	}

	public function tambahanggota()
	{
		$id_anggota = $this->input->post("id_anggota");
		$noanggota = $this->input->post("noanggota");
		$Nama = $this->input->post("Nama");
		$tgldaftar = $this->input->post("tgldaftar");
		$tgllahir = $this->input->post("tgllahir");
		$alamat = $this->input->post("alamat");
		$keterangan = $this->input->post("keterangan");
		$status = $this->input->post("status");
		if($id_anggota!=''){
		$data = $this->M_Data_Master->editanggota($id_anggota,$noanggota,$Nama,$tgldaftar,$tgllahir,$alamat,$keterangan,$status);
		}else{
		$data = $this->M_Data_Master->tambahanggota($id_anggota,$noanggota,$Nama,$tgldaftar,$tgllahir,$alamat,$keterangan,$status);
		}
		echo json_encode($data);
	}

	public function editdataakun(){
		$nickname2 = $this->input->post("nickname2");
		$username2 = $this->input->post("username2");
		$tglexpired2 = $this->input->post("tglexpired2");
		$otoritas2 = $this->input->post("otoritas2");
		$customer2 = $this->input->post("customer2");

		$data = $this->M_Data_Master->editdataakun($nickname2,$username2,$tglexpired2,$otoritas2,$customer2);

echo json_encode($data);
	}

	public function tambahAkun()
	{
		$nickname = $this->input->post("nickname");
		$username = $this->input->post("username");
		$pass = $this->input->post("pass");
		$customer = $this->input->post("customer");
		$tglexpired = $this->input->post("tglexpired");
		$otoritas = $this->input->post("otoritas");
		$data = $this->M_Data_Master->tambahAkun($nickname,$username,$pass,$customer,$tglexpired,$otoritas);
		echo json_encode($data);
	}
	public function ubahStatusAkun()
	{
		$username = $this->input->post("username");
		$status = $this->input->post("status");
		$data = $this->M_Data_Master->ubahStatusAkun($username, $status);
		echo json_encode($data);
	}
	public function hapususer()
	{
	$username = $this->input->post("username");
	$data = $this->M_Data_Master->hapususer($username);
	echo json_encode($data);
	}
	public function ambilnoanggota(){
			$cekNoDoc=$this->db->query("SELECT MAX(RIGHT(noanggota,5)) AS noanggota FROM tbanggota");
		foreach ($cekNoDoc->result() as $data) {
            if ($data->noanggota =="") {
                $URUTZERO = "AGT-00001";

                $hasil= array('nomor' => $URUTZERO);
                echo json_encode($hasil);
            }else{
                $zero='';
                $length= 5;
                $index=$data->noanggota;

                for ($i=0; $i <$length-strlen($index+1) ; $i++) { 
                    $zero = $zero.'0';
                }
                $URUTDOCNO = 'AGT-'.$zero.($index+1);
                
                $hasil= array('nomor' => $URUTDOCNO);
                echo json_encode($hasil);  
            }
            
        }
	}


}
