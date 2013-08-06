<?php
//获取本机的外网IP


function getRemoteIP()
{
    return file_get_contents('http://service.williamsang.com/getIP.php');
}
?>
