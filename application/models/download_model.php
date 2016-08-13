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
class Download_model extends CI_Model {
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
	public function get_download_list($offset) {
		$this->load->library('pagination');
		$this->load->library('date_chg');
		/*increase the base_url*/
		$config['base_url'] = $this->base_url . 'bluescms/index.php/download/index/';
		/*get the total number of article*/
		$config['total_rows'] = $this->db->from($this->db->dbprefix('download'))->count_all_results();
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
		$config['first_link'] = 'First';
		/*what is the name of the last_link*/
		$config['last_link'] = 'Last';
		/*initialize the pagination*/
		$this->pagination->initialize($config);

		$result = $this->db->select('download_id,menu_id,author,headline,createtime')->get_where($this->db->dbprefix('download'), array(), $config['per_page'], $offset)->result_array();

		foreach ($result as $key => $value) {
			$menu_name_array = $this->db->select('menu_name')->get_where($this->db->dbprefix('menu'), array('menu_id' => $result[$key]['menu_id']))->row_array();
			$result[$key]['menu_name'] = $menu_name_array['menu_name'];
			$result[$key]['createtime'] = $this->date_chg->get_YMD($value['createtime']);
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/download/download_delete/' . $result[$key]['download_id'];
			$result[$key]['url_download'] = $this->base_url . 'bluescms/index.php/download/download_file/' . $result[$key]['download_id'];
		}
		return $result;
	}

	/**
	 * [download_file Download the file]
	 * @param  int $download_id
	 * @return [type]              [description]
	 */
	public function download_file($download_id) {
		$this->load->helper('download');
		$dl_info = $this->db->select('headline,suffix,file_url')->get_where($this->db->dbprefix('download'), array('download_id' => $download_id), 1)->row_array();
		/*make the full url*/
		$url = $this->base_url . $dl_info['file_url'];

		$file = file_get_contents($url);
		$name = $dl_info['headline'] . "." . $dl_info['suffix'];
		$name = mb_convert_encoding($name, 'GB2312', 'UTF-8');
		force_download($name, $file);
	}

	/**
	 * [download_delete Delete the file]
	 * @param  int $download_id
	 * @return [type]              [description]
	 */
	public function download_delete($download_id) {
		$this->db->delete($this->db->dbprefix('download'), array('download_id' => $download_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除文件成功');
			return 1;
		} else {
			$this->log_model->log_add('删除文件失败');
			return 0;
		}
	}

	/**
	 * [download_add_post Get the infos of file to the database]
	 * @return [type] [description]
	 */
	public function download_add_post() {
		$headline = $this->input->post("headline", TRUE);
		$author = $this->input->post("author", TRUE);
		$menu_id = $this->input->post("menu_id", TRUE);
		/*get the content from the editor*/
		$original_str = $this->input->post("content", TRUE);

		$createtime = date("Y-m-d H:i:s");
		/*get the total url*/
		$this->load->library('tag_str');
		$url_str = $this->tag_str->get_all_link($original_str, 'a');
		//72代表一般是chrome浏览器获取到的字符串最大长度
		//比它大表示是从IE内核浏览器上传附件的
		if (strlen($url_str[0]) > 72) {
			preg_match('/href=\"[a-zA-Z0-9\/\.]*/', $url_str[0], $segment);
			$del_url = preg_replace('/href=\"/', "", $segment[0]);
			$temp_result = preg_replace('/\"/', "", $del_url);
		} else {
			$temp_result = $url_str[0];
		}
		/*get the relative url*/
		/***************************************
		网站上线后修改jisuanji为上线文件夹名
		 ***************************************/
		$file_url = preg_replace('/\/jisuanji\//', "", $temp_result);
		/*the segments of the url*/
		$url_segment = explode("/", $temp_result);
		/*get the filename including the suffix*/
		$filename = explode(".", $url_segment[6]);
		/*get the suffix*/
		$suffix = $filename[1];

		$download_info = array(
			'createtime' => $createtime,
			'headline' => $headline,
			'author' => $author,
			'suffix' => $suffix,
			'menu_id' => $menu_id,
			'file_url' => $file_url,
		);

		$this->db->insert($this->db->dbprefix('download'), $download_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加文件成功');
			return 1;
		} else {
			$this->log_model->log_add('添加文件失败');
			return 0;
		}
	}
}
/* End of file download_model.php */
/* Location: ./bluescms/application/models/download_model.php */