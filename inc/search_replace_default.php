<?php
/*-----------------------------------------------------------------------
    $Id: search_replace_default.php 1915 2011-05-08 15:37:30Z web28 $
	
    Zeichenkodierung: ISO-8859-1
   
   Version 1.06 rev.04 (c) by web28  - www.rpa-com.de   
------------------------------------------------------------------------*/
function shopstat_getRegExps(&$search, &$replace)
{
    $search     = array(
                        "'\s&\s'",          //--Kaufm�nnisches Und mit Blanks muss raus
                        "'[\r\n\s]+'",      // strip out white space
                        "'&(quote|#34);'i", // replace html entities
                        "'&(amp|#38);'i",   //--Ampersand-Zeichen, kaufm�nnisches Und
                        "'&(lt|#60);|<'i",  //--�ffnende spitze Klammer
                        "'&(gt|#62);|>'i",  //--schlie�ende spitze Klammer
                        "'&(nbsp|#160);'i", //--Erzwungenes Leerzeichen          
                        "'&(iexcl|#161);|�'i", //umgekehrtes Ausrufezeichen
                        "'&(cent|#162);|�'i",  //Cent-Zeichen
                        "'&(pound|#163);|�'i", //Pfund-Zeichen
                        "'&(copy|#169);|�'i",  //Copyright-Zeichen                        
                        "'%'",              //--Prozent muss weg
                        "/[\[\({]/",        //--�ffnende Klammern nach Bindestriche
                        "/[\)\]\}]/",       //--schliessende Klammern weg
                        "/�/",              //--Umlaute etc.
                        "/�/",              //--Umlaute etc.
                        "/�/",              //--Umlaute etc.
                        "/�/",              //--Umlaute etc.
                        "/�/",              //--Umlaute etc.
                        "/�/",              //--Umlaute etc.
                        "/�/",              //--Umlaute etc.
                        "/'|\"|�|`/",       //--Anf�hrungszeichen weg.
                        "/[:,\.!?\*\+]/",   //--Doppelpunkte, Komma, Punkt etc. weg.
                        );
    $replace    = array(
                        "-",    //--Kaufm�nnisches Und mit Blanks
                        "-",    // strip out white space
                        "",     //--Anf�hrungszeichen oben 
                        "-",    //--Ampersand-Zeichen, kaufm�nnisches Und
                        "-",    //--�ffnende spitze Klammer
                        "-",    //--schlie�ende spitze Klammer
                        "",     //chr(161), //umgekehrtes Ausrufezeichen
                        "ct",   //chr(162), //Cent-Zeichen
                        "GBP",  //chr(163), //Pfund-Zeichen
                        "",     //chr(169),Copyright-Zeichen                        
                        "",     //--Prozent muss weg
                        "-",
                        "",
                        "ss",
                        "ae",
                        "ue",
                        "oe",
                        "Ae",
                        "Ue",
                        "Oe",
                        "",
                        ""
                        );

}
?>