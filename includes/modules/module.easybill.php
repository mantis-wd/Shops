<?php
/* -----------------------------------------------------------------------------------------
   $Id: module.easybill.php 4241 2013-01-11 13:47:24Z gtb-modified $

   Modified - community made shopping
   http://www.modified-shop.org

   Copyright (c) 2009 - 2012 Modified
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/
  
  if (MODULE_EASYBILL_STATUS=='True') {
    if (MODULE_EASYBILL_BILLCREATE == 'auto') {
      require_once(DIR_WS_CLASSES.'class.easybill.php');
          
      //easyBill initial
      $easybill = new easybill();
      $easybill->order($insert_id);
      $easybill->setCustomer();
      
      // set Invoice ID
      $bill_nr = '';
      if (MODULE_EASYBILL_BILLINGID == 'Shop') {
        // todo Rechnungsnummer
        $bill_nr = '';
      }
      
      // create Invoice
      $check = explode(';', MODULE_EASYBILL_PAYMENT);
      if (!in_array($easybill->info['payment_method'], $check)) {
        $easybill->createDocument($bill_nr, ((MODULE_EASYBILL_BILLSAVE=='Shop')?true:false), false);
      }
    }
  }
?>