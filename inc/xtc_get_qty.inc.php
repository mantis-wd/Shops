<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_get_qty.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

function xtc_get_qty($products_id) {

  $result = NULL;
  $act_id = strtok($products_id, '{');

/*
  if (strpos($products_id,'{'))  {
    $act_id=substr($products_id,0,strpos($products_id,'{'));
  } else {
    $act_id=$products_id;
  }
*/

  //BOF - Dokuman - 2010-02-26 - set Undefined index
  //return $_SESSION['actual_content'][$act_id]['qty'];
  if (isset($_SESSION['actual_content'][$act_id]['qty'])) {
    return $_SESSION['actual_content'][$act_id]['qty'];
  }
  //EOF - Dokuman - 2010-02-26 - set Undefined index

  return $result;
}
?>