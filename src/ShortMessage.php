<?php

namespace Tophp\TophpCloudsms;

use Tophp\TophpCloudsms\parameterInjection\ShortMessageRelevant;

class ShortMessage extends ShortMessageRelevant
{
    private $sendMessages            = 'mobile,code,signatureId,templateId,templateParam';
    private $listCompanyPayLogs      = 'pageNum,pageSize';
    private $listCompanySmsLogs      = 'pageNum,pageSize,type';
    private $companyPaySetMeal       = 'type,payPlanId,payType';
    private $companyPaySetMealNumber = 'type,count,payType';
    private $companyPaySetMealMoney  = 'type,money,payType';

    private $companyPay_fun = 'companyPay';

    /**
     * 发送短信
     * @return array|false|string
     * @author Administrator
     */
    public function sendMessage()
    {
        $sendMessages          = array_flip(explode(',', $this->sendMessages));
        $data['mobile']        = $this->getMobile();
        $data['code']          = $this->getCode();
        $data['signatureId']   = $this->getSignatureId();
        $data['templateId']    = $this->getTemplateId();
        $data['templateParam'] = $this->getTemplateParam();
        foreach ($sendMessages as $k => $v) {
            if (!$data[$k]) {
                return $this->msgAttr(301, $k);
            }
        }
        return $this->sendPost(__FUNCTION__, $data);
    }

    /**验证下游
     * @return mixed
     * @author Administrator
     */
    public function authenticateCompany()
    {
        return $this->sendPost(__FUNCTION__);
    }


    /**
     * 签名集合
     * @return array
     * @author Administrator
     */
    public function listSignatures()
    {
        return $this->sendPost(__FUNCTION__);
    }

    /**
     * 获取签名
     * @param string $signatureId
     * @return array|false|string
     * @author Administrator
     */
    public function getSignature($signatureId = '')
    {
        if (!$signatureId) {
            return $this->msgAttr(301, 'signatureId');
        }
        $data['signatureId'] = $signatureId;
        return $this->sendPost(__FUNCTION__, $data);
    }

    /**
     * 模板集合
     * @return array
     * @author Administrator
     */
    public function listTemplates()
    {
        return $this->sendPost(__FUNCTION__);
    }

    /**
     * 获取模板
     * @param string $templateId
     * @return array|false|string
     * @author Administrator
     */
    public function getTemplate($templateId = '')
    {
        if (!$templateId) {
            return $this->msgAttr(301, 'templateId');
        }
        $data['templateId'] = $templateId;
        return $this->sendPost(__FUNCTION__, $data);
    }


    /**
     * 获取支付日志集合
     * @return array
     * @author Administrator
     */
    public function getPaySettingData()
    {
        return $this->sendPost(__FUNCTION__);
    }

    /**
     * 获取支付日志集合
     * @return array|false|string
     * @author Administrator
     */
    public function listCompanyPayLogs()
    {
        $listCompanyPayLogs = array_flip(explode(',', $this->listCompanyPayLogs));
        $data['pageNum']    = $this->getPageNum();
        $data['pageSize']   = $this->getPageSize();

        foreach ($listCompanyPayLogs as $k => $v) {
            if (!$data[$k]) {
                return $this->msgAttr(301, $k);
            }
        }
        $data['condition'] = [
            'startTime' => $this->getStartTime(),   #条件必须填一个 以时间戳的格式
            'endTime'   => $this->getEndTime()
        ];
        return $this->sendPost(__FUNCTION__, $data);
    }

    /**
     * 获取支付记录
     * @param string $orderNo
     * @return array|false|string
     * @author Administrator
     */
    public function getCompanyPayLog($orderNo = '')
    {
        if (!$orderNo) {
            return $this->msgAttr(301, 'orderNo');
        }
        $data['orderNo'] = $orderNo;
        return $this->sendPost(__FUNCTION__, $data);
    }

    /**
     * 获取短信日志集合
     * @return array|false|string
     * @author Administrator
     */
    public function listCompanySmsLogs()
    {

        $listCompanySmsLogs = array_flip(explode(',', $this->listCompanySmsLogs));
        $data['pageNum']    = $this->getPageNum();
        $data['pageSize']   = $this->getPageSize();
        $data['type']       = $this->getType();
        foreach ($listCompanySmsLogs as $k => $v) {
            if (!$data[$k]) {
                return $this->msgAttr(301, $k);
            }
        }
        unset($data['type']);
        $data['condition'] = [
            'phone' => $this->getPhone(),   #条件必须填一个 以时间戳的格式
            'date'  => $this->getDate(),
            'type'  => $this->getType()
        ];

        return $this->sendPost(__FUNCTION__, $data);
    }

    /**
     * 下游支付套餐id号购买
     * @return array|false|string
     * @author Administrator
     */
    public function companyPaySetMeal()
    {
        $companyPaySetMeal = array_flip(explode(',', $this->companyPaySetMeal));
        $data              = [
            'type'      => 1,
            'payPlanId' => $this->getPayPlanId(), #套餐id
            'payType'   => $this->getPayType(),   #1微信支付 2支付宝
        ];
        foreach ($companyPaySetMeal as $k => $v) {
            if (!$data[$k]) {
                return $this->msgAttr(301, $k);
            }
        }
        return $this->sendPost($this->companyPay_fun, $data);
    }


    /**
     * 下游支付通过数量购买
     * @return array|false|string
     * @author Administrator
     */
    public function companyPaySetMealNumber()
    {
        $companyPaySetMealNumber = array_flip(explode(',', $this->companyPaySetMealNumber));
        $data                    = [
            'type'    => 1,
            'count'   => $this->getCount(),   #数量
            'payType' => $this->getPayType(), #1微信支付 2支付宝
        ];
        foreach ($companyPaySetMealNumber as $k => $v) {
            if (!$data[$k]) {
                return $this->msgAttr(301, $k);
            }
        }
        return $this->sendPost($this->companyPay_fun, $data);
    }


    /**
     * 国际下游支付通过钱来购买
     * @return array|false|string
     * @author Administrator
     */
    public function companyPaySetMealMoney()
    {
        $companyPaySetMealMoney = array_flip(explode(',', $this->companyPaySetMealMoney));
        $data                   = [
            'type'    => 2,
            'money'   => $this->getMoney(),   #价格
            'payType' => $this->getPayType(), #1微信支付 2支付宝
        ];
        foreach ($companyPaySetMealMoney as $k => $v) {
            if (!$data[$k]) {
                return $this->msgAttr(301, $k);
            }
        }
        return $this->sendPost($this->companyPay_fun, $data);
    }

    /**
     * 获取下游信息
     * @return array
     * @author Administrator
     */
    public function getCompanyInfo()
    {
        return $this->sendPost(__FUNCTION__);
    }
}
