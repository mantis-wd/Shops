<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_write_cache.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(cache.php,v 1.10 2003/02/11); www.oscommerce.com 
   (c) 2003	 nextcommerce (xtc_write_cache.inc.php,v 1.4 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/

  //! Write out serialized data.
  //  write_cache uses serialize() to store $var in $filename.
  //  $var      -  The variable to be written out.
  //  $filename -  The name of the file to write to.
  function write_cache(&$var, $filename) {
    $filename = DIR_FS_CACHE . $filename;
    $success = false;

    // try to open the file
    if ($fp = @fopen($filename, 'w')) {
      // obtain a file lock to stop corruptions occuring
      flock($fp, 2); // LOCK_EX
      // write serialized data
      fputs($fp, serialize($var));
      // release the file lock
      flock($fp, 3); // LOCK_UN
      fclose($fp);
      $success = true;
    }

    return $success;
  }
?>