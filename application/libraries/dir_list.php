<?php

class dirlist {
	public function dir_list($dir) {
		if (is_dir($dir)) {
			if ($handle = opendir($dir)) {
				while (($file = readdir($handle)) !== false) {
					if ($file != "." && $file != ".." && $file != "Thumbs.db" /*pesky windows, images..*/) {
						echo '<a target="_blank" href="' . $dir . $file . '">' . $file . '</a><br>' . "\n";
					}
				}
				closedir($handle);
			}
		}
	}
}