<?php
/* -----------------------------------------------------------------------------------------
   $Id: ot_billpaydebit_fee.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   Copyright (c) 2010 Billpay GmbH

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_TITLE', 'Zahlartenzuschlag Lastschrift (Billpay)');
  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_DESCRIPTION', 'Berechnung der Geb&uuml;hr f&uuml;r Bestellungen mit der Zahlart Lastschrift (Billpay)');

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_STATUS_TITLE','Zahlartenzuschlag Lastschrift');
  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_STATUS_DESC','Berechnung der Lastschriftgeb&uuml;hr');

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_SORT_ORDER_TITLE','Sortierreihenfolge');
  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_SORT_ORDER_DESC','Anzeigereihenfolge');

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_TYPE_TITLE','Geb&uuml;hr Typ');
  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_TYPE_DESC','W&auml;hlen Sie die Art der Geb&uuml;hr. Die Geb&uuml;hr kann als fester Betrag, ein Prozentwert auf die Rechnungssumme oder gestaffelter Betrag erhoben werden.');

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_PERCENT_TITLE','Prozentsatz');
  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_PERCENT_DESC','Geben Sie hier den Prozentwert als ganze Zahl mit dem Land in das versendet wird ein (Beispiel: DE:5;CH:7). Dieser Prozentwert wird auf die Rechnungssumme erhoben, falls der Geb&uuml;hrtyp "prozentual" aktiviert ist.');

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_VALUE_TITLE','fester Wert');
  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_VALUE_DESC','Geben Sie hier den festen Wert (netto) mit dem Land in das versendet wird ein (Beispiel: DE:5;CH:7). Dieser Wert wird der Rechnungssumme aufaddiert, falls der Geb&uuml;hrtyp "fest" aktiviert ist.');

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_GRADUATE_TITLE','Staffelung');
  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_GRADUATE_DESC','Geben Sie hier die Geb&uuml;hrenstaffelung in der Form {Rechnungssumme}={Nettogeb&uuml;hr};{Rechnungssumme}={Nettogeb&uuml;hr}; ein. Diese Staffelung wird auf die Rechnungssumme erhoben, falls der Geb&uuml;hrtyp "Staffelung" aktiviert ist.');

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_TAX_CLASS_TITLE','Steuerklasse');
  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_TAX_CLASS_DESC','W&auml;hlen Sie eine Steuerklasse.');

  define('MODULE_ORDER_TOTAL_BILLPAYDEBIT_FEE_FROM_TOTAL', 'vom Rechnungsbetrag');
?>