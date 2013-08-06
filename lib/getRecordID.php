<?php
//获取记录的ID

require_once dirname(__file__).'/conf.php';
require_once dirname(__file__).'/post.php';

function getRecordID( $domain_id, $record )
{
    //封装要提交的数据
    $post_data = array(
        "login_email"=>LOGIN_EMAIL,
        "login_password"=>LOGIN_PASSWORD,
        "format"=>"json",
        "domain_id"=>$domain_id,
    );

    $records_info = post($post_data, 'https://dnsapi.cn/Record.List');
    $records_info = json_decode($records_info);

    foreach ($records_info->records as $key) {
        if ($key->name == $record) {
            return $key->id;
        }
    }
    return false;

}



?>
