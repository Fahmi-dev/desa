		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class Penduduk extends CI_Controller {

			public function __construct() 
			{
				parent::__construct();
				$this->load->model('M_home');
				$this->load->model('M_users');
				$this->load->model('M_kependudukan');
				$this->load->model('M_kependudukan_umur');
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
					'active_function' => 'penduduk',
					'sidebar' => 'sidebar_staf_bagian',
				];
				$data['dataKependudukan'] 	= $this->M_kependudukan->tampil();
				$data['dataKependudukan_umur'] 	= $this->M_kependudukan_umur->tampil();
				$data['dataMutasi'] 	= $this->M_kependudukan->mutasi();
				$data['kependudukanCount'] = $this->M_kependudukan->get_kependudukan_count();
				$data['kependudukan_umurCount'] = $this->M_kependudukan_umur->get_kependudukan_umur_count();
				$data['adminCount'] = $this->M_home->get_admin_count();
				$data['mutasiCount'] = $this->M_kependudukan_umur->get_mutasi_count();
				$data['userCount'] = $this->M_home->get_user_count();
				$data['namaUser'] = $this->M_home->get_nama_kepsek();

				// echo 'pake index';
				$this->load->view('adminlte3/global/template', $data);
			}	

			public function hapus_kependudukan($id_desa){ //fungsi delete
		    $this->load->model('M_kependudukan'); //load model
		    $this->M_kependudukan->hapus_kependudukan($id_desa); //ngacir ke fungsi delTransaksi
		    redirect('staf/penduduk'); //redirect
		}

		public function hapus_mutasi($id_desa){ //fungsi delete
		    $this->load->model('M_kependudukan'); //load model
		    $this->M_kependudukan->hapus_mutasi($id_desa); //ngacir ke fungsi delTransaksi
		    redirect('staf/penduduk'); //redirect
		}

		public function hapus_kep_umur($id_desa){ //fungsi delete
		    $this->load->model('M_kependudukan_umur'); //load model
		    $this->M_kependudukan_umur->hapus_kep_umur($id_desa); //ngacir ke fungsi delTransaksi
		    redirect('staf/penduduk'); //redirect
		}

		public function tambah(){
			$this->load->view('staf/penduduk');
		}

		public function tambah_aksi(){

			$id_desa = $this->input->post('id_desa');

			$laki_laki = $this->input->post('laki_laki');
			$perempuan = $this->input->post('perempuan');
			$tahun = $this->input->post('tahun');

			$data = array(
				'id_desa' => $id_desa,
				'laki_laki' => $laki_laki,
				'perempuan' => $perempuan,
				'tahun' => $tahun
				
			);
			$this->M_kependudukan->input_data($data,'tb_kependudukan');
			redirect('staf/penduduk');
		}

		public function tambah_aksi_umur(){

			$id_desa = $this->input->post('id_desa');

			$umur = $this->input->post('umur');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$jumlah = $this->input->post('jumlah');

			$data = array(
				'id_desa' => $id_desa,
				'umur' => $umur,
				'jenis_kelamin' => $jenis_kelamin,
				'jumlah' => $jumlah
				
			);
			$this->M_kependudukan_umur->input_data($data,'tb_kependudukan_umur');
			redirect('staf/penduduk');
		}

		public function tambah_aksi_mutasi(){

			$id_desa = $this->input->post('id_desa');

			$jenis_mutasi = $this->input->post('jenis_mutasi');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$jumlah = $this->input->post('jumlah');
			$tahun = $this->input->post('tahun');

			$data = array(
				'id_desa' => $id_desa,
				'jenis_mutasi' => $jenis_mutasi,
				'jenis_kelamin' => $jenis_kelamin,
				'jumlah' => $jumlah,
				'tahun' => $tahun,
				
			);
			$this->M_kependudukan->input_data_mutasi($data,'tb_mutasi_kependudukan');
			redirect('staf/penduduk');
		}

		public function edit_kependudukan($id_desa)
		{

			$where = array('id_desa' => $id_desa);

			$data = [
				'active_controller' => 'edit_staf',
				'active_function' => 'edit_kependudukan',
				'sidebar' => 'sidebar_staf_bagian',
			];

			$data['tb_kependudukan'] = $this->M_kependudukan->edit_data($where, 'tb_kependudukan')->result();

			$this->load->view('adminlte3/global/template', $data);
		}	

		public function update_kependudukan(){
			$id_desa = $this->input->post('id_desa');
			$laki_laki = $this->input->post('laki_laki');
			$perempuan = $this->input->post('perempuan');
			$tahun = $this->input->post('tahun');

			$data = array(
				'laki_laki' => $laki_laki,
				'perempuan' => $perempuan,
				'tahun' => $tahun
			);

			$where = array(
				'id_desa' => $id_desa
			);

			$this->M_kependudukan->update_data($where,$data,'tb_kependudukan');
			redirect('staf/penduduk');
		}

		public function edit_umur($id_desa)
		{

			$where = array('id_desa' => $id_desa);

			$data = [
				'active_controller' => 'edit_staf',
				'active_function' => 'edit_kependudukan_umur',
				'sidebar' => 'sidebar_staf_bagian',
			];

			$data['tb_kependudukan_umur'] = $this->M_kependudukan_umur->edit_data_umur($where, 'tb_kependudukan_umur')->result();

			$this->load->view('adminlte3/global/template', $data);
		}	

		public function update_umur(){
			$id_desa = $this->input->post('id_desa');
			$umur = $this->input->post('umur');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$tahun = $this->input->post('tahun');

			$data = array(
				'umur' => $umur,
				'jenis_kelamin' => $jenis_kelamin,
				'tahun' => $tahun
			);

			$where = array(
				'id_desa' => $id_desa
			);

			$this->M_kependudukan_umur->update_data_umur($where,$data,'tb_kependudukan_umur');
			redirect('staf/penduduk');
		}

		public function edit_mutasi($id_desa)
		{

			$where = array('id_desa' => $id_desa);

			$data = [
				'active_controller' => 'edit_staf',
				'active_function' => 'edit_mutasi',
				'sidebar' => 'sidebar_staf_bagian',
			];

			$data['tb_mutasi_kependudukan'] = $this->M_kependudukan->edit_data_mutasi($where, 'tb_mutasi_kependudukan')->result();

			$this->load->view('adminlte3/global/template', $data);
		}	

		public function update_mutasi(){
			$id_desa = $this->input->post('id_desa');
			$jenis_mutasi = $this->input->post('jenis_mutasi');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$jumlah = $this->input->post('jumlah');
			$tahun = $this->input->post('tahun');

			$data = array(
				'jenis_mutasi' => $jenis_mutasi,
				'jenis_kelamin' => $jenis_kelamin,
				'jumlah' => $jumlah,
				'tahun' => $tahun
			);

			$where = array(
				'id_desa' => $id_desa
			);

			$this->M_kependudukan->update_data_mutasi($where,$data,'tb_mutasi_kependudukan');
			redirect('staf/penduduk');
		}
		}
