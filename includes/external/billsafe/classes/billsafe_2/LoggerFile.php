<?php
/* -----------------------------------------------------------------------------------------
   $Id: LoggerFile.php 4579 2013-04-05 13:34:27Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   Copyright (c) 2013 PayPal SE and Bernd Blazynski

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

/*
* id = LoggerFile.php
* location = /includes/classes/billsafe_2
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License, version 2, as
* published by the Free Software Foundation.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* @package BillSAFE_2
* @copyright (C) 2013 PayPal SE and Bernd Blazynski
* @license GPLv2
*/

class Billsafe_LoggerFile implements Billsafe_Logger {
  private $_filename;

  public function __construct($filename) {
    $this->_filename = $filename;
  }

  public function log($message) {
    $message = '['.date('Y-m-d H:i:s')."]\r\n".$message."\r\n\r\n";
    error_log($message, 3, $this->_filename);
  }
}

?>
