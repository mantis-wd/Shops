<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_draw_radio_field_installer.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(html_output.php,v 1.1 2002/01/02); www.oscommerce.com 
   (c) 2003	 nextcommerce (xtc_draw_radio_field_installer.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
  
  require_once(DIR_FS_INC . 'xtc_draw_selection_field_installer.inc.php');
    
  function xtc_draw_radio_field_installer($name, $value = '', $checked = false) {
    return xtc_draw_selection_field_installer($name, 'radio', $value, $checked);
  }
 ?>