<?php
	class M_Auth extends CI_Model {
	
		public function tbsetup()
		{
			//$jk = $this->session->userdata("JENIS_KELAMIN");
			$sql = "SELECT namasistem,logosistem,copyright,versi FROM tbsetup  ";
			return $this->db->query($sql);
		}
		function getrekapkelompok(){
		$sql = "SELECT
				a.id_kelompok,
				a.kelompok,
				SUM(jumlah_buku) AS qty
				FROM
				tbkelompok a
				JOIN tbdaftar_buku b
				ON a.id_kelompok = b.`id_kelompok`
				GROUP BY   a.`id_kelompok`,
				a.kelompok order by qty desc LIMIT 0,10";
		return $this->db->query($sql);
		}
		function getrekapkelompok2(){
		$sql = "SELECT
				a.id_kelompok,
				a.kelompok,
				SUM(jumlah_buku) AS qty
				FROM
				tbkelompok a
				JOIN tbdaftar_buku b
				ON a.id_kelompok = b.`id_kelompok`
				GROUP BY   a.`id_kelompok`,
				a.kelompok order by qty ASC LIMIT 0,10";
		return $this->db->query($sql);
		}
		public function login($username, $password)
		{

			$hash_pass = md5($password);


				$sql = "SELECT
								id,username,PASSWORD,STATUS,avatar,DATE_FORMAT(tglexpired,'%d/%m/%Y' ) as tglexpired,otoritas,a.id_customer,nickname,avatar,companyname,logocompany
								FROM tbuser a left join tbcustomer b on a.id_customer=b.id_customer
								WHERE username = '$username'
								AND PASSWORD = '$hash_pass' and STATUS='AKTIF'";
			return $this->db->query($sql);
		}
		public function getDataAvatar()
		{
			//$jk = $this->session->userdata("JENIS_KELAMIN");
			$sql = "SELECT * FROM tbavatar  WHERE JENIS_KELAMIN='L' ";
			return $this->db->query($sql);
		}
		public function view_akun()
		{
			$username = $this->session->userdata("username");
			$sql = "SELECT
								id,username,PASSWORD,STATUS,avatar,DATE_FORMAT(tglexpired,'%d/%m/%Y' ) as tglexpired,otoritas,a.id_customer,nickname,avatar,companyname,password
								FROM tbuser a left join tbcustomer b on a.id_customer=b.id_customer
								WHERE username = '$username' ";
			return $this->db->query($sql);
		}
		public function updateAvatar($inputAvatar)
		{
			$username = $this->session->userdata("username");
			$sql = "UPDATE tbuser SET AVATAR = '$inputAvatar' WHERE username='$username'";
			return $this->db->query($sql);
		}
		public function updatePassword($inputPassword)
		{
$hash_pass = md5($inputPassword);


			$username = $this->session->userdata("username");
			$sql = "UPDATE tbuser SET PASSWORD = '$hash_pass' WHERE username='$username'";
			return $this->db->query($sql);	
		}
	}