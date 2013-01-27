<?php
/**
 * @version SOFORT Gateway 5.2.0 - $Date: 2012-09-13 16:24:37 +0200 (Thu, 13 Sep 2012) $
 * @author SOFORT AG (integration@sofort.com)
 * @link http://www.sofort.com/
 *
 * Copyright (c) 2012 SOFORT AG
 *
 * $Id: sofort_sofortrechnung.php 3751 2012-10-10 08:36:20Z gtb-modified $
 */


//include language-constants used in all Multipay Projects
require_once 'sofort_general.php';

define('MODULE_PAYMENT_SOFORT_SR_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGE', '');
define('MODULE_PAYMENT_SOFORT_SR_CHECKOUT_CONDITIONS', '
	<script type="text/javascript">
		function showSrConditions() {
			srOverlay = new sofortOverlay(jQuery(".srOverlay"), "callback/sofort/ressources/scripts/getContent.php", "https://documents.sofort.com/de/sr/privacy_de");
			srOverlay.trigger();
		}
		document.write(\'<a id="srNotice" href="javascript:void(0)" onclick="showSrConditions();">Ich habe die Datenschutzhinweise gelesen.</a>\');
	</script>
	
	<div style="display:none; z-index: 1001;filter: alpha(opacity=92);filter: progid :DXImageTransform.Microsoft.Alpha(opacity=92);-moz-opacity: .92;-khtml-opacity: 0.92;opacity: 0.92;background-color: black;position: fixed;top: 0px;left: 0px;width: 100%;height: 100%;text-align: center;vertical-align: middle;" class="srOverlay">
		<div class="loader" style="z-index: 1002;position: relative;background-color: #fff;top: 40px;overflow: scroll;padding: 4px;border-radius: 7px;-moz-border-radius: 7px;-webkit-border-radius: 7px;margin: auto;width: 620px;height: 400px;overflow: scroll; overflow-x: hidden;">
			<div class="closeButton" style="position: fixed; top: 54px; background: url(callback/sofort/ressources/images/close.png) right top no-repeat;cursor:pointer;height: 30px;width: 30px;"></div>
			<div class="content"></div>
		</div>
	</div>
	<noscript>
		<a href="https://documents.sofort.com/de/sr/privacy_de" target="_blank">Ich habe die Datenschutzhinweise gelesen.</a>
	</noscript>
');

define('MODULE_PAYMENT_SOFORT_SR_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGEALT', 'checkout.sr.description');

define('MODULE_PAYMENT_SOFORT_SR_TEXT_TITLE', 'Rechnung by SOFORT <br /><img src="https://images.sofort.com/de/sr/logo_90x30.png"  alt="Logo Rechnung by SOFORT"/>');
define('MODULE_PAYMENT_SOFORT_SOFORTRECHNUNG_TEXT_TITLE', 'Kauf auf Rechnung');
define('MODULE_PAYMENT_SOFORT_SR_TEXT_ERROR_MESSAGE', 'Die gew�hlte Zahlart ist leider nicht m�glich oder wurde auf Kundenwunsch abgebrochen. Bitte w�hlen Sie eine andere Zahlweise.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_SR', 'Die gew�hlte Zahlart ist leider nicht m�glich oder wurde auf Kundenwunsch abgebrochen. Bitte w�hlen Sie eine andere Zahlweise.');

define('MODULE_PAYMENT_SOFORT_MULTIPAY_SR_CHECKOUT_TEXT', '');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_CONFIRM_SR', 'Rechnung hier best�tigen:');
define('MODULE_PAYMENT_SOFORT_SR_STATUS_TITLE', 'sofort.de Modul aktivieren');
define('MODULE_PAYMENT_SOFORT_SR_STATUS_DESC', 'Aktiviert/deaktiviert das komplette Modul');
define('MODULE_PAYMENT_SOFORT_SR_SORT_ORDER_TITLE', 'Anzeigereihenfolge');
define('MODULE_PAYMENT_SOFORT_SR_SORT_ORDER_DESC', 'Reihenfolge der Anzeige. Kleinste Ziffer wird zuerst angezeigt.');
define('MODULE_PAYMENT_SOFORT_SR_TEXT_DESCRIPTION', 'Kauf auf Rechnung mit Zahlungsgarantie.');
define('MODULE_PAYMENT_SOFORT_SOFORTRECHNUNG_ALLOWED_TITLE', 'Erlaubte Zonen');
define('MODULE_PAYMENT_SOFORT_SOFORTRECHNUNG_ALLOWED_DESC', 'Geben Sie <b>einzeln</b> die Zonen an, welche f�r dieses Modul erlaubt sein sollen. (z.B. AT,DE (wenn leer, werden alle Zonen erlaubt))');
define('MODULE_PAYMENT_SOFORT_SR_ZONE_TITLE', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_TITLE);
define('MODULE_PAYMENT_SOFORT_SR_ZONE_DESC', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_DESC);
define('MODULE_PAYMENT_SOFORT_SR_ORDER_STATUS_ID_TITLE', 'Best�tigter Bestellstatus');
define('MODULE_PAYMENT_SOFORT_SR_ORDER_STATUS_ID_DESC', 'Bestellstatus nach erfolgreicher und best�tigter Transaktion und Freigabe der Rechnung durch den H�ndler.');
define('MODULE_PAYMENT_SOFORT_SR_UNCONFIRMED_STATUS_ID_TITLE', 'Unbest�tigter Bestellstatus');
define('MODULE_PAYMENT_SOFORT_SR_UNCONFIRMED_STATUS_ID_DESC', 'Bestellstatus nach erfolgreicher Zahlung. Die Rechnung wurde noch nicht durch den H�ndler freigegeben.');
define('MODULE_PAYMENT_SOFORT_SR_TMP_STATUS_ID_TITLE', 'Tempor�rer Bestellstatus');
define('MODULE_PAYMENT_SOFORT_SR_TMP_STATUS_ID_DESC', 'Bestellstatus f�r nicht abgeschlossene Transaktionen. Die Bestellung wurde erstellt aber die Transaktion von der SOFORT AG noch nicht best�tigt.');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_STATUS_ID_TITLE', 'Bestellstatus bei kompletter Stornierung');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_STATUS_ID_DESC', 'Stornierter Bestellstatus<br />Bestellstatus nach einer vollen Stornierung der Rechnung.');

define('MODULE_PAYMENT_SOFORT_SR_PENDINIG_NOT_CONFIRMED_COMMENT', 'Bestellung mit Kauf auf Rechnung erfolgreich �bermittelt. Best�tigung durch H�ndler noch nicht erfolgt. Ihre Transaktions-ID:');

define('MODULE_PAYMENT_SOFORT_SR_RECOMMENDED_PAYMENT_TITLE', 'Empfohlene Zahlungsweise');
define('MODULE_PAYMENT_SOFORT_SR_RECOMMENDED_PAYMENT_DESC', 'Diese Zahlart als "empfohlene Zahlungsart" markieren. Auf der Bezahlseite erfolgt ein Hinweis direkt hinter der Zahlungsart.');
define('MODULE_PAYMENT_SOFORT_SR_RECOMMENDED_PAYMENT_TEXT', '(Empfohlene Zahlungsweise)');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_TIME', 'Zeit');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_DATE', 'Datum');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_AMOUNT', 'Betrag');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_COMMENT', 'Kommentar');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_ORDER_HISTORY', 'Bestellhistorie');
define('MODULE_PAYMENT_SOFORT_SR_PRICE_CHANGED_CUSTOMERINFO', 'Durch Preisrundungen hat sich ein neuer, minimal abweichender Rechnungspreis ergeben. Bitte beachten Sie dies bei Erhalt der Rechnung! Neuer Rechnungsbetrag:');

