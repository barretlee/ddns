<?php
//发送Post请求修改DNS请求

require_once dirname(__file__).'/conf.php';
require_once dirname(__file__).'/post.php';

function changeRecord( $domain_id, $record_id, $ip, $record_name )
{
    //封装要提交的数据
    $post_data = array(
        "login_email"=>LOGIN_EMAIL,
        "login_password"=>LOGIN_PASSWORD,
        "format"=>"json",
        "domain_id"=>$domain_id,
        "record_id" => $record_id,
        "value" => $ip,
        "record_type" => "A",
        "record_line" => "默认",
        "sub_domain" => $record_name
    );

    return    post($post_data,'https://dnsapi.cn/Record.Modify');

}



?>
