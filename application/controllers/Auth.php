<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
			parent::__construct();
		$this->load->model('M_Auth');
		}
	public function index()
	{

		$data['data'] = $this->M_Auth->tbsetup()->result();
		$this->load->view('Auth/login',$data);
				
	}
	public function proses_login()
	{
		
		$output = array('error' => false);

		$username = $_POST['username'];
		$password = $_POST['password'];
		$namasistem = $_POST['namasistem'];
		

		$data = $this->M_Auth->login($username, $password);

		if($data->num_rows() > 0){
 			foreach ($data->result() as $value) {
				$data_session = array(
					'id' => $value->id,
					'username'=> $value->username,
					'id_customer'=>$value->id_customer,
					'customer'=>$value->id_customer,
					'nickname' =>$value->nickname,
					'status' => "login",
					'otori' => $value->otoritas,
					'tglexpired' => $value->tglexpired,
					'avatar' => $value->avatar,
					'companyname' => $value->companyname,
					'namasistem'=>$namasistem,
					'logocompany'=>$value->logocompany,
					);
	 
				$this->session->set_userdata($data_session);
	 			$output['message'] = 'Berhasil Masuk Kedalam Sistem. Mohon Tunggu...';
 			}
		}else{
			$output['error'] = true;
			$output['message'] = 'Login Gagal. Pengguna Tidak Ditemukan atau Akun Anda Di Non-Aktifkan! Hubungi Administrator!';
		}
		

		echo json_encode($output);
	}
	function Logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function Profile()
	{
		$data['side'] = '';
		$data['page'] = 'Profile';
		$data['avatar'] = $this->M_Auth->getDataAvatar()->result();
		$data['data'] = $this->M_Auth->view_akun()->result();
		$this->load->view("auth/profile/index", $data);
	}
	public function updateAvatar()
	{
		$inputAvatar = $this->input->post("inputAvatar");
		$data = $this->M_Auth->updateAvatar($inputAvatar);
		echo json_encode($data);
	}
	public function updatePassword()
	{
		$inputPassword = $this->input->post("inputPassword");
		$data = $this->M_Auth->updatePassword($inputPassword);
		echo json_encode($data);
	}



function tesup(){
   $temp = "upload/";
  if (!file_exists($temp))
    mkdir($temp);
  $username = $this->session->userdata("username");
  $nama_file       = $_POST['nama_file'];
  $fileupload      = $_FILES['fileupload']['tmp_name'];
  $ImageName       = $_FILES['fileupload']['name'];
  $ImageType       = $_FILES['fileupload']['type'];
  $size            = $_FILES['fileupload']['size'];
    
  
 
  
  if (!empty($fileupload)){
    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.','',$ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    //$NewImageName   = str_replace(' ', '', $nama_file.'.'.$ImageExt);
  //$NewImageName   =$nama_file.'.'.$ImageExt;
    $NewImageName   =$nama_file.'.PNG';
    move_uploaded_file($_FILES["fileupload"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'].'/appnew/assets/image/avatar/'.$NewImageName); // Menyimpan file
 		$data = $this->M_Auth->updateAvatar($NewImageName); 
    echo "1";
  } else {
    echo $size;
  }
}


}