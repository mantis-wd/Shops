<?php
/* -----------------------------------------------------------------------------------------
   $Id: cod.php 4478 2013-02-15 21:52:53Z Tomcraft1980 $   

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(cod.php,v 1.7 2002/04/17); www.oscommerce.com 
   (c) 2003	 nextcommerce (cod.php,v 1.5 2003/08/13); www.nextcommerce.org
   (c) 2006 xt:Commerce; www.xt-commerce.com

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
define('MODULE_PAYMENT_TYPE_PERMISSION', 'cod');
define('MODULE_PAYMENT_COD_TEXT_TITLE', 'Nachnahme');
define('MODULE_PAYMENT_COD_TEXT_DESCRIPTION', 'Nachnahme');
define('MODULE_PAYMENT_COD_TEXT_INFO', 'Bitte beachten Sie, da&szlig; zus&auml;tzlich 2 Euro Zustellgeb&uuml;hr an den Zusteller vor Ort zu entrichten sind.');
define('MODULE_PAYMENT_COD_ZONE_TITLE', 'Zahlungszone');
define('MODULE_PAYMENT_COD_ZONE_DESC', 'Wenn eine Zone ausgew&auml;hlt ist, gilt die Zahlungsmethode nur f&uuml;r diese Zone.');
define('MODULE_PAYMENT_COD_ALLOWED_TITLE', 'Erlaubte Zonen');
define('MODULE_PAYMENT_COD_ALLOWED_DESC', 'Geben Sie <b>einzeln</b> die Zonen an, welche f&uuml;r dieses Modul erlaubt sein sollen. (z.B. AT,DE (wenn leer, werden alle Zonen erlaubt))');
define('MODULE_PAYMENT_COD_STATUS_TITLE', 'Nachnahme Modul aktivieren');
define('MODULE_PAYMENT_COD_STATUS_DESC', 'M&ouml;chten Sie Zahlungen per Nachnahme akzeptieren?');
define('MODULE_PAYMENT_COD_SORT_ORDER_TITLE', 'Anzeigereihenfolge');
define('MODULE_PAYMENT_COD_SORT_ORDER_DESC', 'Reihenfolge der Anzeige. Kleinste Ziffer wird zuerst angezeigt.');
define('MODULE_PAYMENT_COD_ORDER_STATUS_ID_TITLE', 'Bestellstatus festlegen');
define('MODULE_PAYMENT_COD_ORDER_STATUS_ID_DESC', 'Bestellungen, welche mit diesem Modul gemacht werden, auf diesen Status setzen');

// BOF - Hendrik - 2010-07-15 - exlusion config for shipping modules
define('MODULE_PAYMENT_COD_NEG_SHIPPING_TITLE', 'Ausschlu&szlig; bei Versandmodulen');
define('MODULE_PAYMENT_COD_NEG_SHIPPING_DESC', 'Dieses Zahlungsmodul deaktivieren wenn Versandmodul gew&auml;hlt (Komma separierte Liste)');
// EOF - Hendrik - 2010-07-15 - exlusion config for shipping modules
?>
