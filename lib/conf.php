<?php

//一些配置
//规范，函数不许要二层包含，即只需要包含此函数即可使用，不许要知道其依赖
//所以要求使用require_once

//在此填写你的DNSPOD 登录email,和密码
define('LOGIN_EMAIL','yourLoginEmail');
define('LOGIN_PASSWORD', 'yourLoginPassword');

//再次填写你需要映射的域名，记录
define('DOMAIN','yourDomain');
define('RECORD','yourRecord');


?>
