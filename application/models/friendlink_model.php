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
class FriendLink_model extends CI_Model {

	/**
	 * [__construct Load all you need]
	 */
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * [get_friendlink_list Get the list of friendlinks]
	 * @return [type] [description]
	 */
	public function get_friendlink_list() {
		$result = $this->db->select('friendlink_id,headline,url')->get($this->db->dbprefix('friendlink'))->result_array();
		foreach ($result as $key => $value) {
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/friendlink/friendlink_edit/' . $result[$key]['friendlink_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/friendlink/friendlink_delete/' . $result[$key]['friendlink_id'];
		}
		return $result;
	}

	/**
	 * [get_friendlink_content As name]
	 * @param  int $friendlink_id
	 * @return [type]                [description]
	 */
	public function get_friendlink_content($friendlink_id) {
		$result = $this->db->select('friendlink_id,headline,url')->get_where($this->db->dbprefix('friendlink'), array('friendlink_id' => $friendlink_id), 1)->row_array();
		return $result;
	}

	/**
	 * [friendlink_add_post Get the friendlink infos to the database]
	 * @return [type] [description]
	 */
	public function friendlink_add_post() {
		$headline = $this->input->post('headline', TRUE);
		$url = $this->input->post('url', TRUE);
		$updatetime = date("Y:m:d H:i:s");
		$creator = $this->session->userdata('user_id');
		$updater = $creator;

		$friendlink_info = array(
			'headline' => $headline,
			'url' => $url,
			'creator' => $creator,
			'updater' => $updater,
			'updatetime' => $updatetime,
		);

		$this->db->insert($this->db->dbprefix('friendlink'), $friendlink_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加友情链接成功');
			return 1;
		} else {
			$this->log_model->log_add('添加友情链接失败');
			return 0;
		}
	}

	/**
	 * [friendlink_edit_post Get the friendlink infos to the database]
	 * @return [type] [description]
	 */
	public function friendlink_edit_post() {
		$friendlink_id = $this->input->post("friendlink_id", TRUE);
		$url = $this->input->post("url", TRUE);
		$headline = $this->input->post("headline", TRUE);
		$updater = $this->session->userdata('user_id');

		$friendlink = array(
			'url' => $url,
			'headline' => $headline,
			'updater' => $updater,
			'updatetime' => date("Y:m:d H:i:s"),

		);

		$this->db->where('friendlink_id', $friendlink_id)->update($this->db->dbprefix('friendlink'), $friendlink);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑友情链接成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑友情链接失败');
			return 0;
		}
	}

	/**
	 * [friendlink_delete Delete the friendlink]
	 * @param  int $friendlink_id
	 * @return [type]                [description]
	 */
	public function friendlink_delete($friendlink_id) {
		$this->db->delete($this->db->dbprefix('friendlink'), array('friendlink_id' => $friendlink_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除友情链接成功');
			return 1;
		} else {
			$this->log_model->log_add('删除友情链接失败');
			return 0;
		}
	}
}
/* End of file friendlink_model.php */
/* Location: ./bluescms/application/models/friendlink_model.php */
