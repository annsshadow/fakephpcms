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
class Tag_model extends CI_Model {
	/**
	 * [__construct Load all you need]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->base_url = $this->config->item('base_url');
	}

	/**
	 * [get_download_list Get the download list]
	 * @return [type] [description]
	 */
	public function get_tag_list($offset) {
		$this->load->library('pagination');
		$this->load->library('date_chg');
		/*increase the base_url*/
		$config['base_url'] = $this->base_url . 'bluescms/index.php/tag/index/';
		/*get the total number of article*/
		$config['total_rows'] = $this->db->from($this->db->dbprefix('tag'))->count_all_results();
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
		/*initialize the pagination*/
		$this->pagination->initialize($config);

		$result = $this->db->select('tag_id,updater,menu_id,tag_name,updatetime')->get_where($this->db->dbprefix('tag'), array(), $config['per_page'], $offset)->result_array();

		foreach ($result as $key => $value) {
			$temp = $this->db->select('menu_name')->get_where($this->db->dbprefix('menu'), array('menu_id' => $value['menu_id']), 1)->row_array();
			$result[$key]['menu_name'] = $temp['menu_name'];
			$temp = $this->db->select('user_name')->get_where($this->db->dbprefix('admin_user'), array('user_id' => $value['updater']), 1)->row_array();
			$result[$key]['updater'] = $temp['user_name'];
			$result[$key]['updatetime'] = $this->date_chg->get_YMD($value['updatetime']);
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/tag/tag_delete/' . $value['tag_id'];
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/tag/tag_edit/' . $value['tag_id'];
		}
		return $result;
	}

	public function get_tag_menu_list() {
		//maybe can display by $menu_id
		$result = $this->db->select('tag_id,tag_name')->get_where($this->db->dbprefix('tag'))->result_array();
		return $result;
	}

	public function get_tag_content($tag_id) {
		$content = $this->db->select('tag_id,tag_name,menu_id,ordernum')->get_where($this->db->dbprefix('tag'), array('tag_id' => $tag_id), 1)->row_array();
		return $content;
	}

	public function tag_delete($tag_id) {
		$this->db->delete($this->db->dbprefix('tag'), array('tag_id' => $tag_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除标签成功');
			return 1;
		} else {
			$this->log_model->log_add('删除标签失败');
			return 0;
		}
	}

	public function tag_add_post() {
		$this->load->library('session');
		$tag_name = $this->input->post("tag_name", TRUE);
		$menu_id = $this->input->post("menu_id", TRUE);
		$createtime = date("Y-m-d H:i:s");
		$creator = $this->session->userdata('user_id');
		$ordernum = $this->input->post("ordernum", TRUE);

		$tag_info = array(
			'updatetime' => $createtime,
			'menu_id' => $menu_id,
			'tag_name' => $tag_name,
			'creator' => $creator,
			'updater' => $creator,
			'ordernum' => $ordernum,
		);

		$this->db->insert($this->db->dbprefix('tag'), $tag_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加标签成功');
			return 1;
		} else {
			$this->log_model->log_add('添加标签失败');
			return 0;
		}
	}

	public function tag_edit_post() {
		$this->load->library('session');
		$tag_id = $this->input->post("tag_id", TRUE);
		$tag_name = $this->input->post("tag_name", TRUE);
		$menu_id = $this->input->post("menu_id", TRUE);
		$ordernum = $this->input->post("ordernum", TRUE);
		$updatetime = date("Y-m-d H:i:s");
		$updater = $this->session->userdata('user_id');

		$tag_info = array(
			'updatetime' => $updatetime,
			'menu_id' => $menu_id,
			'tag_name' => $tag_name,
			'updater' => $updater,
			'ordernum' => $ordernum,
		);

		$this->db->where('tag_id', $tag_id)->update($this->db->dbprefix('tag'), $tag_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑标签成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑标签失败');
			return 0;
		}
	}
}
/* End of file download_model.php */
/* Location: ./bluescms/application/models/download_model.php */