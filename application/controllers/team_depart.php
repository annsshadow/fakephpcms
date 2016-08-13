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

class Team_depart extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('team_depart_model');
		$this->load->model('log_model');
		$this->load->model('menu_model');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index($kind) {
		if ($this->check_right->check_role_right(32)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->get_team_depart_list($kind);
			$data['kind'] = $kind;
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('team_depart_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入' . $kind . '管理模块');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_team_depart_list($kind) {
		if ($this->check_right->check_role_right(32)) {
			return $this->team_depart_model->get_team_depart_list($kind);
		} else {
			$this->log_model->log_add('试图非法获取' . $kind . '管理列表');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function team_depart_add($kind) {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(33)) {
			$data['base_url'] = $this->base_url;
			$data['login_info'] = array();
			$data['kind'] = $kind;
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();
			$this->load->view('team_depart_add', $data);
		} else {
			$this->log_model->log_add('试图非法添加' . $kind . '项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function team_depart_add_post($kind) {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(33)) {
			echo $this->team_depart_model->team_depart_add_post($kind);
			redirect($this->base_url . 'bluescms/index.php/team_depart/index/' . $kind);
		} else {
			$this->log_model->log_add('试图非法添加' . $kind . '项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function team_depart_edit($kind, $id) {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(34)) {
			$data['base_url'] = $this->base_url;
			$data['kind'] = $kind;
			$data['result'] = $this->team_depart_model->get_team_depart_content($kind, $id);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('team_depart_edit', $data);
		} else {
			$this->log_model->log_add('试图非法编辑' . $kind . '项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function team_depart_edit_post($kind) {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(34)) {
			echo $this->team_depart_model->team_depart_edit_post($kind);
			redirect($this->base_url . 'bluescms/index.php/team_depart/index/' . $kind);
		} else {
			$this->log_model->log_add('试图非法添加' . $kind . '项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function team_depart_delete($kind, $id) {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(35)) {
			$this->team_depart_model->team_depart_delete($kind, $id);
			redirect($this->base_url . 'bluescms/index.php/team_depart/index/' . $kind);
		} else {
			$this->log_model->log_add('试图非法删除' . $kind . '项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}
}
/* End of file team_depart.php */
/* Location: /bluescms/application/controllers/team_depart.php */