<?php
/* -----------------------------------------------------------------------------------------
   $Id: billpaytransactioncredit.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   Copyright (c) 2012 Billpay GmbH

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

require_once('billpay.php');

/* Default Messages */
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_TITLE', 'Ratenkauf');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_DESCRIPTION', 'Ratenkauf');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_MESSAGE', 'BillPay Error Message');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_INFO', '<img src="https://www.billpay.de/sites/all/themes/billpay/images/header_logo.png"  alt="billpay" title="billpay" width="190px" /><br /><br />');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ALLOWED_TITLE' , 'Erlaubte Zonen');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ALLOWED_DESC' , 'Geben Sie einzeln die Zonen an, welche f&uuml;r dieses Modul erlaubt sein sollen. (z.B. AT,DE (wenn leer, werden alle Zonen erlaubt))');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_LOGGING_TITLE' , 'Absoluter Pfad zur Logdatei');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_LOGGING_DESC' , 'Wenn kein Wert eingestellt ist, wird standardm&auml;ssig in das Verzeichnis includes/billpay/log geschrieben (Schreibrechte m&uuml;ssen verf&uuml;gbar sein).');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_MERCHANT_ID_TITLE' , 'Verk&auml;ufer ID');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_MERCHANT_ID_DESC' , 'Diese Daten erhalten Sie von Billpay');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ORDER_STATUS_TITLE' , 'Bestellstatus festlegen');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ORDER_STATUS_DESC' , 'Bestellungen, welche mit diesem Modul gemacht werden, auf diesen Status setzen');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_PORTAL_ID_TITLE' , 'Portal ID');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_PORTAL_ID_DESC' , 'Diese Daten erhalten Sie von Billpay');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_SECURE_TITLE' , 'Security Key');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_SECURE_DESC' , 'Diese Daten erhalten Sie von Billpay');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_SORT_ORDER_TITLE' , 'Anzeigereihenfolge');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_SORT_ORDER_DESC' , 'Reihenfolge der Anzeige. Kleinste Ziffer wird zuerst angezeigt.');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_STATUS_TITLE' , 'Aktiviert');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_STATUS_DESC' , 'M&ouml;chten Sie den Ratenkauf mit Billpay erlauben?');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TESTMODE_TITLE' , 'Transaktionsmodus');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TESTMODE_DESC' , 'Im Testmodus werden detailierte Fehlermeldungen angezeigt. F&uuml;r den Produktivbetrieb muss der Livemodus aktiviert werden.');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ZONE_TITLE' , 'Steuerzone');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ZONE_DESC' , '');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_API_URL_BASE_TITLE' , 'API url base');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_API_URL_BASE_DESC' , 'Diese Daten erhalten Sie von Billpay (Achtung! Die URLs f&uuml; das Test- bzw. das Livesystem unterscheiden sich!)');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TESTAPI_URL_BASE_TITLE' , 'Test API url base');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TESTAPI_URL_BASE_DESC' , 'Diese Daten erhalten Sie von Billpay (Achtung! Die URLs f&uuml; das Test- bzw. das Livesystem unterscheiden sich!)');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_LOGGING_ENABLE_TITLE' , 'Logging aktiviert');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_LOGGING_ENABLE_DESC' , 'Sollen Anfragen an die Billpay-Zahlungsschnittstelle in die Logdatei geschrieben werden?');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_MIN_AMOUNT_TITLE', 'Mindestbestellwert');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_MIN_AMOUNT_DESC', 'Ab diesem Bestellwert wird die Zahlungsart eingeblendet.');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_LOGPATH_TITLE', 'Logging Pfad');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_LOGPATH_DESC', '');

define('MODULE_PAYMENT_BILLPAY_HTTP_X_TITLE', 'X_FORWARDED_FOR erlauben');
define('MODULE_PAYMENT_BILLPAY_HTTP_X_DESC', 'Aktivieren Sie dieses Funktion wenn Ihr Shop in einem Cloud System l&auml;uft.');

// Payment selection texts
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_BIRTHDATE', 'Geburtsdatum');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_EULA_CHECK', '<label for="billpay_eula">Hiermit best&auml;tige ich die <a href="%s" target="_blank">AGB</a> und <a href="https://www.billpay.de/api/ratenkauf/datenschutz" target="_blank">Datenschutzbestimmungen</a> f&uuml;r den Ratenkauf</label> <br />');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_EULA_CHECK_DE', '<label for="billpay_eula">Hiermit best&auml;tige ich die <a href="https://www.billpay.de/kunden/agb-ch" target="_blank">AGB</a> und die <a href="https://www.billpay.de/kunden/agb-ch#datenschutz" target="_blank">Datenschutzbestimmungen</a> der Billpay GmbH </label> <br />');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ENTER_BIRTHDATE', 'Bitte geben Sie Ihr Geburtsdatum ein');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ENTER_GENDER', 'Bitte geben Sie Ihr Geschlecht ein');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ENTER_BIRTHDATE_AND_GENDER', 'Bitte geben Sie Ihr Geburtsdatum und Ihr Geschlecht ein');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_NOTE', '');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_REQ', '');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_GENDER', 'Geschlecht');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_MALE', 'm&auml;nnlich');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_FEMALE', 'weiblich');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ENTER_PHONE', 'Bitte geben Sie Ihre Telefonnummer ein');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_LINK1', 'AGB Ratenkauf');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_LINK2', '<a href="https://www.billpay.de/api/ratenkauf/datenschutz" target="_BLANK">Datenschutz-<br/>bestimmungen</a>');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_LINK3', '<a href="https://www.billpay.de/api/ratenkauf/zahlungsbedingungen" target="_BLANK">Zahlungs-<br>bedingungen</a>');

