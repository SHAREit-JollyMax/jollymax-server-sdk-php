<?php

require 'vendor/autoload.php';

use jollymax\sdk\client\JollymaxClient;
use jollymax\sdk\config\MerchantConfig;
use jollymax\sdk\constants\Env;

try {

    //构造参数
    $merchantConfig = new MerchantConfig();
    $merchantConfig->merchantNo = "010213832243744";
    $merchantConfig->appId = "6666c8b036a24579974497c2f98d99999";
    $merchantConfig->merchantPrivateKey = "MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAKExZ32j0CdzwZtJixKDHmwk6P6Xe2s1JyEVJ5VYBf7MDs/tD611KH6LnxCf6M3DbIJs2gPx6/nk70H94d7ZR+vDC0Ru7oC3YArGXxjcwkjivGJ4pkjj63+q5MorIm+5/s323y3HE8J81MTNsUK1G6B1mPsn5n6MziKj9Bc9SS4hAgMBAAECgYBb246RX5/IS8QB3VgedZAJqsMICoUvo/unc6m6Bo5sFBdA0GRFweUQsDo2PBpr37jfXm6jHuMN5jOeVLK5zvKXdGoRpkoxdUtYtR51KCWkzUkz6LRH+ooLuC7k3iUVVnZZ7zNLgQORRlFwMCA2gHa3mvbdzW3tP92rgdM3oCDHAQJBAN7jQ0C5eyfymjIRJ/AEJPw+oH7Vr+evFuJRahjViE3es7INpFZDmwBLwuHHLMATwNuQ5kniH02IzXA0h+hborECQQC5I81iab/RYJSY45pxTIusUqJGF4ZQg3ZxdnnNsxbtl0uMw17RArLF/czV3DwwCnGGepp9TNBkIrbglTj7R75xAkEA0jgfEkjes4rJjDdKJ8KA77hRv87jne0x9Ds9ija73FYTvffH6+TPqLPMFw64UmFPIMfFrCGtzH8e5JlnJexnwQJAA3UvuM7QzlBHdjOKBuOvGCDS9wwpbgeGhsf3rmfR3c4dkxtzAeRTAm+jC7t5RExtol1X1U9B9RzQ3ZDr54WHgQJAeicYgZYMymBbxcmlz6+GhvnNQWNh0vJcsKb3YQ/uolMv3ymiglj89QiInTJmvXsU8oEdSv7XE+Pq7Od+MrJ/NA==";
    $merchantConfig->jollymaxPublicKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQChMWd9o9Anc8GbSYsSgx5sJOj+l3trNSchFSeVWAX+zA7P7Q+tdSh+i58Qn+jNw2yCbNoD8ev55O9B/eHe2UfrwwtEbu6At2AKxl8Y3MJI4rxieKZI4+t/quTKKyJvuf7N9t8txxPCfNTEzbFCtRugdZj7J+Z+jM4io/QXPUkuIQIDAQAB";

    //设置参数
    JollymaxClient::setConfig($merchantConfig, Env::$uat);

    //构造业务报文
    $requestData = '';
    $json_decodeData = json_decode($requestData, true);

    //请求并获取业务返回
    $resp = JollymaxClient::send('orderAndPay', $json_decodeData);
    echo json_encode($resp) . "\n";

    JollymaxClient::verify("jollymax request body", "jollymax request sign");
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}






