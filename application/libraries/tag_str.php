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

class Tag_str {

	/**
	 * [get_all_img_link As name]
	 * @param  string $string The thing we need to find <img>
	 * @return [type]         [description]
	 */
	public function get_all_link($string, $tag) {
		$string = str_replace("\r", "", $string);
		$string = str_replace("\n", "", $string);

		$regex['url'] = "((http|https|ftp|telnet|news):\/\/)?([a-z0-9_\-\/\.]+\.[][a-z0-9:;&#@=_~%\?\/\.\,\+\-]+)";
		$regex['email'] = "([a-z0-9_\-]+)@([a-z0-9_\-]+\.[a-z0-9\-\._\-]+)";

		/*get rid of the word between the tag*/
		$string = preg_replace("/>[^<>]+</", "><", $string);

		/*get rid of the code of js*/
		$string = preg_replace("/<!--.*-->/", "", $string);

		/*get rid of all the HTML tag except <tag>*/
		$match = '/<[^' . $tag . '][^<>]*>/';
		$string = preg_replace($match, "", $string);

		/*get rid of the link of e-mail*/
		$string = preg_replace("/<a([ ]+)href=([\"']*)mailto:($regex[email])([\"']*)[^>]*>/", "", $string);

		/*replace the link we need*/
		$string = preg_replace("/<a([ ]+)href=([\"']*)($regex[url])([\"']*)[^>]*>/", "\\3\t", $string);

		$output[0] = strtok($string, "\t");
		while (($temp = strtok("\t"))) {
			if ($temp && !in_array($temp, $output)) {
				$output[++$i] = $temp;
			}
		}
		return $output;
	}
}
/* End of file tag_str.php */
/* Location: ./organization/application/libraries/tag_str.php */