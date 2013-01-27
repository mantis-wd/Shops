<?php
/* -----------------------------------------------------------------------------------------
   $Id: xtc_check_agent.inc.php 4200 2013-01-10 19:47:11Z Tomcraft1980 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(html_output.php,v 1.52 2003/03/19); www.oscommerce.com
   (c) 2003 nextcommerce (xtc_href_link.inc.php,v 1.3 2003/08/13); www.nextcommerce.org
   (c) 2006 XT-Commerce (xtc_check_agent.inc.php 974 2005-06-07)

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

function xtc_check_agent() {
  if (CHECK_CLIENT_AGENT=='true') {
     $Robots = array (
     "acme.spider",
     "ahoythehomepagefinder",
     "alkaline",
     "antibot",
     "appie",
     "arachnophilia",
     "architext",
     "archive.org_bot",
     "aretha",
     "ariadne",
     "arks",
     "aspider",
     "atn.txt",
     "atomz",
     "auresys",
     "awbot",
     "backrub",
     "bigbrother",
     "bing",
     "bingbot",
     "bjaaland",
     "blackwidow",
     "blindekuh",
     "bloodhound",
     "bobby",
     "boris",
     "bot",
     "brightnet",
     "bspider",
     "bumblebee",
     "cactvschemistryspider",
     "cassandra",
     "cgireader",
     "checkbot",
     "churl",
     "cmc",
     "collective",
     "combine",
     "conceptbot",
     "coolbot",
     "core",
     "cosmos",
     "crawl",
     "cruiser",
     "cscrawler",
     "cusco",
     "cyberspyder",
     "daviesbot",
     "deweb",
     "dienstspider",
     "digger",
     "digout4u",
     "diibot",
     "directhit",
     "dnabot",
     "download_express",
     "dragonbot",
     "dwcp",
     "ebiness",
     "echo",
     "e-collector",
     "eit",
     "elfinbot",
     "emacs",
     "emcspider",
     "esther",
     "evliyacelebi",
     "ezresult",
     "fast-webcrawler",
     "fdse",
     "felix",
     "ferret",
     "fetchrover",
     "fido",
     "finnish",
     "fireball",
     "fouineur",
     "francoroute",
     "freecrawl",
     "funnelweb",
     "gama",
     "gazz",
     "gcreep",
     "getbot",
     "geturl",
     "gigabot",
     "gnodspider",
     "golem",
     "googlebot",
     "grapnel",
     "griffon",
     "gromit",
     "gulliver",
     "hambot",
     "harvest",
     "havindex",
     "hometown",
     "htdig",
     "htmlgobble",
     "hyperdecontextualizer",
     "ia_archiver",
     "iajabot",
     "ibm",
     "ichiro",
     "iconoclast",
     "ilse",
     "imagelock",
     "incywincy",
     "informant",
     "infoseek",
     "infoseeksidewinder",
     "infospider",
     "inspectorwww",
     "intelliagent",
     "internetseer",
     "irobot",
     "iron33",
     "israelisearch",
     "javabee",
     "jbot",
     "jcrawler",
     "jeeves",
     "jennybot",
     "jobo",
     "jobot",
     "joebot",
     "jubii",
     "jumpstation",
     "justview",
     "katipo",
     "kdd",
     "kilroy",
     "ko_yappo_robot",
     "labelgrabber.txt",
     "larbin",
     "legs",
     "linkbot",
     "linkchecker",
     "linkidator",
     "linkscan",
     "linkwalker",
     "lockon",
     "logo_gif",
     "lycos",
     "macworm",
     "magpie",
     "marvin",
     "mattie",
     "mediafox",
     "mercator",
     "merzscope",
     "meshexplorer",
     "mindcrawler",
     "moget",
     "momspider",
     "monster",
     "motor",
     "msn",
     "msn.com",
     "msnbot",
     "muscatferret",
     "mwdsearch",
     "myweb",
     "nederland.zoek",
     "netcarta",
     "netcraft",
     "netmechanic",
     "netscoop",
     "newscan-online",
     "nhse",
     "nomad",
     "northstar",
     "nzexplorer",
     "occam",
     "octopus",
     "openfind",
     "orb_search",
     "packrat",
     "pageboy",
     "parasite",
     "patric",
     "pegasus",
     "perignator",
     "perlcrawler",
     "perman",
     "petersnews",
     "phantom",
     "piltdownman",
     "pimptrain",
     "pioneer",
     "pitkow",
     "pjspider",
     "pka",
     "plumtreewebaccessor",
     "pompos",
     "pooodle",
     "poppi",
     "portalb",
     "psbot",
     "puu",
     "python",
     "raven",
     "rbse",
     "redalert",
     "resumerobot",
     "rhcs",
     "roadrunner",
     "robbie",
     "robi",
     "robofox",
     "robot",
     "robozilla",
     "roverbot",
     "rules",
     "safetynetrobot",
     "scoutjet",
     "scooter",
     "search.msn.com",
     "search_au",
     "searchprocess",
     "senrigan",
     "sgscout",
     "shaggy",
     "shaihulud",
     "shoutcast",
     "sift",
     "simbot",
     "sitegrabber",
     "sitetech",
     "site-valet",
     "slcrawler",
     "slurp",
     "slysearch",
     "smartspider",
     "snooper",
     "solbot",
     "spanner",
     "speedy",
     "spider_monkey",
     "spiderbot",
     "spiderline",
     "spiderman",
     "spiderview",
     "spry",
     "ssearcher",
     "suke",
     "suntek",
     "sven",
     "tach_bw",
     "tarantula",
     "tarspider",
     "techbot",
     "templeton",
     "teoma_agent1",
     "titan",
     "titin",
     "tkwww",
     "tlspider",
     "ucsd",
     "udmsearch",
     "ultraseek",
     "unlost_web_crawler",
     "urlck",
     "validator",
     "valkyrie",
     "victoria",
     "visionsearch",
     "voila",
     "voyager",
     "vwbot",
     "w3index",
     "w3m2",
     "wallpaper",
     "wanderer",
     "wapspider",
     "webbandit",
     "webbase",
     "webcatcher",
     "webcompass",
     "webcopy",
     "webfetcher",
     "webfoot",
     "weblayers",
     "weblinker",
     "webmirror",
     "webmoose",
     "webquest",
     "webreader",
     "webreaper",
     "websnarf",
     "webspider",
     "webvac",
     "webwalk",
     "webwalker",
     "webwatch",
     "wget",
     "whatuseek",
     "whowhere",
     "wired-digital",
     "wisenutbot",
     "wmir",
     "wolp",
     "wombat",
     "worm",
     "wwwc",
     "wz101",
     "xget",
     "yahoo",
     "yandex"
     );

     $botID = strtolower($_SERVER['HTTP_USER_AGENT']);
     $botID2 = strtolower(getenv("HTTP_USER_AGENT"));
     for ($i = 0; $i < count($Robots); $i++) {
       if (strstr($botID, $Robots[$i]) or strstr($botID2, $Robots[$i])) {
         return 1;
       }
     }
     return 0;
  } else {
    return 0;
  }
}
?>