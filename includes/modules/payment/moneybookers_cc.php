<?php
/* -----------------------------------------------------------------------------------------
   $Id: moneybookers_cc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(moneybookers.php,v 1.00 2003/10/27); www.oscommerce.com
   (c) 2009 xt:Commerce

   Released under the GNU General Public License
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   Moneybookers v1.0                       Autor:    Gabor Mate  <gabor(at)jamaga.hu>

   Released under the GNU General Public License
   
   // Version History
    * 2.0 xt:Commerce Adaption
    * 2.1 new workflow, tmp orders
    * 2.2 new modules
    * 2.3 updates
    * 2.4 major update, iframe integration
   
   
   ---------------------------------------------------------------------------------------*/

if (file_exists('includes/classes/class.moneybookers.php')) {
	require_once 'includes/classes/class.moneybookers.php';
} else {
	require_once '../includes/classes/class.moneybookers.php';
}

class moneybookers_cc extends fcnt_moneybookers {

	var $images='All_CCs_225x45.gif';

	// class constructor
	// BOF - Hendrik - 2010-08-11 - php5 compatible
	//function moneybookers_cc() {
	function __construct() {
	// EOF - Hendrik - 2010-08-11 - php5 compatible
		global $order, $language;

		$this->_setCode('cc','ACC');

		if (is_object($order))
			$this->update_status();

	}


	function selection() {

		$content = array();
		$accepted = '';
		$icons = explode(',', $this->images);
		foreach ($icons as $key => $val)
			$accepted .= xtc_image(DIR_WS_ICONS .'moneybookers/'. $val) . ' ';



		$content = array_merge($content, array (array ('title' => ' ','field' => $accepted)));
		

		return array (
			'id' => $this->code,
			'module' => $this->title,
			'fields' => $content,
			'description' => $this->info
		);
	}
}
?>