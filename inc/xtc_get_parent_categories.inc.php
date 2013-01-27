<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_get_parent_categories.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(general.php,v 1.225 2003/05/29); www.oscommerce.com 
   (c) 2003	 nextcommerce (xtc_get_parent_categories.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   
// Recursively go through the categories and retreive all parent categories IDs
// TABLES: categories
  function xtc_get_parent_categories(&$categories, $categories_id) {
    $parent_categories_query = "select parent_id from " . TABLE_CATEGORIES . " where categories_id = '" . $categories_id . "'";
    $parent_categories_query  = xtDBquery($parent_categories_query);
    while ($parent_categories = xtc_db_fetch_array($parent_categories_query,true)) {
      if ($parent_categories['parent_id'] == 0) return true;
      $categories[sizeof($categories)] = $parent_categories['parent_id'];
      if ($parent_categories['parent_id'] != $categories_id) {
        xtc_get_parent_categories($categories, $parent_categories['parent_id']);
      }
    }
  }
 ?>