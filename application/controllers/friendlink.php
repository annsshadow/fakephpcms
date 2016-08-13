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

class Friendlink extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('friendlink_model');
		$this->load->model('log_model');
		$this->load->model('menu_model');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index() {
		if ($this->check_right->check_role_right(9)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->get_friendlink_list();
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('friendlink_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入友情链接模块');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function get_friendlink_list() {
		if ($this->check_right->check_role_right(9)) {
			return $this->friendlink_model->get_friendlink_list();
		} else {
			$this->log_model->log_add('试图非法获取友情链接列表');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function friendlink_add() {
		if ($this->check_right->check_role_right(9) && $this->check_right->check_role_right(26)) {
			$data['base_url'] = $this->base_url;
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();
			$this->load->view('friendlink_add', $data);
		} else {
			$this->log_model->log_add('试图非法添加友情链接');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function friendlink_add_post() {
		if ($this->check_right->check_role_right(9) && $this->check_right->check_role_right(26)) {
			echo $this->friendlink_model->friendlink_add_post();
			redirect($this->base_url . 'bluescms/index.php/friendlink');
		} else {
			$this->log_model->log_add('试图非法添加友情链接');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function friendlink_edit($friendlink_id) {
		if ($this->check_right->check_role_right(9) && $this->check_right->check_role_right(27)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->friendlink_model->get_friendlink_content($friendlink_id);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('friendlink_edit', $data);
		} else {
			$this->log_model->log_add('试图非法编辑友情链接');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function friendlink_edit_post() {
		if ($this->check_right->check_role_right(9) && $this->check_right->check_role_right(27)) {
			echo $this->friendlink_model->friendlink_edit_post();
			redirect($this->base_url . 'bluescms/index.php/friendlink');
		} else {
			$this->log_model->log_add('试图非法编辑友情链接');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function friendlink_delete($friendlink_id) {
		if ($this->check_right->check_role_right(9) && $this->check_right->check_role_right(28)) {
			$this->friendlink_model->friendlink_delete($friendlink_id);
			redirect($this->base_url . 'bluescms/index.php/friendlink');
		} else {
			$this->log_model->log_add('试图非法删除友情链接');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}
}
/* End of file friendlink.php */
/* Location: /bluescms/application/controllers/friendlink.php */