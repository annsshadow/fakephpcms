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

class Article extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('log_model');
		$this->load->model('menu_model');
		$this->load->model('article_model');
		$this->load->model('tag_model');
		$this->load->library('check_right');
		$this->base_url = $this->config->item("base_url");
	}

	public function index($offset = 0) {
		if ($this->check_right->check_role_right(6)) {
			$result = $this->get_article_list($offset);
			foreach ($result as $key => $value) {
				$menu_info = $this->menu_model->get_menu_info($value['menu_id']);
				$result[$key]['menu_first'] = $menu_info['menu_first'];
				$result[$key]['menu_name'] = $menu_info['menu_name'];
			}
			$menu_list = $this->menu_model->get_menu_list();
			$data['result'] = $result;
			$data['menu_list'] = $menu_list;
			$data['base_url'] = $this->base_url;
			$data['admin_menu'] = $this->menu_model->get_admin_menu();
			/*the info of the loginer*/
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');

			$this->load->view('article_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入文章模块');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function index_top($offset = 0) {
		if ($this->check_right->check_role_right(36)) {
			$result = $this->get_top_list($offset);
			foreach ($result as $key => $value) {
				$menu_info = $this->menu_model->get_menu_info($value['menu_id']);
				$result[$key]['menu_first'] = $menu_info['menu_first'];
				$result[$key]['menu_name'] = $menu_info['menu_name'];
			}
			$menu_list = $this->menu_model->get_menu_list();
			$data['result'] = $result;
			$data['menu_list'] = $menu_list;
			$data['base_url'] = $this->base_url;
			$data['admin_menu'] = $this->menu_model->get_admin_menu();
			/*the info of the loginer*/
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');

			$this->load->view('article_top_list', $data);
		} else {
			$this->log_model->log_add('试图非法进入文章置顶模块');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function article_search() {
		if ($this->check_right->check_role_right(6)) {
			$keyword = $this->input->get('keyword', TRUE);
			$offset = $this->input->get('offset', TRUE);

			if (!$keyword && !$offset) {
				$keyword = $this->uri->segment(3);
				$offset = $this->uri->segment(5);
				$keyword = urldecode($keyword);
			}
			$result = $this->article_model->article_search($keyword, $offset);
			foreach ($result as $key => $value) {
				$menu_info = $this->menu_model->get_menu_info($value['menu_id']);
				$result[$key]['menu_first'] = $menu_info['menu_first'];
				$result[$key]['menu_name'] = $menu_info['menu_name'];
			}
			$menu_list = $this->menu_model->get_menu_list();
			$data['result'] = $result;
			$data['menu_list'] = $menu_list;
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['base_url'] = $this->base_url;
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('article_list', $data);
		} else {
			$this->log_model->log_add('试图非法搜索文章');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function article_search_by_menu() {
		if ($this->check_right->check_role_right(6)) {
			$menu_id = $this->input->get('menu_id', TRUE);
			$offset = $this->input->get('offset', TRUE);
			if (!$menu_id && !$offset) {
				$menu_id = $this->uri->segment(3);
				$offset = $this->uri->segment(5);
			}
			$result = $this->article_model->article_search_by_menu($menu_id, $offset);
			foreach ($result as $key => $value) {
				$menu_info = $this->menu_model->get_menu_info($value['menu_id']);
				$result[$key]['menu_first'] = $menu_info['menu_first'];
				$result[$key]['menu_name'] = $menu_info['menu_name'];
			}
			$menu_list = $this->menu_model->get_menu_list();

			$data['result'] = $result;
			$data['menu_list'] = $menu_list;
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['base_url'] = $this->base_url;
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('article_list', $data);
		} else {
			$this->log_model->log_add('试图非法搜索文章');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_article_list($offset) {
		if ($this->check_right->check_role_right(6)) {
			return $this->article_model->get_article_list($offset);
		} else {
			$this->log_model->log_add('试图非法获取文章列表');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_top_list($offset) {
		if ($this->check_right->check_role_right(36)) {
			return $this->article_model->get_top_list($offset);
		} else {
			$this->log_model->log_add('试图非法获取文章置顶列表');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function top_check($article_id) {
		if ($this->check_right->check_role_right(37)) {
			$this->article_model->top_check($article_id);
			redirect($this->base_url . 'bluescms/index.php/article/index_top');
		} else {
			$this->log_model->log_add('试图非法审核置顶文章');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function top_cancel($article_id) {
		if ($this->check_right->check_role_right(37)) {
			$this->article_model->top_cancel($article_id);
			redirect($this->base_url . 'bluescms/index.php/article/index_top');
		} else {
			$this->log_model->log_add('试图非法取消置顶文章');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function top_delete($article_id) {
		if ($this->check_right->check_role_right(38)) {
			$this->article_model->top_delete($article_id);
			redirect($this->base_url . 'bluescms/index.php/article/index_top');
		} else {
			$this->log_model->log_add('试图非法删除置顶文章');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function get_article_content($article_id) {
		if ($this->check_right->check_role_right(6)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->article_model->get_article_content($article_id);
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();
			$this->load->view('article_content', $data);
		} else {
			$this->log_model->log_add('试图非法获取文章详情');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function article_add() {
		if ($this->check_right->check_role_right(6) && $this->check_right->check_role_right(18)) {
			/*in order to get the list of all menus*/
			$this->load->model('menu_model');
			$data['base_url'] = $this->base_url;
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['result'] = $this->menu_model->get_menu_list();
			$data['tag_id'] = $this->tag_model->get_tag_menu_list();
			$data['admin_menu'] = $this->menu_model->get_admin_menu();
			$this->load->view('article_add', $data);
		} else {
			$this->log_model->log_add('试图非法添加文章');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

	public function article_add_post() {
		if ($this->check_right->check_role_right(6) && $this->check_right->check_role_right(18)) {
			$this->article_model->article_add_post();
			redirect($this->base_url . 'bluescms/index.php/article');
		} else {
			$this->log_model->log_add('试图非法添加文章');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function article_edit($article_id) {
		if ($this->check_right->check_role_right(6) && $this->check_right->check_role_right(19)) {
			$data['base_url'] = $this->base_url;
			$data['result'] = $this->article_model->get_article_content($article_id);
			$data['menu'] = $this->menu_model->get_menu_list();
			$data['tag_id'] = $this->tag_model->get_tag_menu_list();
			$data['login_info'] = array();
			$data['login_info']['login_user_name'] = $this->session->userdata('user_name');
			$data['login_info']['login_role_name'] = $this->session->userdata('role_name');
			$data['admin_menu'] = $this->menu_model->get_admin_menu();

			$this->load->view('article_edit', $data);
		} else {
			$this->log_model->log_add('试图非法编辑文章');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function article_edit_post() {
		if ($this->check_right->check_role_right(6) && $this->check_right->check_role_right(19)) {
			$this->article_model->article_edit_post();
			redirect($this->base_url . 'bluescms/index.php/article');
		} else {
			$this->log_model->log_add('试图非法编辑文章');
			redirect($this->base_url . 'bluescms/index.php');
		}

	}

	public function article_delete($article_id) {
		if ($this->check_right->check_role_right(6) && $this->check_right->check_role_right(20)) {
			$this->article_model->article_delete($article_id);
			redirect($this->base_url . 'bluescms/index.php/article');
		} else {
			$this->log_model->log_add('试图非法删除文章');
			redirect($this->base_url . 'bluescms/index.php');
		}
	}

}
/* End of file article.php */
/* Location: /bluescms/application/controllers/article.php */