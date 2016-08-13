<?php
/************************************************************
 * BluesCMS
 *
 * a lightweight CMS developed by CodeIgniter
 *
 * @author      AnnsShadoW
 * @copyright   Copyright (c) 2015 Blues Team
 * @version     Version 1.0
 *
 ***********************************************************/
class User_article_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->base_url = $this->config->item('base_url');
	}

	public function get_article_list($offset) {
		$this->load->library('pagination');
		$this->load->library('date_chg');
		/*increase the base_url*/
		$config['base_url'] = $this->base_url . 'bluescms/index.php/user_article/index/';
		/*get the total number of article*/
		$config['total_rows'] = $this->db->from($this->db->dbprefix('user_article'))->where('user_id', $this->session->userdata('user_id'))->count_all_results();
		/*how many articles per page*/
		$config['per_page'] = 15;
		/*the position of the offset or the page_number; count from the 'index.php'*/
		$config['uri_segment'] = 3;
		/*the number of the link near the current page*/
		$config['num_links'] = 3;
		/*the tag put in the left of the result*/
		$config['full_tag_open'] = '<p>';
		/*the tag put in the right of the result*/
		$config['full_tag_close'] = '</p>';
		/*what is the name of the first_link*/
		$config['first_link'] = '首页';
		/*what is the name of the last_link*/
		$config['last_link'] = '尾页';
		/*preview link name*/
		$config['prev_link'] = '上一页';
		/*next link name*/
		$config['next_link'] = '下一页';
		/*initialize the pagination*/
		$this->pagination->initialize($config);

		$user_id = $this->session->userdata('user_id');
		$result = $this->db->select('user_article_id,user_menu_id,headline,author,updatetime')->order_by('updatetime', 'desc')->get_where($this->db->dbprefix('user_article'), array('user_id' => $user_id), $config['per_page'], $offset)->result_array();

		foreach ($result as $key => $value) {
			$result[$key]['updatetime'] = $this->date_chg->get_YMD($value['updatetime']);
			$result[$key]['url_view'] = $this->base_url . 'bluescms/index.php/user_article/get_article_content/' . $result[$key]['user_article_id'];
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/user_article/article_edit/' . $result[$key]['user_article_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/user_article/article_delete/' . $result[$key]['user_article_id'];
		}

		return $result;
	}

	public function get_article_content($article_id) {
		//获得文章的具体内容
		$result = $this->db->select('user_article_id,headline,hit_num,author,user_menu_id,ordernum,updatetime,content')->get_where($this->db->dbprefix('user_article'), array('user_article_id' => $article_id), 1)->row_array();
		//通过栏目id查找栏目名称
		$menu_info = $this->db->select('menu_name')->get_where($this->db->dbprefix('user_menu'), array('user_menu_id' => $result['user_menu_id']))->row_array();
		$result['menu_first'] = $menu_info['menu_name'];
		return $result;
	}

	public function user_article_add_post() {
		$headline = $this->input->post("headline", TRUE);
		$author = $this->input->post("author", TRUE);
		$content = $_POST['content'];
		$createtime = date("Y-m-d H:i:s");
		$updatetime = $this->input->post("time", TRUE);
		$menu_id = $this->input->post("menu_id", TRUE);
		$creator = $this->session->userdata('user_id');
		$order = $this->input->post("order");
		$hit_num = 0;

		$article_info = array(
			'headline' => $headline,
			'author' => $author,
			'content' => $content,
			'updatetime' => $updatetime,
			'createtime' => $createtime,
			'ordernum' => $order,
			'user_id' => $creator,
			'user_menu_id' => $menu_id,
			'hit_num' => $hit_num,
		);

		$this->db->insert($this->db->dbprefix('user_article'), $article_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('管理员添加个人文章成功');
			return 1;
		} else {
			$this->log_model->log_add('管理员添加个人文章失败');
			return 0;
		}
	}

	public function user_article_edit_post() {
		$user_article_id = $this->input->post("user_article_id", TRUE);
		$headline = $this->input->post("headline", TRUE);
		$author = $this->input->post("author", TRUE);
		$content = $_POST['content'];
		$user_menu_id = $this->input->post("menu_id", TRUE);
		$updatetime = $this->input->post("time", TRUE);
		$updater = $this->session->userdata('user_id');
		$order = $this->input->post("order", TRUE);

		$article_info = array(
			'headline' => $headline,
			'author' => $author,
			'content' => $content,
			'updatetime' => $updatetime,
			'ordernum' => $order,
			'user_id' => $updater,
			'user_menu_id' => $user_menu_id,
		);

		$this->db->where('user_article_id', $user_article_id)->update($this->db->dbprefix('user_article'), $article_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('管理员编辑个人文章成功');
			return 1;
		} else {
			$this->log_model->log_add('管理员编辑个人文章失败');
			return 0;
		}
	}

	public function article_delete($article_id) {
		$this->db->delete($this->db->dbprefix('user_article'), array('user_article_id' => $article_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除管理员个人文章成功');
			return 1;
		} else {
			$this->log_model->log_add('删除管理员个人文章失败');
			return 0;
		}
	}
}
/* End of file article_model.php */
/* Location: ./bluescms/application/models/article_model.php */