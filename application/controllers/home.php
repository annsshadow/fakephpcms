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

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('menu_model');
		$this->base_url = $this->config->item("base_url");
	}

	public function index() {
		$data['base_url'] = $this->base_url;
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['result']['ip'] = $_SERVER["REMOTE_ADDR"];
		$data['result']['login_time'] = date("Y-m-d H:i:s");
		$data['admin_menu'] = $this->menu_model->get_admin_menu();

		$this->load->view('lanshan', $data);
	}
}
/* End of file home.php */
/* Location: /bluescms/application/controllers/home.php */