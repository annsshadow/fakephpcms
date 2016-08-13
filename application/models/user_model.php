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
class User_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->base_url = $this->config->item("base_url");
	}

	public function get_full_by_username($username) {
		return $this->db->get_where($this->db->dbprefix('admin_user'), array('user_name' => $username), 1)->row_array();
	}

	public function password_change_post() {
		$password = $this->input->post("password");
		/*if is null, we will be the home page*/
		if (empty($password)) {
			redirect('bluescms/index.php');
		} else {
			/*get the password after encryption*/
			$password = sha1(md5($password));
			$updatetime = date("Y:m:d H:i:s");

			$password_info = array(
				'password' => $password,
				'updatetime' => $updatetime,
			);

			$this->db->where('user_id', $this->session->userdata('user_id'))->update($this->db->dbprefix('admin_user'), $password_info);

			if ($this->db->affected_rows()) {
				$this->log_model->log_add('修改密码成功');
				return 1;
			} else {
				$this->log_model->log_add('修改密码失败');
				return 0;
			}
		}

	}

	public function get_user_edit_info($user_id) {
		return $this->db->select('user_id,user_name,role_id,role_name')->get_where($this->db->dbprefix('admin_user'), array('user_id' => $user_id), 1)->row_array();
	}

	public function get_role_select() {
		return $this->db->select('role_id,role_info')->get_where($this->db->dbprefix('admin_role'), array('role_id >=' => $this->session->userdata('role_id')))->result_array();
	}

	public function get_full_by_userid($user_id) {
		return $this->db->select('user_name,role_name,creattime')->get_where($this->db->dbprefix('admin_user'), array('user_id' => $user_id), 1)->row_array();
	}

	public function get_user_list() {
		$user_id = $this->session->userdata('user_id');
		$role_id = $this->session->userdata('role_id');

		/*don't get the info of itself*/
		/*get the users whose role_id is less than the loginers'*/
		$result = $this->db->select('user_id,user_name,creattime')->get_where($this->db->dbprefix('admin_user'), array('user_id !=' => $user_id, 'role_id >' => $role_id))->result_array();

		foreach ($result as $key => $value) {
			$result[$key]['url_view'] = $this->base_url . 'bluescms/index.php/user/under_user_info_show/' . $result[$key]['user_id'];
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/user/user_edit/' . $result[$key]['user_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/user/user_delete/' . $result[$key]['user_id'];
		}
		return $result;
	}

	public function user_add_post() {
		$password = $this->input->post("password");
		/*if is null, we will be the home page*/
		if (empty($password)) {
			redirect('bluescms/index.php');
		} else {
			$user_name = $this->input->post("user_name", TRUE);
			$password = sha1(md5($this->input->post("password", TRUE)));
			$role_id = $this->input->post("role_id", TRUE);
			$role_info = $this->db->select('role_info')->get_where($this->db->dbprefix('admin_role'), array('role_id' => $role_id), 1)->row_array();
			$role_name = $role_info['role_info'];
			$creattime = date("Y:m:d H:i:s");

			$userinfo = array(
				'user_name' => $user_name,
				'password' => $password,
				'role_id' => $role_id,
				'role_name' => $role_name,
				'creattime' => $creattime,
				'updatetime' => $creattime,
			);

			$this->db->insert($this->db->dbprefix('admin_user'), $userinfo);

			$user_id = $this->db->insert_id();
			$userinfo = array(
				'user_id' => $user_id,
				'user_photo' => 'No_photo_info',
				'user_content' => 'No_user_content',
				'user_photo_url' => 'No_photo_url',
				'user_cv' => 'No_user_cv',
				'chinese_name'=> '未定中文名',
				'short_name' => 'No_short_name',

			);
			$this->db->insert($this->db->dbprefix('user_info'), $userinfo);

			if ($this->db->affected_rows()) {
				$this->log_model->log_add('添加管理员成功');
				return 1;
			} else {
				$this->log_model->log_add('添加管理员失败');
				return 0;
			}
		}

	}

	public function user_edit_post() {
		$user_id = $this->input->post("user_id");
		$user_name = $this->input->post("user_name");
		$role_id = $this->input->post("role_id");
		$updatetime = date("Y-m-d H:i:s");

		$user_info = array(
			'user_name' => $user_name,
			'role_id' => $role_id,
			'updatetime' => $updatetime,
		);
		$role_info = $this->db->select('role_info')->get_where($this->db->dbprefix('admin_role'), array('role_id' => $user_info['role_id']))->row_array();
		$user_info['role_name'] = $role_info['role_info'];
		$this->db->where('user_id', $user_id)->update($this->db->dbprefix('admin_user'), $user_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑管理员成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑管理员失败');
			return 0;
		}

	}

	public function user_delete($user_id) {
		$this->db->delete($this->db->dbprefix('admin_user'), array('user_id' => $user_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除管理员成功');
			return 1;
		} else {
			$this->log_model->log_add('删除管理员失败');
			return 0;
		}
	}

	//获取用户照片，联系方式，简介等信息
	public function get_itself_info($user_id) {
		return $this->db->select('info_id,user_photo,chinese_name,short_name,user_content,user_photo_url,user_cv')->get_where($this->db->dbprefix('user_info'), array('user_id' => $user_id), 1)->row_array();
	}

	//更改用户头像，联系方式，简介等信息
	public function user_info_edit_post($user_id) {
		$info_id = $this->input->post('info_id', TRUE);
		$user_photo = $this->input->post('user_photo', TRUE);
		$user_content = $this->input->post('user_content', TRUE);
		$user_cv = $this->input->post('user_cv', TRUE);
		$chinese_name = $this->input->post('chinese_name',TRUE);
		$short_name = $this->input->post('short_name',TRUE);

		//判断目录是否存在
		if(! file_exists($_SERVER["DOCUMENT_ROOT"].'/'.$short_name.'/')){
			//echo 'create dir<br />';
			mkdir($_SERVER["DOCUMENT_ROOT"].'/'.$short_name,0777);
		}
		//判断跳转文件是否存在
		if(file_exists($_SERVER["DOCUMENT_ROOT"].'/'.$short_name.'/index.php')){
			//echo 'delete old index.php<br />';
			unlink($_SERVER["DOCUMENT_ROOT"].'/'.$short_name.'/index.php');
		}
		//写入内容
		//echo 'create new index.php<br />';
		$short_file = fopen($_SERVER["DOCUMENT_ROOT"].'/'.$short_name.'/index.php', "w");
		$short_text = '<?php Header("Location: '.'http://localhost/'.'content-teacher.html?user_id='.$user_id.');';
		//echo 'write into index.php<br  />';
		fwrite($short_file,$short_text);

		$this->load->library('tag_str');
		/*get all list of tag <img>*/
		$img_link = $this->tag_str->get_all_link($user_photo, 'img');
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

		$user_info = array(
			'user_photo' => $user_photo,
			'user_content' => $user_content,
			'user_cv' => $user_cv,
			'user_photo_url' => $img_url,
			'chinese_name' => $chinese_name,
			'short_name' => $short_name,
		);

		$this->db->where('user_id', $user_id)->update($this->db->dbprefix('user_info'), $user_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑管理员个人信息成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑管理员个人信息失败');
			return 0;
		}
	}
}
/* End of file user_model.php */
/* Location: ./bluescms/application/models/user_model.php */