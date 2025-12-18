<?php
function getActiveLanguage(){
  $cfg = json_decode(file_get_contents(__DIR__.'/../config/language_rotation.json'), true);
  $start = new DateTime($cfg['rotation_start']);
  $now = new DateTime(date('Y-m-d'));
  $days = $start->diff($now)->days;
  $cycle=[];
  foreach($cfg['languages'] as $l){
    for($i=0;$i<$l['days'];$i++) $cycle[]=$l['code'];
  }
  return $cycle[$days % count($cycle)];
}
function lang($key){
  static $cache=[];
  $lang = getActiveLanguage();
  if(!isset($cache[$lang])){
    $file = __DIR__.'/../'.$lang.'/app.php';
    $cache[$lang] = file_exists($file)? include $file:[];
  }
  return $cache[$lang][$key] ?? $key;
}
