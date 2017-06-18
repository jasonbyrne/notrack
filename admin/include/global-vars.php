<?php

DEFINE('VERSION', '0.8.5');
DEFINE('SERVERNAME', 'localhost');
DEFINE('USERNAME', 'ntrk');
DEFINE('PASSWORD', 'ntrkpass');
DEFINE('DBNAME', 'ntrkdb');

DEFINE('ROWSPERPAGE', 200);

$FileBlackList = '/etc/notrack/blacklist.txt';
$FileWhiteList = '/etc/notrack/whitelist.txt';
$FileTLDBlackList = '/etc/notrack/domain-blacklist.txt';
$FileTLDWhiteList = '/etc/notrack/domain-whitelist.txt';
$LogLightyAccess = '/var/log/lighttpd/access.log';

DEFINE('DIR_TMP', '/tmp/');
DEFINE('ACCESSLOG', '/var/log/ntrk-admin.log');
DEFINE('CONFIGFILE', '/etc/notrack/notrack.conf');
DEFINE('CONFIGTEMP', '/tmp/notrack.conf');
DEFINE('TLD_FILE', './include/tld.csv');
DEFINE('NTRK_EXEC', 'sudo /usr/local/sbin/ntrk-exec ');
DEFINE('NOTRACK_LIST', '/etc/dnsmasq.d/notrack.list');

$Config=array();

$DEFAULTCONFIG = array(
  'NetDev' => 'eth0',
  'IPVersion' => 'IPv4',
  'Status' => 'Enabled',
  'BlockMessage' => 'pixel',
  'Search' => 'DuckDuckGo',
  'SearchUrl' => '',
  'WhoIs' => 'Who.is',
  'WhoIsUrl' => '',
  'Username' => '',
  'Password' => '',
  'Delay' => 30,
  'Suppress' => '',
  'ParsingTime' => 10,
  'bl_custom' => '',
  'bl_notrack' => 1,
  'bl_tld' => 1,
  'bl_qmalware' => 1,
  'bl_hexxium' => 1,
  'bl_cedia' => 0,
  'bl_cedia_immortal' => 1,
  'bl_disconnectmalvertising' => 0,
  'bl_easylist' => 0,
  'bl_easyprivacy' => 0,
  'bl_fbannoyance' => 0,
  'bl_fbenhanced' => 0,
  'bl_fbsocial' => 0,
  'bl_hphosts' => 0,
  'bl_malwaredomainlist' => 0,
  'bl_malwaredomains' => 0,
  'bl_pglyoyo' => 0,  
  'bl_someonewhocares' => 0,
  'bl_spam404' => 0,
  'bl_swissransom' => 0,
  'bl_swisszeus' => 0,
  'bl_winhelp2002' => 0,
  //Region Specific BlockLists
  'bl_areasy' => 0,
  'bl_chneasy' => 0,
  'bl_deueasy' => 0,
  'bl_dnkeasy' => 0,
  'bl_fraeasy' => 0,
  'bl_grceasy' => 0,
  'bl_huneasy' => 0,
  'bl_idneasy' => 0,
  'bl_isleasy' => 0,
  'bl_itaeasy' => 0,
  'bl_jpneasy' => 0,
  'bl_koreasy' => 0,
  'bl_korfb' => 0,
  'bl_koryous' => 0,
  'bl_ltueasy' => 0,
  'bl_lvaeasy' => 0,
  'bl_nldeasy' => 0,
  'bl_poleasy' => 0,
  'bl_ruseasy' => 0,
  'bl_spaeasy' => 0,
  'bl_svneasy' => 0,
  'bl_sweeasy' => 0,
  'bl_viefb' => 0,
  'bl_fblatin' => 0,
  'bl_yhosts' => 0,
  'LatestVersion' => VERSION
);

