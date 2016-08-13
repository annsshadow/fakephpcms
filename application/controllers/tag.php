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

class Tag extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('log_model');
		$this->load->model('tag_model');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index($offset = 0) {
		if ($this->check_right->check_role_right(10)) {
			$this->load->model('menu_model');

			$data['base_url'] = $this->base_url;
			$data['result'] = $this->get_tag_list($offset);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('tag_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入标签管理模块');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_tag_list($offset) {
		if ($this->check_right->check_role_right(10)) {
			return $this->tag_model->get_tag_list($offset);
		} else {
			$this->log_model->log_add('试图非法获取标签列表');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_tag_menu_list() {
		if ($this->check_right->check_role_right(10)) {
			return $this->tag_model->get_tag_menu_list();
		} else {
			$this->log_model->log_add('试图非法获取标签列表-文章菜单');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_tag_content($tag_id) {
		if ($this->check_right->check_role_right(10)) {
			$content = $this->tag_model->get_tag_content($tag_id);
			return $content;
		} else {
			$this->log_model->log_add('试图非法获取文章详情');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function tag_add() {

		if ($this->check_right->check_role_right(10) && $this->check_right->check_role_right(29)) {
			$this->load->model('menu_model');

			$data['base_url'] = $this->base_url;
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['menu'] = $this->menu_model->get_menu_list();
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('tag_add', $data);
		} else {
			$this->log_model->log_add('试图非法添加标签');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function tag_add_post() {
		if ($this->check_right->check_role_right(10) && $this->check_right->check_role_right(29)) {
			$this->tag_model->tag_add_post();
			redirect($this->base_url . 'bluescms/index.php/tag');
		} else {
			$this->log_model->log_add('试图非法添加文章');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function tag_edit($tag_id) {
		if ($this->check_right->check_role_right(10) && $this->check_right->check_role_right(30)) {
			$this->load->model('menu_model');

			$data['base_url'] = $this->base_url;
			$data['result'] = $this->tag_model->get_tag_content($tag_id);
			$data['menu'] = $this->menu_model->get_menu_list();
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('tag_edit', $data);
		} else {
			$this->log_model->log_add('试图非法编辑文章');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function tag_edit_post() {
		if ($this->check_right->check_role_right(10) && $this->check_right->check_role_right(30)) {
			$this->tag_model->tag_edit_post();
			redirect($this->base_url . 'bluescms/index.php/tag');
		} else {
			$this->log_model->log_add('试图非法编辑标签');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function tag_delete($tag_id) {
		if ($this->check_right->check_role_right(10) && $this->check_right->check_role_right(31)) {
			$this->tag_model->tag_delete($tag_id);
			redirect($this->base_url . 'bluescms/index.php/tag');
		} else {
			$this->log_model->log_add('试图非法删除标签');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}
}
/* End of file tag.php */
/* Location: /bluescms/application/controllers/tag.php */