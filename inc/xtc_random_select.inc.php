<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_random_select.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(general.php,v 1.225 2003/05/29); www.oscommerce.com
   (c) 2003 nextcommerce (xtc_random_select.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 XT-Commerce (xtc_random_select.inc.php 1108 2005-07-24)

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  function xtc_random_select($query) {
    $random_product = '';
    $random_query = xtc_db_query($query);
    $num_rows = xtc_db_num_rows($random_query);
    if ($num_rows > 0) {
      $random_row = mt_rand(0, ($num_rows - 1));
      xtc_db_data_seek($random_query, $random_row);
      $random_product = xtc_db_fetch_array($random_query);
    }
    return $random_product;
  }
 ?>