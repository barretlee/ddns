<?php
//发送Post请求修改DNS请求

function post( $post_data, $url)
{

    //初始化一个CURL对象
    $curl = curl_init();

    //设置提交网页,http/https都可以
    curl_setopt($curl, CURLOPT_URL, $url);

    //设置是否返回header
    //curl_setopt($curl, CURLOPT_HEADER, 1);

    //设置结果返回到字符串还是输出到屏幕，这里我们返回到字符串
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //设置POST提交
    curl_setopt($curl, CURLOPT_POST, 1);

    //设置提交的数据
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

    //执行发送请求
    $data = curl_exec($curl);

    //显示获得数据
    return $data;

}



?>
