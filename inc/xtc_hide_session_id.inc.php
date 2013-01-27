<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_hide_session_id.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(html_output.php,v 1.52 2003/03/19); www.oscommerce.com
   (c) 2003	 nextcommerce (xtc_hide_session_id.inc.php,v 1.5 2003/08/13); www.nextcommerce.org 
   (c) 2006 XT-Commerce

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
 // include needed functions
 require_once(DIR_FS_INC . 'xtc_draw_hidden_field.inc.php');
// Hide form elements
  function xtc_hide_session_id() {
    global $session_started;

    if ( ($session_started == true) && defined('SID') && xtc_not_null(SID) ) {
      return xtc_draw_hidden_field(xtc_session_name(), xtc_session_id());
    }
  }
?>