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
class Menu_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->base_url = $this->config->item("base_url");
	}

	//获取用于系统选择框的栏目列表
	public function get_menu_list() {
		/*get the first-level menus*/
		$menu_first = array();
		$menu_first = $this->db->select('menu_id,menu_name')->order_by("menu_order", 'asc')->get_where($this->db->dbprefix('menu'), array('menu_level' => 1))->result_array();
		/*get the second-level menus*/
		foreach ($menu_first as $key => $value) {
			$menu_first[$key]['menu_second'] = $this->db->select('menu_id,menu_name')->order_by("menu_order", 'asc')->get_where($this->db->dbprefix('menu'), array('parent_id' => $value['menu_id']))->result_array();
		}
		return $menu_first;
	}

	//获取用于管理员文章-菜单选择框列表
	public function get_user_menu_list($user_id) {
		$menu_first = array();
		$menu_first = $this->db->select('user_menu_id,menu_name')->order_by("menu_order", 'asc')->get_where($this->db->dbprefix('user_menu'), array('menu_level' => 1, 'user_id' => $user_id))->result_array();
		/*get the second-level menus*/
		foreach ($menu_first as $key => $value) {
			$menu_first[$key]['menu_second'] = $this->db->select('user_menu_id,menu_name')->order_by("menu_order", 'asc')->get_where($this->db->dbprefix('user_menu'), array('parent_id' => $value['user_menu_id']))->result_array();
		}
		return $menu_first;
	}

	//获取一级栏目的名称
	public function get_menu_first() {
		$menu_first = $this->db->select('menu_id,menu_name')->get_where($this->db->dbprefix('menu'), array('menu_level' => 1))->result_array();
		return $menu_first;
	}

	public function get_user_menu_first($user_id) {
		$menu_first = $this->db->select('user_menu_id,menu_name')->get_where($this->db->dbprefix('user_menu'), array('menu_level' => 1))->result_array();
		return $menu_first;
	}

	//获取一级栏目及其相关操作链接
	public function get_menu_list_first() {

		$menu_first = array();
		$menu_first = $this->db->select('menu_id,menu_name')->order_by("menu_order", 'asc')->get_where($this->db->dbprefix('menu'), array('menu_level' => 1))->result_array();

		foreach ($menu_first as $key => $value) {
			$menu_first[$key]['url_second'] = $this->base_url . 'bluescms/index.php/menu/get_menu_list_second/' . $value['menu_id'];
			$menu_first[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/menu/menu_edit/' . $value['menu_id'];
			$menu_first[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/menu/menu_delete/' . $value['menu_id'];
		}
		return $menu_first;
	}

	public function get_user_menu_list_first($user_id) {

		$menu_first = array();
		$menu_first = $this->db->select('user_menu_id,menu_name')->order_by("menu_order", 'asc')->get_where($this->db->dbprefix('user_menu'), array('menu_level' => 1, 'user_id' => $user_id))->result_array();

		foreach ($menu_first as $key => $value) {
			//$menu_first[$key]['url_second'] = $this->base_url . 'bluescms/index.php/user_menu/get_menu_list_second/' . $value['user_menu_id'];
			$menu_first[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/user_menu/menu_edit/' . $value['user_menu_id'];
			$menu_first[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/user_menu/menu_delete/' . $value['user_menu_id'];
		}
		return $menu_first;
	}

	//根据一级栏目id获取二级栏目列表
	public function get_menu_list_second($menu_id) {
		$menu_second = $this->db->select('menu_id,menu_name')->get_where($this->db->dbprefix('menu'), array('parent_id' => $menu_id, 'menu_level' => 2))->result_array();

		foreach ($menu_second as $key => $value) {
			$menu_second[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/menu/menu_edit/' . $value['menu_id'];
			$menu_second[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/menu/menu_delete/' . $value['menu_id'];
		}
		return $menu_second;
	}

	public function get_user_menu_list_second($menu_id, $user_id) {
		$menu_second = $this->db->select('user_menu_id,menu_name')->get_where($this->db->dbprefix('user_menu'), array('parent_id' => $menu_id, 'menu_level' => 2, 'user_id' => $user_id))->result_array();

		foreach ($menu_second as $key => $value) {
			$menu_second[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/user_menu/menu_edit/' . $value['user_menu_id'];
			$menu_second[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/user_menu/menu_delete/' . $value['user_menu_id'];
		}
		return $menu_second;
	}

	//获取某个具体的一二级的栏目名称
	public function get_menu_info($menu_id) {
		$level = $this->db->select('menu_level')->get_where($this->db->dbprefix('menu'), array('menu_id' => $menu_id), 1)->row_array();
		if ($level['menu_level'] == 2) {
			$result = $this->db->select('menu_level,parent_id,,menu_order,menu_name')->get_where($this->db->dbprefix('menu'), array('menu_id' => $menu_id), 1)->row_array();
			$temp = $this->db->select('menu_name')->get_where($this->db->dbprefix('menu'), array('menu_id' => $result['parent_id']), 1)->row_array();
			$result['menu_first'] = $temp['menu_name'];
		} else {
			$result = $this->db->select('parent_id,,menu_order,menu_name')->get_where($this->db->dbprefix('menu'), array('menu_id' => $menu_id), 1)->row_array();
			$result['menu_first'] = $result['menu_name'];
		}
		return $result;
	}

	public function get_user_menu_info($menu_id, $user_id) {
		$level = $this->db->select('menu_level')->get_where($this->db->dbprefix('user_menu'), array('user_menu_id' => $menu_id, 'user_id' => $user_id), 1)->row_array();
		if ($level['menu_level'] == 2) {
			$result = $this->db->select('menu_level,parent_id,,menu_order,menu_name')->get_where($this->db->dbprefix('user_menu'), array('user_menu_id' => $menu_id, 'user_id' => $user_id), 1)->row_array();
			$temp = $this->db->select('menu_name')->get_where($this->db->dbprefix('user_menu'), array('user_menu_id' => $result['parent_id'], 'user_id' => $user_id), 1)->row_array();
			$result['menu_first'] = $temp['menu_name'];
		} else {
			$result = $this->db->select('parent_id,,menu_order,menu_name')->get_where($this->db->dbprefix('user_menu'), array('user_menu_id' => $menu_id, 'user_id' => $user_id), 1)->row_array();
			$result['menu_first'] = $result['menu_name'];
		}
		return $result;
	}

	public function menu_add_post() {
		$menu_order = $this->input->post("menu_order", TRUE);
		$menu_name = $this->input->post("menu_name", TRUE);
		$menu_first_id = $this->input->post("menu_first_id", TRUE);
		/*judge whether it is first-level or second-level*/
		if ($menu_first_id == 0) {
			/*when it is first-level*/
			$parent_id = 0;
			$menu_level = 1;
		} else {
			/*when it is second-level*/
			$parent_id = $menu_first_id;
			$menu_level = 2;
		}

		$menu = array(
			'parent_id' => $parent_id,
			'menu_order' => $menu_order,
			'menu_level' => $menu_level,
			'menu_name' => $menu_name,
		);

		$this->db->insert($this->db->dbprefix('menu'), $menu);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加栏目成功');
			return 1;
		} else {
			$this->log_model->log_add('添加栏目失败');
			return 0;
		}
	}

	public function user_menu_add_post($user_id) {
		$menu_order = $this->input->post("menu_order", TRUE);
		$menu_name = $this->input->post("menu_name", TRUE);
		$menu_first_id = $this->input->post("menu_first_id", TRUE);
		/*judge whether it is first-level or second-level*/
		if ($menu_first_id == 0) {
			/*when it is first-level*/
			$parent_id = 0;
			$menu_level = 1;
		} else {
			/*when it is second-level*/
			$parent_id = $menu_first_id;
			$menu_level = 2;
		}

		$menu = array(
			'parent_id' => $parent_id,
			'menu_order' => $menu_order,
			'menu_level' => $menu_level,
			'menu_name' => $menu_name,
			'user_id' => $user_id,
		);

		$this->db->insert($this->db->dbprefix('user_menu'), $menu);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加个人栏目成功');
			return 1;
		} else {
			$this->log_model->log_add('添加个人栏目失败');
			return 0;
		}
	}

	public function menu_edit_post() {
		$menu_id = $this->input->post("menu_id", TRUE);
		$menu_name = $this->input->post("menu_name", TRUE);
		$menu_order = $this->input->post("menu_order", TRUE);

		$menu_info = $this->get_menu_info($menu_id);
		/*judge the menu-level*/
		if ($menu_info['parent_id'] && ($menu_info['menu_level'] == 2)) {
			/*when it is second-level*/
			$menu_id_first = $this->input->post("menu_id_first", TRUE);

			$menu = array(
				'menu_name' => $menu_name,
				'parent_id' => $menu_id_first,
				'menu_order' => $menu_order,
				'menu_level' => 2,
			);

			$this->db->where('menu_id', $menu_id)->update($this->db->dbprefix('menu'), $menu);
		} else {
			/*when it is first-level*/
			$menu = array(
				'menu_name' => $menu_name,
				'menu_order' => $menu_order,
				'parent_id' => 0,
				'menu_level' => 1,
			);

			$this->db->where('menu_id', $menu_id)->update($this->db->dbprefix('menu'), $menu);
		}

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑栏目成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑栏目失败');
			return 0;
		}
	}

	public function user_menu_edit_post($user_id) {
		$menu_id = $this->input->post("menu_id", TRUE);
		$menu_name = $this->input->post("menu_name", TRUE);
		$menu_order = $this->input->post("menu_order", TRUE);

		$menu_info = $this->get_user_menu_info($menu_id, $user_id);
		/*judge the menu-level*/
		if ($menu_info['parent_id'] && ($menu_info['menu_level'] == 2)) {
			/*when it is second-level*/
			$menu_id_first = $this->input->post("menu_id_first", TRUE);

			$menu = array(
				'menu_name' => $menu_name,
				'parent_id' => $menu_id_first,
				'menu_order' => $menu_order,
				'menu_level' => 2,
			);

			$this->db->where('user_menu_id', $menu_id)->update($this->db->dbprefix('user_menu'), $menu);
		} else {
			/*when it is first-level*/
			$menu = array(
				'menu_name' => $menu_name,
				'menu_order' => $menu_order,
				'parent_id' => 0,
				'menu_level' => 1,
			);

			$this->db->where('user_menu_id', $menu_id)->update($this->db->dbprefix('user_menu'), $menu);
		}

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑个人栏目成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑个人栏目失败');
			return 0;
		}
	}

	public function menu_delete($menu_id) {
		$this->db->delete($this->db->dbprefix('menu'), array('menu_id' => $menu_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除栏目成功');
			return 1;
		} else {
			$this->log_model->log_add('删除栏目失败');
			return 0;
		}
	}

	//获取系统左侧栏系统管理列表
	public function get_admin_menu() {
		/*get the menus of first level*/
		$menu_first = array();
		/*the finial result of the menus*/
		$menu_first = $this->db->select('am_id,menu_name')->get_where($this->db->dbprefix('admin_menu'), array('menu_level' => 1, 'visable' => 1))->result_array();

		/*get the corresponding menus of level 2*/
		foreach ($menu_first as $key => $value) {
			$menu_first[$key]['menu_second'] = $this->db->select('menu_name,menu_url')->get_where($this->db->dbprefix('admin_menu'), array('parent_id' => $value['am_id'], 'visable' => 1))->result_array();
		}
		return $menu_first;
	}

	//获取管理员左侧栏系统管理栏目列表
	public function get_user_admin_menu() {
		/*get the menus of first level*/
		$menu_first = array();
		/*the finial result of the menus*/
		$menu_first = $this->db->select('user_admin_menu_id,menu_name')->get_where($this->db->dbprefix('user_admin_menu'), array('menu_level' => 1, 'visable' => 1))->result_array();

		/*get the corresponding menus of level 2*/
		foreach ($menu_first as $key => $value) {
			$menu_first[$key]['menu_second'] = $this->db->select('menu_name,menu_url')->get_where($this->db->dbprefix('user_admin_menu'), array('parent_id' => $value['user_admin_menu_id'], 'visable' => 1))->result_array();
		}
		return $menu_first;
	}
}
/* End of file menu_model.php */
/* Location: ./bluescms/application/models/menu_model.php */
