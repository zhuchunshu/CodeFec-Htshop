<?php

use Curl\Curl;
use Illuminate\Support\Facades\Http;


if(!function_exists("htcurl_post")){
    function htcurl_post($url,$cookies,$data=[]){
        $curl = new Curl();
        $curl->setHeaders([
            "Cookie" => $cookies,
            "Accept" => "application/json, text/plain, */*",
            "Connection" => "keep-alive",
            "s_channel" => "xiaomi",
            "utm_term" => "hd_direct",
            "utm_campaign" => "hd_direct",
            "ut" => "direct",
            "uc" => "direct",
            "sa_device_id" => "a8171e41b0c15108",
            "sa_distinct_id" => "TXNPUkFWM0hyZWtJSGlDditjTUdNdz09",
            "clientPackage" => "com.oppo.store",
            "um" => "hot",
            "User-Agent" => "Mozilla/5.0 (Linux; Android 11; M2102K1C Build/RKQ1.201112.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.141 Mobile Safari/537.36 oppostore/200702 MIUI/V125 brand/Xiaomi model/M2102K1C",
            "Content-Type" => "application/x-www-form-urlencoded",
            "source_type" => "501",
            "utm_medium" => "fenleiye",
            "brand" => "Xiaomi",
            "s_version" => "200702",
            "us" => "fenleiye",
            "utm_source" => "Mzhan",
            "Origin" => "https://store.oppo.com",
            "X-Requested-With" => "com.oppo.store",
            "Sec-Fetch-Site" => "same-origin",
            "Sec-Fetch-Mode" => "cors",
            "Sec-Fetch-Dest" => "empty",
            "Referer" => "https://store.oppo.com/cn/app/taskCenter/index",
            "Accept-Encoding" => "gzip, deflate",
            "Accept-Language" => "zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7"
        ]);
        $curl->post($url, $data);
        return $curl;
    }
}

if(!function_exists("htcurl_get")){
    function htcurl_get($url,$cookies,$data=[]){
        $curl = new Curl();
        $curl->setHeaders([
            "Cookie" => $cookies,
            "Accept" => "application/json, text/plain, */*",
            "Connection" => "keep-alive",
            "s_channel" => "xiaomi",
            "utm_term" => "hd_direct",
            "utm_campaign" => "hd_direct",
            "ut" => "direct",
            "uc" => "direct",
            "sa_device_id" => "a8171e41b0c15108",
            "sa_distinct_id" => "TXNPUkFWM0hyZWtJSGlDditjTUdNdz09",
            "clientPackage" => "com.oppo.store",
            "um" => "hot",
            "User-Agent" => "Mozilla/5.0 (Linux; Android 11; M2102K1C Build/RKQ1.201112.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.141 Mobile Safari/537.36 oppostore/200702 MIUI/V125 brand/Xiaomi model/M2102K1C",
            "Content-Type" => "application/x-www-form-urlencoded",
            "source_type" => "501",
            "utm_medium" => "fenleiye",
            "brand" => "Xiaomi",
            "s_version" => "200702",
            "us" => "fenleiye",
            "utm_source" => "Mzhan",
            "Origin" => "https://store.oppo.com",
            "X-Requested-With" => "com.oppo.store",
            "Sec-Fetch-Site" => "same-origin",
            "Sec-Fetch-Mode" => "cors",
            "Sec-Fetch-Dest" => "empty",
            "Referer" => "https://store.oppo.com/cn/app/taskCenter/index",
            "Accept-Encoding" => "gzip, deflate",
            "Accept-Language" => "zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7"
        ]);
        $curl->get($url, $data);
        return $curl;
    }
}

if (!function_exists("obj_arr")){
    function obj_arr($content){
        return json_decode(json_encode($content),TRUE);
    }
}

if(!function_exists("http_gets")){
    function http_gets($url){
        return Http::get($url);
    }
}

if(!function_exists("http_getsWithHeaders")){
    function http_getsWithHeaders($url,$headers=[]){
        return Http::withHeaders($headers)->get($url);
    }
}