<?php
  /* --------------------------------------------------------------
   $Id: start.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   --------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project
   (c) 2002-2003 osCommerce coding standards (a typical file) www.oscommerce.com
   (c) 2003 nextcommerce (start.php,1.5 2004/03/17); www.nextcommerce.org
   (c) 2006 XT-Commerce (start.php 1235 2005-09-21)

   Released under the GNU General Public License
   --------------------------------------------------------------*/

define('RSS_FEED_TITLE', 'modified eCommerce Shopsoftware Support Forum - Ank&uuml;ndigungen / Neuigkeiten');
define('RSS_FEED_DESCRIPTION', 'Aktuelle Information von modified eCommerce Shopsoftware Support Forum');
define('RSS_FEED_LINK', 'http://www.modified-shop.org/blog');
define('RSS_FEED_ALTERNATIVE', 'Leider k&ouml;nnen die aktuellen Neuigkeiten nicht im RSS Feed dargestellt werden. Bitte besuchen sie unseren Blog unter <a href="'.RSS_FEED_LINK.'">www.modified-shop.org/blog</a> um wichtige Informationen f&uuml;r Shopbetreiber zu diesen Themen zu erfahren: <ul><li>Wichtige Updates und Fixes</li><li>Funktionserweiterungen</li><li>Rechtssprechungen</li><li>Neuigkeiten</li><li>Klatsch und Tratsch</li></ul>');

  require ('includes/application_top.php');
  require_once (DIR_FS_INC.'xtc_validate_vatid_status.inc.php');
  require_once (DIR_FS_INC.'xtc_get_geo_zone_code.inc.php');
  require_once (DIR_FS_INC.'xtc_encrypt_password.inc.php');
  require_once (DIR_FS_INC.'xtc_js_lang.php');
  require_once (DIR_FS_INC.'get_external_content.inc.php');
  require_once (DIR_WS_CLASSES.'currencies.php');
  $currencies = new currencies();

  $time_last_click = 900;
  if (defined('WHOS_ONLINE_TIME_LAST_CLICK')) {
    $time_last_click = (int)WHOS_ONLINE_TIME_LAST_CLICK;
  }
  $xx_mins_ago = (time() - $time_last_click);

  $customers_statuses_array = xtc_get_customers_statuses();
  // remove entries that have expired
  xtc_db_query("delete from " . TABLE_WHOS_ONLINE . " where time_last_click < '" . $xx_mins_ago . "'");
  // get customer stats (exclude admin, restrict to current language
  $customers_query = xtc_db_query('-- admin/start.php
                                   SELECT cs.customers_status_name cust_group, count(*) cust_count
                                     FROM ' . TABLE_CUSTOMERS . ' c
                                     JOIN ' . TABLE_CUSTOMERS_STATUS . ' cs ON cs.customers_status_id = c.customers_status
                                    WHERE c.customers_status > 0
                                      AND cs.language_id = ' . (int)$_SESSION['languages_id'] . '
                                 GROUP BY 1
                                    UNION
                                   SELECT \'' . TOTAL_CUSTOMERS . '\', count(*)
                                     FROM ' . TABLE_CUSTOMERS . '
                                 ORDER BY 2 DESC');
  // save query result
  $customers = array();
  while ($row = xtc_db_fetch_array($customers_query))
    $customers[] = $row;
  // newsletter
  $newsletter_query = xtc_db_query("-- admin/start.php
                                    SELECT count(*) as count
                                      FROM " . TABLE_NEWSLETTER_RECIPIENTS. "
                                     WHERE mail_status='1'");
  $newsletter = xtc_db_fetch_array($newsletter_query);
  // products
  $products_query = xtc_db_query('-- admin/start.php
                                  SELECT count(if(products_status = 0, products_id, null)) inactive_count,
                                         count(if(products_status = 1, products_id, null)) active_count,
                                         count(*) total_count
                                    FROM ' . TABLE_PRODUCTS);
  $products = xtc_db_fetch_array($products_query);
  // orders (status)
  $orders_query = xtc_db_query('-- admin/start.php
                                SELECT os.orders_status_name status,
                                       coalesce(o.order_count, 0) order_count
                                    FROM ' . TABLE_ORDERS_STATUS . ' os
                               LEFT JOIN (SELECT orders_status, count(*) order_count
                                    FROM ' . TABLE_ORDERS . '
                                GROUP BY 1) o ON o.orders_status = os.orders_status_id
                                   WHERE os.language_id = ' .  (int)$_SESSION['languages_id'] . '
                                ORDER BY os.orders_status_id');
  $orders = array();
  while ($row = xtc_db_fetch_array($orders_query))
    $orders[] = $row;
  // specials
  $specials_query = xtc_db_query('-- admin/start.php
                                  SELECT count(*) as specials_count FROM ' . TABLE_SPECIALS);
  $specials = xtc_db_fetch_array($specials_query);
  // turnover
  $turnover_query = xtc_db_query('-- admin/start.php
                                   SELECT
                                         round(coalesce(sum(if(date(o.date_purchased) = current_date, ot.value, null)), 0), 2) today,
                                         round(coalesce(sum(if(date(o.date_purchased) = current_date - interval 1 day, ot.value, null)), 0), 2) yesterday,
                                         round(coalesce(sum(if(extract(year_month from o.date_purchased) = extract(year_month from current_date), ot.value, null)), 0), 2) this_month,
                                         round(coalesce(sum(if(extract(year_month from o.date_purchased) = extract(year_month from current_date - interval 1 year_month), ot.value, null)), 0), 2) last_month,
                                         round(coalesce(sum(if(extract(year_month from o.date_purchased) = extract(year_month from current_date - interval 1 year_month) and o.orders_status <> 1, ot.value, null)), 0), 2) last_month_paid,
                                         round(coalesce(sum(ot.value), 0), 2) total
                                    FROM ' . TABLE_ORDERS . ' o
                                    JOIN ' . TABLE_ORDERS_TOTAL . ' ot ON ot.orders_id = o.orders_id
                                   WHERE ot.class = \'ot_total\'');
  $turnover = xtc_db_fetch_array($turnover_query);

require (DIR_WS_INCLUDES.'head.php');
?>
  <style type="text/css">
      h1 {
        font-size:18px;
        font-weight:bold;
        padding-left:10px;
      }
      .h2 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 13pt;
        font-weight: bold;
      }
      .h3 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 9pt;
        font-weight: bold;
      }
      .startphp td {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 11px;
        padding:5px;
      }
      .feedtitle a {
        font-size:12px;
        font-weight:bold;
      }
      .feedtitle ul li {
        list-style-type:disc;
      }
  </style>
</head>
<body>
    <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
    <!-- BOF - Tomcraft - 2009-06-16 - Added security check //-->
    <table border="0" width="100%" cellspacing="2" cellpadding="2" class="startphp">
      <tr>
        <td><?php include(DIR_WS_MODULES.FILENAME_SECURITY_CHECK); ?></td>
      </tr>
    </table>
    <!-- EOF - Tomcraft - 2009-06-16 - Added security check //-->
    <!-- body //-->
    <table border="0" width="100%" cellspacing="2" cellpadding="2" class="startphp">
      <tr>
        <td class="columnLeft2" width="<?php echo BOX_WIDTH; ?>" valign="top">
          <table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
            <!-- left_navigation //-->
            <?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
            <!-- left_navigation_eof //-->
          </table>
        </td>
        <!-- body_text //-->
        <td width="100%" valign="top">
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td class="boxCenter" width="100%" valign="top">
                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><h1><?php echo HEADING_TITLE; ?></h1></td>
                  </tr>
                  <tr>
                    <td>
                      <!--  BOF START INFOS STATISTIK -->
                      <table width="100%" border="0" cellspacing="0">
                        <tr>
                          <td width="25%" valign="top">
                            <?php
                              if($admin_access['stats_sales_report'] == 1) {
                            ?>
                            <table width="100%" border="0">
                              <tr>
                                <td style="background:#eee"><strong><?php echo TURNOVER_TODAY; ?>:</strong></td>
                                <td  style="background:#eee" align="right"><?php echo $currencies->format($turnover['today']); ?></td>
                              </tr>
                              <tr>
                                <td style="background:#fff"><strong><?php echo TURNOVER_YESTERDAY; ?>:</strong></td>
                                <td style="background:#fff" align="right"><?php echo $currencies->format($turnover['yesterday']); ?></td>
                              </tr>
                              <tr>
                                <td style="background:#eee"><strong><?php echo TURNOVER_THIS_MONTH; ?>:</strong></td>
                                <td  style="background:#eee" align="right"><?php echo $currencies->format($turnover['this_month']); ?></td>
                              </tr>
                              <tr>
                                <td style="background:#ccc"><strong><?php echo TURNOVER_LAST_MONTH; ?>:</strong></td>
                                <td style="background:#ccc" align="right"><?php echo $currencies->format($turnover['last_month']); ?></td>
                              </tr>
                              <tr>
                                <td style="background:#ccc"><strong><?php echo TURNOVER_LAST_MONTH_PAID; ?>:</strong></td>
                                <td style="background:#ccc" align="right"><?php echo $currencies->format($turnover['last_month_paid']); ?></td>
                              </tr>
                              <tr>
                                <td style="background:#666; color:#FFF"><strong><?php echo TOTAL_TURNOVER; ?>:</strong></td>
                                <td style="background:#666; color:#FFF" align="right"><?php echo $currencies->format($turnover['total']); ?></td>
                              </tr>
                            </table>
                            <?php
                              }
                            ?>
                          </td>
                          <td width="25%" valign="top">
                            <table width="100%">
                              <?php
                              foreach ($customers as $customer) {
                                echo '<tr><td style="background:#e4e4e4"><strong>' . $customer['cust_group'] . ':</strong></td>';
                                echo '<td style="background:#e4e4e4" align="center">' . $customer['cust_count'] . '</td></tr>';
                              }
                              ?>
                              <tr>
                                <td style="background:#e4e4e4"><strong><?php echo TOTAL_SUBSCRIBERS; ?>:</strong></td>
                                <td style="background:#e4e4e4" align="center"><?php echo $newsletter['count']; ?></td>
                              </tr>
                            </table>
                          </td>
                          <td width="25%" valign="top">
                            <table width="100%">
                              <tr>
                                <td style="background:#e4e4e4"><strong><?php echo TOTAL_PRODUCTS_ACTIVE; ?>:</strong></td>
                                <td style="background:#e4e4e4"><?php echo $products['active_count']; ?></td>
                              </tr>
                              <tr>
                                <td style="background:#e4e4e4"><strong><?php echo TOTAL_PRODUCTS_INACTIVE; ?>:</strong></td>
                                <td style="background:#e4e4e4"><?php echo $products['inactive_count']; ?></td>
                              </tr>
                              <tr>
                                <td style="background:#e4e4e4"><strong><?php echo TOTAL_PRODUCTS; ?>:</strong></td>
                                <td style="background:#e4e4e4"><?php echo $products['total_count'] ?></td>
                              </tr>
                              <tr>
                                <td style="background:#e4e4e4"><strong><?php echo TOTAL_SPECIALS; ?>:</strong></td>
                                <td style="background:#e4e4e4"><?php echo $specials['specials_count']; ?></td>
                              </tr>
                            </table>
                          </td>
                          <td width="25%" valign="top">
                            <table width="100%">
                              <?php
                              foreach ($orders as $order) {
                                echo '<tr><td style="background:#e4e4e4"><strong>' . $order['status'] . ':</strong></td>';
                                echo '<td style="background:#e4e4e4">' . $order['order_count'] . '</td></tr>';
                              }
                              ?>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <!--  EOF START INFOS STATISTIK -->
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table valign="top" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                        <tr>
                          <td>
                            <!--  BOF START INFOS USER ONLINE + NEUE KUNDEN  + LETZTE BESTELLUNGEN +  NEWSFEED-->
                            <table border="0" width="100%" cellspacing="0">
                              <tr>
                                <td width="48%" class="infoBoxHeading" style="border: 1px solid #b40076; border-bottom: 1px solid #b40076;"><strong><?php echo TABLE_CAPTION_USERS_ONLINE; ?></strong></td>
                                <td width="4%"><p style="margin-left: 3px"></p></td>
                                <td width="48%" class="infoBoxHeading" style="border: 1px solid #b40076; border-bottom: 1px solid #b40076;"><font face="Verdana"><strong><?php echo TABLE_CAPTION_NEWSFEED; ?></strong> <a href="<?php echo RSS_FEED_LINK; ?>" target="_blank">modified eCommerce Shopsoftware - Blog</a></font></td>
                              </tr>
                              <tr>
                                <td style="background: #F9F0F1; border: 1px solid #b40076;" height="200" valign="top">&nbsp;<em><font face="Verdana" color="#7691A2"><?php echo TABLE_CAPTION_USERS_ONLINE_HINT; ?></font></em>
                                  <table border="0" width="98%" cellspacing="0" cellpadding="0">
                                    <tr class="dataTableHeadingRow">
                                      <td class="dataTableHeadingContent" bgcolor="#D9D9D9" height="20" width="22%"><strong> <font face="Verdana"><?php echo TABLE_HEADING_USERS_ONLINE_SINCE; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" bgcolor="#D9D9D9" height="20" width="33%"><strong> <font face="Verdana"><?php echo TABLE_HEADING_USERS_ONLINE_NAME; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" align="center" bgcolor="#D9D9D9" height="20" width="33%"><strong> <font face="Verdana"><?php echo TABLE_HEADING_USERS_ONLINE_LAST_CLICK; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" align="center" bgcolor="#D9D9D9" height="20" width="33%"><strong><font face="Verdana"><?php echo TABLE_HEADING_USERS_ONLINE_INFO; ?></font></strong></td>
                                    </tr>
                                    <?php
                                    $whos_online_query = xtc_db_query('-- admin/start.php
                                                                       SELECT customer_id,
                                                                              full_name,
                                                                              ip_address,
                                                                              time_entry,
                                                                              time_last_click,
                                                                              last_page_url,
                                                                              session_id
                                                                         FROM ' . TABLE_WHOS_ONLINE .'
                                                                     ORDER BY time_last_click DESC');
                                    $info='';
                                    while ($whos_online = xtc_db_fetch_array($whos_online_query)) {
                                      $time_online = (time() - $whos_online['time_entry']);
                                      if ((!isset($_GET['info']) || (isset($_GET['info']) && ($_GET['info'] == $whos_online['session_id']))) && !isset($info) ) {
                                        $info = $whos_online['session_id'];
                                      }
                                      ?>
                                      <tr>
                                        <td class="dataTableContent" width="22%"><font face="Verdana"> <a href="whos_online.php?info=<?php echo $whos_online['session_id']; ?>"><?php echo gmdate('H:i:s', $time_online); ?></a></font></td>
                                        <td class="dataTableContent" width="33%"><font face="Verdana"> <a href="whos_online.php?info=<?php echo $whos_online['session_id']; ?>"><?php echo $whos_online['full_name']; ?></a></font></td>
                                        <td class="dataTableContent" align="center" width="33%"><font face="Verdana"> <a href="whos_online.php?info=<?php echo $whos_online['session_id']; ?>"><?php echo date('H:i:s', $whos_online['time_last_click']); ?></a></font></td>
                                        <td class="dataTableContent" align="center" width="33%"> <a href="whos_online.php?info=<?php echo $whos_online['session_id']; ?>"> <font face="Verdana" color="#800000"><strong><?php echo TABLE_CELL_USERS_ONLINE_INFO; ?></strong></font></a></td>
                                      </tr>
                                      <?php
                                    }
                                    ?>
                                  </table>
                                </td>
                                <td width="4%">&nbsp;</td>
                                <td style="background: #F9F0F1; border: 1px solid #b40076;" height="200" valign="top">
                                  <table border="0" width="98%" cellspacing="0" cellpadding="0">
                                    <?php        
                                    $feed = get_external_content('http://www.modified-shop.org/feed/', 2);    
                                    if ($feed && class_exists('SimpleXmlElement')) {
                                      $rss = new SimpleXmlElement($feed, LIBXML_NOCDATA);
                                      $rss->addAttribute('encoding', 'UTF-8');
                                      ?>
                                      <div style="background:#F0F1F1;font-size:11px; border:1px solid #999; padding:5px; font-weight: 700" align="left">
                                        <div style="width:40px; height:100%; float:left;"><img src='http://images.modified-shop.org/copyright.gif' border='0' alt=''></div><a target="_blank" href="<?php echo $rss->channel->link; ?>"><?php echo $rss->channel->title; ?></a>
                                        <br/>
                                        <?php echo $rss->channel->description; ?>
                                      </div>
                                      <br/>
                                      <?php        
                                      for ($i=0; $i<=3; $i++) {
                                      ?>
                                        <div class="feedtitle" align="left" style="padding:5px;font-size:11px;">
                                          <a target="_blank" href="<?php echo $rss->channel->item[$i]->link; ?>"><?php echo $rss->channel->item[$i]->title; ?></a>
                                          <br/>
                                          <?php echo $rss->channel->item[$i]->description; ?>
                                        </div>
                                        <hr noshade="noshade">
                                      <?php
                                      }
                                    } else {
                                    ?>
                                      <div style="background:#F0F1F1;font-size:11px; border:1px solid #999; padding:5px; font-weight: 700" align="left">
                                        <div style="width:40px; height:100%; float:left;"><img src='http://images.modified-shop.org/copyright.gif' border='0' alt=''></div><a target="_blank" href="<?php echo RSS_FEED_LINK; ?>"><?php echo RSS_FEED_TITLE; ?></a>
                                        <br/>
                                        <?php echo RSS_FEED_DESCRIPTION; ?>
                                      </div>
                                      <br/>
                                      <div class="feedtitle" align="left" style="padding:5px;font-size:11px;">
                                        <?php echo RSS_FEED_ALTERNATIVE; ?>
                                      </div>
                                    <?php  
                                    }
                                    ?>
                                  </table>
                                </td>
                              </tr>
                              <tr>
                                <td width="48%">&nbsp;</td>
                                <td width="4%">&nbsp;</td>
                                <td width="48%">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="48%" class="infoBoxHeading" style="border: 1px solid #b40076; border-bottom: 1px solid #b40076;"><span style="margin-left: 3px"><font face="Verdana"><strong><?php echo TABLE_CAPTION_NEW_ORDERS; ?> <?php echo TABLE_CAPTION_NEW_ORDERS_COMMENT; ?></strong></font></span></td>
                                <td width="4%"><p style="margin-left: 3px"></p></td>
                                <td width="48%" class="infoBoxHeading" style="border: 1px solid #b40076; border-bottom: 1px solid #b40076;"><span style="margin-left: 3px"><font face="Verdana"><strong><?php echo TABLE_CAPTION_NEW_CUSTOMERS; ?> </strong><?php echo TABLE_CAPTION_NEW_CUSTOMERS_COMMENT; ?></font></span></td>
                              </tr>
                              <tr>
                                <td style="background: #F9F0F1; border: 1px solid #b40076; height: 200px;" valign="top">
                                  <table border="0" width="98%" cellspacing="0" cellpadding="0">
                                    <tr class="dataTableHeadingRow">
                                      <td class="dataTableHeadingContent" bgcolor="#D9D9D9" height="20" width="25%"><strong> <font face="Verdana"><?php echo TABLE_HEADING_NEW_ORDERS_ORDER_NUMBER; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" bgcolor="#D9D9D9" height="20" width="25%"><p align="center"> <strong><font face="Verdana"><?php echo TABLE_HEADING_NEW_ORDERS_ORDER_DATE; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" align="center" bgcolor="#D9D9D9" height="20" width="25%"><p align="center"> <strong><font face="Verdana"><?php echo TABLE_HEADING_NEW_ORDERS_CUSTOMERS_NAME; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" align="center" bgcolor="#D9D9D9" height="20" width="12%"><p align="center"><strong><font face="Verdana"><?php echo TABLE_HEADING_NEW_ORDERS_EDIT; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" align="center" bgcolor="#D9D9D9" height="20" width="12%"><p align="center"><strong><font face="Verdana"><?php echo TABLE_HEADING_NEW_ORDERS_DELETE; ?></font></strong></td>
                                    </tr>
                                    <?php
                                    $abfrage = xtc_db_query('-- admin/start.php
                                                             SELECT orders_id,
                                                                    date_purchased,
                                                                    delivery_name
                                                               FROM ' . TABLE_ORDERS . '
                                                              ORDER BY orders_id DESC
                                                              LIMIT 20');
                                    while($row = xtc_db_fetch_array($abfrage)){
                                      ?>
                                      <tr>
                                        <td class="dataTableContent" width="25%"><font face="Verdana"><?php echo $row['orders_id']; ?></font></td>
                                        <td class="dataTableContent" width="25%"><p align="center"> <font face="Verdana"><?php echo $row['date_purchased']; ?></font></td>
                                        <td class="dataTableContent" align="center" width="25%"><font face="Verdana"><?php echo $row['delivery_name']; ?></font></td>
                                        <td class="dataTableContent" align="center" width="12%"><strong> <a href="orders.php?page=1&oID=<?php echo $row['orders_id']; ?>&action=edit"> <font face="Verdana" color="#7691A2"><strong><?php echo TABLE_CELL_NEW_CUSTOMERS_EDIT; ?></strong></font></a></strong></td>
                                        <td class="dataTableContent" align="center" width="12%"> <a href="orders.php?page=1&oID=<?php echo $row['orders_id']; ?>&action=delete"> <font face="Verdana" color="#800000"><strong><?php echo TABLE_CELL_NEW_CUSTOMERS_DELETE; ?></strong></font></a></td>
                                      </tr>
                                      <?php
                                    }
                                    ?>
                                    <tr>
                                      <td class="smallText" colspan="5"><em> <font face="Verdana"></font></em></td>
                                    </tr>
                                  </table>
                                </td>
                                <td>&nbsp;</td>
                                <td style="background: #F9F0F1; border: 1px solid #b40076;" height="200" valign="top">
                                  <table border="0" width="98%" cellspacing="0" cellpadding="0">
                                    <tr class="dataTableHeadingRow">
                                      <td class="dataTableHeadingContent" bgcolor="#D9D9D9" height="20" width="25%"><strong> <font face="Verdana"><?php echo TABLE_HEADING_NEW_CUSTOMERS_LASTNAME; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" bgcolor="#D9D9D9" height="20" width="25%"><strong> <font face="Verdana"><?php echo TABLE_HEADING_NEW_CUSTOMERS_FIRSTNAME; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" align="center" bgcolor="#D9D9D9" height="20" width="25%"><strong> <font face="Verdana"><?php echo TABLE_HEADING_NEW_CUSTOMERS_REGISTERED; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" align="center" bgcolor="#D9D9D9" height="20" width="12%"><strong><font face="Verdana"><?php echo TABLE_HEADING_NEW_CUSTOMERS_EDIT; ?></font></strong></td>
                                      <td class="dataTableHeadingContent" align="center" bgcolor="#D9D9D9" height="20" width="12%"><strong><font face="Verdana"><?php echo TABLE_HEADING_NEW_CUSTOMERS_ORDERS; ?></font></strong></td>
                                    </tr>
                                    <?php
                                    $abfrage = xtc_db_query('-- admin/start.php
                                                            SELECT customers_lastname,
                                                                   customers_firstname,
                                                                   customers_date_added,
                                                                   customers_id
                                                              FROM ' . TABLE_CUSTOMERS . '
                                                          ORDER BY customers_date_added DESC
                                                             LIMIT 15');
                                    while($row = xtc_db_fetch_array($abfrage)){
                                      ?>
                                      <tr>
                                        <td class="dataTableContent" width="25%"><?php echo $row['customers_lastname']; ?></td>
                                        <td class="dataTableContent" width="25%"><?php echo $row['customers_firstname']; ?></td>
                                        <td class="dataTableContent" align="center" width="25%"><?php echo $row['customers_date_added']; ?></td>
                                        <td class="dataTableContent" align="center" width="12%"><strong> <a href="customers.php?page=1&cID=<?php echo $row['customers_id']; ?>&action=edit"> <font face="Verdana" color="#800000"><strong><?php echo TABLE_CELL_NEW_CUSTOMERS_EDIT; ?></strong></font></a></strong></td>
                                        <td class="dataTableContent" align="center" width="12%"> <a href="orders.php?cID=<?php echo $row['customers_id']; ?>"><font color="#7691A2" face="Verdana"><strong><?php echo TABLE_CELL_NEW_CUSTOMERS_ORDERS; ?></strong></font></a></td>
                                      </tr>
                                      <?php
                                    }
                                    ?>
                                  </table>
                               </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="3" style="padding:0px">
                                  <!--  BOF START INFOS GEBURTSTAGSLISTE -->
                                  <table cellpadding="5" cellspacing="0" width="100%" id="table1" class="contentTable">
                                    <tr>
                                      <td class="infoBoxHeading"><span style="margin-left: 3px"></span><font face="Verdana"><strong><?php echo TABLE_CAPTION_BIRTHDAYS; ?></strong></font></span></td>
                                    </tr>
                                  </table>
                                  <table cellpadding="5" cellspacing="0" style="font-family:Verdana; font-size:11px; border: 1px solid #b40076; border-top:0px;" width="100%" id="AutoNumber1">
                                    <tr>
                                      <td width="100%" colspan="2" bgcolor="#F1F1F1" style="border-bottom: 1px solid #CCCCCC"><strong><?php echo TABLE_CELL_BIRTHDAYS_TODAY; ?>:</strong></td>
                                    </tr>
                                    <?php
                                    $ergebnis = xtc_db_query("-- admin/start.php
                                                               SELECT CONCAT(customers_firstname, ' ', customers_lastname) name,
                                                                      customers_dob dob,
                                                                      if(day(customers_dob) = day(current_date), true, false) today
                                                                 FROM " . TABLE_CUSTOMERS . "
                                                                WHERE month(customers_dob) = month(current_date) AND
                                                                      day(customers_dob) >= day(current_date)
                                                             ORDER BY customers_dob");
                                    $this_month = array();
                                    while($row = xtc_db_fetch_array($ergebnis)) {
                                      if ($row['today'] == 1) {
                                        echo '<tr><td width="68%" bgcolor="#F9F0F1">' . $row['name'] . '</td>';
                                        echo '<td width="32%" bgcolor="#F9F0F1">' . xtc_date_long($row['dob']) . '</td></tr>';
                                      } else {
                                        $this_month[] = array('name' => $row['name'], 'dob' => $row['dob']);
                                      }
                                    }
                                    ?>
                                    <tr>
                                      <td width="100%" colspan="2" style="border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC" bgcolor="#F1F1F1"><strong><?php echo TABLE_CELL_BIRTHDAYS_THIS_MONTH; ?>:</strong></td>
                                    </tr>
                                    <?php
                                    foreach($this_month as $row) {
                                      echo '<tr><td width="68%" bgcolor="#F9F0F1">' . $row['name'] . '</td>';
                                      echo '<td width="32%" bgcolor="#F9F0F1">' . xtc_date_long($row['dob']) . '</td></tr>';
                                    }
                                    ?>
                                  </table>
                                  <!--  EOF START INFOS GEBURTSTAGSLISTE -->
                                </td>
                              </tr>
                            </table>
                            <!--  EOF START INFOS USER ONLINE + NEUE KUNDEN  + LETZTE BESTELLUNGEN +  NEWSFEED-->
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
  </body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
