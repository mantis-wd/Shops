<?php
/* -----------------------------------------------------------------------------------------
   $Id: ot_gv.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(ot_gv.php,v 1.1.2.1 2003/05/15); www.oscommerce.com
   (c) 2006 XT-Commerce (ot_gv.php 899 2005-04-29)

   Released under the GNU General Public License
   -----------------------------------------------------------------------------------------
   Third Party contributions:

   Credit Class/Gift Vouchers/Discount Coupons (Version 5.10)
   http://www.oscommerce.com/community/contributions,282
   Copyright (c) Strider | Strider@oscworks.com
   Copyright (c  Nick Stanko of UkiDev.com, nick@ukidev.com
   Copyright (c) Andre ambidex@gmx.net
   Copyright (c) 2001,2002 Ian C Wilson http://www.phesis.org

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  define('MODULE_ORDER_TOTAL_GV_TITLE', 'Gift Vouchers');
  define('MODULE_ORDER_TOTAL_GV_HEADER', 'Gift Vouchers');
  define('MODULE_ORDER_TOTAL_GV_DESCRIPTION', 'Gift Vouchers');
  //BOF - DokuMan - 2010-08-31 - constants already defined in english.php
  //define('SHIPPING_NOT_INCLUDED', ' [Shipping not included]');
  //define('TAX_NOT_INCLUDED', ' [Tax not included]');
  //EOF - DokuMan - 2010-08-31 - constants already defined in english.php
  define('MODULE_ORDER_TOTAL_GV_USER_PROMPT', '<strong>Tick to use Gift Voucher account balance</strong>');
  define('TEXT_ENTER_GV_CODE', 'Enter Redeem Code&nbsp;&nbsp;');
  
  define('MODULE_ORDER_TOTAL_GV_STATUS_TITLE', 'Display Total');
  define('MODULE_ORDER_TOTAL_GV_STATUS_DESC', 'Do you want to display the Gift Voucher value?');
  define('MODULE_ORDER_TOTAL_GV_SORT_ORDER_TITLE', 'Sort Order');
  define('MODULE_ORDER_TOTAL_GV_SORT_ORDER_DESC', 'Sort order of display');
  define('MODULE_ORDER_TOTAL_GV_QUEUE_TITLE', 'Queue Purchases');
  define('MODULE_ORDER_TOTAL_GV_QUEUE_DESC', 'Do you want to queue purchases of the Gift Voucher?');
  define('MODULE_ORDER_TOTAL_GV_INC_SHIPPING_TITLE', 'Include Shipping');
  define('MODULE_ORDER_TOTAL_GV_INC_SHIPPING_DESC', 'Include Shipping in calculation');
  define('MODULE_ORDER_TOTAL_GV_INC_TAX_TITLE', 'Include Tax');
  define('MODULE_ORDER_TOTAL_GV_INC_TAX_DESC', 'Include Tax in calculation.');
  define('MODULE_ORDER_TOTAL_GV_CALC_TAX_TITLE', 'Re-calculate Tax');
  define('MODULE_ORDER_TOTAL_GV_CALC_TAX_DESC', 'Re-Calculate Tax');
  define('MODULE_ORDER_TOTAL_GV_TAX_CLASS_TITLE', 'Tax Class');
  define('MODULE_ORDER_TOTAL_GV_TAX_CLASS_DESC', 'Use the following tax class when treating Gift Voucher as Credit Note.');
  define('MODULE_ORDER_TOTAL_GV_CREDIT_TAX_TITLE', 'Credit including Tax');
  define('MODULE_ORDER_TOTAL_GV_CREDIT_TAX_DESC', 'Add tax to purchased Gift Voucher when crediting to Account');
?>