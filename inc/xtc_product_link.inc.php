<?php

/* -----------------------------------------------------------------------------------------
   $Id: xtc_product_link.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2005 XT-Commerce

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

function xtc_product_link($pID, $name='') {
//-- SHOPSTAT --//
/*
	$pName = xtc_cleanName($name);
	$link = 'info=p'.$pID.'_'.$pName.'.html';
	return $link;
*/
//-- SHOPSTAT --//
	return 'products_id='.xtc_get_prid($pID);
}
?>