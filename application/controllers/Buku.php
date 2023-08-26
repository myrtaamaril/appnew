<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
	function __construct(){
			parent::__construct();
	
		$this->load->model('M_Data_buku');	
		if($this->session->userdata('status') != "login"){
	 		redirect(base_url("Auth/index"));
	 	}
		}
		

	public function index()
	{
		$data['side'] = 'Buku';
		$data['page'] = 'Data Buku';
		$this->load->view("buku/index", $data);
	}

	public function ambil_buku(){
                    $columns = array( 
                    0=>'id_buku',
                    1=>'kode',
                    2=>'Judul_Buku',
                    3=>'penulis',
                    4=>'kelompok',
                    5=>'jumlah_buku',
                    6=>'sub_judul',
                    7=>'id_buku'
                    );

		$querycount = $this->db->query("SELECT count(id_buku) as jumlah FROM tbdaftar_buku")->row_array();
	//	$datacount = $querycount->result_array();
	
  
        $totalData = $querycount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
            
        if(empty($_POST['search']['value']))
        {            
        	$query = $this->db->query("SELECT
																  id_buku,
																  kode,
																  Judul_Buku,
																  penulis,
																  b.kelompok,
																  a.id_kelompok,
																  jumlah_buku,
																  sub_judul
																FROM
																  tbdaftar_buku a left join tbkelompok b 
																			  on a.id_kelompok=b.id_kelompok order by $order $dir 
        																LIMIT $limit 
        																OFFSET $start");
        }
        else {
            $search = $_POST['search']['value']; 
            $query = $this->db->query("SELECT
																			  id_buku,
																			  kode,
																			  Judul_Buku,
																			  penulis,
																			  b.kelompok,
																			  a.id_kelompok,
																			  jumlah_buku,
																			  sub_judul
																			FROM
																			  tbdaftar_buku a left join tbkelompok b 
																			  on a.id_kelompok=b.id_kelompok
																			   WHERE (Judul_Buku LIKE '%$search%' 
																			    	or penulis LIKE '%$search%'
																			    	or b.kelompok LIKE '%$search%'
																			    	or sub_judul LIKE '%$search%' )
            															order by $order $dir 
            															LIMIT $limit 
            															OFFSET $start");


           $querycount = $this->db->query("SELECT count(id_buku) as jumlah FROM
																			  tbdaftar_buku  a left join tbkelompok b 
																			  on a.id_kelompok=b.id_kelompok
																			   WHERE (Judul_Buku LIKE '%$search%' 
																			    	or penulis LIKE '%$search%'
																			    	or b.kelompok LIKE '%$search%'
																			    	or sub_judul LIKE '%$search%' ) ")->row_array();;
		 
           $totalFiltered =  $querycount['jumlah'];
        }

     
        if(!empty($query))
        {
            $no = $start + 1;

            	$item = $query->result_array();
		$data = array();
		foreach ($item as $key) {
			$data[] = array(
			'id_buku'=>$key['id_buku'],
			'kode'=>$key['kode'],
			'Judul_Buku'=>$key['Judul_Buku'],
			'penulis'=>$key['penulis'],
			'kelompok'=>$key['kelompok'],
			'jumlah_buku'=>$key['jumlah_buku'],
			'sub_judul'=>$key['sub_judul'],
			'aksi'=>"<a href=\"javascript:ubahdata('".$key['id_buku']."','".$key['kode']."','".$key['Judul_Buku']."','".$key['penulis']."','".$key['id_kelompok']."','".$key['jumlah_buku']."','".$key['sub_judul']."','".$key['kelompok']."')\" class='btn-warning btn-sm'><i class='fas fa-pencil-alt mr-1'></i>&nbsp;Ubah</a>&nbsp;<a href=\"javascript:hapus('".$key['id_buku']."','".$key['Judul_Buku']."')\" class='btn-danger btn-sm'><i class='fas fa-trash'></i>&nbsp;Hapus</a>",
				);
			$no++;
		}         
        }          
        $json_data = array(
                    "draw"            => intval($_POST['draw']),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
        echo json_encode($json_data); 
	}

	public function getkelompok(){
		$cari = $this->input->post("cari");
		$sql = $this->M_Data_buku->mgetkelompok($cari);
		$item = $sql->result_array();
		$data = array();
		foreach ($item as $key) {
			$data[] = array('id' =>$key['id_kelompok'] , 'text' =>$key['kelompok']);
		}
		echo json_encode($data);

	}
	public function tambahdatabuku()
	{
		$id_buku = $this->input->post("id_buku");
		$kelompok = $this->input->post("kelompok");
		$kode = $this->input->post("kode");
		$judul = $this->input->post("judul");
		$penulis = $this->input->post("penulis");
		$qty = $this->input->post("qty");
		$subjudul = $this->input->post("subjudul");
		if($id_buku!=''){
		$data = $this->M_Data_buku->editbuku($id_buku,$kelompok,$kode,$judul,$penulis,$qty,$subjudul);
		}else{
		$data = $this->M_Data_buku->tambahbuku($kelompok,$kode,$judul,$penulis,$qty,$subjudul);
		}
		echo json_encode($data);
	}
	public function hapusbuku()
	{
		$id_buku = $this->input->post("id_buku");
		$data = $this->M_Data_buku->hapusbuku($id_buku);
		echo json_encode($data);
	}



}