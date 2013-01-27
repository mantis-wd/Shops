<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_create_sort_heading.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(general.php,v 1.225 2003/05/29); www.oscommerce.com
   (c) 2003 nextcommerce (xtc_create_sort_heading.inc.php,v 1.3 2003/08/13); www.nextcommerce.org 
   (c) 2006 XT-Commerce (xtc_create_sort_heading.inc.php 1279 2010-09-07)

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   
// Return table heading with sorting capabilities
  function xtc_create_sort_heading($sortby, $colnum, $heading) {

    $sort_prefix = '';
    $sort_suffix = '';

    if ($sortby) {
      $sort_prefix = '<a href="' . xtc_href_link(basename($PHP_SELF), xtc_get_all_get_params(array('page', 'info', 'sort')) . 'page=1&sort=' . $colnum . ($sortby == $colnum . 'a' ? 'd' : 'a')) . '" title="' . TEXT_SORT_PRODUCTS . ($sortby == $colnum . 'd' || substr($sortby, 0, 1) != $colnum ? TEXT_ASCENDINGLY : TEXT_DESCENDINGLY) . TEXT_BY . $heading . '" class="productListing-heading">' ; //Security Fix - Base / PHP_SELF
      $sort_suffix = (substr($sortby, 0, 1) == $colnum ? (substr($sortby, 1, 1) == 'a' ? '+' : '-') : '') . '</a>';
    }

    return $sort_prefix . $heading . $sort_suffix;
  }
?>