define('JS_BILLPAYTRANSACTIONCREDIT_EULA', '* Bitte best%E4tigen Sie die Billpay AGB!\n\n');
define('JS_BILLPAYTRANSACTIONCREDIT_DOBDAY', '* Bitte geben Sie Ihr Geburtstag ein.\n\n');
define('JS_BILLPAYTRANSACTIONCREDIT_DOBMONTH', '* Bitte geben Sie Ihr Geburtsmonat.\n\n');
define('JS_BILLPAYTRANSACTIONCREDIT_DOBYEAR', '* Bitte geben Sie Ihr Geburtsjahr ein.\n\n');
define('JS_BILLPAYTRANSACTIONCREDIT_GENDER', '* Bitte geben Sie Ihr Geschlecht ein.\n\n');
define('JS_BILLPAYTRANSACTIONCREDIT_CODE', '* Bitte geben Sie die Bankleitzahl ein.\n\n');
define('JS_BILLPAYTRANSACTIONCREDIT_NUMBER', '* Bitte geben Sie die Kontonummer ein.\n\n');
define('JS_BILLPAYTRANSACTIONCREDIT_NAME', '* Bitte geben Sie den Namen des Kontoinhabers ein.\n\n');
define('JS_BILLPAYTRANSACTIONCREDIT_PHONE', '* Bitte geben Sie Ihre Telefonnummer ein.\n\n');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_EULA', '* Bitte bestÃƒÂ¤tigen Sie die Billpay AGB!');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_BOD' ,'You have entered an incorrect date of birth!');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_DEFAULT', 'Es ist ein interner Fehler aufgetreten. Bitte w&auml;len Sie eine andere Zahlart');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_SHORT', 'Es ist ein interner Fehler aufgetreten!');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_INVOICE_CREATED_COMMENT', 'Das Zahlungsziel der Bestellung wurde erfolgreich bei Billpay gestartet');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_CANCEL_COMMENT', 'Die Bestellung wurde erfolgreich bei Billpay storniert');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_DUEDATE', 'Das Zahlungsziel konnte nicht gestartet werden, weil das F%E4lligkeitsdatum leer ist!');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_NUMBER', '* Bitte geben Sie die Kontonummer ein.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_CODE', '* Bitte geben Sie die Bankleitzahl ein.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_NAME', '* Bitte geben Sie den Namen des Kontoinhabers ein.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_NO_RATEPLAN', '* Bitte fordern Sie einen Ratenplan f&uuml;r die ausgew&auml;lte Anzahl Raten an.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ERROR_PHONE', '* Bitte geben Sie Ihre Telefonnummer ein.');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_CREATE_INVOICE', 'Billpay Zahlungsziel jetzt aktivieren?');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_CANCEL_ORDER', 'Billpay Bestellung jetzt stornieren?');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ACCOUNT_HOLDER', 'Kontoinhaber');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ACCOUNT_NUMBER', 'Kontonummer');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_BANK_CODE', 'Bankleitzahl');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_BANK_NAME', 'Bank');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_INVOICE_REFERENCE', 'Rechnungsnummer');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_PHONE', 'Telefonnummer');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_BANKDATA', 'Bitte geben Sie Ihre Bankverbindung ein.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_INVOICE_INFO2', 'Bestellung wurde abgegeben mittels ');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_INVOICE_INFO3', '');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_DUEDATE_TITLE', 'F&auml;lligkeitsdatum');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_PURPOSE', 'Verwendungszweck');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_ADD', 'zzgl.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_FEE', 'Geb&uuml;hr');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_FEE_INFO1', 'F&uuml;r diese Bestellung per Ratenkauf wird eine Geb&uuml;hr von ');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_FEE_INFO2', ' erhoben');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_SANDBOX', 'Sie befinden sich im Sandbox-Modus:');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_CHECK', 'Sie befinden sich im Abnahme-Modus:');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_UNLOCK_INFO', 'Informationen zur Live-Schaltung');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_UTF8_ENCODE_TITLE', 'UTF8-Kodierung aktivieren');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_UTF8_ENCODE_DESC', 'Deaktivieren Sie diese Option, wenn Sie in Ihrem Online-Shop die UTF-8 Kodierung einsetzen.');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ACTIVATE_ORDER', 'Die Bestellung wurde noch nicht bei Billpay aktiviert. Bitte aktivieren Sie die Bestellung unmittelbar vor der Versendung, in dem Sie den entsprechenden Status setzen.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ACTIVATE_ORDER_WARNING', "<strong style='color:red'>Achtung: Das Zahlungsziel wurde noch nicht bei Billpay gestartet!</strong><br/>");

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_SALUTATION_MALE', 'Herr');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_SALUTATION_FEMALE', 'Frau');

