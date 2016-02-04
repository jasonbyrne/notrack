<?php
//Global Functions used in NoTrack Admin
//Draw Sys Table-----------------------------------------------------
function DrawSysTable($Title) {
  echo '<div class="sys-group"><div class="sys-title">'."\n";
  echo '<h5>'.$Title.'</h5></div>'."\n";
  echo '<div class="sys-items"><table class="sys-table">'."\n";
  return null;
}
//Draw Sys Row-------------------------------------------------------
function DrawSysRow($Description, $Value) {
  echo '<tr><td>'.$Description.': </td><td>'.$Value.'</td></tr>'."\n";
  return null;
}
//Load Config File---------------------------------------------------
function LoadConfigFile() {
  global $FileConfig, $Config, $Mem, $Version;
  
  $Config=$Mem->get('Config');                   //Load array from Memcache
  
  if (!$Config) {                                //Did it load from memory?
    if (file_exists($FileConfig)) {              //Check file exists
      $Config = parse_ini_file($FileConfig);     //Load array
    }
    else {
      $Config = array();                         //No config file, zero the array
    }
    //Set defult values if keys don't exist
    if (!array_key_exists('NetDev', $Config)) $Config += array('NetDev' => 'eth0');
    if (!array_key_exists('IPVersion', $Config)) $Config += array('IPVersion' => 'IPv4');
    if (!array_key_exists('BlockMessage', $Config)) $Config += array('BlockMessage' => 'pixel');
    if (!array_key_exists('BlockList_TLD', $Config)) $Config += array('BlockList_TLD' => '1');
    //if (!array_key_exists('', $Config)) $Config += array('' => '');
    //if (!array_key_exists('', $Config)) $Config += array('' => '');
    //if (!array_key_exists('', $Config)) $Config += array('' => '');
    //if (!array_key_exists('', $Config)) $Config += array('' => '');
    
    if (!array_key_exists('LatestVersion', $Config)) $Config += array('LatestVersion' => $Version); //Default to current version
    
    $Mem->set('Config', $Config, 0, 1200);
  }  
    
  return null;
}
?>