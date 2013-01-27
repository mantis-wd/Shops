<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_format_filesize.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2003	 nextcommerce (xtc_format_filesize.inc.php,v 1.1 2003/08/25); www.nextcommerce.org
   
   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

// returns human readeable filesize :)

function xtc_format_filesize($size) {
	$a = array("B","KB","MB","GB","TB","PB");
	
	$pos = 0;
	while ($size >= 1024) {
		$size /= 1024;
		$pos++;
	}
	return round($size,2)." ".$a[$pos];
}

?>