// Text fragments needed for payment details of transaction credit orders
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_INVOICE_INFO1', 'Vielen Dank, dass Sie sich f&uuml;r die Zahlart <strong>Ratenkauf</strong> entschieden haben. Die f&auml;lligen Betr&auml;ge werden monatlich von dem bei der Bestellung angegebenen Konto abgebucht *.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_INVOICEPDF_INFO', 'Sie haben sich f&uuml;r die Zahlung per Ratenkauf entschieden. Bitte beachten Sie, dass zus&auml;tzlich zu dem auf dieser Rechnung genannten Rechnungsbetrag weitere Kosten im Zusammenhang mit dem Teilzahlungsgesch&auml;ft (Ratenkauf) entstehen. Diese Kosten wurden Ihnen vor Abschluss der Bestellung angezeigt. Die vollst&auml;ndige Berechnung der zu leistenden Betr&auml;ge im Zusammenhang mit dem Ratenkauf sowie s&auml;mtliche dazugeh&ouml;rige Informationen haben Sie bereits per Email an die bei der Bestellung angegebene Email-Adresse erhalten.');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TEXT_RATE', 'Rate');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_RATEDUE_TEXT', 'f&auml;llig am');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TOTAL_PRICE_CALC_TEXT', 'Gesamtpreisberechnung');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_CART_AMOUNT_TEXT', 'Warenkorbwert');
define('MODULE_PAYMENT_BILLPAYTC_SURCHARGE_TEXT', 'Zinsaufschlag');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TRANSACTION_FEE_TEXT', 'Bearbeitungsgeb&uuml;hr');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_OTHER_COSTS_TEXT', 'weitere Geb&uuml;hren (z.B. Versandgeb&uuml;hr)');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_TOTAL_AMOUNT_TEXT', 'Gesamtsumme Ratenkauf');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ANUAL_RATE_TEXT', 'Effektiver Jahreszins');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_EXAMPLE_TEXT', '* Erste Rate zahlbar per Bankeinzug einen Monat nach Versanddatum, darauffolgende Raten monatlich zahlbar per Bankeinzug an dem entsprechenden Kalendertag des Folgemonats bzw. dem darauffolgenden Tag (Beispiel: Versanddatum 19.9.2010, 1. Rate 19.10.2010, Folgeraten jeweils am 19. des Folgemonats).');

define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_DIVIDED_BY_RATES', 'Geteilt durch die Anzahl der Raten');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_FIRST_RATE', 'Die erste Rate inkl. Geb&uuml;hren betr&auml;gt');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_FOLLOWING_RATES', 'Jede folgende Rate betr&auml;gt');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_CAPTION_TEXT1', 'Ihre Teilzahlung in');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_CAPTION_TEXT2', 'Monatsraten');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_ENTER_NUMBER_RATES', 'Bitte geben Sie die gew&uuml;nschte Anzahl Monatsraten ein');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_RATES', 'Raten');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_CALCULATE_RATES', 'Ratenplan berechnen');

define('MODULE_ORDER_TOTAL_BILLPAYTRANSACTIONCREDIT_TRANSACTION_FEE', 'Bearbeitungsgeb&uuml;hr');
define('MODULE_ORDER_TOTAL_BILLPAYTRANSACTIONCREDIT_TRANSACTION_FEE_TAX1', 'inkl.');
define('MODULE_ORDER_TOTAL_BILLPAYTRANSACTIONCREDIT_TRANSACTION_FEE_TAX2', 'MwSt.');
define('MODULE_ORDER_TOTAL_BILLPAYTC_SURCHARGE', 'Zinsaufschlag');
define('MODULE_ORDER_TOTAL_BILLPAYTRANSACTIONCREDIT_TOTAL', 'Gesamtsumme Ratenkauf');

// BOF - Hendrik - 2010-08-09 - exlusion config for shipping modules
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_NEG_SHIPPING_TITLE', 'Ausschlu&szlig; bei Versandmodulen');
define('MODULE_PAYMENT_BILLPAYTRANSACTIONCREDIT_NEG_SHIPPING_DESC', 'Dieses Zahlungsmodul deaktivieren wenn Versandmodul gew&auml;hlt (Komma separierte Liste)');
// EOF - Hendrik - 2010-08-09 - exlusion config for shipping modules
?>