/////////////////////////////////////////////////
//////// Seller-Backend and callback.php ////////
/////////////////////////////////////////////////

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_BACK', 'zur�ck');

define('MODULE_PAYMENT_SOFORT_SR_CONFIRM_INVOICE', 'Rechnung best�tigen');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_INVOICE', 'Rechnung stornieren');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_CONFIRMED_INVOICE', 'Rechnung gutschreiben');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_INVOICE_QUESTION', 'Sind Sie sicher, dass Sie die Rechnung wirklich stornieren wollen? Dieser Vorgang kann nicht r�ckg�ngig gemacht werden.');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_CONFIRMED_INVOICE_QUESTION', 'Sind Sie sicher, dass Sie die Rechnung wirklich gutschreiben wollen? Dieser Vorgang kann nicht r�ckg�ngig gemacht werden.');

define('MODULE_PAYMENT_SOFORT_SR_DOWNLOAD_INVOICE', 'Rechnung herunterladen');
define('MODULE_PAYMENT_SOFORT_SR_DOWNLOAD_INVOICE_HINT', 'Laden Sie hier das entsprechende Dokument (Rechnungsvorschau, Rechnung, Gutschrift) herunter.');
define('MODULE_PAYMENT_SOFORT_SR_DOWNLOAD_CREDIT_MEMO', 'Gutschrift herunterladen');
define('MODULE_PAYMENT_SOFORT_SR_DOWNLOAD_INVOICE_PREVIEW', 'Rechnungsvorschau herunterladen');

