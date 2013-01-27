<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_remove_non_numeric.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2003	 nextcommerce (xtc_remove_non_numeric.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 XT-Commerce (xtc_remove_non_numeric.inc.php 829 2005-03-12)

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   
//BOF - Hetfield - 2009.08.18 - Update function for PHP 5.3
function xtc_remove_non_numeric($var) {	  
	  //$var=preg_replace('![^0-9]!', '', $var); //DokuMan: double negation?!
    $var=preg_replace('/[^0-9]/','',$var);
	  return $var;
}
//EOF - Hetfield - 2009.08.18 - Update function for PHP 5.3
?>