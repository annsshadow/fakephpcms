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
class Log_model extends CI_Model {
	/**
	 * [__construct Load all you need]
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('check_right');
		$this->load->library('check_ip');
	}

	public function log_add($behavior) {
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');
		$role_id = $this->session->userdata('role_id');
		$role_name = $this->session->userdata('role_name');
		$operate_time = date("Y-m-d H:i:s");
		$ip_address = $this->check_ip->get_client_ip();

		$log_info = array(
			'user_name' => $user_name,
			'user_id' => $user_id,
			'role_id' => $role_id,
			'role_name' => $role_name,
			'operate_time' => $operate_time,
			'behavior' => $behavior,
			'ip_address' => $ip_address,
		);

		$this->db->insert($this->db->dbprefix('admin_log'), $log_info);
	}

	/**
	 * [get_log_list as the name]
	 * @return [array] [list of log]
	 */
	public function get_log_list($offset) {
		$this->load->library('pagination');
		/*increase the base_url*/
		$config['base_url'] = $this->base_url . 'bluescms/index.php/log/index';
		/*get the total number of log*/
		$config['total_rows'] = $this->db->from($this->db->dbprefix('admin_log'))->count_all_results();
		/*how many articles per page*/
		$config['per_page'] = 11;
		/*the position of the offset or the page_number; count from the 'index.php'*/
		$config['uri_segment'] = 3;
		/*the number of the link near the current page*/
		$config['num_links'] = 3;
		/*the tag put in the left of the result*/
		$config['full_tag_open'] = '<p>';
		/*the tag put in the right of the result*/
		$config['full_tag_close'] = '</p>';
		/*what is the name of the first_link*/
		$config['first_link'] = 'First';
		/*what is the name of the last_link*/
		$config['last_link'] = 'Last';
		/*initialize the pagination*/
		$this->pagination->initialize($config);

		$log = $this->db->select('user_name,role_name,behavior,operate_time,ip_address')->order_by('operate_time', 'desc')->get_where($this->db->dbprefix('admin_log'), array(), $config['per_page'], $offset)->result_array();
		return $log;
	}
}
/* End of file log_model.php */
/* Location: ./bluescms/application/models/log_model.php */