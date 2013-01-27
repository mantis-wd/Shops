<?PHP
/* -----------------------------------------------------------------------------------------
   $Id: xtc_get_products_mo_images.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 XT-Commerce (xtc_get_products_mo_images.inc.php 1009)

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

function xtc_get_products_mo_images($products_id = ''){
   $mo_query = "select image_id, image_nr, image_name from " . TABLE_PRODUCTS_IMAGES . " where products_id = '" . $products_id ."' ORDER BY image_nr";
   $products_mo_images_query = xtDBquery($mo_query);
   $results = array(); //DokuMan - set Undefined variable: results
   while ($row = xtc_db_fetch_array($products_mo_images_query,true)) {
        $results[($row['image_nr']-1)] = $row;
   }
   if (count($results) > 0) {
       return $results;
   } else {
       return false;
   }
}
?>