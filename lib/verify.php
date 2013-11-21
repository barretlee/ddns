<?php

/*
 *
 * 验证用户名、密码正确性
 *
 */


function verify(){


    //封装参数
    $post_data = array(
        "login_email"=>LOGIN_EMAIL,
        "login_password"=>LOGIN_PASSWORD,
        "format"=>"json",
    );

    $auth = post($post_data,'https://dnsapi.cn/Record.Modify');

    $auth = json_decode($auth);
    

    if ( $auth->status->code == 1) {
        return true;
    }
    return false;
}


?>
