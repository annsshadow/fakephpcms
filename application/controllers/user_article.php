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

class User_article extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('log_model');
		$this->load->model('menu_model');
		$this->load->model('user_article_model');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index($offset = 0) {
		$result = $this->get_article_list($offset);
		foreach ($result as $key => $value) {
			$menu_info = $this->menu_model->get_user_menu_info($value['user_menu_id'], $this->session->userdata('user_id'));
			$result[$key]['menu_first'] = $menu_info['menu_name'];
		}
		$data['result'] = $result;
		$data['base_url'] = $this->base_url;
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		/*the info of the loginer*/
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$this->load->view('user_article_list', $data);
	}

	public function get_article_list($offset) {
		return $this->user_article_model->get_article_list($offset);

	}

	public function get_article_content($article_id) {
		$data['base_url'] = $this->base_url;
		$data['result'] = $this->user_article_model->get_article_content($article_id);
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		$this->load->view('user_article_content', $data);
	}

	public function article_add() {
		$data['base_url'] = $this->base_url;
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['menu'] = $this->menu_model->get_user_menu_list($this->session->userdata('user_id'));
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		$this->log_model->log_add('管理员添加个人文章');
		$this->load->view('user_article_add', $data);
	}

	public function user_article_add_post() {
		$this->user_article_model->user_article_add_post();
		redirect($this->base_url . 'bluescms/index.php/user_article');
		$this->log_model->log_add('管理员添加个人文章-提交');
	}

	public function article_edit($article_id) {
		$data['base_url'] = $this->base_url;
		$data['result'] = $this->user_article_model->get_article_content($article_id);
		$data['menu'] = $this->menu_model->get_user_menu_list($this->session->userdata('user_id'));
		$data['login_info'] = array();
		$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
		$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
		$data['admin_menu'] = $this->menu_model->get_user_admin_menu();
		$this->log_model->log_add('管理员编辑个人文章');
		$this->load->view('user_article_edit', $data);
	}

	public function user_article_edit_post() {
		$this->user_article_model->user_article_edit_post();
		$this->log_model->log_add('管理员编辑编辑个人文章-提交');
		redirect($this->base_url . 'bluescms/index.php/user_article');
	}

	public function article_delete($article_id) {
		$this->user_article_model->article_delete($article_id);
		$this->log_model->log_add('管理员删除个人文章');
		redirect($this->base_url . 'bluescms/index.php/user_article');
	}

}
/* End of file article.php */
/* Location: /bluescms/application/controllers/article.php */