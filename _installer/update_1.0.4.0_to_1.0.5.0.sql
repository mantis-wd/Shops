# -----------------------------------------------------------------------------------------
#  $Id: update_1.0.4.0_to_1.0.5.0.sql 4200 2013-01-10 19:47:11Z Tomcraft1980 $
#
#  modified eCommerce Shopsoftware
#  http://www.modified-shop.org
#
#  Copyright (c) 2009 - 2013 [www.modified-shop.org]
#  -----------------------------------------------------------------------------------------

#Tomcraft - 2010-02-03 - changed database_version
UPDATE database_version SET version = 'MOD_1.0.5.0';

# BOF - Tomcraft - 2010-07-02 - Bugfix on r763 (Update Countries (delete Yugoslavia, add Serbia and Monetegro))
TRUNCATE TABLE countries;
INSERT INTO countries VALUES (1,'Afghanistan','AF','AFG',1,1);
INSERT INTO countries VALUES (2,'Albania','AL','ALB',1,1);
INSERT INTO countries VALUES (3,'Algeria','DZ','DZA',1,1);
INSERT INTO countries VALUES (4,'American Samoa','AS','ASM',1,1);
INSERT INTO countries VALUES (5,'Andorra','AD','AND',1,1);
INSERT INTO countries VALUES (6,'Angola','AO','AGO',1,1);
INSERT INTO countries VALUES (7,'Anguilla','AI','AIA',1,1);
INSERT INTO countries VALUES (8,'Antarctica','AQ','ATA',1,1);
INSERT INTO countries VALUES (9,'Antigua and Barbuda','AG','ATG',1,1);
INSERT INTO countries VALUES (10,'Argentina','AR','ARG',1,1);
INSERT INTO countries VALUES (11,'Armenia','AM','ARM',1,1);
INSERT INTO countries VALUES (12,'Aruba','AW','ABW',1,1);
INSERT INTO countries VALUES (13,'Australia','AU','AUS',1,1);
INSERT INTO countries VALUES (14,'Austria','AT','AUT',5,1);
INSERT INTO countries VALUES (15,'Azerbaijan','AZ','AZE',1,1);
INSERT INTO countries VALUES (16,'Bahamas','BS','BHS',1,1);
INSERT INTO countries VALUES (17,'Bahrain','BH','BHR',1,1);
INSERT INTO countries VALUES (18,'Bangladesh','BD','BGD',1,1);
INSERT INTO countries VALUES (19,'Barbados','BB','BRB',1,1);
INSERT INTO countries VALUES (20,'Belarus','BY','BLR',1,1);
INSERT INTO countries VALUES (21,'Belgium','BE','BEL',1,1);
INSERT INTO countries VALUES (22,'Belize','BZ','BLZ',1,1);
INSERT INTO countries VALUES (23,'Benin','BJ','BEN',1,1);
INSERT INTO countries VALUES (24,'Bermuda','BM','BMU',1,1);
INSERT INTO countries VALUES (25,'Bhutan','BT','BTN',1,1);
INSERT INTO countries VALUES (26,'Bolivia','BO','BOL',1,1);
INSERT INTO countries VALUES (27,'Bosnia and Herzegowina','BA','BIH',1,1);
INSERT INTO countries VALUES (28,'Botswana','BW','BWA',1,1);
INSERT INTO countries VALUES (29,'Bouvet Island','BV','BVT',1,1);
INSERT INTO countries VALUES (30,'Brazil','BR','BRA',1,1);
INSERT INTO countries VALUES (31,'British Indian Ocean Territory','IO','IOT',1,1);
INSERT INTO countries VALUES (32,'Brunei Darussalam','BN','BRN',1,1);
INSERT INTO countries VALUES (33,'Bulgaria','BG','BGR',1,1);
INSERT INTO countries VALUES (34,'Burkina Faso','BF','BFA',1,1);
INSERT INTO countries VALUES (35,'Burundi','BI','BDI',1,1);
INSERT INTO countries VALUES (36,'Cambodia','KH','KHM',1,1);
INSERT INTO countries VALUES (37,'Cameroon','CM','CMR',1,1);
INSERT INTO countries VALUES (38,'Canada','CA','CAN',1,1);
INSERT INTO countries VALUES (39,'Cape Verde','CV','CPV',1,1);
INSERT INTO countries VALUES (40,'Cayman Islands','KY','CYM',1,1);
INSERT INTO countries VALUES (41,'Central African Republic','CF','CAF',1,1);
INSERT INTO countries VALUES (42,'Chad','TD','TCD',1,1);
INSERT INTO countries VALUES (43,'Chile','CL','CHL',1,1);
INSERT INTO countries VALUES (44,'China','CN','CHN',1,1);
INSERT INTO countries VALUES (45,'Christmas Island','CX','CXR',1,1);
INSERT INTO countries VALUES (46,'Cocos (Keeling) Islands','CC','CCK',1,1);
INSERT INTO countries VALUES (47,'Colombia','CO','COL',1,1);
INSERT INTO countries VALUES (48,'Comoros','KM','COM',1,1);
INSERT INTO countries VALUES (49,'Congo','CG','COG',1,1);
INSERT INTO countries VALUES (50,'Cook Islands','CK','COK',1,1);
INSERT INTO countries VALUES (51,'Costa Rica','CR','CRI',1,1);
INSERT INTO countries VALUES (52,'Cote D\'Ivoire','CI','CIV',1,1);
INSERT INTO countries VALUES (53,'Croatia','HR','HRV',1,1);
INSERT INTO countries VALUES (54,'Cuba','CU','CUB',1,1);
INSERT INTO countries VALUES (55,'Cyprus','CY','CYP',1,1);
INSERT INTO countries VALUES (56,'Czech Republic','CZ','CZE',1,1);
INSERT INTO countries VALUES (57,'Denmark','DK','DNK',1,1);
INSERT INTO countries VALUES (58,'Djibouti','DJ','DJI',1,1);
INSERT INTO countries VALUES (59,'Dominica','DM','DMA',1,1);
INSERT INTO countries VALUES (60,'Dominican Republic','DO','DOM',1,1);
INSERT INTO countries VALUES (61,'East Timor','TP','TMP',1,1);
INSERT INTO countries VALUES (62,'Ecuador','EC','ECU',1,1);
INSERT INTO countries VALUES (63,'Egypt','EG','EGY',1,1);
INSERT INTO countries VALUES (64,'El Salvador','SV','SLV',1,1);
INSERT INTO countries VALUES (65,'Equatorial Guinea','GQ','GNQ',1,1);
INSERT INTO countries VALUES (66,'Eritrea','ER','ERI',1,1);
INSERT INTO countries VALUES (67,'Estonia','EE','EST',1,1);
INSERT INTO countries VALUES (68,'Ethiopia','ET','ETH',1,1);
INSERT INTO countries VALUES (69,'Falkland Islands (Malvinas)','FK','FLK',1,1);
INSERT INTO countries VALUES (70,'Faroe Islands','FO','FRO',1,1);
INSERT INTO countries VALUES (71,'Fiji','FJ','FJI',1,1);
INSERT INTO countries VALUES (72,'Finland','FI','FIN',1,1);
INSERT INTO countries VALUES (73,'France','FR','FRA',1,1);
INSERT INTO countries VALUES (74,'France, Metropolitan','FX','FXX',1,1);
INSERT INTO countries VALUES (75,'French Guiana','GF','GUF',1,1);
INSERT INTO countries VALUES (76,'French Polynesia','PF','PYF',1,1);
INSERT INTO countries VALUES (77,'French Southern Territories','TF','ATF',1,1);
INSERT INTO countries VALUES (78,'Gabon','GA','GAB',1,1);
INSERT INTO countries VALUES (79,'Gambia','GM','GMB',1,1);
INSERT INTO countries VALUES (80,'Georgia','GE','GEO',1,1);
INSERT INTO countries VALUES (81,'Germany','DE','DEU',5,1);
INSERT INTO countries VALUES (82,'Ghana','GH','GHA',1,1);
INSERT INTO countries VALUES (83,'Gibraltar','GI','GIB',1,1);
INSERT INTO countries VALUES (84,'Greece','GR','GRC',1,1);
INSERT INTO countries VALUES (85,'Greenland','GL','GRL',1,1);
INSERT INTO countries VALUES (86,'Grenada','GD','GRD',1,1);
INSERT INTO countries VALUES (87,'Guadeloupe','GP','GLP',1,1);
INSERT INTO countries VALUES (88,'Guam','GU','GUM',1,1);
INSERT INTO countries VALUES (89,'Guatemala','GT','GTM',1,1);
INSERT INTO countries VALUES (90,'Guinea','GN','GIN',1,1);
INSERT INTO countries VALUES (91,'Guinea-bissau','GW','GNB',1,1);
INSERT INTO countries VALUES (92,'Guyana','GY','GUY',1,1);
INSERT INTO countries VALUES (93,'Haiti','HT','HTI',1,1);
INSERT INTO countries VALUES (94,'Heard and Mc Donald Islands','HM','HMD',1,1);
INSERT INTO countries VALUES (95,'Honduras','HN','HND',1,1);
INSERT INTO countries VALUES (96,'Hong Kong','HK','HKG',1,1);
INSERT INTO countries VALUES (97,'Hungary','HU','HUN',1,1);
INSERT INTO countries VALUES (98,'Iceland','IS','ISL',1,1);
INSERT INTO countries VALUES (99,'India','IN','IND',1,1);
INSERT INTO countries VALUES (100,'Indonesia','ID','IDN',1,1);
INSERT INTO countries VALUES (101,'Iran (Islamic Republic of)','IR','IRN',1,1);
INSERT INTO countries VALUES (102,'Iraq','IQ','IRQ',1,1);
INSERT INTO countries VALUES (103,'Ireland','IE','IRL',1,1);
INSERT INTO countries VALUES (104,'Israel','IL','ISR',1,1);
INSERT INTO countries VALUES (105,'Italy','IT','ITA',1,1);
INSERT INTO countries VALUES (106,'Jamaica','JM','JAM',1,1);
INSERT INTO countries VALUES (107,'Japan','JP','JPN',1,1);
INSERT INTO countries VALUES (108,'Jordan','JO','JOR',1,1);
INSERT INTO countries VALUES (109,'Kazakhstan','KZ','KAZ',1,1);
INSERT INTO countries VALUES (110,'Kenya','KE','KEN',1,1);
INSERT INTO countries VALUES (111,'Kiribati','KI','KIR',1,1);
INSERT INTO countries VALUES (112,'Korea, Democratic People\'s Republic of','KP','PRK',1,1);
INSERT INTO countries VALUES (113,'Korea, Republic of','KR','KOR',1,1);
INSERT INTO countries VALUES (114,'Kuwait','KW','KWT',1,1);
INSERT INTO countries VALUES (115,'Kyrgyzstan','KG','KGZ',1,1);
INSERT INTO countries VALUES (116,'Lao People\'s Democratic Republic','LA','LAO',1,1);
INSERT INTO countries VALUES (117,'Latvia','LV','LVA',1,1);
INSERT INTO countries VALUES (118,'Lebanon','LB','LBN',1,1);
INSERT INTO countries VALUES (119,'Lesotho','LS','LSO',1,1);
INSERT INTO countries VALUES (120,'Liberia','LR','LBR',1,1);
INSERT INTO countries VALUES (121,'Libyan Arab Jamahiriya','LY','LBY',1,1);
INSERT INTO countries VALUES (122,'Liechtenstein','LI','LIE',1,1);
INSERT INTO countries VALUES (123,'Lithuania','LT','LTU',1,1);
INSERT INTO countries VALUES (124,'Luxembourg','LU','LUX',1,1);
INSERT INTO countries VALUES (125,'Macau','MO','MAC',1,1);
INSERT INTO countries VALUES (126,'Macedonia, The Former Yugoslav Republic of','MK','MKD',1,1);
INSERT INTO countries VALUES (127,'Madagascar','MG','MDG',1,1);
INSERT INTO countries VALUES (128,'Malawi','MW','MWI',1,1);
INSERT INTO countries VALUES (129,'Malaysia','MY','MYS',1,1);
INSERT INTO countries VALUES (130,'Maldives','MV','MDV',1,1);
INSERT INTO countries VALUES (131,'Mali','ML','MLI',1,1);
INSERT INTO countries VALUES (132,'Malta','MT','MLT',1,1);
INSERT INTO countries VALUES (133,'Marshall Islands','MH','MHL',1,1);
INSERT INTO countries VALUES (134,'Martinique','MQ','MTQ',1,1);
INSERT INTO countries VALUES (135,'Mauritania','MR','MRT',1,1);
INSERT INTO countries VALUES (136,'Mauritius','MU','MUS',1,1);
INSERT INTO countries VALUES (137,'Mayotte','YT','MYT',1,1);
INSERT INTO countries VALUES (138,'Mexico','MX','MEX',1,1);
INSERT INTO countries VALUES (139,'Micronesia, Federated States of','FM','FSM',1,1);
INSERT INTO countries VALUES (140,'Moldova, Republic of','MD','MDA',1,1);
INSERT INTO countries VALUES (141,'Monaco','MC','MCO',1,1);
INSERT INTO countries VALUES (142,'Mongolia','MN','MNG',1,1);
INSERT INTO countries VALUES (143,'Montserrat','MS','MSR',1,1);
INSERT INTO countries VALUES (144,'Morocco','MA','MAR',1,1);
INSERT INTO countries VALUES (145,'Mozambique','MZ','MOZ',1,1);
INSERT INTO countries VALUES (146,'Myanmar','MM','MMR',1,1);
INSERT INTO countries VALUES (147,'Namibia','NA','NAM',1,1);
INSERT INTO countries VALUES (148,'Nauru','NR','NRU',1,1);
INSERT INTO countries VALUES (149,'Nepal','NP','NPL',1,1);
INSERT INTO countries VALUES (150,'Netherlands','NL','NLD',1,1);
INSERT INTO countries VALUES (151,'Netherlands Antilles','AN','ANT',1,1);
INSERT INTO countries VALUES (152,'New Caledonia','NC','NCL',1,1);
INSERT INTO countries VALUES (153,'New Zealand','NZ','NZL',1,1);
INSERT INTO countries VALUES (154,'Nicaragua','NI','NIC',1,1);
INSERT INTO countries VALUES (155,'Niger','NE','NER',1,1);
INSERT INTO countries VALUES (156,'Nigeria','NG','NGA',1,1);
INSERT INTO countries VALUES (157,'Niue','NU','NIU',1,1);
INSERT INTO countries VALUES (158,'Norfolk Island','NF','NFK',1,1);
INSERT INTO countries VALUES (159,'Northern Mariana Islands','MP','MNP',1,1);
INSERT INTO countries VALUES (160,'Norway','NO','NOR',1,1);
INSERT INTO countries VALUES (161,'Oman','OM','OMN',1,1);
INSERT INTO countries VALUES (162,'Pakistan','PK','PAK',1,1);
INSERT INTO countries VALUES (163,'Palau','PW','PLW',1,1);
INSERT INTO countries VALUES (164,'Panama','PA','PAN',1,1);
INSERT INTO countries VALUES (165,'Papua New Guinea','PG','PNG',1,1);
INSERT INTO countries VALUES (166,'Paraguay','PY','PRY',1,1);
INSERT INTO countries VALUES (167,'Peru','PE','PER',1,1);
INSERT INTO countries VALUES (168,'Philippines','PH','PHL',1,1);
INSERT INTO countries VALUES (169,'Pitcairn','PN','PCN',1,1);
INSERT INTO countries VALUES (170,'Poland','PL','POL',1,1);
INSERT INTO countries VALUES (171,'Portugal','PT','PRT',1,1);
INSERT INTO countries VALUES (172,'Puerto Rico','PR','PRI',1,1);
INSERT INTO countries VALUES (173,'Qatar','QA','QAT',1,1);
INSERT INTO countries VALUES (174,'Reunion','RE','REU',1,1);
INSERT INTO countries VALUES (175,'Romania','RO','ROM',1,1);
INSERT INTO countries VALUES (176,'Russian Federation','RU','RUS',1,1);
INSERT INTO countries VALUES (177,'Rwanda','RW','RWA',1,1);
INSERT INTO countries VALUES (178,'Saint Kitts and Nevis','KN','KNA',1,1);
INSERT INTO countries VALUES (179,'Saint Lucia','LC','LCA',1,1);
INSERT INTO countries VALUES (180,'Saint Vincent and the Grenadines','VC','VCT',1,1);
INSERT INTO countries VALUES (181,'Samoa','WS','WSM',1,1);
INSERT INTO countries VALUES (182,'San Marino','SM','SMR',1,1);
INSERT INTO countries VALUES (183,'Sao Tome and Principe','ST','STP',1,1);
INSERT INTO countries VALUES (184,'Saudi Arabia','SA','SAU',1,1);
INSERT INTO countries VALUES (185,'Senegal','SN','SEN',1,1);
INSERT INTO countries VALUES (186,'Seychelles','SC','SYC',1,1);
INSERT INTO countries VALUES (187,'Sierra Leone','SL','SLE',1,1);
INSERT INTO countries VALUES (188,'Singapore','SG','SGP', '4','1');
INSERT INTO countries VALUES (189,'Slovakia (Slovak Republic)','SK','SVK',1,1);
INSERT INTO countries VALUES (190,'Slovenia','SI','SVN',1,1);
INSERT INTO countries VALUES (191,'Solomon Islands','SB','SLB',1,1);
INSERT INTO countries VALUES (192,'Somalia','SO','SOM',1,1);
INSERT INTO countries VALUES (193,'South Africa','ZA','ZAF',1,1);
INSERT INTO countries VALUES (194,'South Georgia and the South Sandwich Islands','GS','SGS',1,1);
INSERT INTO countries VALUES (195,'Spain','ES','ESP','3','1');
INSERT INTO countries VALUES (196,'Sri Lanka','LK','LKA',1,1);
INSERT INTO countries VALUES (197,'St. Helena','SH','SHN',1,1);
INSERT INTO countries VALUES (198,'St. Pierre and Miquelon','PM','SPM',1,1);
INSERT INTO countries VALUES (199,'Sudan','SD','SDN',1,1);
INSERT INTO countries VALUES (200,'Suriname','SR','SUR',1,1);
INSERT INTO countries VALUES (201,'Svalbard and Jan Mayen Islands','SJ','SJM',1,1);
INSERT INTO countries VALUES (202,'Swaziland','SZ','SWZ',1,1);
INSERT INTO countries VALUES (203,'Sweden','SE','SWE',1,1);
INSERT INTO countries VALUES (204,'Switzerland','CH','CHE',1,1);
INSERT INTO countries VALUES (205,'Syrian Arab Republic','SY','SYR',1,1);
INSERT INTO countries VALUES (206,'Taiwan','TW','TWN',1,1);
INSERT INTO countries VALUES (207,'Tajikistan','TJ','TJK',1,1);
INSERT INTO countries VALUES (208,'Tanzania, United Republic of','TZ','TZA',1,1);
INSERT INTO countries VALUES (209,'Thailand','TH','THA',1,1);
INSERT INTO countries VALUES (210,'Togo','TG','TGO',1,1);
INSERT INTO countries VALUES (211,'Tokelau','TK','TKL',1,1);
INSERT INTO countries VALUES (212,'Tonga','TO','TON',1,1);
INSERT INTO countries VALUES (213,'Trinidad and Tobago','TT','TTO',1,1);
INSERT INTO countries VALUES (214,'Tunisia','TN','TUN',1,1);
INSERT INTO countries VALUES (215,'Turkey','TR','TUR',1,1);
INSERT INTO countries VALUES (216,'Turkmenistan','TM','TKM',1,1);
INSERT INTO countries VALUES (217,'Turks and Caicos Islands','TC','TCA',1,1);
INSERT INTO countries VALUES (218,'Tuvalu','TV','TUV',1,1);
INSERT INTO countries VALUES (219,'Uganda','UG','UGA',1,1);
INSERT INTO countries VALUES (220,'Ukraine','UA','UKR',1,1);
INSERT INTO countries VALUES (221,'United Arab Emirates','AE','ARE',1,1);
INSERT INTO countries VALUES (222,'United Kingdom','GB','GBR',1,1);
INSERT INTO countries VALUES (223,'United States','US','USA', '2','1');
INSERT INTO countries VALUES (224,'United States Minor Outlying Islands','UM','UMI',1,1);
INSERT INTO countries VALUES (225,'Uruguay','UY','URY',1,1);
INSERT INTO countries VALUES (226,'Uzbekistan','UZ','UZB',1,1);
INSERT INTO countries VALUES (227,'Vanuatu','VU','VUT',1,1);
INSERT INTO countries VALUES (228,'Vatican City State (Holy See)','VA','VAT',1,1);
INSERT INTO countries VALUES (229,'Venezuela','VE','VEN',1,1);
INSERT INTO countries VALUES (230,'Viet Nam','VN','VNM',1,1);
INSERT INTO countries VALUES (231,'Virgin Islands (British)','VG','VGB',1,1);
INSERT INTO countries VALUES (232,'Virgin Islands (U.S.)','VI','VIR',1,1);
INSERT INTO countries VALUES (233,'Wallis and Futuna Islands','WF','WLF',1,1);
INSERT INTO countries VALUES (234,'Western Sahara','EH','ESH',1,1);
INSERT INTO countries VALUES (235,'Yemen','YE','YEM',1,1);
# BOF - Tomcraft - 2010-07-02 - Deleted Yugoslavia
#INSERT INTO countries VALUES (236,'Yugoslavia','YU','YUG',1,1);
# EOF - Tomcraft - 2010-07-02 - Deleted Yugoslavia
INSERT INTO countries VALUES (237,'Zaire','ZR','ZAR',1,1);
INSERT INTO countries VALUES (238,'Zambia','ZM','ZMB',1,1);
INSERT INTO countries VALUES (239,'Zimbabwe','ZW','ZWE',1,1);
# BOF - Tomcraft - 2010-07-02 - Added Serbia & Montenegro
INSERT INTO countries VALUES (240, 'Serbia','RS','SRB',1,1);
INSERT INTO countries VALUES (241, 'Montenegro','ME','MNE',1,1);
# EOF - Tomcraft - 2010-07-02 - Added Serbia & Montenegro
# EOF - Tomcraft - 2010-07-02 - Bugfix on r763 (Update Countries (delete Yugoslavia, add Serbia and Monetegro))

