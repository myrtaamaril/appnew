<?php
class M_data_buku extends CI_Model {
	function __construct(){
		parent::__construct();

	}

public function mgetkelompok($cari)
	{
		$sql = "SELECT
				id_kelompok,
				kelompok
				FROM
				tbkelompok
		WHERE (kelompok LIKE '%$cari%')
		ORDER BY id_kelompok ASC
		LIMIT 0, 20";
		return $this->db->query($sql);
	}


	public function editbuku($id_buku,$kelompok,$kode,$judul,$penulis,$qty,$subjudul)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d H:i:s');
		$user = $this->session->userdata("username");
		$sql = "UPDATE tbdaftar_buku set judul_buku='$judul',penulis='$penulis',kode='$kode',sub_judul='$subjudul',jumlah_buku=$qty,id_kelompok='$kelompok',userlog='$user',updatedate='$tanggal' where id_buku='$id_buku'  ";
		return $this->db->query($sql);
	}

	public function tambahbuku($kelompok,$kode,$judul,$penulis,$qty,$subjudul)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d H:i:s');
		$user = $this->session->userdata("username");
		$sql = "INSERT tbdaftar_buku(kode,Judul_Buku,penulis,id_kelompok,jumlah_buku,sub_judul,userlog)values	
		('$kode','$judul','$penulis','$kelompok','$qty','$subjudul','$user') ";
		return $this->db->query($sql);
	}
	
	public function hapusbuku($id_buku)
	{
	$sql = "DELETE FROM tbdaftar_buku WHERE id_buku='$id_buku' ";
	return $this->db->query($sql);
	}



}