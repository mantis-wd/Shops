<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_get_customers_country.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(general.php,v 1.225 2003/05/29); www.oscommerce.com 
   (c) 2003	 nextcommerce (xtc_get_zone_code.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   
  function xtc_get_customers_country($customers_id) {
    $customers_query = xtc_db_query("select customers_default_address_id from " . TABLE_CUSTOMERS . " where customers_id = '" . $customers_id . "'");
    $customers = xtc_db_fetch_array($customers_query);

    $address_book_query = xtc_db_query("select entry_country_id from " . TABLE_ADDRESS_BOOK . " where address_book_id = '" . $customers['customers_default_address_id'] . "'");
    $address_book = xtc_db_fetch_array($address_book_query);
    return $address_book['entry_country_id'];
    }
 ?>