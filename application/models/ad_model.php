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
class Ad_model extends CI_Model {

	/**
	 * [__construct Load all you need]
	 */
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_ad_list() {
		$result = $this->db->select('ad_id,ad_headline,ad_url,ad_img')->get($this->db->dbprefix('ad'))->result_array();
		foreach ($result as $key => $value) {
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/ad/ad_edit/' . $result[$key]['ad_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/ad/ad_delete/' . $result[$key]['ad_id'];
		}
		return $result;
	}

	public function get_ad_content($ad_id) {
		$result = $this->db->select('ad_id,ad_headline,ad_url,ad_img,ad_content')->get_where($this->db->dbprefix('ad'), array('ad_id' => $ad_id), 1)->row_array();
		return $result;
	}

	public function ad_add_post() {
		$ad_headline = $this->input->post('ad_headline', TRUE);
		$ad_url = $this->input->post('ad_url', TRUE);
		$updatetime = date("Y:m:d H:i:s");
		$updater = $this->session->userdata('user_id');

		$ad_content = $_POST['content'];
		$this->load->library('tag_str');
		/*get all list of tag <img>*/
		$img_link = $this->tag_str->get_all_link($ad_content, 'img');
		/*get the src elements of <img>*/
		preg_match('/src=\"[a-zA-Z0-9\/\.]*/', $img_link[0], $segment);
		if ($segment) {
			//delete src=
			$source = preg_replace('/src=\"/', "", $segment[0]);
			//delete "
			$source_after = preg_replace('/\"/', "", $source);
			//add the base_url
			/****************************************
			在网站上线后
			修改jisuanji为上线的文件夹名
			 ****************************************/
			$img_url = preg_replace('/\/jisuanji\//', "", $source_after);
		} else {
			$img_url = '';
		}
		if (!$img_url) {
			$img_url = 'null_none';
		}

		$ad_info = array(
			'ad_headline' => $ad_headline,
			'ad_url' => $ad_url,
			'ad_img' => $img_url,
			'ad_content'=> $ad_content,
			'updater' => $updater,
			'updatetime' => $updatetime,
		);

		$this->db->insert($this->db->dbprefix('ad'), $ad_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加广告项目成功');
			return 1;
		} else {
			$this->log_model->log_add('添加广告项目失败');
			return 0;
		}
	}

	public function add_edit_post($kind) {
		$ad_id = $this->input->post('ad_id', TRUE);
		$ad_headline = $this->input->post('ad_headline', TRUE);
		$ad_url = $this->input->post('ad_url', TRUE);
		$updatetime = date("Y:m:d H:i:s");
		$updater = $this->session->userdata('user_id');

		$ad_content = $_POST['ad_img'];
		$this->load->library('tag_str');
		/*get all list of tag <img>*/
		$img_link = $this->tag_str->get_all_link($ad_content, 'img');
		/*get the src elements of <img>*/
		preg_match('/src=\"[a-zA-Z0-9\/\.]*/', $img_link[0], $segment);
		if ($segment) {
			//delete src=
			$source = preg_replace('/src=\"/', "", $segment[0]);
			//delete "
			$source_after = preg_replace('/\"/', "", $source);
			//add the base_url
			/****************************************
			在网站上线后
			修改jisuanji为上线的文件夹名
			 ****************************************/
			$img_url = preg_replace('/\/jisuanji\//', "", $source_after);
		} else {
			$img_url = '';
		}
		if (!$img_url) {
			$img_url = 'null_none';
		}

		$ad_info = array(
			'ad_headline' => $ad_headline,
			'ad_url' => $ad_rul,
			'ad_img' => $img_url,
			'ad_content' => $ad_content,
			'updater' => $updater,
			'updatetime' => $updatetime,
		);

		$this->db->where('ad_id', $ad_id)->update($this->db->dbprefix('ad'), $ad_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑广告项目成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑广告项目失败');
			return 0;
		}
	}

	public function ad_delete($ad_id) {
		$this->db->delete($this->db->dbprefix('ad'), array('ad_id' => $ad_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除广告成功');
			return 1;
		} else {
			$this->log_model->log_add('删除广告失败');
			return 0;
		}
	}
}
/* End of file team_depart_model.php */
/* Location: ./bluescms/application/models/team_depart_model.php */
