<?php
/**
 * @description  :   实现利用DNSPOD动态更改域名指向，可以实现家用拨号上网电脑也可一当作广域网服务器
 * @author       :   sang.williams@gmail.com
 * @time         :   2013-8-6   
 *
 * @todo         :
 *      1.  增加错误提示，比如登录错误等
 **/


header("Content-type:text/html;charset=utf8");
require_once dirname(__file__).'/lib/conf.php';
require_once dirname(__file__).'/lib/changeRecord.php';
require_once dirname(__file__).'/lib/getDomainID.php';
require_once dirname(__file__).'/lib/getRecordID.php';
require_once dirname(__file__).'/lib/getRemoteIP.php';
require_once dirname(__file__).'/lib/getRecordIP.php';


//获取域名ID
$domain_id = getDomainID(DOMAIN);

if (!$domain_id) {
    echo "域名未在DNSPOD添加,请在DNSPOD添加域名。<br>\n";
    exit();
}

//获取RECORD ID
$record_id= getRecordID($domain_id, RECORD);
if (!$record_id) {
    echo "您当前还未在DNSPOD建立此record记录,请先前往DNSPOD添加记录<br>\n";
    exit();
}

$record_ip = getRecordIP($domain_id, RECORD);

//echo '当前record ID 为'.$record_id."<br>\n";
echo '当前record IP 为'.$record_ip."<br>\n";

//获取当前的广域网IP地址
$ip = getRemoteIP();

echo '当前广域网IP为：'.$ip."<br>\n";

//如果当前广域网IP和DNSPOD注册IP不一样，则修改为当前广域网IP
if ($ip != $record_ip) {
    echo "更改结果<br>\n".changeRecord( $domain_id, $record_id, $ip, RECORD)."\n";
}else{
    echo "nothing to do <br>\n";
}

?>
