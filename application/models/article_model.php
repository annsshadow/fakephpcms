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
class Article_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->base_url = $this->config->item('base_url');
	}

	public function article_search($keyword, $offset) {
		$this->load->library('pagination');
		/*increase the base_url*/
		$config['base_url'] = $this->base_url . 'bluescms/index.php/article/article_search/' . $keyword . '/' . $offset;
		/*get the total number of article*/
		$config['total_rows'] = $this->db->from($this->db->dbprefix('article'))->like('headline', $keyword)->count_all_results();
		/*how many articles per page*/
		$config['per_page'] = 10;
		/*the position of the offset or the page_number; count from the 'index.php'*/
		$config['uri_segment'] = 5;
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
		/*preview link name*/
		$config['prev_link'] = '上一页';
		/*next link name*/
		$config['next_link'] = '下一页';
		/*initialize the pagination*/
		$this->pagination->initialize($config);

		$this->db->like('headline', $keyword);
		$result = $this->db->order_by('updatetime', 'desc')->select('article_id,menu_id,author,updatetime,headline')->get_where($this->db->dbprefix('article'), array(), $config['per_page'], $offset)->result_array();

		foreach ($result as $key => $value) {
			$result[$key]['url_view'] = $this->base_url . 'bluescms/index.php/article/get_article_content/' . $result[$key]['article_id'];
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/article/article_edit/' . $result[$key]['article_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/article/article_delete/' . $result[$key]['article_id'];
		}

		return $result;
	}

	public function article_search_by_menu($menu_id, $offset = 0) {
		$this->load->library('pagination');
		/*increase the base_url*/
		$config['base_url'] = $this->base_url . 'bluescms/index.php/article/article_search_by_menu/' . $menu_id . '/' . $offset;
		/*get the total number of article*/
		$config['total_rows'] = $this->db->from($this->db->dbprefix('article'))->where('menu_id', $menu_id)->count_all_results();
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

		$result = $this->db->order_by('updatetime', 'desc')->select('article_id,author,menu_id,headline,updatetime')->get_where($this->db->dbprefix('article'), array('menu_id' => $menu_id), $config['per_page'], $offset)->result_array();

		foreach ($result as $key => $value) {
			$result[$key]['url_view'] = $this->base_url . 'bluescms/index.php/article/get_article_content/' . $result[$key]['article_id'];
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/article/article_edit/' . $result[$key]['article_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/article/article_delete/' . $result[$key]['article_id'];
		}

		return $result;
	}

	public function get_article_list($offset) {
		$this->load->library('pagination');
		$this->load->library('date_chg');
		/*increase the base_url*/
		$config['base_url'] = $this->base_url . 'bluescms/index.php/article/index/';
		/*get the total number of article*/
		$config['total_rows'] = $this->db->from($this->db->dbprefix('article'))->count_all_results();
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
		/*preview link name*/
		$config['prev_link'] = '上一页';
		/*next link name*/
		$config['next_link'] = '下一页';
		/*initialize the pagination*/
		$this->pagination->initialize($config);

		$result = $this->db->select('article_id,menu_id,headline,author,updatetime')->order_by('updatetime', 'desc')->get_where($this->db->dbprefix('article'), array(), $config['per_page'], $offset)->result_array();

		foreach ($result as $key => $value) {
			$result[$key]['updatetime'] = $this->date_chg->get_YMD($value['updatetime']);
			$result[$key]['url_view'] = $this->base_url . 'bluescms/index.php/article/get_article_content/' . $result[$key]['article_id'];
			$result[$key]['url_edit'] = $this->base_url . 'bluescms/index.php/article/article_edit/' . $result[$key]['article_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/article/article_delete/' . $result[$key]['article_id'];
		}

		return $result;
	}

	public function get_top_list($offset) {
		$this->load->library('date_chg');
		$this->load->library('pagination');
		$this->load->library('date_chg');
		/*increase the base_url*/
		$config['base_url'] = $this->base_url . 'bluescms/index.php/article/index_top/';
		/*get the total number of article*/
		$config['total_rows'] = $this->db->from($this->db->dbprefix('article_top'))->count_all_results();
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
		/*preview link name*/
		$config['prev_link'] = '上一页';
		/*next link name*/
		$config['next_link'] = '下一页';
		/*initialize the pagination*/
		$this->pagination->initialize($config);

		$result = $this->db->select('article_id,menu_id,headline,author,updatetime,top')->order_by('updatetime', 'desc')->get_where($this->db->dbprefix('article_top'), array(), $config['per_page'], $offset)->result_array();

		foreach ($result as $key => $value) {
			$result[$key]['updatetime'] = $this->date_chg->get_YMD($value['updatetime']);
			$result[$key]['url_view'] = $this->base_url . 'bluescms/index.php/article/get_article_content/' . $result[$key]['article_id'];
			$result[$key]['url_check'] = $this->base_url . 'bluescms/index.php/article/top_check/' . $result[$key]['article_id'];
			$result[$key]['url_cancel'] = $this->base_url . 'bluescms/index.php/article/top_cancel/' . $result[$key]['article_id'];
			$result[$key]['url_delete'] = $this->base_url . 'bluescms/index.php/article/top_delete/' . $result[$key]['article_id'];
		}

		return $result;
	}


	public function top_delete($article_id) {
		$this->db->delete($this->db->dbprefix('article_top'), array('article_id' => $article_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除置顶文章成功');
			return 1;
		} else {
			$this->log_model->log_add('删除置顶文章失败');
			return 0;
		}
	}

	public function top_check($article_id) {
		$article_info = array(
			'top' => 1,
		);

		$this->db->where('article_id', $article_id)->update($this->db->dbprefix('article_top'), $article_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('审核置顶文章成功');
			return 1;
		} else {
			$this->log_model->log_add('审核置顶文章失败');
			return 0;
		}
	}

	public function top_cancel($article_id) {
		$article_info = array(
			'top' => 0,
		);

		$this->db->where('article_id', $article_id)->update($this->db->dbprefix('article_top'), $article_info);

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('取消置顶文章成功');
			return 1;
		} else {
			$this->log_model->log_add('取消置顶文章失败');
			return 0;
		}
	}

	public function get_article_content($article_id) {
		//获得文章的具体内容
		$result = $this->db->select('article_id,headline,hit_num,author,menu_id,ordernum,updatetime,content,tag_id')->get_where($this->db->dbprefix('article'), array('article_id' => $article_id), 1)->row_array();
		//通过栏目id查找栏目名称
		$menu_info = $this->db->select('menu_name,parent_id')->get_where($this->db->dbprefix('menu'), array('menu_id' => $result['menu_id']))->row_array();
		$temp_result = $this->db->select("menu_name")->get_where($this->db->dbprefix('menu'), array('menu_id' => $menu_info['parent_id']))->row_array();
		$result['menu_name'] = $menu_info['menu_name'];
		$result['menu_first'] = $temp_result['menu_name'];
		//通过标签id查找标签名称
		$tag_info = $this->db->select('tag_name')->get_where($this->db->dbprefix('tag'), array('tag_id' => $result['tag_id']))->row_array();
		if ($tag_info) {
			$result['tag_name'] = $tag_info['tag_name'];
		} else {
			$result['tag_name'] = '暂无所属标签';
		}
		return $result;
	}

	public function article_add_post() {
		$headline = $this->input->post("headline", TRUE);
		$author = $this->input->post("author", TRUE);
		//$content = $this->input->post("content", TRUE);
		$content = $_POST['content'];
		$tag_id = $this->input->post('tag_id', TRUE);
		$createtime = date("Y-m-d H:i:s");
		$updatetime = $this->input->post("time", TRUE);
		$menu_id = $this->input->post("menu_id", TRUE);
		$creator = $this->session->userdata('user_id');
		$order = $this->input->post("order");
		$hit_num = 0;
		$top = $this->input->post("top",TRUE);

		$this->load->library('tag_str');
		/*get all list of tag <img>*/
		$img_link = $this->tag_str->get_all_link($content, 'img');
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

		if($top){
			$article_info = array(
			'headline' => $headline,
			'author' => $author,
			'content' => $content,
			'updatetime' => $updatetime,
			'createtime' => $createtime,
			'ordernum' => $order,
			'creator' => $creator,
			'updater' => $creator,
			'menu_id' => $menu_id,
			'hit_num' => $hit_num,
			'img_url' => $img_url,
			'tag_id' => $tag_id,
			);

			$this->db->insert($this->db->dbprefix('article'), $article_info);
			$article_id = $this->db->insert_id();

			$article_top = array(
				'article_id'=> $article_id,
				'headline' => $headline,
				'author' => $author,
				'content' => $content,
				'updatetime' => $updatetime,
				'createtime' => $createtime,
				'ordernum' => $order,
				'creator' => $creator,
				'updater' => $creator,
				'menu_id' => $menu_id,
				'hit_num' => $hit_num,
				'img_url' => $img_url,
				'tag_id' => $tag_id,
				'top' => 0,
			);
			$this->db->insert($this->db->dbprefix('article_top'), $article_top);
		}
		else{
			$article_info = array(
			'headline' => $headline,
			'author' => $author,
			'content' => $content,
			'updatetime' => $updatetime,
			'createtime' => $createtime,
			'ordernum' => $order,
			'creator' => $creator,
			'updater' => $creator,
			'menu_id' => $menu_id,
			'hit_num' => $hit_num,
			'img_url' => $img_url,
			'tag_id' => $tag_id,
			);

			$this->db->insert($this->db->dbprefix('article'), $article_info);
		}

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('添加文章成功');
			return 1;
		} else {
			$this->log_model->log_add('添加文章失败');
			return 0;
		}
	}

	public function article_edit_post() {
		$article_id = $this->input->post("article_id", TRUE);
		$headline = $this->input->post("headline", TRUE);
		$author = $this->input->post("author", TRUE);
		$content = $_POST['content'];
		$tag_id = $this->input->post('tag_id', TRUE);
		$menu_id = $this->input->post("menu_id", TRUE);
		$updatetime = $this->input->post("time", TRUE);
		$updater = $this->session->userdata('user_id');
		$order = $this->input->post("order", TRUE);
		$top = $this->input->post("top",TRUE);

		$this->load->library('tag_str');
		/*get all list of tag <img>*/
		$img_link = $this->tag_str->get_all_link($content, 'img');
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

		if($top){
			$article_info = array(
			'headline' => $headline,
			'author' => $author,
			'content' => $content,
			'updatetime' => $updatetime,
			'createtime' => $createtime,
			'ordernum' => $order,
			'creator' => $creator,
			'updater' => $creator,
			'menu_id' => $menu_id,
			'hit_num' => $hit_num,
			'img_url' => $img_url,
			'tag_id' => $tag_id,
			);

			$this->db->where('article_id', $article_id)->update($this->db->dbprefix('article'), $article_info);

			$article_top = array(
				'article_id'=> $article_id,
				'headline' => $headline,
				'author' => $author,
				'content' => $content,
				'updatetime' => $updatetime,
				'createtime' => $createtime,
				'ordernum' => $order,
				'creator' => $creator,
				'updater' => $creator,
				'menu_id' => $menu_id,
				'hit_num' => $hit_num,
				'img_url' => $img_url,
				'tag_id' => $tag_id,
				'top' => 0,
			);
			$this->db->where('article_id', $article_id)->update($this->db->dbprefix('article_top'), $article_top);
		}
		else{
			$article_info = array(
			'headline' => $headline,
			'author' => $author,
			'content' => $content,
			'updatetime' => $updatetime,
			'createtime' => $createtime,
			'ordernum' => $order,
			'creator' => $creator,
			'updater' => $creator,
			'menu_id' => $menu_id,
			'hit_num' => $hit_num,
			'img_url' => $img_url,
			'tag_id' => $tag_id,
			);

			$this->db->where('article_id', $article_id)->update($this->db->dbprefix('article'), $article_info);
		}

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('编辑文章成功');
			return 1;
		} else {
			$this->log_model->log_add('编辑文章失败');
			return 0;
		}
	}

	public function article_delete($article_id) {
		$this->db->delete($this->db->dbprefix('article'), array('article_id' => $article_id));

		if ($this->db->affected_rows()) {
			$this->log_model->log_add('删除文章成功');
			return 1;
		} else {
			$this->log_model->log_add('删除文章失败');
			return 0;
		}
	}
}
/* End of file article_model.php */
/* Location: ./bluescms/application/models/article_model.php */