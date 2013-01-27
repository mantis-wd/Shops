<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_format_price_order.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   by Mario Zanier for XTcommerce
   
   based on:
   (c) 2003	 nextcommerce (xtc_format_price.inc.php,v 1.7 2003/08/19); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/
// include needed functions
require_once(DIR_FS_INC . 'xtc_precision.inc.php');
function xtc_format_price_order ($price_string,$price_special,$currency,$show_currencies=1)
{
// calculate currencies
$currencies_query = xtc_db_query("SELECT symbol_left,
          symbol_right,
          decimal_places,
          value
          FROM ". TABLE_CURRENCIES ." WHERE
          code = '".$currency ."'");
$currencies_value=xtc_db_fetch_array($currencies_query);
$currencies_data=array();
$currencies_data=array(
      'SYMBOL_LEFT'=>$currencies_value['symbol_left'] ,
      'SYMBOL_RIGHT'=>$currencies_value['symbol_right'] ,
      'DECIMAL_PLACES'=>$currencies_value['decimal_places'] ,
      'VALUE'=> $currencies_value['value']);
// round price
$price_string=xtc_precision($price_string,$currencies_data['DECIMAL_PLACES']);


if ($price_special=='1') {
$currencies_query = xtc_db_query("SELECT symbol_left,
          decimal_point,
          thousands_point,
          value
          FROM ". TABLE_CURRENCIES ." WHERE
          code = '".$currency ."'");
$currencies_value=xtc_db_fetch_array($currencies_query);
$price_string=number_format($price_string,$currencies_data['DECIMAL_PLACES'], $currencies_value['decimal_point'], $currencies_value['thousands_point']);
  if ($show_currencies == 1) {
    $price_string = $currencies_data['SYMBOL_LEFT']. ' '.$price_string.' '.$currencies_data['SYMBOL_RIGHT'];
  }
}
return $price_string;
}
?>