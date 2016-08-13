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

class Download extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('download_model');
		$this->load->model('log_model');
		$this->load->model('menu_model');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index($offset = 0) {
		if ($this->check_right->check_role_right(7)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->get_download_list($offset);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('download_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入下载模块');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function get_download_list($offset) {
		if ($this->check_right->check_role_right(7)) {
			return $this->download_model->get_download_list($offset);
		} else {
			$this->log_model->log_add('试图非法获取下载列表');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function download_file($download_id) {
		if ($this->check_right->check_role_right(7)) {
			$this->download_model->download_file($download_id);
		} else {
			$this->log_model->log_add('试图非法下载文件');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function download_add() {
		if ($this->check_right->check_role_right(7) && $this->check_right->check_role_right(21)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->menu_model->get_menu_list();
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('download_add', $data);
		} else {
			$this->log_model->log_add('试图非法添加文件');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function download_add_post() {
		if ($this->check_right->check_role_right(7) && $this->check_right->check_role_right(21)) {
			echo $this->download_model->download_add_post();
			redirect($this->base_url . 'bluescms/index.php/download');
		} else {
			$this->log_model->log_add('试图非法添加文件');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function download_delete($download_id) {
		if ($this->check_right->check_role_right(7) && $this->check_right->check_role_right(22)) {
			echo $this->download_model->download_delete($download_id);
			redirect($this->base_url . 'bluescms/index.php/download');
		} else {
			$this->log_model->log_add('试图非法删除文件');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}
}
/* End of file download.php */
/* Location: /bluescms/application/controllers/download.php */