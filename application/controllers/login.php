<?php
/************************************************************
 * BluesCMS
 *
 * a lightweight CMS developed by CodeIgniter
 *
 * @author      AnnsShadoW
 * @copyright   Copyright (c) 2015 Blues Team
 * @version     Version 2.0
 *
 ***********************************************************/
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->base_url = $this->config->item("base_url");
		$this->load->model('user_model');
		$this->load->model('log_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index() {
		if ($this->session->userdata('user_id')) {
			redirect($this->base_url . 'bluescms/index.php/home');
		} else {
			$data['base_url'] = $this->base_url;
			$this->load->view('login', $data);
		}
	}

	public function Check_Login() {
		$username = $this->input->post('User', TRUE);
		$password = sha1(md5($this->input->post('Passwd', TRUE)));

		/*not null*/
		if ($username AND $password) {
			$admin = $this->user_model->get_full_by_username($username);
			if ($admin) {
				if ($admin['password'] == $password) {
					$this->session->set_userdata('user_id', $admin['user_id']);
					$this->session->set_userdata('role_id', $admin['role_id']);
					$this->session->set_userdata('user_name', $admin['user_name']);
					$this->session->set_userdata('role_name', $admin['role_name']);

					$this->log_model->log_add('登录成功');
					echo 1;
				} else {
					$this->session->set_flashdata('error', '密码错误');
					echo 3;
				}
			} else {
				$this->sesson->set_flashdata('error', '不存在此用户');
				echo 2;
			}
		}
	}

	public function quit() {
		$this->log_model->log_add('退出系统');
		$this->session->sess_destroy();
		redirect($this->base_url . 'bluescms/index.php');
	}
}
/* End of file login.php */
/* Location: /bluescms/application/controllers/login.php */