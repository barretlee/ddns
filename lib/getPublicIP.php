<?php
//获取本机的外网IP

function getPublicIP()
{
  preg_match("/(\d+\.){3}\d+/", file_get_contents("http://ipinfo.io"), $m);
  return $m[0];
}
?>