<?php
class M_Data_Master extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getDatakelompok($search)
	{
		$sql = "SELECT
		id_kelompok,
		kelompok
		FROM
		tbkelompok a
		where (kelompok like '%$search%') ";
		return $this->db->query($sql);
	}
	public function getdataanggota($search)
	{
		$sql = "SELECT
		id_anggota,
		noanggota,nama,tanggal_daftar,tanggal_lahir,alamat,status,Keterangan,inputby,inputon
		FROM
		tbanggota a
		where (noanggota like '%$search%' or nama like '%$search%' or Keterangan like '%$search%') ";
		return $this->db->query($sql);
	}
	public function editanggota($id_anggota,$noanggota,$Nama,$tgldaftar,$tgllahir,$alamat,$keterangan,$status)
	{
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d H:i:s');
			$user = $this->session->userdata("username");
			$sql = "UPDATE tbanggota set Nama='$Nama',tanggal_lahir='$tgllahir',alamat='$alamat',Keterangan='$keterangan',inputby='$user',inputon='$tanggal',tanggal_daftar='$tgldaftar' ,status='$status' where id_anggota='$id_anggota' ";
			return $this->db->query($sql);
	}
	public function tambahanggota($id_anggota,$noanggota,$Nama,$tgldaftar,$tgllahir,$alamat,$keterangan,$status)
	{
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d H:i:s');
			$user = $this->session->userdata("username");
			$sql = "INSERT tbanggota(noanggota,nama,tanggal_daftar,tanggal_lahir,alamat,Keterangan,inputby,inputon,status)
			values('$noanggota','$Nama','$tgldaftar','$tgllahir','$alamat','$keterangan','$user','$tanggal','$status') ";
			return $this->db->query($sql);
	}
	public function hapususer($username)
	{
		$sql = "DELETE FROM tbuser WHERE username='$username' ";
		return $this->db->query($sql);
	}
	public function hapuskelompok($id_kelompok)
	{
		$sql = "DELETE FROM tbkelompok WHERE id_kelompok='$id_kelompok' ";
		return $this->db->query($sql);
	}
		public function hapusanggota($id_anggota)
	{
		$sql = "DELETE FROM tbanggota WHERE id_anggota='$id_anggota' ";
		return $this->db->query($sql);
	}
	public function editkelompok($id_kelompok,$kelompok)
	{
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d H:i:s');
			$user = $this->session->userdata("username");
			$sql = "UPDATE tbkelompok set kelompok='$kelompok' where id_kelompok='$id_kelompok'  ";
			return $this->db->query($sql);
	}
		public function editdataakun($nickname2,$username2,$tglexpired2,$otoritas2,$customer2)
	{
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d H:i:s');
			$user = $this->session->userdata("username");
			$sql = "UPDATE tbuser set nickname='$nickname2',tglexpired='$tglexpired2',otoritas='$otoritas2',id_customer='$customer2',inputby='$user',TglInput='$tanggal' where username='$username2'  ";
			return $this->db->query($sql);
	}

	public function tambahkelompok($kelompok)
	{
			$sql = "INSERT tbkelompok(kelompok)values('$kelompok') ";
			return $this->db->query($sql);
	}

	public function getDataUserLogin($search)
	{
		$sql = "SELECT
		username,
		nickname,
		STATUS,
		DATE_FORMAT(tglexpired, '%Y-%m-%d')as tglexpired,
		avatar AS foto,
		otoritas,
		a.id_customer,
		companyname
		FROM
		tbuser a
		LEFT JOIN tbcustomer b
		ON a.id_customer = b.id_customer 
		where (username like '%$search%' or nickname like '%$search%' or companyname like '%$search%') ";
		return $this->db->query($sql);
	}
	public function getcompanyname($cari)
	{
		$sql = "SELECT
		id_customer,
		companyname
		FROM
		tbcustomer
		WHERE (companyname LIKE '%$cari%')
		ORDER BY companyname ASC
		LIMIT 0, 20";
		return $this->db->query($sql);
	}

	public function tambahAkun($nickname,$username,$pass,$customer,$tglexpired,$otoritas)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d H:i:s');
		$user = $this->session->userdata("username");
		//$getData = $this->db->query("SELECT jabatan, jkelamin FROM dbhrm.dbo.tbPegawai WHERE nik = '$nik'");
		//$level = 4;
		$avatar = 'male1.png';
		/*foreach ($getData->result() as $key) {
			$level = $key->jabatan == 'Kepala Bagian'?3:4;
			$avatar = $key->jkelamin == 'L'?'male1.png':'female1.png';
		}*/
			$hash_pass = md5($pass);

		$sql = "INSERT INTO tbuser(username,password,nickname,STATUS,avatar,tglexpired,inputby,TglInput,id_customer,otoritas) 
		VALUES('$username','$hash_pass','$nickname','AKTIF','$avatar','$tglexpired','$user','$tanggal','$customer','$otoritas')";
		return $this->db->query($sql);
	}
	public function ubahStatusAkun($username, $status)
	{
		$sql = "UPDATE tbuser SET STATUS = '$status' WHERE username = '$username'";
		$this->db->query($sql);
	}
	public function ubahLevelAkun($nik, $level)
	{
		$sql = "UPDATE tbuser SET LEVEL = '$level' WHERE NIK = '$nik'";
		$this->db->query($sql);
	}

}