<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends CI_Controller {

		public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }

		// Page
		public function index() {
			if($this->session->userdata('level') == '1'){
				redirect(base_url('admin/minat_bakat'));
			}else {
				$this->load->view('theme/header.php');
				$this->load->view('content/admin/login.php');
			}
		}

		public function minat_bakat() {
			if($this->session->userdata('level') != '1'){
				redirect(base_url('admin'));
			}else {
				$this->load->view('theme/header.php');
				$this->load->view('theme/navbar.php');
				$this->load->view('content/admin/minat_bakat_view.php');
				$this->load->view('theme/footer.php');
			}
		}

		public function keahlian() {
			if($this->session->userdata('level') != '1'){
				redirect(base_url('admin'));
			}else {
				$this->load->view('theme/header.php');
				$this->load->view('theme/navbar.php');
				$this->load->view('content/admin/keahlian_view.php');
				$this->load->view('theme/footer.php');
			}
		}

		public function user() {
			if($this->session->userdata('level') != '1'){
				redirect(base_url('admin'));
			}else {
				$this->load->view('theme/header.php');
				$this->load->view('theme/navbar.php');
				$this->load->view('content/admin/user_view.php');
				$this->load->view('theme/footer.php');
			}
		}

		public function rule() {
			if($this->session->userdata('level') != '1'){
				redirect(base_url('admin'));
			}else {
				$this->load->view('theme/header.php');
				$this->load->view('theme/navbar.php');
				$this->load->view('content/admin/rule_view.php');
				$this->load->view('theme/footer.php');
			}
		}
		// End Page

		// Auth
		public function login() {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			$cek_login = $this->admin_model->auth($where, 'user');
			if ($cek_login) {
				$data_session = array(
					'username' => $cek_login->username,
					'user_id'  => $cek_login->user_id,
					'level'    => $cek_login->level,
					'status'   => '1'
				);
				$this->db->update('user', ['status' => '1']);
				$this->session->set_userdata($data_session);
				// redirect(base_url('admin/minat_bakat'));
				$result = base_url().'admin/minat_bakat';
			}else {
				$result = false;
			}
			print_r(json_encode($result));
		}

		function logout(){
			$this->session->sess_destroy();
			redirect(base_url('admin'));
		}
		// End Auth

		// Get Data Tabel
		public function get_rule() {
			$draw       		 = $_POST['draw'];
			$start      		 = $_POST['start'];
			$rowperpage 		 = $_POST['length'];
			$columnIndex  	 = $_POST['order'][0]['column'];
			$columnName   	 = $_POST['columns'][$columnIndex]['data'];
			$columnSortOrder = $_POST['order'][0]['dir'];
			$searchValue     = $_POST['search']['value'];
			$where_like 		 = array(
				'rule.kode_rule' 					=> $searchValue,
				'minat_bakat.minat_bakat' => $searchValue
			);

			$query					 = $this->admin_model->get_join_tabel($where_like, $rowperpage, $start, 'rule.modified_on', 'rule');
			foreach ($query as $key => $value) {
				$value->no		 = $key+1;
				$value->aksi   = '<div class="btn-group btn-group-toggle">'
													 .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-info detail" data="'.$value->kode_rule.'">Detail</a>'
													 .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-success edit" data="'.$value->kode_rule.'">Ubah</a>'
												   .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-danger hapus" data="'.$value->kode_rule.'">Hapus</a>'
												 .'</div>';
			}
			$result['draw'] 					 = $draw;
			$result['recordsTotal']    = $this->admin_model->count_all_join('rule');
			$result['recordsFiltered'] = $this->admin_model->count_filter_join('rule_id', $searchValue, 'rule');
			$result['data'] 					 = $query;
			print_r(json_encode($result));
		}

		public function get_minat_bakat() {
			$draw       		 = $_POST['draw'];
			$start      		 = $_POST['start'];
			$rowperpage 		 = $_POST['length'];
			$columnIndex  	 = $_POST['order'][0]['column'];
			$columnName   	 = $_POST['columns'][$columnIndex]['data'];
			$columnSortOrder = $_POST['order'][0]['dir'];
			$searchValue     = $_POST['search']['value'];
			$where_like 		 = array(
				'minat_bakat'  => $searchValue
			);
			$query					 = $this->admin_model->get_data_tabel($where_like, $rowperpage, $start, 'modified_on', 'minat_bakat');
			foreach ($query as $key => $value) {
				$value->no		 = $key+1;
				$value->aksi   = '<div class="btn-group btn-group-toggle">'
													 .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-success edit" data="'.$value->minat_bakat_id.'">Ubah</a>'
												   .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-danger hapus" data="'.$value->minat_bakat_id.'">Hapus</a>'
												 .'</div>';
			}
			$result['draw'] 					 = $draw;
			$result['recordsTotal']    = $this->admin_model->get_all('minat_bakat');
			$result['recordsFiltered'] = $this->admin_model->count_filter('minat_bakat', $searchValue, 'minat_bakat');
			$result['data'] 					 = $query;
			print_r(json_encode($result));
		}

		public function get_keahlian() {
			$draw       		 = $_POST['draw'];
			$start      		 = $_POST['start'];
			$rowperpage 		 = $_POST['length'];
			$columnIndex  	 = $_POST['order'][0]['column'];
			$columnName   	 = $_POST['columns'][$columnIndex]['data'];
			$columnSortOrder = $_POST['order'][0]['dir'];
			$searchValue     = $_POST['search']['value'];
			$where_like 		 = array(
				'keahlian'  => $searchValue
			);
			$query					 = $this->admin_model->get_data_tabel($where_like, $rowperpage, $start, 'modified_on', 'keahlian');
			foreach ($query as $key => $value) {
				$value->no		 = $key+1;
				$value->aksi   = '<div class="btn-group btn-group-toggle">'
													 .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-success edit" data="'.$value->keahlian_id.'">Ubah</a>'
												   .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-danger hapus" data="'.$value->keahlian_id.'">Hapus</a>'
												 .'</div>';
			}
			$result['draw'] 					 = $draw;
			$result['recordsTotal']    = $this->admin_model->get_all('keahlian');
			$result['recordsFiltered'] = $this->admin_model->count_filter('keahlian', $searchValue, 'keahlian');
			$result['data'] 					 = $query;
			print_r(json_encode($result));
		}

		public function get_user() {
			$draw       		 = $_POST['draw'];
			$start      		 = $_POST['start'];
			$rowperpage 		 = $_POST['length'];
			$columnIndex  	 = $_POST['order'][0]['column'];
			$columnName   	 = $_POST['columns'][$columnIndex]['data'];
			$columnSortOrder = $_POST['order'][0]['dir'];
			$searchValue     = $_POST['search']['value'];
			$where_like 		 = array(
				'username'  => $searchValue,
			);
			$query					 = $this->admin_model->get_data_tabel($where_like, $rowperpage, $start, 'created_on', 'user');
			foreach ($query as $key => $value) {
				$value->no		   = $key+1;
				if ($value->status == '1') {
					$value->status_f = '<div class="btn-group btn-group-toggle">'
														 .'<a href="javascript:void(0)" type="button" class="btn btn-xs btn-success">Aktif</a>'
													 .'</div>';
				} else {
					$value->status_f = '<div class="btn-group btn-group-toggle">'
														 .'<a href="javascript:void(0)" type="button" class="btn btn-xs btn-danger">Delete</a>'
													 .'</div>';
				}
				if ($value->level == '1') {
					$value->level_f = '<div class="btn-group btn-group-toggle">'
														 .'<a href="javascript:void(0)" type="button" class="btn btn-xs btn-success">Admin</a>'
													 .'</div>';
					$value->aksi     = '';
				} else {
					$value->level_f = '<div class="btn-group btn-group-toggle">'
														 .'<a href="javascript:void(0)" type="button" class="btn btn-xs btn-info">User</a>'
													 .'</div>';
				 $value->aksi     = '<div class="btn-group btn-group-toggle">'
				 									 // .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-success edit" data="'.$value->user_id.'">Ubah</a>'
				 									 .'<a href="javascript:void(0)" type="button" class="btn btn-sm btn-danger hapus" data="'.$value->user_id.'">Hapus</a>'
				 								 .'</div>';
				}
			}
			$result['draw'] 					 = $draw;
			$result['recordsTotal']    = $this->admin_model->get_all('user');
			$result['recordsFiltered'] = $this->admin_model->count_filter('username', $searchValue, 'user');
			$result['data'] 					 = $query;
			print_r(json_encode($result));
		}
		// End Get Tabel

		// CRUD Minat Bakat
		public function set_minat_bakat() {
			$data_minat_bakat = array(
				'minat_bakat' => $this->input->post('minat_bakat'),
				'deskripsi'	  => $this->input->post('deskripsi'),
				'user_id'     => $this->session->userdata('user_id'),
				'modified_on' => date('Y-m-d H:i:s')
			);

			$result = $this->admin_model->set_data($data_minat_bakat, 'minat_bakat');
			print_r(json_encode($result));
		}

		function hapus_minat_bakat(){
			$data  = array(
				'minat_bakat_id' => $this->input->post('minat_bakat_id')
			);
			$result = $this->admin_model->del_data($data, 'minat_bakat');
			print_r(json_encode($result));
		}

		function get_by_ubah_minat_bakat(){
			$data  = array(
				'minat_bakat_id' => $this->input->get('minat_bakat_id')
			);
			$result = $this->admin_model->get_by($data, 'minat_bakat');
			print_r(json_encode($result));
		}

		function ubah_minat_bakat(){
			$data   = array(
				'minat_bakat' => $this->input->post('minat_bakat'),
				'deskripsi'	  => $this->input->post('deskripsi'),
				'modified_on' => date('Y-m-d H:i:s')
			);
			$where  = array(
				'minat_bakat_id' => $this->input->post('minat_bakat_id')
			);
			$result = $this->admin_model->update_by($data, $where, 'minat_bakat');
			print_r(json_encode($result));
		}
		// End CRUD Minat Bakat

		//CRUD Keahlian
		public function set_keahlian() {
			$data_minat_bakat = array(
				'keahlian' 		=> $this->input->post('keahlian'),
				'user_id' 	  => $this->session->userdata('user_id'),
				'modified_on' => date('Y-m-d H:i:s')
			);

			$result = $this->admin_model->set_data($data_minat_bakat, 'keahlian');
			print_r(json_encode($result));
		}

		function get_by_ubah_keahlian(){
			$data  = array(
				'keahlian_id' => $this->input->get('keahlian_id')
			);
			$result = $this->admin_model->get_by($data, 'keahlian');
			print_r(json_encode($result));
		}

		function ubah_keahlian(){
			$data   = array(
				'keahlian'	  => $this->input->post('keahlian'),
				'modified_on' => date('Y-m-d H:i:s')
			);
			$where  = array(
				'keahlian_id' => $this->input->post('keahlian_id')
			);
			$result = $this->admin_model->update_by($data, $where, 'keahlian');
			print_r(json_encode($result));
		}

		function hapus_keahlian(){
			$data  = array(
				'keahlian_id' => $this->input->post('keahlian_id')
			);
			$result = $this->admin_model->del_data($data, 'keahlian');
			print_r(json_encode($result));
		}

		function hapus_user(){
			$data  = array(
				'user_id' => $this->input->post('user_id')
			);
			$result = $this->admin_model->del_data($data, 'user');
			print_r(json_encode($result));
		}
		// End CRUD Keahlian

		// CRUD Rule
		function select_data_minat_bakat(){
			$result = $this->admin_model->get_data('minat_bakat, minat_bakat_id', 'minat_bakat');
			print_r(json_encode($result));
		}

		function select_data_keahlian(){
			$result = $this->admin_model->get_data('keahlian, keahlian_id', 'keahlian');
			print_r(json_encode($result));
		}

		function select_detail(){
			$data   = array(
				'kode_rule' => $this->input->post('kode_rule')
			);
			$minat_bakat = '';
			$keahlian    = [];
			$query  = $this->admin_model->get_by($data, 'rule');
			foreach ($query as $key => $value) {
				$value->minat_bakat = $this->admin_model->get_by_rule(['minat_bakat_id' => $value->minat_bakat_id], 'minat_bakat');
				$value->keahlian    = $this->admin_model->get_by_rule(['keahlian_id' => $value->keahlian_id], 'keahlian').' ('.$value->nilai.')';
			}
			print_r(json_encode($query));
		}

		public function set_rule() {
			$kode_rule      = 'RL'.rand(10000, 99999);
			$keahlian_id    = $this->input->post('keahlian_id');
			$minat_bakat_id = $this->input->post('minat_bakat_id');
			$nilai				  = $this->input->post('nilai');
			$data 				  = [];
			// print_r($keahlian_id);
			// exit;
			for ($i=0; $i < count($keahlian_id); $i++) {
				$data[$i] = array(
					'kode_rule'      => $kode_rule,
					'minat_bakat_id' => $minat_bakat_id,
					'keahlian_id'    => $keahlian_id[$i],
					'nilai'          => $nilai[$i],
					'user_id'     	 => $this->session->userdata('user_id'),
					'modified_on'    => date('Y-m-d H:i:s'),
				);
			}

			$result = $this->admin_model->set_batch($data, 'rule');
			print_r(json_encode($result));
		}

		function hapus_rule(){
			$data  = array(
				'kode_rule' => $this->input->post('kode_rule')
			);
			$result = $this->admin_model->del_data($data, 'rule');
			print_r(json_encode($result));
		}

		function get_by_rule(){
			$data  = array(
				'kode_rule' => $this->input->get('kode_rule')
			);
			$query = $this->admin_model->get_by($data, 'rule');
			foreach ($query as $key => $value) {
				$value->minat_bakat        = $this->admin_model->get_by_rule(['minat_bakat_id' => $value->minat_bakat_id], 'minat_bakat');
				$value->keahlian           = $this->admin_model->get_by_rule(['keahlian_id' => $value->keahlian_id], 'keahlian');
				$value->select_keahlian    = $this->admin_model->get_all_where_rule('keahlian', 'keahlian_id, keahlian');
				$value->select_minat_bakat = $this->admin_model->get_all_where_rule('minat_bakat', 'minat_bakat_id, minat_bakat');
			}
			print_r(json_encode($query));
		}

		function ubah_rule(){
			$kode_rule      = $this->input->post('kode_rule');
			$keahlian_id    = $this->input->post('keahlian_id');
			$minat_bakat_id = $this->input->post('minat_bakat_id');
			$nilai 				  = $this->input->post('nilai');
			$data 				  = [];
			for ($i=0; $i < count($keahlian_id); $i++) {
				$data[$i] = array(
					'kode_rule'      => $kode_rule,
					'minat_bakat_id' => $minat_bakat_id,
					'keahlian_id'    => $keahlian_id[$i],
					'nilai'   			 => $nilai[$i],
					'user_id'        => $this->session->userdata('user_id'),
					'modified_on'    => date('Y-m-d H:i:s'),
				);
			}
			$where  = array(
				'kode_rule' => $kode_rule
			);
			$delete = $this->admin_model->del_data($where, 'rule');
			$result = $this->admin_model->set_batch($data, 'rule');
			print_r(json_encode($result));
		}
		// End CRUD Ruke

	}
?>
