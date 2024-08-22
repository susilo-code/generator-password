<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sandi extends CI_Model {
	public function select_all() {
		$telo=$this->session->userdata('userdata')->id;
		$sql = " SELECT sandi.id as id,unit.nm_unit AS unit,sandi.id_nama as id_nama,admin.nama as nama,sandi.kd_unit as kd_unit, sandi.nd_minta AS nd_minta,sandi.id_sts as id_sts, ref_status.status as status,sandi.nd_balas AS nd_balas, sandi.sandi AS sandi FROM sandi inner join admin 
		on sandi.id_nama = admin.id inner join ref_status on sandi.id_sts=ref_status.id inner join unit on sandi.kd_unit=unit.kd_unit where admin.id='{$telo}' order by sandi.id desc"; 

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all_status() {
		$telo=$this->session->userdata('userdata')->id;
		$sql = " SELECT sandi.id as id,sandi.id_nama as id_nama,admin.nama as nama, sandi.nd_minta AS nd_minta,sandi.id_sts as id_sts, ref_status.status as status FROM sandi inner join admin 
		on sandi.id_nama = admin.id inner join ref_status on sandi.id_sts=ref_status.id where admin.id='{$telo}' group by id_sts"; 

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all_asal() {
		$telo=$this->session->userdata('userdata')->id;
		$sql = " SELECT sandi.id as id,unit.nm_unit AS unit,sandi.id_nama as id_nama,admin.nama as nama,sandi.kd_unit as kd_unit, sandi.nd_minta AS nd_minta,sandi.nd_balas AS nd_balas, sandi.sandi AS sandi FROM sandi inner join admin 
		on sandi.id_nama = admin.id inner join unit on sandi.kd_unit=unit.kd_unit where admin.id='{$telo}' group by kd_unit"; 

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM sandi WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}



	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_kota={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

 
	public function insert($data) {
		$sqlu = "INSERT INTO sandi VALUES('','" .$data['autor'] ."','" .$data['asal'] ."','" .$data['status'] ."','" .$data['unit'] ."','" .$data['balas'] ."','No Password')";
		$sql = "INSERT INTO sandi VALUES('','" .$data['autor'] ."','" .$data['asal'] ."','" .$data['status'] ."','" .$data['unit'] ."','" .$data['balas'] ."','".substr(str_shuffle(base64_encode('$^&*!@-><#1234567890[]{}|'.$data['asal'].$data['unit'].$data['balas'])),9,18)."')";

		if ($data['status']==1){
		$this->db->query($sql);} else {
		$this->db->query($sqlu);	
		}

		return $this->db->affected_rows();
	}

public function insertunit($data) {
		$sql = "INSERT INTO unit VALUES('" .strtoupper($data['kode']) ."','" .ucwords($data['unit']) ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	

	public function update($data) {
		$sql = "UPDATE sandi SET sandi='" .$data['sandi'] ."',kd_unit='" .$data['unit'] ."',nd_minta='" .$data['minta'] ."',nd_balas='" .$data['balas'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM sandi WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('kota');

		return $data->num_rows();
	}

	public function total_rows() {
		$telo = $this->session->userdata('userdata')->id;
		$sql = "SELECT * from sandi where id_nama='{$telo}' and id_sts='1'";
		$data = $this->db->query($sql);
		return $data->num_rows();
	}

	public function total_rows_tolak() {
		$telo = $this->session->userdata('userdata')->id;
		$sql = "SELECT * from sandi where id_nama='{$telo}' and id_sts='2'";
		$data = $this->db->query($sql);
		return $data->num_rows();
	}

	public function select_by_posisi($id_sts) {
		$telo=$this->session->userdata('userdata')->id;
		$sql = " SELECT count(*) as jml FROM sandi inner join admin 
		on sandi.id_nama = admin.id inner join ref_status on sandi.id_sts=ref_status.id where sandi.id_sts={$id_sts} and admin.id='{$telo}'"; 

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($kd_unit) {
		$telo=$this->session->userdata('userdata')->id;
		$sql = " SELECT count(*) as jml FROM sandi inner join admin 
		on sandi.id_nama = admin.id inner join ref_status on sandi.id_sts=ref_status.id inner join unit on sandi.kd_unit=unit.kd_unit where sandi.kd_unit='{$kd_unit}' and admin.id='{$telo}' order by sandi.id desc"; 

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function total_rows_no() {
		$telo = $this->session->userdata('userdata')->id;
		$sql = "SELECT * from sandi where id_nama='{$telo}' and id_sts='3'";
		$data = $this->db->query($sql);
		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */