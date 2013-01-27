<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_draw_textarea_field.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(html_output.php,v 1.52 2003/03/19); www.oscommerce.com 
   (c) 2003	 nextcommerce (xtc_draw_textarea_field.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   
// Output a form textarea field
  function xtc_draw_textarea_field($name, $wrap, $width, $height, $text = '', $parameters = '', $reinsert_value = true) {
    $field = '<textarea name="' . xtc_parse_input_field_data($name, array('"' => '&quot;')) . '" id="' . xtc_parse_input_field_data($name, array('"' => '&quot;')) . '" cols="' . xtc_parse_input_field_data($width, array('"' => '&quot;')) . '" rows="' . xtc_parse_input_field_data($height, array('"' => '&quot;')) . '"';

    if (xtc_not_null($parameters)) $field .= ' ' . $parameters;

    $field .= '>';

    if ( (isset($GLOBALS[$name])) && ($reinsert_value == true) ) {
      $field .= $GLOBALS[$name];
    } elseif (xtc_not_null($text)) {
      $field .= $text;
    }

    $field .= '</textarea>';

    return $field;
  }
 ?>