define('MODULE_PAYMENT_SOFORT_SR_EDIT_CART', 'Warenkorb anpassen');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CART', 'Warenkorb speichern');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CART_QUESTION', 'Wollen Sie den Warenkorb wirklich anpassen?');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CART_ERROR', 'Beim Bearbeiten des Warenkorbs ist ein Fehler aufgetreten.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CART_HINT', 'Speichern Sie hier Ihre �nderungen am Warenkorb. Bei bereits best�tigten Rechnung f�hrt ein mengenm��ig reduzierter sowie ein von der Rechnung gel�schter Artikel zu einer Gutschrift.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_DISCOUNTS_HINT', 'Sie k�nnen Rabatte oder Aufschl�ge anpassen. Aufschl�ge d�rfen nicht erh�ht werden und Rabatte keine Betr�ge gr��er Null erhalten. Der Gesamtbetrag der Rechnung darf durch die Anpassung nicht erh�ht werden.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_DISCOUNTS_GTZERO_HINT', 'Rabatte d�rfen keinen Betrag gr��er Null erhalten.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_QUANTITY', 'Menge anpassen');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_QUANTITY_HINT', 'Sie k�nnen die Anzahl der Artikel pro Position anpassen. Es d�rfen lediglich Mengen reduziert, nicht jedoch hinzugef�gt werden.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_QUANTITY_TOTAL_GTZERO', 'Die Anzahl des Artikels kann nicht reduziert werden, da die Gesamtsumme der Rechnung nicht negativ sein darf.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_QUANTITY_ZERO_HINT', 'Anzahl muss gr��er 0 sein. Zum L�schen markieren Sie den Artikel bitte am Ende der Zeile.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE', 'Preis anpassen');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE_HINT', 'Sie k�nnen den Preis der einzelnen Artikel pro Position anpassen. Preise k�nnen lediglich reduziert, nicht erh�ht werden.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE_TOTAL_GTZERO', 'Der Preis kann nicht reduziert werden, da die Gesamtsumme der Rechnung nicht negativ sein darf.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE_AND_QUANTITY_HINT', 'Es k�nnen nicht gleichzeitig Preis und Menge angepasst werden.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE_AND_QUANTITY_NAN', 'Sie haben ung�ltige Zeichen eingegeben. Bei diesen Anpassungen sind nur Zahlen zul�ssig.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_VALUE_LTZERO_HINT', 'Wert darf nicht kleiner 0 sein.');

define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CONFIRMED_INVOICE', 'Bitte Kommentar eingeben');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CONFIRMED_INVOICE_HINT', 'Bei Anpassung einer bereits best�tigten Rechnung muss eine entsprechende Begr�ndung hinterlegt werden. Diese erscheint sp�ter auf der Gutschrift als Kommentar zum entsprechenden Artikel.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_SHIPPING_HINT', 'Sie k�nnen den Preis der Versandkosten anpassen. Der Preis kann lediglich reduziert, nicht erh�ht werden.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_SHIPPING_COSTS_HINT', 'Bei Retouren d�rfen Versandkosten nicht als alleinstehender Posten auf einer Rechnung erscheinen.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_SHIPPING_TOTAL_GTZERO', 'Die Versandkosten k�nnen nicht reduziert werden, da die Gesamtsumme der Rechnung nicht negativ sein darf.');

define('MODULE_PAYMENT_SOFORT_SR_RECALCULATION', 'wird neu berechnet');

