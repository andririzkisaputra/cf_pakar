<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
			parent::__construct();
			$this->load->model('dashboard_model');
	}

	public function index() {
		if($this->session->userdata('level') == '2'){
			$this->load->view('theme/dashboard/header');
			$this->load->view('content/dashboard');
			$this->load->view('theme/dashboard/footer');
		}else {
			redirect(base_url('dashboard/login'));
		}
	}

	public function login() {
		$this->load->view('theme/header.php');
		$this->load->view('content/login_user.php');
	}

	public function registrasi() {
		$this->load->view('theme/header.php');
		$this->load->view('content/registrasi_user.php');
	}

	public function login_user() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		$cek_login = $this->dashboard_model->auth($where, 'user');
		if ($cek_login) {
			$data_session = array(
				'username' => $cek_login->username,
				'user_id'  => $cek_login->user_id,
				'level'    =>  $cek_login->level,
			);
			$this->db->update('user', ['status' => '1']);
			$this->session->set_userdata($data_session);
			$result = base_url();
		}else {
			$result = false;
		}
		print_r(json_encode($result));
	}

	public function registrasi_user() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'username'   => $username,
			'password'   => md5($password),
			'status'     => '1',
			'level'      => '2',
			'created_on' => date('Y-m-d H:i:s'),
		);
		if ($username && $password) {
			$insert = $this->dashboard_model->user_insert($data, 'user');
			$data_session = array(
				'username' => $username,
				'user_id'  => $password,
				'status'   => '1',
				'level'    => '2',
			);
			$this->session->set_userdata($data_session);
			$result = base_url();
		}else {
			$result = false;
		}
		print_r(json_encode($result));
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function select_data_keahlian() {
		$minat = $this->input->post('minat');
		$query = $this->dashboard_model->get_keahlian($minat);
		print_r(json_encode($query));
	}

	public function proses_cf() {
		$minat					= $this->input->post('minat');
		$keahlian 			= $this->input->post('keahlian_id');
		$keyakinan_user = $this->input->post('keyakinan_user');

		$list_minat_bakat = $this->dashboard_model->cf($minat, $keahlian, $keyakinan_user);
		print_r(json_encode($list_minat_bakat));
	}

}
