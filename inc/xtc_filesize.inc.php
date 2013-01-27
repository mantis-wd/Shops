<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_filesize.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2003	 nextcommerce (xtc_filesize.inc.php,v 1.1 2003/08/24); www.nextcommerce.org
   
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

// returns human readeable filesize :)

function xtc_filesize($file) {
	$a = array("B","KB","MB","GB","TB","PB");
	
	$pos = 0;
	$size = filesize(DIR_FS_CATALOG.'media/products/'.$file);
	while ($size >= 1024) {
		$size /= 1024;
		$pos++;
	}
	return round($size,2)." ".$a[$pos];
}

?>