define('MODULE_PAYMENT_SOFORT_SR_REMOVE_FROM_INVOICE_TOTAL_GTZERO','Dieser Artikel kann nicht gel�scht werden, da die Gesamtsumme der Rechnung nicht negativ sein darf.');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_ARTICLE_FROM_INVOICE', 'Artikel entfernen');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_FROM_INVOICE', 'Position l�schen');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_FROM_INVOICE_QUESTION', 'Sie m�chten folgende Artikel wirklich l�schen: %s ?');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_FROM_INVOICE_HINT', 'Markieren Sie Artikel um sie zu l�schen. Bei einer bereits best�tigten Rechnung f�hrt das L�schen eines Artikels zu einer Gutschrift.');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_LAST_ARTICLE_HINT', 'Durch das Reduzieren der Anzahl aller bzw. durch Entfernen des letzten Artikels wird die Rechnung komplett storniert.');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CANCELED', 'Die Rechnung wurde storniert.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CONFIRMED', 'Die Ware wird zum Versand bereit gestellt.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_PENDINIG_NOT_CONFIRMED', 'Kauf auf Rechnung als Zahlungsart gew�hlt. Transaktion nicht abgeschlossen.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CANCELED_REFUNDED', 'Die Rechnung wurde storniert. Gutschrift erstellt.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_REANIMATED', 'Die Stornierung der Rechnung wurde r�ckg�ngig gemacht.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CANCEL_30_DAYS', 'Rechnung wurde automatisch storniert. Best�tigungszeitraum von 30 Tagen abgelaufen.');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CURRENT_TOTAL', 'Aktueller Rechnungsbetrag:');
define('MODULE_PAYMENT_SOFORT_SR_SUCCESS_ADDRESS_UPDATED', 'Liefer- und Rechnungsaddresse erfolgreich upgedated.');
define('MODULE_PAYMENT_SOFORT_SR_STATUSUPDATE_UNNECESSARY', 'Statusupdate unn�tig.');
define('MODULE_PAYMENT_SOFORT_SR_UNKNOWN_STATUS', 'Unbekannten Zahlungs-/Rechnungsstatus gefunden.');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_DOWNLOAD_INVOICE', 'Rechnung herunterladen');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_DOWNLOAD_INVOICE_CREDITMEMO', 'Rechnung/Gutschrift herunterladen');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CLOSE_WINDOW', 'Fenster schlie�en');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CONFIRMATION_CANCEL', 'Sind Sie sicher, dass Sie die Rechnung wirklich stornieren wollen? Dieser Vorgang kann nicht r�ckg�ngig gemacht werden.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_YES', 'Ja');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_NO', 'Nein');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_REFRESH_WINDOW', 'Fenster neu laden');

define('MODULE_PAYMENT_SOFORT_SR_GLOBAL_ERROR', 'Fehler! Bitte kontaktieren Sie den Administrator.');

