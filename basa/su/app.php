<?php
$istilah = include __DIR__.'/istilah.php';
$out=[];
foreach($istilah as $k=>$v){ $out[$k]=$v['su']; }
return $out;
