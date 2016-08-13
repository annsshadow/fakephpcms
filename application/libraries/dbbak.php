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
if(! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends CI_Controller
{
	/****************************************
			加载所需内容
	****************************************/
	public function __construct()
	{
		parent::__construct();
		$this->load->library('DbManage');
		$this->load->moedel('log_model');
		$this->load->moedel('check_model');
		$this->load->helper('url');
		$this->base_url = $this->config->item("base_url");
	}
	
	/****************************************
			备份数据库
			因为并未完成，特设置为私有方法
	****************************************/
	private function database_backup()
	{
		if($this->check_model->check_role_right(6))
		{
			$db = new DbManage('localhost','root','123456','bluescms','utf8');
			$db->backup('',$base_url.'bluescms/backup/','2000');
			sleep(2);
			redirect('/bluescms/index.php/backup');
		}
		else
		{
			$this->log_model->log_add('试图非法备份数据库');
			redirect('/bluescms/index.php');
		}

	}
	
	/****************************************
			还原数据库
			因为并未完成，特设置为私有方法
	****************************************/
	private function database_restore($filename)
	{

		if($this->check_model->check_role_right(6))
		{
			//分别是主机，用户名，密码，数据库名，数据库编码
			$db = new DBManage ( 'localhost', 'root', '123456', 'bluescms', 'utf8' );
			//参数：sql文件
			$db->restore($base_url.'bluescms/backup/'.$filename);
			sleep(2);
			redirect('/bluescms/index.php/backup');
		}
		else
		{
			$this->log_model->log_add('试图非法还原数据库');
			redirect('/bluescms/index.php');
		}
	}
	
	/****************************************
			备份数据库
			因为并未完成，特设置为私有方法
	****************************************/
	private function db_backup
	{
		
		$dbhost = "localhost"; //数据库主机名 
		$dbuser = "root"; //数据库用户名 
		$dbpass = "123456"; //数据库密码 
		$dbname = "same"; //数据库名 


		/*****************************************
		可获得数据库的结构、数据、视图、触发器、存储过程
		******************************************/
		$comm_dir = "D:/LAMP/MySQl/MySQL Server 5.6/bin/";
		/*
		mysqldump所在的路径不能有空格；
		在Annsshadow本机上因路径有空格且不可修改，故未测试成功；
		*/
		//mysqldump所在路径：mysql/bin

		//备份命令
		$command=  'mysqldump -u'.$dbuser.' -p'.$dbpass.' --default-character-set=utf8 --lock-all-tables '.$dbname;//备份命令，这个应该更不错。。。为什么没有变绿色

		//备份文件路径
		$file_dir = "D:/LAMP/httpd-2.4.10-win64/Apache24/htdocs/backup/";
		//备份文件名
		$file_name = date("Yms-His").".sql";

		//连接数据库
		$link = @mysql_connect($dbhost,$dbuser,$dbpass) or die ('Could not connect to server.');
		mysql_query("use uco",$link);
		mysql_query("set names utf8",$link);
		//执行备份命令
		exec($comm_dir.$command.'>'.$file_dir.$file_name,$arr,$i);
		echo $i;
	}
}
/* End of file backup.php */
/* Location: ./bluescms/application/controllers/backup.php */