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
class Team_depart_model extends CI_Model {

	/**
	 * [__construct Load all you need]
	 */
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_team_depart_list($kind) {
		$result = $this->db->select('id,tdname')->get($this->db->dbprefix($kind))->result_array();
		foreach ($result as $key => $value) {
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/team_depart/team_depart_edit/' . $kind . '/' . $result[$key]['id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/team_depart/team_depart_delete/' . $kind . '/' . $result[$key]['id'];
		}
		return $result;
	}

	public function get_team_depart_content($kind, $id) {
		$result = $this->db->select('id,tdname')->get_where($this->db->dbprefix($kind), array('id' => $id), 1)->row_array();
		return $result;
	}

	public function team_depart_add_post($kind) {
		$tdname = $this->input->post('tdname', TRUE);
		$updatetime = date("Y:m:d H:i:s");
		$creator = $this->session->userdata('user_id');
		$updater = $creator;

		$team_depart_info = array(
			'tdname' => $tdname,
			'creator' => $creator,
			'updater' => $updater,
			'updatetime' => $updatetime,
		);

		$this->db->insert($this->db->dbprefix($kind), $team_depart_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加' . $kind . '项目成功');
			return 1;
		} else {
			$this->log_model->log_add('添加' . $kind . '项目失败');
			return 0;
		}
	}

	public function team_depart_edit_post($kind) {
		$id = $this->input->post('id', TRUE);
		$tdname = $this->input->post('tdname', TRUE);
		$updatetime = date("Y:m:d H:i:s");
		$creator = $this->session->userdata('user_id');
		$updater = $creator;

		$team_depart_info = array(
			'id' => $id,
			'tdname' => $tdname,
			'creator' => $creator,
			'updater' => $updater,
			'updatetime' => $updatetime,
		);

		$this->db->where('id', $id)->update($this->db->dbprefix($kind), $team_depart_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑' . $kind . '项目成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑' . $kind . '项目失败');
			return 0;
		}
	}

	public function team_depart_delete($kind, $id) {
		$this->db->delete($this->db->dbprefix($kind), array('id' => $id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除' . $kind . '成功');
			return 1;
		} else {
			$this->log_model->log_add('删除' . $kind . '失败');
			return 0;
		}
	}
}
/* End of file team_depart_model.php */
/* Location: ./bluescms/application/models/team_depart_model.php */
