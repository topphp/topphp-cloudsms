<?php

declare(strict_types=1);

namespace Topphp\Test;

use PHPUnit\Framework\TestCase;
use Tophp\TophpCloudsms\ShortMessage;

class ExampleTest extends TestCase
{


    public function testAc()
    {

        $account = 'xxx';
        $password = 'xxx';
        $key = 'xxxx';
        $iv = 'xxxx';
        $url = 'xxxxxx';
        $ShortMessage = new ShortMessage();
        $ShortMessage->setUrl($url)->setKey($key)->setIv($iv)->setAccount($account)->setPassword($password);
        #发送短信
        //$arr=$ShortMessage
        //    ->setTemplateParam("{code:1223}")
        //    ->setCode(86)
        //    ->setMobile('xxxxxx') 手机号
        //    ->setSignatureId("25")
        //    ->setTemplateId("36")
        //    ->sendMessage();
        echo '<pre>';
        #验证下游
        $arr = $ShortMessage->authenticateCompany();
        print_r($arr);
        #获取签名集合
        $arr = $ShortMessage->listSignatures();
        print_r($arr);
        #获取签名
        $signatureId = 26;
        $arr = $ShortMessage->getSignature($signatureId);
        print_r($arr);
        #获取模板集合
        $arr = $ShortMessage->listTemplates();
        print_r($arr);
        //获取模板
        $templateId = '38';
        $arr = $ShortMessage->getTemplate($templateId);
        print_r($arr);
        #获取支付配置
        $arr = $ShortMessage->getPaySettingData();
        print_r($arr);

        #获取支付日志集合
        $arr = $ShortMessage->setPageNum(1)->setPageSize(1)->setStartTime('')->setEndTime(time())->listCompanyPayLogs();
        print_r($arr);
        #获取支付记录
        $orderNo = 'N20200717150058810220';
        $arr = $ShortMessage->getCompanyPayLog($orderNo);
        print_r($arr);
        #获取短信日志集合
        $arr = $ShortMessage
            ->setPageNum(1)
            ->setPageSize(1)
            ->setType(1)
            ->setPhone('')
            ->setDate('') #当天的数据
            ->listCompanySmsLogs();
        print_r($arr);
        #国内套餐参数
        $arr = $ShortMessage->setPayPlanId(21)->setPayType(1)->companyPaySetMeal();
        print_r($arr);
        #国内通过短信数量收费
        $arr = $ShortMessage->setCount(21)->setPayType(2)->companyPaySetMealNumber();
        print_r($arr);
        #国际只能通过输入多少钱购买
        $arr = $ShortMessage->setMoney(5000)->setPayType(2)->companyPaySetMealMoney();
        print_r($arr);


        #获取下游信息
        $arr = $ShortMessage->getCompanyInfo();


        print_r($arr);
    }
}
