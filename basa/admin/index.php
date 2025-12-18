<?php
$data = include __DIR__.'/../su/istilah.php';
echo '<h3>Panyambung Basa – Admin Istilah</h3>';
foreach($data as $k=>$v){
  echo $k.' : '.$v['su'].'<br>';
}
