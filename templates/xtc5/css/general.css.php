<?php
/* -----------------------------------------------------------------------------------------
   $Id: general.css.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 XT-Commerce

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

   // Put CSS-Definitions here, these CSS-files will be loaded at the TOP of every page
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WS_BASE.'templates/'.CURRENT_TEMPLATE; ?>/stylesheet.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WS_BASE.'templates/'.CURRENT_TEMPLATE; ?>/css/colorbox.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WS_BASE.'templates/'.CURRENT_TEMPLATE; ?>/css/jquery.alerts.css" />
<?php
  if (strstr($PHP_SELF, FILENAME_PRODUCT_INFO )) {
  //BOF - DokuMan - 2011-05-12 - load jQuery-UI CSS from faster Google CDN
  /* <link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIR_WS_BASE.'templates/'.CURRENT_TEMPLATE; ?>/css/jquery-ui.css" /> */
    echo '<link rel="stylesheet" type="text/css" media="screen" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/smoothness/jquery-ui.css" />';
  //EOF - DokuMan - 2011-05-12 - load jQuery-UI CSS from faster Google CDN
  }
?>