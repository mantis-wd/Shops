<?php
/* -----------------------------------------------------------------------------------------
   $Id: banners.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/


  require_once(DIR_FS_INC . 'xtc_banner_exists.inc.php');
  require_once(DIR_FS_INC . 'xtc_display_banner.inc.php');
  require_once(DIR_FS_INC . 'xtc_update_banner_display_count.inc.php');


  if ($banner = xtc_banner_exists('dynamic', 'banner')) {
  $smarty->assign('BANNER',xtc_display_banner('static', $banner));

  }
?>