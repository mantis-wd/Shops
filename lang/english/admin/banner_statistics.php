<?php
/* --------------------------------------------------------------
   $Id: banner_statistics.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(banner_statistics.php,v 1.3 2003/02/16); www.oscommerce.com 
   (c) 2003	 nextcommerce (banner_statistics.php,v 1.4 2003/08/14); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

define('HEADING_TITLE', 'Banner Statistics');

define('TABLE_HEADING_SOURCE', 'Source');
define('TABLE_HEADING_VIEWS', 'Views');
define('TABLE_HEADING_CLICKS', 'Clicks');

define('TEXT_BANNERS_DATA', 'D<br />a<br />t<br />a');
define('TEXT_BANNERS_DAILY_STATISTICS', '%s Daily Statistics For %s %s');
define('TEXT_BANNERS_MONTHLY_STATISTICS', '%s Monthly Statistics For %s');
define('TEXT_BANNERS_YEARLY_STATISTICS', '%s Yearly Statistics');

define('STATISTICS_TYPE_DAILY', 'Daily');
define('STATISTICS_TYPE_MONTHLY', 'Monthly');
define('STATISTICS_TYPE_YEARLY', 'Yearly');

define('TITLE_TYPE', 'Type:');
define('TITLE_YEAR', 'Year:');
define('TITLE_MONTH', 'Month:');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', 'Error: Graphs directory does not exist. Please create a \'graphs\' directory inside \'images\'.');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', 'Error: Graphs directory is not writeable.');
?>