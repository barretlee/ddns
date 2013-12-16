<?php
/**
 * @description  :   实现利用DNSPOD动态更改域名指向，可以实现家用拨号上网电脑也可一当作广域网服务器
 * @author       :   sang.williams@gmail.com
 * @time         :   2013-8-6   
 *
 * @todo         :
 *
 *  revision:
 *      2013-11-21  
 *          增加了登录验证
 *          修改了换行符
 **/


header("Content-type:text/html;charset=utf8");

require_once dirname(__file__).'/lib/conf.php';
require_once dirname(__file__).'/lib/verify.php';
require_once dirname(__file__).'/lib/changeRecord.php';
require_once dirname(__file__).'/lib/getDomainID.php';
require_once dirname(__file__).'/lib/getRecordID.php';
require_once dirname(__file__).'/lib/getPublicIP.php';
require_once dirname(__file__).'/lib/getRecordIP.php';

//验证用户名、密码
if (!verify()) {
    echo '登录失败。'.PHP_EOL;
    echo '    可能原因： 用户名、密码错误，登录失败次数太多，API接口调用次数超出限制等'.PHP_EOL;
    exit();
}

//获取域名ID
$domain_id = getDomainID(DOMAIN);

if (!$domain_id) {
    echo '域名未在DNSPOD添加,请在DNSPOD添加域名。'.PHP_EOL;
    exit();
}

//获取RECORD ID
$record_id= getRecordID($domain_id, RECORD);
if (!$record_id) {
    echo '您当前还未在DNSPOD建立此record记录,请先前往DNSPOD添加记录。'.PHP_EOL;
    exit();
}

$record_ip = getRecordIP($domain_id, RECORD);

//echo '当前record ID 为'.$record_id.PHP_EOL";
echo '当前record IP 为'.$record_ip.PHP_EOL;

//获取当前的广域网IP地址
$ip = getPublicIP();

echo '当前广域网IP为：'.$ip.PHP_EOL;

//如果当前广域网IP和DNSPOD注册IP不一样，则修改为当前广域网IP
if ($ip != $record_ip) {
    echo '更改结果: '.PHP_EOL.changeRecord( $domain_id, $record_id, $ip, RECORD).PHP_EOL;
}else{
    echo 'Nothing to do. '.PHP_EOL;
}

?>