$BLOCKLISTNAMES = array(
  'custom' => 'Custom',
  'bl_tld' => 'Top Level Domain',
  'bl_notrack' => 'NoTrack',  
  'bl_qmalware' => 'NoTrack Malware',
  'bl_cedia' => 'CEDIA Malware',
  'bl_cedia_immortal' => 'CEDIA Immortal Malware',
  'bl_someonewhocares' => 'Dan Pollocks&rsquo;s hosts',
  'bl_disconnectmalvertising' => 'Malvertising by Disconnect',
  'bl_easylist' => 'Easy List',
  'bl_easyprivacy' => 'Easy Privacy',
  'bl_fbannoyance' => 'Fanboy&rsquo;s Annoyance',
  'bl_fbenhanced' => 'Fanboy&rsquo;s Enhanced',
  'bl_fbsocial' => 'Fanboy&rsquo;s Social',
  'bl_hexxium' => 'Hexxium',
  'bl_hphosts' => 'hpHosts',
  'bl_malwaredomainlist' => 'Malware Domain List',
  'bl_malwaredomains' => 'Malware Domains',
  'bl_winhelp2002' => 'MVPS Hosts',
  'bl_pglyoyo' => 'Peter Lowe&rsquo;s Ad List',  
  'bl_spam404'=> 'Spam 404',
  'bl_swissransom' => 'Swiss Security Ransomware',
  'bl_swisszeus' => 'Swiss Security ZeuS',  
  'bl_areasy' => 'AR Easy List',
  'bl_chneasy' => 'CHN Easy List',
  'bl_yhosts' => 'CHN Yhosts',
  'bl_deueasy' => 'DEU Easy List',
  'bl_dnkeasy' => 'DNK Easy List',
  'bl_fraeasy' => 'FRA Easy List',
  'bl_grceasy' => 'GRC Easy List',
  'bl_huneasy' => 'HUN Easy List',
  'bl_idneasy' => 'IDN Easy List',
  'bl_itaeasy' => 'ITA Easy List',
  'bl_jpneasy' => 'JPN Easy List',
  'bl_koreasy' => 'KOR Easy List',
  'bl_korfb' => 'KOR Fanboy',
  'bl_koryous' => 'KOR Yous List',
  'bl_ltueasy' => 'LTU Easy List',
  'bl_nldeasy' => 'NLD Easy List',
  'bl_ruseasy' => 'RUS Easy List',
  'bl_spaeasy' => 'SPA Easy List',
  'bl_svneasy' => 'SVN Easy List',
  'bl_sweeasy' => 'SWE Easy List',
  'bl_viefb' => 'VIE Fanboy',
  'bl_fblatin' => 'Latin Easy List',
);


$SEARCHENGINELIST = array(
  'Baidu' => 'https://www.baidu.com/s?wd=',
  'Bing' => 'https://www.bing.com/search?q=',
  'DuckDuckGo' => 'https://duckduckgo.com/?q=',
  'Exalead' => 'https://www.exalead.com/search/web/results/?q=',
  'Gigablast' => 'https://www.gigablast.com/search?q=',
  'Google' => 'https://www.google.com/search?q=',
  'Ixquick' => 'https://ixquick.eu/do/search?q=',
  'Qwant' => 'https://www.qwant.com/?q=',
  'StartPage' => 'https://startpage.com/do/search?q=',
  'Yahoo' => 'https://search.yahoo.com/search?p=',
  'Yandex' => 'https://www.yandex.com/search/?text='
);

$WHOISLIST = array(
  'DomainTools' => 'http://whois.domaintools.com/',
  'Icann' => 'https://whois.icann.org/lookup?name=',
  'Who.is' => 'https://who.is/whois/'
);


if (!extension_loaded('memcache')) {
  die('NoTrack requires memcached and php-memcache to be installed');
}

$mem = new Memcache;                             //Initiate Memcache
$mem->connect('localhost');

if (!extension_loaded('mysqli')) {
  echo '<p>NoTrack requires mysql to be installed<br>Run: <code>bash /opt/notrack/install.sh -sql</code> or <code>bash ~/notrack/install.sh -sql</code> (depending where NoTrack folder is located)</p>';
  die;
}
?>
