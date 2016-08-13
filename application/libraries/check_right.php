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
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Check_right {
	/**
	 * [check_role_right Check if you have the permit to do sth]
	 * @param  int $right_id
	 * @return boolen	TRUE or FALSE
	 */
	public function check_role_right($right_id) {
		/*get CodeIgniter super object*/
		$CI = &get_instance();
		$CI->load->library('session');
		$role_id = $CI->session->userdata('role_id');
		if ($role_id) {
			$CI->load->database();
			/*the id of right need to check*/
			$check_right_id = $right_id;
			/*the right list of the loginer's role*/
			$right_array_before = $CI->db->select('role_right')->get_where($CI->db->dbprefix('admin_role'), array('role_id' => $role_id))->row_array();
			//the right list----array
			$right_array_after = explode(',', $right_array_before['role_right']);
			/*judge whether it has the right or not*/
			$flag = in_array($right_id, $right_array_after);
		} else {
			$flag = FALSE;
		}
		return $flag;
	}
}
/* End of file check_right.php */
/* Location: ./organization/application/libraries/check_right.php */