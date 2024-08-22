<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skema extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_skema');
		$this->load->model('M_dbase');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSkema'] 	= $this->M_skema->select_all();
		$data['dataDbase'] 	= $this->M_dbase->select_all();
		$data['dataSchema'] 	= $this->M_skema->select_all_schema();
		$data['dataKoneksi'] 	= $this->M_skema->select_all_koneksi();
		$data['page'] 		= "skema";
		$data['judul'] 		= "Referensi Tabel";
		$data['deskripsi'] 	= "Manage Referensi Tabel";
		$data['modal_tambah_skema'] = show_my_modal('modals/modal_tambah_skema', 'tambah-skema', $data);
		$data['modal_tambah_schema'] = show_my_modal('modals/modal_tambah_schema', 'tambah-schema', $data);
		$data['modal_tambah_koneksi'] = show_my_modal('modals/modal_tambah_koneksi', 'tambah-koneksi', $data);
		$this->template->views('skema/home', $data);
		
	}

	public function tampil() {
		$data['dataSkema'] = $this->M_skema->select_all();
		$this->load->view('skema/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('dbase', 'Nama Database', 'trim|required');
		$this->form_validation->set_rules('skema', 'Nama Skema', 'trim|required');
		$this->form_validation->set_rules('koneksi', 'Koneksi', 'trim|required');
		$this->form_validation->set_rules('tabel', 'Nama Tabel', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_skema->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Referensi Tabel Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Referensi Tabel Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesTambahschema() {
		$this->form_validation->set_rules('schema', 'Nama Skema', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_skema->insertschema($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Referensi Skema Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Referensi Skema Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesTambahkoneksi() {
		$this->form_validation->set_rules('koneksi', 'Nama Koneksi', 'trim|required');
		
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_skema->insertkoneksi($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Referensi Koneksi Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Referensi Koneksi Gagal ditambahkan', '20px');
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
		$data['dataKota'] 	= $this->M_kota->select_by_id($id);

		echo show_my_modal('modals/modal_update_kota', 'update-kota', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kota->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kota Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kota Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kota->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Kota Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kota Gagal dihapus', '20px');
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

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_kota->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kota->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Kota Berhasil diimport ke database'));
						redirect('Kota');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Kota Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Kota');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */