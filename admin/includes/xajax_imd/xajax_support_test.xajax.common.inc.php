<?php
/* -----------------------------------------------------------------------------------------
   $Id: xajax_support_test.xajax.common.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce; www.oscommerce.com 
   (c) 2003  nextcommerce; www.nextcommerce.org
   (c) 2006      xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ----------------------------------------------------------------------------------------- */
// example for testing xajax support   
if( XAJAX_BACKEND_SUPPORT_TEST=='true' ) {
    $imdxajax->registerFunction('xajax_support_test_get_servertime');
}
  
?>