# BOF - DokuMan - 2010-07-07 - PRODUCT_IMAGE_THUMBNAIL_DROP_SHADOW, PRODUCT_IMAGE_INFO_DROP_SHADOW, PRODUCT_IMAGE_POPUP_DROP_SHADOW
UPDATE configuration SET configuration_key = 'PRODUCT_IMAGE_THUMBNAIL_DROP_SHADOW', last_modified = NOW() WHERE configuration_key = 'PRODUCT_IMAGE_THUMBNAIL_DROP_SHADDOW';
UPDATE configuration SET configuration_key = 'PRODUCT_IMAGE_INFO_DROP_SHADOW', last_modified = NOW() WHERE configuration_key = 'PRODUCT_IMAGE_INFO_DROP_SHADDOW';
UPDATE configuration SET configuration_key = 'PRODUCT_IMAGE_POPUP_DROP_SHADOW', last_modified = NOW() WHERE configuration_key = 'PRODUCT_IMAGE_POPUP_DROP_SHADDOW';
# EOF - DokuMan - 2010-07-07 - PRODUCT_IMAGE_THUMBNAIL_DROP_SHADOW, PRODUCT_IMAGE_INFO_DROP_SHADOW, PRODUCT_IMAGE_POPUP_DROP_SHADOW

#DokuMan - 2010-07-07 - change PRODUCT_FILTER_LIST to true/false
UPDATE configuration SET set_function = 'xtc_cfg_select_option(array(\'true\', \'false\'),', last_modified = NOW() WHERE configuration_key = 'PRODUCT_LIST_FILTER';
UPDATE configuration SET configuration_value = 'true', last_modified = NOW() WHERE configuration_key = 'PRODUCT_LIST_FILTER';

