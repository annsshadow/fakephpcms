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

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('log_model');
		$this->load->model('menu_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index() {
		if ($this->check_right->check_role_right(5)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->get_user_list();
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('user_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入管理员模块');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	//展示管理员个人简介等信息
	public function user_info_show() {
		$data['base_url'] = $this->base_url;
		$data['result'] = $this->user_model->get_itself_info($this->session->userdata('user_id'));
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		$this->load->view('user_info', $data);
	}

	public function user_info_edit_post() {
		$this->user_model->user_info_edit_post($this->session->userdata('user_id'));
		$this->user_info_show();
	}

	//修改用户联系方式，简介等
	public function user_info_edit() {
		$data['base_url'] = $this->base_url;
		$data['result'] = $this->user_model->get_itself_info($this->session->userdata('user_id'));
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		$this->log_model->log_add('编辑管理员个人信息');
		$this->load->view('user_info_edit', $data);
	}

	public function under_user_info_show($user_id) {
		if ($this->check_right->check_role_right(5)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->user_model->get_full_by_userid($user_id);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('user_info', $data);
		} else {
			$this->log_model->log_add('试图非法查看管理员信息');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function get_user_list() {
		if ($this->check_right->check_role_right(5)) {
			return $this->user_model->get_user_list();
		} else {
			$this->log_model->log_add('试图非法获取管理员列表');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function user_add() {
		if ($this->check_right->check_role_right(5) && $this->check_right->check_role_right(15)) {
			$data['base_url'] = $this->base_url;
			$data['role_level'] = $this->user_model->get_role_select();
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('user_add', $data);
		} else {
			$this->log_model->log_add('试图非法添加管理员');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function user_add_post() {
		if ($this->check_right->check_role_right(5) && $this->check_right->check_role_right(15)) {
			echo $this->user_model->user_add_post();
			redirect($this->base_url . 'bluescms/index.php/user');
		} else {
			$this->log_model->log_add('试图非法添加管理员');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function user_edit($user_id) {
		if ($this->check_right->check_role_right(5) && $this->check_right->check_role_right(16)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->user_model->get_user_edit_info($user_id);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['role_level'] = $this->user_model->get_role_select();
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('user_edit', $data);
		} else {
			$this->log_model->log_add('试图非法编辑管理员');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function user_edit_post() {
		if ($this->check_right->check_role_right(5) && $this->check_right->check_role_right(16)) {
			echo $this->user_model->user_edit_post();
			redirect($this->base_url . 'bluescms/index.php/user');
		} else {
			$this->log_model->log_add('试图非法编辑管理员');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function user_delete($user_id) {
		if ($this->check_right->check_role_right(5) && $this->check_right->check_role_right(17)) {
			echo $this->user_model->user_delete($user_id);
			redirect($this->base_url . 'bluescms/index.php/user');
		} else {
			$this->log_model->log_add('试图非法删除管理员');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function password_change() {
		$data['base_url'] = $this->base_url;
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();

		$this->load->view('user_password', $data);
	}

	public function password_change_post() {
		echo $this->user_model->password_change_post();
		redirect($this->base_url . 'bluescms/index.php/home');
	}
}
/* End of file user.php */
/* Location: /bluescms/application/controllers/user.php */