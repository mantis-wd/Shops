<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_recalculate_price.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   by Mario Zanier for XTcommerce
   
   based on:
   (c) 2003	 nextcommerce (xtc_recalculate_price.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   
function xtc_recalculate_price($price, $discount) 
	{	  
	
	  $price=-100*$price/($discount-100)/100*$discount;
	  return $price;
      
	  }
 ?>