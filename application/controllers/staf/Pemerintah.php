		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class Pemerintah extends CI_Controller {

			public function __construct() 
			{
				parent::__construct();
				$this->load->model('M_home');
				$this->load->model('M_users');
				$this->load->model('M_desa');
				if (empty($this->session->userdata('status')) || $this->session->userdata('status') !== "LogedIn") {
					return redirect('logout');
				} else {
					if (!empty($this->session->userdata('userdata')->privilege) && $this->session->userdata('userdata')->privilege !== 'staf') 
					{
						return redirect('logout');		
					}
				}
			}
			public function index()
			{
				$data = [
					'active_controller' => 'home',
					'active_function' => 'pemerintah',
					'sidebar' => 'sidebar_staf_bagian',
				];
				$data['dataDesa'] = $this->M_desa->tampil2();
				$data['desaCount'] = $this->M_desa->desaCount();

				// echo 'pake index';
				$this->load->view('adminlte3/global/template', $data);
			}	

				public function hapus_desa($id_desa){ //fungsi delete
		    $this->load->model('M_desa'); //load model
		    $this->M_desa->hapus_desa($id_desa); //ngacir ke fungsi delTransaksi
		    redirect('staf/pemerintah'); //redirect
		}

		public function tambah(){
			$this->load->view('staf/pemerintah');
		}

		public function tambah_aksi(){

			$id_desa = $this->input->post('id_desa');

			$dukuh = $this->input->post('dukuh');
			$dusun = $this->input->post('dusun');
			$rw = $this->input->post('rw');
			$rt = $this->input->post('rt');
			$tahun = $this->input->post('tahun');

			$data = array(
				'id_desa' => $id_desa,
				'dukuh' => $dukuh,
				'dusun' => $dusun,
				'rw' => $rw,
				'rt' => $rt,
				'tahun' => $tahun
			);
			$this->M_desa->input_data($data,'tb_pembagian_desa');
			redirect('staf/pemerintah');
		}

		public function edit_desa($id_desa)
		{

			$where = array('id_desa' => $id_desa);

			$data = [
				'active_controller' => 'edit_staf',
				'active_function' => 'edit_desa',
				'sidebar' => 'sidebar_staf_bagian',
			];

			$data['tb_pembagian_desa'] = $this->M_desa->edit_data($where, 'tb_pembagian_desa')->result();

			$this->load->view('adminlte3/global/template', $data);
		}	

		public function update_desa(){
			$id_desa = $this->input->post('id_desa');
			$dukuh = $this->input->post('dukuh');
			$dusun = $this->input->post('dusun');
			$rw = $this->input->post('rw');
			$rt = $this->input->post('rt');
			$tahun = $this->input->post('tahun');

			$data = array(
				'dukuh' => $dukuh,
				'dusun' => $dusun,
				'rw' => $rw,
				'rt' => $rt,
				'tahun' => $tahun
			);

			$where = array(
				'id_desa' => $id_desa
			);

			$this->M_desa->update_data($where,$data,'tb_pembagian_desa');
			redirect('staf/pemerintah');
		}
		}
