<?php
/* -----------------------------------------------------------------------------------------
   $Id: google_conversiontracking.js.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/
?>

<!-- Google Code for Purchase Conversion Page -->
<script language="JavaScript" type="text/javascript">
<!--
var google_conversion_id = <?php echo GOOGLE_CONVERSION_ID; ?>;
var google_conversion_language = "<?php echo GOOGLE_LANG; ?>";
var google_conversion_format = "1";
var google_conversion_color = "666666";
if (1) {
  var google_conversion_value = 1;
}
var google_conversion_label = "Purchase";
//-->
</script>
<?php
//BOF - Dokuman - 2009-08-19 - BUGFIX: #0000223 SSL/NONSSL check for google conversiontracking
if ($request_type=='NONSSL') { 
//EOF - Dokuman - 2009-08-19 - BUGFIX: #0000223 SSL/NONSSL check for google conversiontracking
?>
<script language="JavaScript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<img height=1 width=1 border=0 src="http://www.googleadservices.com/pagead/conversion/<?php echo GOOGLE_CONVERSION_ID; ?>/?value=1&label=Purchase&script=0">
</noscript>
<?php
//BOF - Dokuman - 2009-08-19 - BUGFIX: #0000223 SSL/NONSSL check for google conversiontracking
}else{
?>
<script language="JavaScript" src="https://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<img height=1 width=1 border=0 src="https://www.googleadservices.com/pagead/conversion/<?php echo GOOGLE_CONVERSION_ID; ?>/?value=1.0&label=PURCHASE&script=0">
</noscript>
<?php
}
//EOF - Dokuman - 2009-08-19 - BUGFIX: #0000223 SSL/NONSSL check for google conversiontracking
?>

