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

class Log extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('menu_model');
		$this->load->model('log_model');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index($offset = 0) {
		if ($this->check_right->check_role_right(11)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->get_log_list($offset);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();
			$this->load->view('log_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入系统日志模块');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_log_list($offset) {
		if ($this->check_right->check_role_right(11)) {
			return $this->log_model->get_log_list($offset);
		} else {
			$this->log_model->log_add('试图非法获取系统日志列表');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}
}
/* End of file log.php */
/* Location: /bluescms/application/controllers/log.php */