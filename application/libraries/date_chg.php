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

class Date_chg {

	/**
	 * [transfer_date Delete the hour-mins-sec of the date come from the database]
	 * @param  string $date_before The original date
	 * @return string $date_after The date including year-month-day
	 */
	public function get_YMD($date_before) {
		$temp_result = explode(' ', $date_before);
		$date_after = $temp_result[0];
		return $date_after;
	}
}
/* End of file date_chg.php */
/* Location: ./organization/application/libraries/date_chg.php */