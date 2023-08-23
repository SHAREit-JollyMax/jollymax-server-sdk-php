# JollyMax Server sdk for PHP

## Evn prepare

composer install

## Init Config

```php
//构造参数
$merchantConfig = new MerchantConfig();
$merchantConfig->merchantNo = "your merchant no";
$merchantConfig->appId = "your merchantAppId";
$merchantConfig->merchantPrivateKey = "your private key";
$merchantConfig->jollymaxPublicKey = "jollymax public key";
    
//设置参数，默认调用产线地址，
//如测试环境联调，需传入环境标识 eg: JollymaxClient::setConfig($merchantConfig, Env::$uat);
JollymaxClient::setConfig($merchantConfig);
```

## Send request

```php
//构造业务报文
$requestData = '{"code":"your product code","messageId":"29128914605625","outOrderId":"TEST_WH_20220728_004","quantity":"1","tradeInfo":{"userId":"123456"}}';
$json_decodeData = json_decode($requestData, true);

//请求并获取业务返回
$resp = JollymaxClient::send('distribute-order-create', $json_decodeData);
echo json_encode($resp)  . "\n";
```

## Verify Notification

```php
JollymaxClient::verify("jollymax request body", "jollymax request sign");
```
