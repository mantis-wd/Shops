<?php
/* -----------------------------------------------------------------------------------------
   $Id: cod.php 4478 2013-02-15 21:52:53Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(cod.php,v 1.7 2002/04/17); www.oscommerce.com 
   (c) 2003	 nextcommerce (cod.php,v 1.5 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
define('MODULE_PAYMENT_TYPE_PERMISSION', 'cod');
define('MODULE_PAYMENT_COD_TEXT_TITLE', 'Cash on Delivery');
define('MODULE_PAYMENT_COD_TEXT_DESCRIPTION', 'Cash on Delivery');
define('MODULE_PAYMENT_COD_TEXT_INFO','We ship your order after receipt of payment.');
define('MODULE_PAYMENT_COD_ZONE_TITLE' , 'Payment Zone');
define('MODULE_PAYMENT_COD_ZONE_DESC' , 'If a zone is selected, only enable this payment method for that zone.');
define('MODULE_PAYMENT_COD_ALLOWED_TITLE' , 'Allowed Zones');
define('MODULE_PAYMENT_COD_ALLOWED_DESC' , 'Please enter the zones <b>separately</b> which should be allowed to use this modul (e. g. AT,DE (leave empty if you want to allow all zones))');
define('MODULE_PAYMENT_COD_STATUS_TITLE' , 'Enable Cash On Delivery Module');
define('MODULE_PAYMENT_COD_STATUS_DESC' , 'Do you want to accept Cash On Delevery payments?');
define('MODULE_PAYMENT_COD_SORT_ORDER_TITLE' , 'Sort order of display');
define('MODULE_PAYMENT_COD_SORT_ORDER_DESC' , 'Sort order of display. Lowest is displayed first.');
define('MODULE_PAYMENT_COD_ORDER_STATUS_ID_TITLE' , 'Set Order Status');
define('MODULE_PAYMENT_COD_ORDER_STATUS_ID_DESC' , 'Set the status of orders made with this payment module to this value');

// BOF - Hendrik - 2010-07-15 - exlusion config for shipping modules
define('MODULE_PAYMENT_COD_NEG_SHIPPING_TITLE', 'Exclusion in case of shipping');
define('MODULE_PAYMENT_COD_NEG_SHIPPING_DESC', 'deactivate this payment if one of these shippingtypes are selected (list separated by commas)');
// EOF - Hendrik - 2010-07-15 - exlusion config for shipping modules
?>