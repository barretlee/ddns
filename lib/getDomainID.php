<?php
//发送Post请求修改DNS请求

require_once dirname(__file__).'/conf.php';
require_once dirname(__file__).'/post.php';

function getDomainID( $domain )
{
    //封装要提交的数据
    $post_data = array(
        "login_email"=>LOGIN_EMAIL,
        "login_password"=>LOGIN_PASSWORD,
        "format"=>"json",
    );

    $domains_info = post($post_data, 'https://dnsapi.cn/Domain.List');
    $domains_info = json_decode($domains_info);


    foreach ($domains_info->domains as $key) {
        if ($key->name == $domain ) {
            return $key->id;
        }
    }
    return false;
}



?>
