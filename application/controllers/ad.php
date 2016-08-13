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

class Ad extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ad_model');
		$this->load->model('log_model');
		$this->load->model('menu_model');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index() {
		if ($this->check_right->check_role_right(32)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->get_ad_list();
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('ad_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入广告管理模块');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_ad_list() {
		if ($this->check_right->check_role_right(32)) {
			return $this->ad_model->get_ad_list();
		} else {
			$this->log_model->log_add('试图非法获取广告管理列表');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function ad_add() {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(33)) {
			$data['base_url'] = $this->base_url;
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();
			$this->load->view('ad_add', $data);
		} else {
			$this->log_model->log_add('试图非法添加广告项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function ad_add_post() {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(33)) {
			echo $this->ad_model->ad_add_post();
			redirect($this->base_url . 'bluescms/index.php/ad/index');
		} else {
			$this->log_model->log_add('试图非法提交添加广告项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function ad_edit($ad_id) {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(34)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->ad_model->get_ad_content($ad_id);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('ad_edit', $data);
		} else {
			$this->log_model->log_add('试图非法编辑广告项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function ad_edit_post() {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(34)) {
			echo $this->ad_model->ad_edit_post();
			redirect($this->base_url . 'bluescms/index.php/ad/index');
		} else {
			$this->log_model->log_add('试图非法提交编辑广告项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function ad_delete($ad_id) {
		if ($this->check_right->check_role_right(32) && $this->check_right->check_role_right(35)) {
			$this->ad_model->ad_delete($ad_id);
			redirect($this->base_url . 'bluescms/index.php/ad/index/');
		} else {
			$this->log_model->log_add('试图非法删除广告项目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}
}
/* End of file team_depart.php */
/* Location: /bluescms/application/controllers/team_depart.php */