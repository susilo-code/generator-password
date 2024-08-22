<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sandi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_sandi');
		$this->load->model('M_unit');
		$this->load->model('M_auth');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSandi'] 	= $this->M_sandi->select_all();
		$data['dataUnit'] 	= $this->M_unit->select_all();
		$data['page'] 		= "sandi";
		$data['judul'] 		= "Dokumentasi Password";
		$data['deskripsi'] 	= "Manage Data Password";

		$data['modal_tambah_sandi'] = show_my_modal('modals/modal_tambah_sandi', 'tambah-sandi', $data);
		$data['modal_tambah_unit'] = show_my_modal('modals/modal_tambah_unit', 'tambah-unit', $data);

		$this->template->views('sandi/home', $data);
	}

	public function tampil() {
		$data['dataSandi'] = $this->M_sandi->select_all();
		$this->load->view('sandi/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('asal', 'Nomor ND Permintaan', 'trim|required');
		$this->form_validation->set_rules('unit', 'Asal ND', 'trim|required');
		$this->form_validation->set_rules('balas', 'Nomor ND Balasan', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_sandi->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Password Berhasil digenerate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Password Gagal digenerate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesTambahunit() {
		$this->form_validation->set_rules('kode', 'Kode Unit', 'trim|required');
		$this->form_validation->set_rules('unit', 'Nama Unit', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_sandi->insertunit($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Referensi Unit Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Referensi Unit Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataSandi'] 	= $this->M_sandi->select_by_id($id);

		echo show_my_modal('modals/modal_update_sandi', 'update-sandi', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('minta', 'Nomor ND Permintaan', 'trim|required');
		$this->form_validation->set_rules('balas', 'Nomor ND Balasan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_sandi->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Password Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Password Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_sandi->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Password Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Password Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['kota'] = $this->M_kota->select_by_id($id);
		$data['jumlahKota'] = $this->M_kota->total_rows();
		$data['dataKota'] = $this->M_kota->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_kota', 'detail-kota', $data, 'lg');
	}

	
}
/* End of file Sandi.php */
/* Location: ./application/controllers/Kota.php */