#DokuMan - 2010-07-07 - whos_online table too short customer_id, session_id too long
ALTER TABLE whos_online MODIFY customer_id INT(11) DEFAULT NULL;
ALTER TABLE whos_online MODIFY session_id VARCHAR(32) NOT NULL;

#web28 - 2010-07-07 - set shop offline
ALTER TABLE admin_access ADD shop_offline INT(1) DEFAULT 0 NOT NULL;
UPDATE admin_access SET shop_offline = 1 WHERE customers_id = '1' LIMIT 1;

#web28 - 2010-07-07 - set shop offline
DROP TABLE IF EXISTS shop_configuration;
CREATE TABLE shop_configuration (
  configuration_id int(11) NOT NULL AUTO_INCREMENT,
  configuration_key varchar(255) NOT NULL DEFAULT '',
  configuration_value text NOT NULL,
  PRIMARY KEY (configuration_id),
  KEY configuration_key (configuration_key)
) ENGINE=MyISAM;

INSERT INTO shop_configuration (configuration_id, configuration_key, configuration_value) VALUES (NULL, 'SHOP_OFFLINE', '');
INSERT INTO shop_configuration (configuration_id, configuration_key, configuration_value) VALUES (NULL, 'SHOP_OFFLINE_MSG', '<p style="text-align: center;"><span style="font-size: large;"><font face="Arial">Unser Shop ist aufgrund von Wartungsarbeiten im Moment nicht erreichbar.<br /></font><font face="Arial">Bitte besuchen Sie uns zu einem sp&auml;teren Zeitpunkt noch einmal.<br /><br /><br /><br /></font></span><font><font><a href="login_admin.php"><font color="#808080">Login</font></a></font></font><span style="font-size: large;"><font face="Arial"><br /></font></span></p>');

