<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_draw_box_content_bullet.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(output.php,v 1.3 2002/06/01); www.oscommerce.com 
   (c) 2003	 nextcommerce (xtc_draw_box_content_bullet.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   
function xtc_draw_box_content_bullet($bullet_text, $bullet_link = '') {
    global $page_file;

    $bullet = '      <tr>' . CR .
              '        <td><table border="0" cellspacing="0" cellpadding="0">' . CR .
              '          <tr>' . CR .
              '            <td width="12" class="boxText"><img src="images/icon_pointer.gif" border="0" alt=""></td>' . CR .
              '            <td class="infoboxText">';
    if ($bullet_link) {
      if ($bullet_link == $page_file) {
        $bullet .= '<font color="#0033cc"><strong>' . $bullet_text . '</strong></font>';
      } else {
        $bullet .= '<a href="' . $bullet_link . '">' . $bullet_text . '</a>';
      }
    } else {
      $bullet .= $bullet_text;
    }

    $bullet .= '</td>' . CR .
               '         </tr>' . CR .
               '       </table></td>' . CR .
               '     </tr>' . CR;

    return $bullet;
  }
 ?>