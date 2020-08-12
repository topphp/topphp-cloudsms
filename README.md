# topphp-cloudsms

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

# 凯拓云短信
基于凯拓未来科技有限公司研发的云短信系统封装的PHP sdk


## Structure
> 组件结构

```
src/parameterInjection/
src/
tests/
```


## Install

Via Composer

``` bash
$ composer require topphp/topphp-cloudsms
```

## 开始使用
初始化
``` 
<?php
namespace Tophp\TophpCloudsms;


include 'vendor/autoload.php';
$account='xxx'; #账号
$password='xxx'; #密码
$key='xxx'; 
$iv='xxxxx';
$url='xxxx.xxx.xxx'; 请求地址
$ShortMessage=new ShortMessage();
$ShortMessage->setUrl($url)->setKey($key)->setIv($iv)->setAccount($account)->setPassword($password);

```
发送短信
``` 
$arr=$ShortMessage
    ->setTemplateParam("{code:1223}") 
    ->setCode(86)国家号，中国86 国际通过国际配置接口查询
    ->setMobile('15332097358') #手机号多个用,隔开
    ->setSignatureId("25") #签名id,签名接口获取
    ->setTemplateId("36")# 模板id，模板接口获取
    ->sendMessage();
``` 
验证下游
``` 

$arr=$ShortMessage->authenticateCompany();
``` 


获取签名集合
``` 
$arr=$ShortMessage->listSignatures();
``` 
获取签名( signatureId从签名集合获取 )
``` 
$signatureId=26;
$arr=$ShortMessage->getSignature($signatureId); 
``` 

获取模板集合
``` 
$arr=$ShortMessage->listTemplates();
``` 

获取模板 ( templateId从模板集合获取 )
``` 
$templateId='38';
$arr=$ShortMessage->getTemplate($templateId);
``` 
获取支付配置
``` 
$arr=$ShortMessage->getPaySettingData();
``` 
获取支付日志集合
``` 
$arr=$ShortMessage
    ->setPageNum(1) #第几页
    ->setPageSize(10) #每页个数
    ->setStartTime('') #开始时间
    ->setEndTime(time()) #结束时间 time()类型时间戳
    ->listCompanyPayLogs();
``` 
获取支付记录
``` 
$orderNo='N20200717150058810220'; #从支付日志集合获取
$arr=$ShortMessage->getCompanyPayLog($orderNo);
``` 

获取短信日志集合
``` 
$arr=$ShortMessage
    ->setPageNum(1)
    ->setPageSize(10)
    ->setType(1) #1 国内，2 国际
    ->setPhone('') #手机号和日期不能同时为空
    ->setDate(time()) #手机号和日期不能同时为空   time()类型时间戳
    ->listCompanySmsLogs();
``` 
支付-国内套餐参数
``` 

$arr=$ShortMessage
    ->setPayPlanId(21)  # 套餐id 从支付配置查询
    ->setPayType(1) #1. 微信 2. 支付宝
    ->companyPaySetMeal();
``` 

支付-国内通过短信数量收费
```
$arr=$ShortMessage
    ->setCount(21) #数量
    ->setPayType(2) #1. 微信 2. 支付宝
    ->companyPaySetMealNumber();
```

支付-国际只能通过多少钱购买
```
$arr=$ShortMessage
    ->setMoney(5000) #钱
    ->setPayType(2)# 1. 微信 2. 支付宝
    ->companyPaySetMealMoney();
```
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email sleep@kaituocn.com instead of using the issue tracker.

## Credits

- [topphp][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/topphp/topphp-generate.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/topphp/topphp-generate/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/topphp/topphp-generate.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/topphp/topphp-generate.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/topphp/topphp-generate.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/topphp/topphp-generate
[link-travis]: https://travis-ci.org/topphp/topphp-generate
[link-scrutinizer]: https://scrutinizer-ci.com/g/topphp/topphp-generate/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/topphp/topphp-generate
[link-downloads]: https://packagist.org/packages/topphp/topphp-generate
[link-author]: https://github.com/topphp
[link-contributors]: ../../contributors
