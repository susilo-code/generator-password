<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_skema extends CI_Model {
	public function select_all() {
		$sql = " SELECT ref_skema.id_skema as id_skema,dbase.nm_dbase AS nm_dbase, ref_schema.nm_schema AS skema, ref_koneksi.nm_koneksi AS koneksi,ref_skema.nm_tabel as nm_tabel 
		FROM ref_skema inner join dbase on ref_skema.id_dbase = dbase.id left join ref_koneksi on ref_skema.id_koneksi=ref_koneksi.id left join ref_schema on
		ref_skema.id_schema=ref_schema.id order by dbase.nm_dbase desc";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all_schema() {
		$this->db->select('*');
		$this->db->from('ref_schema');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_all_koneksi() {
		$this->db->select('*');
		$this->db->from('ref_koneksi');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM kota WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_kota={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO ref_skema VALUES('','" .$data['dbase'] ."','" .strtoupper($data['skema'])."','" .strtoupper($data['koneksi'])."','" .strtoupper($data['tabel'])."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertschema($data) {
		$sql = "INSERT INTO ref_schema VALUES('','" .strtoupper($data['schema']) ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertkoneksi($data) {
		$sql = "INSERT INTO ref_koneksi VALUES('','" .strtoupper($data['koneksi']) ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kota', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE kota SET nama='" .$data['kota'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM kota WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('kota');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('kota');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */