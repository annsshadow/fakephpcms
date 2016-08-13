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
class Role_model extends CI_Model {
	/**
	 * [__construct Load all you need]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->base_url = $this->config->item('base_url');

	}

	/**
	 * [get_role_list Get the list of role according to the loginer's role]
	 * @return [type] [description]
	 */
	public function get_role_list() {
		$role_id = $this->session->userdata('role_id');
		$result = $this->db->select('role_id,role_name')->get_where($this->db->dbprefix('admin_role'), array('role_id >' => $role_id))->result_array();
		foreach ($result as $key => $value) {
			$result[$key]['url_view'] = $this->base_url . 'bluescms/index.php/role/role_info_show/' . $result[$key]['role_id'];
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/role/role_edit/' . $result[$key]['role_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/role/role_delete/' . $result[$key]['role_id'];
		}
		return $result;
	}

	/**
	 * [role_add_post Get the infos of new role to database]
	 * @return [type] [description]
	 */
	public function role_add_post() {
		$role_name = $this->input->post("role_name", TRUE);
		$role_info = $this->input->post("role_info", TRUE);
		$role_right = implode(",", $this->input->post("right", TRUE));
		$createtime = date("Y-m-d H:i:s");

		$role = array('role_name' => $role_name,
			'role_info' => $role_info,
			'role_right' => $role_right,
			'createtime' => $createtime,
			'updatetime' => $createtime,
		);

		$this->db->insert($this->db->dbprefix("admin_role"), $role);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加角色成功');
			return 1;
		} else {
			$this->log_model->log_add('添加角色失败');
			return 0;
		}
	}

	/**
	 * [role_edit_post Get the edited infos of role to database]
	 * @return [type] [description]
	 */
	public function role_edit_post() {
		$role_id = $this->input->post("role_id", TRUE);
		$role_name = $this->input->post("role_name", TRUE);
		$role_info = $this->input->post("role_info", TRUE);
		$role_right = implode(",", $this->input->post("right", TRUE));
		$updatetime = date("Y-m-d H:i:s");

		$role_info = array('role_name' => $role_name,
			'role_info' => $role_info,
			'role_right' => $role_right,
			'updatetime' => $updatetime,
		);

		$this->db->where('role_id', $role_id)->update($this->db->dbprefix("admin_role"), $role_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑角色成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑角色失败');
			return 0;
		}
	}

	/**
	 * [role_delete Delete the role]
	 * @param  int $role_id
	 * @return [type]          [description]
	 */
	public function role_delete($role_id) {
		$this->db->delete($this->db->dbprefix('admin_role'), array('role_id' => $role_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除角色成功');
			return 1;
		} else {
			$this->log_model->log_add('删除角色失败');
			return 0;
		}
	}

	/**
	 * [get_full_by_roleid Get the infos of the role]
	 * @param  int $role_id
	 * @return [type]          [description]
	 */
	public function get_full_by_roleid($role_id) {
		$result['name_info'] = $this->db->select('role_name,role_info')->get_where($this->db->dbprefix('admin_role'), array('role_id' => $role_id))->row_array();
		$result['right_id_name'] = $this->get_right_list_by_roleid($role_id);
		return $result;
	}

	/**
	 * [get_right_list_by_roleid Get the list of rights according to the role]
	 * @param  [type] $roleid [description]
	 * @return [type]         [description]
	 */
	public function get_right_list_by_roleid($role_id) {
		if ($role_id >= $this->session->userdata('role_id')) {
			/*get the string of rights*/
			$right_array_before = $this->db->select('role_right')->get_where($this->db->dbprefix('admin_role'), array('role_id' => $role_id))->result_array();

			/*devide them into single number*/
			$right_array_after = explode(',', $right_array_before[0]['role_right']);

			/*get the right_name and rihgt_id according the number*/
			$this->db->where_in('right_id', $right_array_after);
			$role_list = $this->db->select('right_id,right_name')->get($this->db->dbprefix('admin_right'))->result_array();

			return $role_list;
		} else {
			$this->log_model->log_add('非法获取角色权限列表');
			exit('试图获取非法权限！');
		}
	}
}
/* End of file role_model.php */
/* Location: ./bluescms/application/models/role_model.php */