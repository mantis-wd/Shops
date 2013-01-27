<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_manufacturer_link.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   Copyright (c) 2005 XT-Commerce

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

function xtc_manufacturer_link($mID,$mName='') {
//-- SHOPSTAT --//
/*
		$mName = xtc_cleanName($mName);
		$link = 'manu=m'.$mID.'_'.$mName.'.html';
		return $link;
*/
		return 'manufacturers_id='.$mID;
//-- SHOPSTAT --//	
}
?>