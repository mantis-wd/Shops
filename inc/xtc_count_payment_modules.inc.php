<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_count_payment_modules.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(general.php,v 1.225 2003/05/29); www.oscommerce.com 
   (c) 2003	 nextcommerce (xtc_count_payment_modules.inc.php,v 1.5 2003/08/13); www.nextcommerce.org 
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
  // include needed functions
  require_once(DIR_FS_INC . 'xtc_count_modules.inc.php');
  
  function xtc_count_payment_modules() {
    return xtc_count_modules(MODULE_PAYMENT_INSTALLED);
  }
?>