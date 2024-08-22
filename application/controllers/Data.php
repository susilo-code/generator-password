<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_data');
		$this->load->model('M_dbase');
		$this->load->model('M_skema');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataData'] 	= $this->M_data->select_all();
		$data['dataDbase'] 	= $this->M_dbase->select_all();
		$data['dataSkema'] 	= $this->M_skema->select_all();
		$data['page'] 		= "data";
		$data['judul'] 		= "Referensi Data";
		$data['deskripsi'] 	= "Manage Referensi Data";
		$data['modal_tambah_data'] = show_my_modal('modals/modal_tambah_data', 'tambah-data', $data);
		$data['modal_tambah_skema'] = show_my_modal('modals/modal_tambah_skema', 'tambah-skema', $data);

		$this->template->views('data/home', $data);
	}

	public function tampil() {
		$data['dataData'] = $this->M_data->select_all();
		$this->load->view('data/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('ktgr', 'Kategori Data', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis Data', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_data->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Referensi Data Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Referensi Data Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesTambahskema() {
		$this->form_validation->set_rules('dbase', 'Nama Database', 'trim|required');
		$this->form_validation->set_rules('skema', 'Nama Skema', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_data->insertskema($data);

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

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id_data']);
		$data['dataData'] 	= $this->M_data->select_by_id($id);

		echo show_my_modal('modals/modal_update_data', 'update-data', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('ktgr', 'Kategori Data', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis Data', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_data->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Referensi Data Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Referensi Data Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id_data'];
		$result = $this->M_data->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Referensi Data Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Referensi Data Gagal dihapus', '20px');
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

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_kota->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Kota");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Kota.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Kota.xlsx', NULL);
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