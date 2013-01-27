<?php
  /* --------------------------------------------------------------
   $Id: payment_module_info.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(payment_module_info.php,v 1.4 2002/11/22); www.oscommerce.com
   (c) 2003	 nextcommerce (payment_module_info.php,v 1.5 2003/08/18); www.nextcommerce.org 

   Released under the GNU General Public License 
   --------------------------------------------------------------*/
  defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' ); 
  class paymentModuleInfo {
    var $payment_code, $keys;

    // class constructor
    function paymentModuleInfo($pmInfo_array) {
      $this->payment_code = $pmInfo_array['payment_code'];

      for ($i = 0, $n = sizeof($pmInfo_array) - 1; $i < $n; $i++) {
        $key_value_query = xtc_db_query("select configuration_title, configuration_value, configuration_description from " . TABLE_CONFIGURATION . " where configuration_key = '" . $pmInfo_array[$i] . "'");
        $key_value = xtc_db_fetch_array($key_value_query);

        $this->keys[$pmInfo_array[$i]]['title'] = $key_value['configuration_title'];
        $this->keys[$pmInfo_array[$i]]['value'] = $key_value['configuration_value'];
        $this->keys[$pmInfo_array[$i]]['description'] = $key_value['configuration_description'];
      }
    }
  }
?>