define('MODULE_PAYMENT_SOFORT_SR_INVOICE_CONFIRMED', 'Rechnung wurde best�tigt');
define('MODULE_PAYMENT_SOFORT_SR_INVOICE_CANCELED', 'Die Rechnung wurde storniert.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_DETAILS', 'Rechnungsdetails');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_TRANSACTION_ID', 'Transaktions-ID');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_ORDER_NUMBER', 'Bestellnummer');
define('MODULE_PAYMENT_SOFORT_SR_ADMIN_TITLE', 'Rechnung by SOFORT');
define('MODULE_PAYMENT_SOFORT_SR_CONFIRM_CANCEL', 'Sind Sie sicher, dass Sie die Rechnung wirklich stornieren wollen? Dieser Vorgang kann nicht r�ckg�ngig gemacht werden.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_REMINDER', 'Mahnstufe {{d}}');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_DELCREDERE', 'Inkasso�bergabe');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CREDITED_TO_SELLER', 'Zahlungseingang auf H�ndlerkonto ist erfolgt.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CREDITED_TO_SELLER_CUSTOMER_PENDING', 'Zahlungseingang auf H�ndlerkonto ist erfolgt. Kundenzahlung ausstehend.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CANCELED_REFUNDED', 'Die Rechnung wurde storniert. Gutschrift erstellt. {{time}}');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_RECEIVED', 'Zahlungseingang.');
define('MODULE_PAYMENT_SOFORT_SR_PENDINIG_NOT_CONFIRMED_COMMENT_ADMIN', 'Bestellung mit Kauf auf Rechnung erfolgreich �bermittelt. Best�tigung durch H�ndler noch nicht erfolgt.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CART_EDITED', 'Der Warenkorb wurde angepasst.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CART_RESET', 'Der Warenkorb wurde zur�ckgesetzt.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CONFIRMED_SELLER', 'Transaktionsstatus: Die Rechnung wurde best�tigt, warte auf Geldeingang. Rechnungsstatus: Rechnung noch offen.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CANCELED_REFUNDED_SELLER', 'Transaktionsstatus: Das Geld wird zur�ckerstattet. Rechnungsstatus: Rechnung wird gutgeschrieben.');
define('MODULE_PAYMENT_SOFORT_SR_PENDING_NOT_CREDITED_YET_RECEIVED_SELLER', 'Transaktionsstatus: Die Rechnung wurde best�tigt, warte auf Geldeingang. Rechnungsstatus: K�ufer hat Rechnung bezahlt.');
define('MODULE_PAYMENT_SOFORT_SR_RECEIVED_CREDITED_RECEIVED_SELLER', 'Transaktionsstatus: Die Rechnung wurde ausbezahlt. Rechnungsstatus: K�ufer hat Rechnung bezahlt.');
define('MODULE_PAYMENT_SOFORT_SR_PENDING_NOT_CREDITED_YET_REMINDER_SELLER', 'Transaktionsstatus: Die Rechnung wurde best�tigt, warte auf Geldeingang. Rechnungsstatus: Mahnstufe {{d}}');
define('MODULE_PAYMENT_SOFORT_SR_RECEIVED_CREDITED_REMINDER_SELLER', 'Transaktionsstatus: Die Rechnung wurde ausbezahlt. Rechnungsstatus: Mahnstufe {{d}}');
define('MODULE_PAYMENT_SOFORT_SR_PENDING_NOT_CREDITED_YET_DELCREDERE_SELLER', 'Transaktionsstatus: Die Rechnung wurde best�tigt, warte auf Geldeingang. Rechnungsstatus: Inkasso�bergabe');
define('MODULE_PAYMENT_SOFORT_SR_RECEIVED_CREDITED_DELCREDERE_SELLER', 'Transaktionsstatus: Die Rechnung wurde ausbezahlt. Rechnungsstatus: Inkasso�bergabe');
define('MODULE_PAYMENT_SOFORT_SR_RECEIVED_CREDITED_PENDING_SELLER', 'Transaktionsstatus: Die Rechnung wurde ausbezahlt. Rechnungsstatus: Kundenzahlung ausstehend.');

define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9000', 'Keine Rechnungs-Transaktion gefunden.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9001', 'Die Rechnung konnte nicht best�tigt werden.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9002', 'Die �bergebene Rechnungssumme �bersteigt das Kreditlimit.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9003', 'Die Rechnung konnte nicht storniert werden.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9004', 'Die Anfrage enthielt ung�ltige Warenkorbpositionen.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9005', 'Der Warenkorb konnte nicht angepasst werden.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9006', 'Der Zugriff zur Schnittstelle ist 30 Tage nach Zahlungseingang nicht mehr m�glich.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9007', 'Die Rechnung wurde bereits storniert.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9008', 'Der Betrag der �bergebenen Mehrwertsteuer ist zu hoch.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9009', 'Die Betr�ge der �bergeben Mehrwertsteuers�tze der Artikel stehen in Konflikt zueinander.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9010', 'Die Anpassung des Warenkorbs ist nicht m�glich.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9011', 'Es wurde kein Kommentar f�r die Anpassung des Warenkorbs �bergeben.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9012', 'Es k�nnen keine Positionen zum Warenkorb hinzugef�gt werden. Ebenso kann die Menge pro Rechnungsposition nicht heraufgesetzt werden. Betr�ge einzelner Positionen d�rfen den Ursprungsbetrag nicht �berschreiten.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9013', 'Es befinden sich ausschlie�lich nichtfakturierbare Artikel im Warenkorb.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9014', 'Die �bergebene Rechnungsnummer wird bereits verwendet.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9015', 'Die �bergebene Nummer der Gutschrift wird bereits verwendet.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9016', 'Die �bergebene Bestellnummer wird bereits verwendet.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9017', 'Die Rechnung wurde bereits best�tigt.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9018', 'Es wurden keine Daten der Rechnung angepasst.');