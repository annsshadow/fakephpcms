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

class Role extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->base_url = $this->config->item("base_url");
		$this->load->model('role_model');
		$this->load->model('log_model');
		$this->load->model('menu_model');
		$this->load->library('check_right');
	}

	public function index() {
		if ($this->check_right->check_role_right(4)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->role_model->get_role_list();
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('role_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入角色管理模块');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function role_add() {
		if ($this->check_right->check_role_right(4) && $this->check_right->check_role_right(12)) {
			$data['base_url'] = $this->base_url;
			$data['login_user_right'] = array();
			$data['login_user_right'] = $this->role_model->get_right_list_by_roleid($this->session->userdata['role_id']);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('role_add', $data);
		} else {
			$this->log_model->log_add('试图非法添加角色');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function role_add_post() {
		if ($this->check_right->check_role_right(4) && $this->check_right->check_role_right(12)) {
			echo $this->role_model->role_add_post();
			redirect($this->base_url . 'bluescms/index.php/role');
		} else {
			$this->log_model->log_add('试图非法添加角色');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_role_list() {
		if ($this->check_right->check_role_right(4)) {
			return $this->role_model->get_role_list();
		} else {
			$this->log_model->log_add('试图非法获取角色列表');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function role_info_show($role_id) {
		if ($this->check_right->check_role_right(4)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->role_model->get_full_by_roleid($role_id);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('role_info', $data);
		} else {
			$this->log_model->log_add('试图非法获取角色信息');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function role_edit($role_id) {
		if ($this->check_right->check_role_right(4) && $this->check_right->check_role_right(13)) {
			$data['base_url'] = $this->base_url;
			$data['role_id'] = $role_id;
			$data['result'] = $this->role_model->get_full_by_roleid($role_id);
			$data['login_user_right'] = array();
			$data['login_user_right'] = $this->role_model->get_right_list_by_roleid($this->session->userdata['role_id']);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('role_edit', $data);
		} else {
			$this->log_model->log_add('试图非法编辑角色');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function role_edit_post() {
		if ($this->check_right->check_role_right(4) && $this->check_right->check_role_right(13)) {
			echo $this->role_model->role_edit_post();
			redirect($this->base_url . 'bluescms/index.php/role');
		} else {
			$this->log_model->log_add('试图非法编辑角色');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function role_delete($role_id) {
		if ($this->check_right->check_role_right(4) && $this->check_right->check_role_right(14)) {
			echo $this->role_model->role_delete($role_id);
			redirect($this->base_url . 'bluescms/index.php/role', 'refresh');
		} else {
			$this->log_model->log_add('试图非法删除角色');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}
}
/* End of file role.php */
/* Location: /bluescms/application/controllers/role.php */