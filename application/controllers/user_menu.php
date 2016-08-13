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

class User_menu extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->model('log_model');
		$this->load->helper('url');
		$this->load->library('check_right');
		$this->load->library('session');
		$this->base_url = $this->config->item("base_url");
	}

	public function index() {
		$data['base_url'] = $this->base_url;
		$data['result'] = $this->menu_model->get_user_menu_list_first($this->session->userdata('user_id'));
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		$this->log_model->log_add('进入个人栏目模块');
		$this->load->view('user_menu_list_first', $data);
	}

	public function get_menu_list_second($menu_id) {
		$data['base_url'] = $this->base_url;
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();

		$user_id = $this->session->userdata('user_id');
		/*get the info of the first-level menu*/
		$temp_result = $this->menu_model->get_user_menu_info($menu_id, $user_id);
		$data['menu_name_first'] = $temp_result['menu_first'];
		/*get its second-level menus*/
		$data['result'] = $this->menu_model->get_user_menu_list_second($menu_id, $user_id);
		$this->log_model->log_add('获取个人二级栏目列表');
		$this->load->view('user_menu_list_second', $data);
	}

	public function get_menu_list() {
		if ($this->check_right->check_role_right(8)) {
			return $this->menu_model->get_menu_list();
		} else {
			$this->log_model->log_add('试图非法获取栏目列表');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function menu_edit($menu_id) {
		$data['base_url'] = $this->base_url;
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		$user_id = $this->session->userdata('user_id');

		/*get the info of the menu*/
		$temp_result = $this->menu_model->get_user_menu_info($menu_id, $user_id);

		/*judge it is first-level or second-level*/
		if ($temp_result['parent_id'] && ($temp_result['menu_level'] == 2)) {
			/*when it's second-level*/
			$data['menu_id'] = $menu_id;
			$data['menu_name'] = $temp_result['menu_name'];
			$data['parent_id'] = $temp_result['parent_id'];
			$data['menu_order'] = $temp_result['menu_order'];
			/*get the name of its parent*/
			$menu_parent_info = $this->menu_model->get_user_menu_info($temp_result['parent_id'], $user_id);
			$data['menu_parent_name'] = $menu_parent_info['menu_name'];
			$data['menu_list_first'] = $this->menu_model->get_user_menu_first($user_id);
			$this->log_model->log_add('编辑个人二级栏目');
			$this->load->view('user_menu_edit_second', $data);
		} else {
			/*when it's first-level*/
			$data['menu_id'] = $menu_id;
			$data['menu_name'] = $temp_result['menu_name'];
			$data['menu_order'] = $temp_result['menu_order'];
			$this->log_model->log_add('编辑个人一级栏目');
			$this->load->view('user_menu_edit_first', $data);
		}
	}

	public function menu_edit_post() {
		$this->menu_model->user_menu_edit_post($this->session->userdata('user_id'));
		$this->log_model->log_add('编辑个人栏目-提交');
		redirect($this->base_url . 'bluescms/index.php/user_menu');
	}

	public function menu_add() {
		$data['base_url'] = $this->base_url;
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['result'] = $this->menu_model->get_user_menu_list($this->session->userdata('user_id'));
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		$this->log_model->log_add('添加个人栏目');
		$this->load->view('user_menu_add', $data);
	}

	public function menu_add_post() {
		echo $this->menu_model->user_menu_add_post($this->session->userdata('user_id'));
		$this->log_model->log_add('添加个人栏目-提交');
		redirect($this->base_url . 'bluescms/index.php/user_menu');
	}

	public function menu_delete($menu_id) {
		if ($this->check_right->check_role_right(8) && $this->check_right->check_role_right(25)) {
			echo $this->menu_model->menu_delete($menu_id);
			redirect($this->base_url . 'bluescms/menu');
		} else {
			$this->log_model->log_add('试图非法删除栏目');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_admin_menu() {
		return $this->menu_model->get_admin_menu();
	}
}
/* End of file user_menu.php */
/* Location: /bluescms/application/controllers/user_menu.php */