#web28 - 2010-07-07 - FIX special character
#France
DELETE FROM zones WHERE zone_country_id = 73;
INSERT INTO zones VALUES ('',73,'Et','Etranger');
INSERT INTO zones VALUES ('',73,'01','Ain');
INSERT INTO zones VALUES ('',73,'02','Aisne');
INSERT INTO zones VALUES ('',73,'03','Allier');
INSERT INTO zones VALUES ('',73,'04','Alpes de Haute Provence');
INSERT INTO zones VALUES ('',73,'05','Hautes-Alpes');
INSERT INTO zones VALUES ('',73,'06','Alpes Maritimes');
INSERT INTO zones VALUES ('',73,'07','Ardèche');
INSERT INTO zones VALUES ('',73,'08','Ardennes');
INSERT INTO zones VALUES ('',73,'09','Ariège');
INSERT INTO zones VALUES ('',73,'10','Aube');
INSERT INTO zones VALUES ('',73,'11','Aude');
INSERT INTO zones VALUES ('',73,'12','Aveyron');
INSERT INTO zones VALUES ('',73,'13','Bouches-du-Rhône');
INSERT INTO zones VALUES ('',73,'14','Calvados');
INSERT INTO zones VALUES ('',73,'15','Cantal');
INSERT INTO zones VALUES ('',73,'16','Charente');
INSERT INTO zones VALUES ('',73,'17','Charente Maritime');
INSERT INTO zones VALUES ('',73,'18','Cher');
INSERT INTO zones VALUES ('',73,'19','Corrèze');
INSERT INTO zones VALUES ('',73,'2A','Corse du Sud');
INSERT INTO zones VALUES ('',73,'2B','Haute Corse');
INSERT INTO zones VALUES ('',73,'21','Côte-d\'Or');
INSERT INTO zones VALUES ('',73,'22','Côtes-d\'Armor');
INSERT INTO zones VALUES ('',73,'23','Creuse');
INSERT INTO zones VALUES ('',73,'24','Dordogne');
INSERT INTO zones VALUES ('',73,'25','Doubs');
INSERT INTO zones VALUES ('',73,'26','Drôme');
INSERT INTO zones VALUES ('',73,'27','Eure');
INSERT INTO zones VALUES ('',73,'28','Eure et Loir');
INSERT INTO zones VALUES ('',73,'29','Finistère');
INSERT INTO zones VALUES ('',73,'30','Gard');
INSERT INTO zones VALUES ('',73,'31','Haute Garonne');
INSERT INTO zones VALUES ('',73,'32','Gers');
INSERT INTO zones VALUES ('',73,'33','Gironde');
INSERT INTO zones VALUES ('',73,'34','Hérault');
INSERT INTO zones VALUES ('',73,'35','Ille et Vilaine');
INSERT INTO zones VALUES ('',73,'36','Indre');
INSERT INTO zones VALUES ('',73,'37','Indre et Loire');
INSERT INTO zones VALUES ('',73,'38','Isère');
INSERT INTO zones VALUES ('',73,'39','Jura');
INSERT INTO zones VALUES ('',73,'40','Landes');
INSERT INTO zones VALUES ('',73,'41','Loir et Cher');
INSERT INTO zones VALUES ('',73,'42','Loire');
INSERT INTO zones VALUES ('',73,'43','Haute Loire');
INSERT INTO zones VALUES ('',73,'44','Loire Atlantique');
INSERT INTO zones VALUES ('',73,'45','Loiret');
INSERT INTO zones VALUES ('',73,'46','Lot');
INSERT INTO zones VALUES ('',73,'47','Lot et Garonne');
INSERT INTO zones VALUES ('',73,'48','Lozère');
INSERT INTO zones VALUES ('',73,'49','Maine et Loire');
INSERT INTO zones VALUES ('',73,'50','Manche');
INSERT INTO zones VALUES ('',73,'51','Marne');
INSERT INTO zones VALUES ('',73,'52','Haute Marne');
INSERT INTO zones VALUES ('',73,'53','Mayenne');
INSERT INTO zones VALUES ('',73,'54','Meurthe et Moselle');
INSERT INTO zones VALUES ('',73,'55','Meuse');
INSERT INTO zones VALUES ('',73,'56','Morbihan');
INSERT INTO zones VALUES ('',73,'57','Moselle');
INSERT INTO zones VALUES ('',73,'58','Nièvre');
INSERT INTO zones VALUES ('',73,'59','Nord');
INSERT INTO zones VALUES ('',73,'60','Oise');
INSERT INTO zones VALUES ('',73,'61','Orne');
INSERT INTO zones VALUES ('',73,'62','Pas de Calais');
INSERT INTO zones VALUES ('',73,'63','Puy-de-Dôme');
INSERT INTO zones VALUES ('',73,'64','Pyrénées-Atlantiques');
INSERT INTO zones VALUES ('',73,'65','Hautes-Pyrénées');
INSERT INTO zones VALUES ('',73,'66','Pyrénées-Orientales');
INSERT INTO zones VALUES ('',73,'67','Bas Rhin');
INSERT INTO zones VALUES ('',73,'68','Haut Rhin');
INSERT INTO zones VALUES ('',73,'69','Rhône');
INSERT INTO zones VALUES ('',73,'70','Haute-Saône');
INSERT INTO zones VALUES ('',73,'71','Saône-et-Loire');
INSERT INTO zones VALUES ('',73,'72','Sarthe');
INSERT INTO zones VALUES ('',73,'73','Savoie');
INSERT INTO zones VALUES ('',73,'74','Haute Savoie');
INSERT INTO zones VALUES ('',73,'75','Paris');
INSERT INTO zones VALUES ('',73,'76','Seine Maritime');
INSERT INTO zones VALUES ('',73,'77','Seine et Marne');
INSERT INTO zones VALUES ('',73,'78','Yvelines');
INSERT INTO zones VALUES ('',73,'79','Deux-Sèvres');
INSERT INTO zones VALUES ('',73,'80','Somme');
INSERT INTO zones VALUES ('',73,'81','Tarn');
INSERT INTO zones VALUES ('',73,'82','Tarn et Garonne');
INSERT INTO zones VALUES ('',73,'83','Var');
INSERT INTO zones VALUES ('',73,'84','Vaucluse');
INSERT INTO zones VALUES ('',73,'85','Vendée');
INSERT INTO zones VALUES ('',73,'86','Vienne');
INSERT INTO zones VALUES ('',73,'87','Haute Vienne');
INSERT INTO zones VALUES ('',73,'88','Vosges');
INSERT INTO zones VALUES ('',73,'89','Yonne');
INSERT INTO zones VALUES ('',73,'90','Territoire de Belfort');
INSERT INTO zones VALUES ('',73,'91','Essonne');
INSERT INTO zones VALUES ('',73,'92','Hauts de Seine');
INSERT INTO zones VALUES ('',73,'93','Seine St-Denis');
INSERT INTO zones VALUES ('',73,'94','Val de Marne');
INSERT INTO zones VALUES ('',73,'95','Val d\'Oise');
INSERT INTO zones VALUES ('',73,'971 (DOM)','Guadeloupe');
INSERT INTO zones VALUES ('',73,'972 (DOM)','Martinique');
INSERT INTO zones VALUES ('',73,'973 (DOM)','Guyane');
INSERT INTO zones VALUES ('',73,'974 (DOM)','Saint Denis');
INSERT INTO zones VALUES ('',73,'975 (DOM)','St-Pierre de Miquelon');
INSERT INTO zones VALUES ('',73,'976 (TOM)','Mayotte');
INSERT INTO zones VALUES ('',73,'984 (TOM)','Terres australes et Antartiques françaises');
INSERT INTO zones VALUES ('',73,'985 (TOM)','Nouvelle Calédonie');
INSERT INTO zones VALUES ('',73,'986 (TOM)','Wallis et Futuna');
INSERT INTO zones VALUES ('',73,'987 (TOM)','Polynésie française');

# Keep an empty line at the end of this file for the db_updater to work properly
