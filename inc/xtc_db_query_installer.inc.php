<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_db_query_installer.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(database.php,v 1.2 2002/03/02); www.oscommerce.com
   (c) 2003 nextcommerce (xtc_db_query_installer.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 XT-Commerce (xtc_db_query_installer.inc.php 899 2005-04-29)

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  function xtc_db_query_installer($query, $link = 'db_link') {
    global $$link;

    // BOF - Dokuman - 2011-03-01 - get ready for UTF8
    /*
    mysql_query("SET names 'utf8'");
    mysql_query("SET CHARACTER SET 'utf8'");
    */
    // EOF - Dokuman - 2011-03-01 - get ready for UTF8

    return mysql_query($query, $$link);
  }
 ?>