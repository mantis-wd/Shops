<?php
  /* --------------------------------------------------------------
   $Id: db_upgrade.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   Released under the GNU General Public License
   --------------------------------------------------------------*/

  require_once('../includes/configure.php');
  require_once(DIR_FS_CATALOG.'/includes/database_tables.php');
  require_once(DIR_FS_INC.'xtc_db_connect.inc.php');
  require_once(DIR_FS_INC.'xtc_db_query.inc.php');
  require_once(DIR_FS_INC.'xtc_db_fetch_array.inc.php');
  require_once(DIR_FS_INC.'xtc_redirect.inc.php');

  if (isset($_POST['cancel'])) {
    xtc_redirect('../', '', 'NONSSL'); //redirect back to shop
  }

  define('XTCOMMERCE304_FILE','update_xtc3.0.4sp2.1_to_1.0.1.0.sql');
  $restore_query = '';
  $used_files_display = '';

  //get browser language
  preg_match('/^([a-z]+)-?([^,;]*)/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang);
  if ($lang[1] == 'de') {
    // German definitions
    define ('TITLE_UPGRADE','<br /><strong><h1>modified eCommerce Shopsoftware Datenbank Upgradevorgang</h1></strong>');
    define ('SUBMIT_VALUE', 'Datenbankoperation durchf&uuml;hren');
    define ('CANCEL', 'Abbrechen');
    define ('SUCCESS_MESSAGE', '<br /><br /><strong>Datenbankoperation erfolgreich!</strong><br /><br />');
    define ('EXECUTED_SQL_MESSAGE', '<br /><br />Ausgef&uuml;hrte SQL-Befehle:<br /><br />');
    define ('UPGRADE_NOT_NECESSARY', 'Kein Datenbankupgrade notwendig, sie sind auf dem aktuellesten Stand!');
    define ('USED_FILES', '<br /><br />Folgende Dateien werden f&uuml;r das Upgrade auf die neueste Datenbank-Version verwendet:<br /><br />');
    define ('CURRENT_DB_VERSION', '<br />Ihre derzeitige Datenbank-Version ist: ');
    define ('FINAL_TEXT', 'Bitte l&ouml;schen Sie jetzt aus Sicherheitsgr&uuml;nden die Upgrade-Datei vom Server:<br /> ==&gt; ');
    define('TEXT_FOOTER','<a style="text-decoration:none;" href="http://www.modified-shop.org" target="_blank"><span style="color:#B0347E;">mod</span><span style="color:#6D6D6D;">ified eCommerce Shopsoftware</span></a><span style="color:#555555;">' . '&nbsp;' . '&copy;2009-' . date('Y') . '&nbsp;' . 'provides no warranty and is redistributable under the <a style="color:#555555;text-decoration:none;" href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GNU General Public License (Version 2)</a></span>');
    define('TEXT_TITLE','modified eCommerce Shopsoftware Datenbankupgrade');
    define('OPTIMIZE_TABLE_OPTION','<br />Sie k&ouml;nnen die Datenbank auch folgenderma&szlig;en optimieren:<br />');
    define('ANALYZE_TABLE','(<a href="http://dev.mysql.com/doc/refman/5.1/de/analyze-table.html" target="_blank">ANALYZE TABLE</a>): Statistiken &uuml;ber die Schl&uuml;sselverteilung erstellen (empfohlen).');
    define('OPTIMIZE_TABLE','(<a href="http://dev.mysql.com/doc/refman/5.1/de/optimize-table.html" target="_blank">OPTIMIZE TABLE</a>): Datenbanktabellen optimieren (empfohlen).');
    define('PROCESS_INDEXES','<b>Neugenerierung der Datenbank-Indices:</b><br/>Aufrund von Performancegr&uuml;nden muss das L&ouml;schen und neu Anlegen aller Indices getrennt in 2 Schritten erfolgen.<br/>');
    define('REBUILD_INDEXES','Verarbeitung der Indices durchf&uuml;hren.');
    define('DELETE_INDEXES','Indices aller Datenbanktabellen l&ouml;schen (1. Schritt)');
    define('CREATE_INDEXES','Indices aller Datenbanktabellen neu aufbauen (2. Schritt)');
    define('REFRESH_CUSTOMERS_BASKET','Warenk&ouml;rbe von Kunden l&ouml;schen, die &auml;lter als 1 Monat sind.');
    define('REFRESH_SESSION_DATA','Sessiondaten (Loginzeitpunkte) von Kunden l&ouml;schen, die &auml;lter als 1 Woche sind.');
    define('OPTIMIZE_TABLE_GAIN','Die Optimierung der Datenbank f&uuml;hrte zu einem Speicherplatzgewinn von: ');
    define('REDIRECTED_FROM_INSTALLER','<strong>Ihre bereits bestehende Version der <span style="color:#B0347E;">mod</span><span style="color:#6D6D6D;">ified eCommerce Shopsoftware</span> muss gegebenenfalls noch auf das neueste Datenbank-Schema aktualisiert werden!</strong>');
    define('TABLES_ANALYZED_MESSAGE','<li>Database wurde analysiert.</li>');
    define('TABLES_OPTIMIZED_MESSAGE','<li>Database wurde optimiert.</li>');
    define('REBUILD_INDEXES_MESSAGE','<li>Indices wurden neu aufgebaut.</li>');
    define('DELETED_INDEXES_MESSAGE','<li style="color:red;font-weight:bold">Indices wurden gel&ouml;scht (Schritt 1). Bitte legen Sie nun die Indices neu an (Schritt 2).</li>');
    define('CUSTOMERS_BASKETS_REFRESHED_MESSAGE','<li>Alte Warenk&ouml;rbe von Kunden wurden gel&ouml;scht.</li>');
    define('CUSTOMERS_SESSION_DATA_REFRESHED_MESSAGE','<li>Alte Sessiondaten von Kunden wurden gel&ouml;scht.</li>');
    define('TEXT_REMINDER_REINSTALL_MODULES','<p style="color:red;font-weight:bold">Beim Upgrade von v1.06 auf v2.00 m&uuml;ssen alle ben&ouml;tigten Zahlungsmodule und die Versandmodule &quot;DP&quot; und &quot;GLS&quot; bei Bedarf neu installiert werden. Bitte notieren Sie vor dem Update ggf. Ihre eigenen Einstellungsoptinen der Module.</p>');
  } else {
    // English definitions
    define ('TITLE_UPGRADE','<br /><strong><h1>modified eCommerce Shopsoftware database upgrade process</h1></strong>');
    define ('SUBMIT_VALUE', 'Execute database operation');
    define ('CANCEL', 'Cancel');
    define ('SUCCESS_MESSAGE', '<br /><br /><strong>Database operation successful!</strong><br /><br />');
    define ('EXECUTED_SQL_MESSAGE', '<br /><br />Executed SQL-statements:<br /><br />');
    define ('UPGRADE_NOT_NECESSARY', 'Database upgrade not necessary, you are up to date!');
    define ('USED_FILES', '<br /><br />The following files will be used for the upgrade to the newest database version:<br /><br />');
    define ('CURRENT_DB_VERSION', '<br />Your current database version is: ');
    define ('FINAL_TEXT', 'Please delete the update file from your server now for security reasons:<br /> ==&gt; ');
    define('TEXT_FOOTER','<a style="text-decoration:none;" href="http://www.modified-shop.org" target="_blank"><span style="color:#B0347E;">mod</span><span style="color:#6D6D6D;">ified eCommerce Shopsoftware</span></a><span style="color:#555555;">' . '&nbsp;' . '&copy;2009-' . date('Y') . '&nbsp;' . 'provides no warranty and is redistributable under the <a style="color:#555555;text-decoration:none;" href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GNU General Public License (Version 2)</a></span>');
    define('OPTIMIZE_TABLE_OPTION','<br />You can also optimize the database as follows:<br />');
    define('ANALYZE_TABLE','(<a href="http://dev.mysql.com/doc/refman/5.1/en/analyze-table.html" target="_blank">ANALYZE TABLE</a>): Create statistical date about the key distribution (recommended).');
    define('OPTIMIZE_TABLE','(<a href="http://dev.mysql.com/doc/refman/5.1/en/optimize-table.html" target="_blank">OPTIMIZE TABLE</a>): Optimize database tables (recommended).');
    define('PROCESS_INDEXES','<b>Rebuild database indexes:</b><br/>Due to performance reasons the rebuild process of database indexes has to be carried out in 2 separate steps.<br/>');
    define('REBUILD_INDEXES','Execute indexes rebuild process.');
    define('DELETE_INDEXES','Delete indexes of all database tables (1st step)');
    define('CREATE_INDEXES','Rebuild indexes of all database tables (2nd step)');
    define('REFRESH_CUSTOMERS_BASKET','Delete customers baskets that are older than one month.');
    define('REFRESH_SESSION_DATA','Delete customers session data (login timestamps) that are older than one week.');
    define('OPTIMIZE_TABLE_GAIN','The optimization of the database saved: ');
    define('REDIRECTED_FROM_INSTALLER','<strong>Your existing version of the <span style="color:#B0347E;">mod</span><span style="color:#6D6D6D;">ified eCommerce Shopsoftware</span> might have to be upgraded to the newest database schema first!</strong>');
    define('TABLES_ANALYZED_MESSAGE','<li>Database was analyzed.</li>');
    define('TABLES_OPTIMIZED_MESSAGE','<li>Database was optimized.</li>');
    define('REBUILD_INDEXES_MESSAGE','<li>Indexes were rebuild.</li>');
    define('DELETED_INDEXES_MESSAGE','<li style="color:red;font-weight:bold">Indices were deleted (Step1). Please rebuild the indices now (Step 2).</li>');
    define('CUSTOMERS_BASKETS_REFRESHED_MESSAGE','<li>Old customers baskets were deleted.</li>');
    define('CUSTOMERS_SESSION_DATA_REFRESHED_MESSAGE','<li>Old customers session data were deleted.</li>');
    define('TEXT_REMINDER_REINSTALL_MODULES','<p style="color:red;font-weight:bold">After upgrading from v1.06 to v2.00 you have to reinstall all payment modules and the shipping modules &quot;DP&quot; and &quot;GLS&quot; if required. Please write down your customized settings of the modules prior to the update.</p>');
  }

  // get DB version and size
  xtc_db_connect() or die('Unable to connect to database server!');
  $version_query = xtc_db_query("SELECT version FROM " . TABLE_DATABASE_VERSION);
  $version_array = xtc_db_fetch_array($version_query);
  if (strstr($version_array['version'], 'xtcM')) { //xtcM for old version upgrades
    $db_version_update = 'update_' . substr($version_array['version'], 5, 7); //return version, e.g. '1.0.5.0' when 'xtcM_1.0.5.0'
  } elseif (strstr($version_array['version'], 'MOD')){ //MOD for new version upgrades
    $db_version_update = 'update_' . substr($version_array['version'], 4, 7); //return version, e.g. '1.0.5.0' when 'MOD_1.0.5.0'
  } else {
    $db_version_update = '';
    $version_array['version'] = 'xt:Commerce';
  }
  $initialDBSize = get_db_size();

  // get all SQL update_files
  $ordner = opendir('.');
  while($datei = readdir($ordner)) {
    if(preg_match('/^update_[0-9].[0-9].[0-9].[0-9]/i', $datei)) { //accept only sql files that start(!) with scheme "update_x.x.x.x"
      $farray[] = $datei;
    }
  }
  closedir($ordner);
  sort($farray);

  //DB seems to be an old xtCommerce installation, so include XTCOMMERCE304_FILE here
  if ($db_version_update == '') {
    array_unshift($farray, XTCOMMERCE304_FILE); // add filename to beginning of sorted array
  }

  // drop unnecessary SQL update_files less than "$db_version"
  foreach($farray as $key => $item) {
    if(preg_match("/$db_version_update/", $item)){
      break;
    } else {
      unset ($farray[$key]);
    }
  }

  // Load and process all remaining SQL files
  foreach($farray as $sqlFileToExecute) {
    $used_files_display .= $sqlFileToExecute.'<br />';
    $f = fopen($sqlFileToExecute,'rb');
    $restore_query .= fread($f,filesize($sqlFileToExecute));
    fclose($f);
  }

  // SQL parsing taken from xtc_db_install.inc.php
  $sql_array = array();
  $sql_length = strlen($restore_query);
  $pos = strpos($restore_query, ';');
  for ($i=$pos; $i<$sql_length; $i++) {
    if ($restore_query[0] == '#') {
      $restore_query = ltrim(substr($restore_query, strpos($restore_query, "\n")));
      $sql_length = strlen($restore_query);
      $i = strpos($restore_query, ';')-1;
      continue;
    }
    if ($restore_query[($i+1)] == "\n") {
      $next = '';
      for ($j=($i+2); $j<$sql_length; $j++) {
        if (trim($restore_query[$j]) != '') {
          $next = substr($restore_query, $j, 6);
          if ($next[0] == '#') {
            // find out where the break position is so we can remove this line (#comment line)
            for ($k=$j; $k<$sql_length; $k++) {
              if ($restore_query[$k] == "\n") break;
            }
            $query = substr($restore_query, 0, $i+1);
            $restore_query = substr($restore_query, $k);
            // join the query before the comment appeared, with the rest of the dump
            $restore_query = $query . $restore_query;
            $sql_length = strlen($restore_query);
            $i = strpos($restore_query, ';')-1;
            continue 2;
          }
          break;
        }
      }
      if (empty($next)) { // get the last insert query
        $next = 'insert';
      }

      // compare first 6 letters, if it fits an SQL statement to start a new line
      if ((strtoupper($next) == 'DROP T')
       || (strtoupper($next) == 'CREATE')
       || (strtoupper($next) == 'INSERT')
       || (strtoupper($next) == 'DELETE')
       || (strtoupper($next) == 'ALTER ')
       || (strtoupper($next) == 'TRUNCA')
       || (strtoupper($next) == 'UPDATE')) {
        $next = '';
        $sql_query = substr($restore_query, 0, $i);
        $sql_array[] = trim($sql_query);
        $restore_query = ltrim(substr($restore_query, $i+1));
        $sql_length = strlen($restore_query);
        $i = strpos($restore_query, ';')-1;
      }
    }
  }

  //get database size in bytes
  function get_db_size() {
    $result = xtc_db_query('SHOW TABLE STATUS');
    $dbsize = 0;
    while($row = xtc_db_fetch_array($result, MYSQL_ASSOC)) {
      $dbsize += $row['Data_length'] + $row['Index_length'];
    }
    return $dbsize;
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title><?php echo TEXT_TITLE; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
      body {background: #eee; font-family: arial, sans-serif; font-size: 12px;}
      table,td,div {font-family: arial, sans-serif; font-size: 12px;}
      h1 {font-size: 18px; margin: 0; padding: 0; margin-bottom: 10px;}
      a {color:#893769;}
      input.button {background-color:#000;color: #FFFFFF;padding: 3px;cursor: pointer;cursor: hand;}
    </style>
  </head>
  <body>
    <table width="800" style="border:30px solid #fff;" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td colspan="2" >
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="images/logo.png" width="254" height="78" alt="" /></td>
            </tr>
          </table>
      </tr>
      <tr>
        <td align="center" valign="top">
          <table width="95%" border="0" cellpadding="0" cellspacing="0">
             <tr>
              <td>
                <br />
                <?php
                  echo TITLE_UPGRADE;
                  //User has been redirected from original installer script to db_upgrade.php
                  if (isset($_GET['upgrade_redir']) && $_GET['upgrade_redir'] == 1) {
                    echo REDIRECTED_FROM_INSTALLER;
                  }
                  if(isset($_POST['submit'])) {
                    // Write SQL-statements to database if there are any
                    if (!empty($sql_array)) {
                      foreach ($sql_array as $stmt) {
                        xtc_db_query($stmt);
                      }
                    }
                    // get new(!) DB-Version from the database itself
                    $version_query = xtc_db_query("SELECT version FROM " . TABLE_DATABASE_VERSION);
                    $version_array = xtc_db_fetch_array($version_query);
                    echo CURRENT_DB_VERSION.' <strong>'.$version_array['version'].'</strong>';
                    echo SUCCESS_MESSAGE;
                    if (!empty($sql_array)){
                      echo EXECUTED_SQL_MESSAGE;
                      echo '<div style="border:1px solid #ccc; background:#fff; padding:10px;">';
                      // verbose SQL output on screen
                      foreach ($sql_array as $stmt) {
                        echo htmlentities($stmt).'<br />';
                      }
                      echo '</div>';
                    }
                    //**************************
                    // Database Table Operations
                    //**************************
                    if (isset($_POST['submit'])) {
                      echo '<div style="border:1px solid #ccc; background:#fff; padding:10px;"><ul>';

                      // remove unused customer data from customers baskets
                      if (isset($_POST['truncate_customers_basket'])){
                        $date_basket_added = date("Ymd", time() - ( 31 * 86400) ); //clear the customers basket table from entries greater than one month old
                        xtc_db_query("DELETE FROM " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . "
                                            WHERE ( products_id , customers_id)
                                               IN (select products_id, customers_id
                                             FROM " . TABLE_CUSTOMERS_BASKET . "
                                             WHERE customers_basket_date_added < " . $date_basket_added . ")");
                        xtc_db_query("DELETE FROM " . TABLE_CUSTOMERS_BASKET . "
                                            WHERE customers_basket_date_added < '" . $date_basket_added . "'");
                        echo CUSTOMERS_BASKETS_REFRESHED_MESSAGE;
                      }
                      // remove old session data greater 1 month
                      if (isset($_POST['truncate_session_data'])) {
                        $session_expiry_timestamp = (time() - ( 7 * 24 * 60 * 60)); //clear the sessions table of entries greater than one week old
                        xtc_db_query("DELETE FROM " . TABLE_SESSIONS . " WHERE expiry > '" . $session_expiry_timestamp . "'");
                        echo CUSTOMERS_SESSION_DATA_REFRESHED_MESSAGE;
                      }
                      // ANALYZE + OPTIMIZE TABLES
                      $tables = xtc_db_query('SHOW TABLE STATUS FROM ' . DB_DATABASE);
                      while($row = xtc_db_fetch_array($tables)) {
                        if (isset($_POST['analyze_tables'])) {
                          xtc_db_query('ANALYZE TABLE '.$row['Name']) or die(xtc_db_error()); //adjust keys
                        }
                        if (isset($_POST['optimize_tables'])) {
                          xtc_db_query('OPTIMIZE TABLE '.$row['Name']) or die(xtc_db_error()); //adjust size
                        }
                      }
                      if (isset($_POST['analyze_tables'])) {
                        echo TABLES_ANALYZED_MESSAGE;
                      }
                      if (isset($_POST['optimize_tables'])) {
                        echo TABLES_OPTIMIZED_MESSAGE;
                        echo '<i> => '.OPTIMIZE_TABLE_GAIN . ($initialDBSize - get_db_size(DB_DATABASE)) .' Bytes</i>';
                      }

                      //Remove all indexes from all tables
                      if (isset($_POST['rebuild_indexes']) && $_POST['radio_group_index'] == 'delete_indexes') {
                        foreach ($dbTablesArray AS $k=>$v) {
                          if ($k == 'personal_offers_by_customers_status_' //ignore personal_offers_by_customers_status_ entry
                           or $k == 'orders_shopgate_order') { //ignore orders_shopgate_order entry
                             continue;
                          }
                          $index_query = xtc_db_query("SHOW INDEXES FROM ". $k);
                            while ($row = xtc_db_fetch_array($index_query)) {
                              if ($row['Key_name'] !== 'PRIMARY') { //all indexes except PRIMARY keys
                                //echo $row['Table'].' '.$row['Key_name'].'<br>';
                                xtc_db_query("ALTER TABLE ".$row['Table'] ." DROP INDEX ".$row['Key_name']);
                                break;
                              }
                            }
                        }
                        echo DELETED_INDEXES_MESSAGE;
                      }
                      //add indexes again
                      if (isset($_POST['rebuild_indexes']) && $_POST['radio_group_index'] == 'create_indexes') {
                        require_once('indices.php'); // execute index rebuild process
                        echo REBUILD_INDEXES_MESSAGE;
                      }
                      echo '</ul></div>';
                    }
                    echo '<p style="color:red;font-weight:bold">'.FINAL_TEXT . basename($_SERVER['SCRIPT_FILENAME']).'</p>';
                  } else {
                    echo CURRENT_DB_VERSION.' <strong>'.$version_array['version'].'</strong>';
                    echo USED_FILES ;
                    echo '<div style="border:1px solid #ccc; background:#fff; padding:10px;">';
                    if ($used_files_display != '') {
                      echo $used_files_display;
                    } else {
                      echo UPGRADE_NOT_NECESSARY;
                      echo '<p style="color:red;font-weight:bold">'.FINAL_TEXT . basename($_SERVER['SCRIPT_FILENAME']).' <== </p>';
                    }
                    echo '</div>';
                  }
                  //HTML-input form
                  if (!isset($_POST['submit'])) {
                    if (strstr($used_files_display, 'update_1.0.6.0_to_2')) {
                      echo TEXT_REMINDER_REINSTALL_MODULES; // display notification when upgrading from v1.06 to v2.00
                    }
                    echo OPTIMIZE_TABLE_OPTION;
                    echo '<br /><form method="post" action="'.basename($_SERVER['SCRIPT_FILENAME']) .'">';
                    echo '<input type="checkbox" name="truncate_customers_basket" checked="checked"/>'.REFRESH_CUSTOMERS_BASKET.'<br />';
                    echo '<input type="checkbox" name="truncate_session_data" checked="checked"/>'.REFRESH_SESSION_DATA.'<br />';
                    echo '<input type="checkbox" name="analyze_tables" checked="checked"/>'.ANALYZE_TABLE.'<br />';
                    echo '<input type="checkbox" name="optimize_tables" checked="checked"/>'.OPTIMIZE_TABLE.'<br /><br />';
                    echo PROCESS_INDEXES;
                    echo '<input type="checkbox" name="rebuild_indexes"/>'.REBUILD_INDEXES.'<br />';
                    echo '<input type="radio" name="radio_group_index" value="delete_indexes" checked="checked"/>'.DELETE_INDEXES.'<br />';
                    echo '<input type="radio" name="radio_group_index" value="create_indexes" />'.CREATE_INDEXES.'<br /><br />';
                    echo '<input class="button" type="submit" name="submit" value="'.SUBMIT_VALUE.'"/>&nbsp;';
                    echo '<input class="button" type="submit" name="cancel" value="'.CANCEL.'"/></form>';
                  }
                ?>
              </td>
            </tr>
          </table>
          <br />
        </td>
      </tr>
    </table>
    <br />
    <div align="center" style="font-family:arial,sans-serif; font-size:11px; color:#666;"><?php echo TEXT_FOOTER; ?></div>
  </body>
</html>