<?php
/* -----------------------------------------------------------------------------------------
   $Id: outputfilter.note.php 4246 2013-01-11 14:36:07Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 xt:Commerce

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

   # SIE SIND IM BEGRIFF ETWAS ZU �NDERN, WAS NICHT FAIR IST. SIE M�CHTEN MIT
   # DIESER SOFTWARE GELD VERDIENEN ODER KUNDEN GEWINNEN. SIE HABEN NICHT STUNDEN 
   # UND MONATE VERBRACHT DIESE SOFTWARE ZU ENTWICKELN UND ZU VERBESSEREN. ALS
   # DANKESCH�N AN DIE ENTWICKLER UND CODER LASSEN SIE DIESE DATEI, WIE SIE IST 
   # ODER KRATZEN SIE AUCH VON IHREN ELEKTROGER�TEN IM HAUS DIE MARKENZEICHEN AB!!!!

function smarty_outputfilter_note($tpl_output, &$smarty) {
  global $PHP_SELF;
  
  $cop='<div class="copyright">'.((basename($PHP_SELF)=='index.php' && $_SERVER['QUERY_STRING']=='')?'<a href="http://www.modified-shop.org" target="_blank">':'').'<span class="cop_magenta">mod</span><span class="cop_grey">ified eCommerce Shopsoftware &copy; 2009-' . date('Y') . '</span>'.((basename($PHP_SELF)=='index.php' && $_SERVER['QUERY_STRING']=='')?'</a>':'').'</div>';

  // making output W3C-Conform: replace ampersands, rest is covered by the modified shopstat_functions.php  
  $tpl_output = preg_replace("/&(?!(amp;|&|#[0-9]+;|[a-z0-9]+;))/i", "&amp;", $tpl_output);

  // uncomment the next line to strip whitespaces (i.e. compress HTML)
  //$tpl_output =  preg_replace('!\s+!', ' ',$tpl_output);

  return $tpl_output.$cop;
}

   # SIE SIND IM BEGRIFF ETWAS ZU �NDERN, WAS NICHT FAIR IST. SIE M�CHTEN MIT
   # DIESER SOFTWARE GELD VERDIENEN ODER KUNDEN GEWINNEN. SIE HABEN NICHT STUNDEN 
   # UND MONATE VERBRACHT DIESE SOFTWARE ZU ENTWICKELN UND ZU VERBESSEREN. ALS
   # DANKESCH�N AN DIE ENTWICKLER UND CODER LASSEN SIE DIESE DATEI, WIE SIE IST 
   # ODER KRATZEN SIE AUCH VON IHREN ELEKTROGER�TEN IM HAUS DIE MARKENZEICHEN AB!!!!
?>
