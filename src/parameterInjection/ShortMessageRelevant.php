<?php

namespace Tophp\TophpCloudsms\parameterInjection;

/**
 * 短信相关
 * Class SendMessage
 * @package SmsCloud
 */
class ShortMessageRelevant extends Base
{
    protected $code;
    protected $mobile;
    protected $signatureId;
    protected $templateId;
    protected $templateParam;
    protected $pageNum;
    protected $pageSize;
    protected $startTime;
    protected $endTime;
    protected $type;
    protected $phone;
    protected $date;
    protected $payType;
    protected $payPlanId;
    protected $count;
    protected $money;

    /**
     * @param string $code
     * @return $this
     * @author Administrator
     */
    public function setCode($code = '')
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string $mobile
     * @return $this
     * @author Administrator
     */
    public function setMobile($mobile = '')
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @param string $signatureId
     * @return $this
     * @author Administrator
     */
    public function setSignatureId($signatureId = '')
    {
        $this->signatureId = $signatureId;
        return $this;
    }

    /**
     * @param string $templateId
     * @return $this
     * @author Administrator
     */
    public function setTemplateId($templateId = '')
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @param string $templateParam
     * @return $this
     * @author Administrator
     */
    public function setTemplateParam($templateParam = '')
    {
        $this->templateParam = $templateParam;
        return $this;
    }

    /**
     * @param string $pageNum
     * @return $this
     * @author Administrator
     */
    public function setPageNum($pageNum = '')
    {
        $this->pageNum = $pageNum;
        return $this;
    }

    /**
     * @param string $pageSize
     * @return $this
     * @author Administrator
     */
    public function setPageSize($pageSize = '')
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @param string $startTime
     * @return $this
     * @author Administrator
     */
    public function setStartTime($startTime = '')
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @param string $endTime
     * @return $this
     * @author Administrator
     */
    public function setEndTime($endTime = '')
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @param string $type
     * @return $this
     * @author Administrator
     */
    public function setType($type = '')
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $phone
     * @return $this
     * @author Administrator
     */
    public function setPhone($phone = '')
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param string $date
     * @return $this
     * @author Administrator
     */
    public function setDate($date = '')
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param string $payType
     * @return $this
     * @author Administrator
     */
    public function setPayType($payType = '')
    {
        $this->payType = $payType;
        return $this;
    }

    /**
     * @param string $payPlanId
     * @return $this
     * @author Administrator
     */
    public function setPayPlanId($payPlanId = '')
    {
        $this->payPlanId = $payPlanId;
        return $this;
    }

    /**
     * @param string $count
     * @return $this
     * @author Administrator
     */
    public function setCount($count = '')
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @param string $money
     * @return $this
     * @author Administrator
     */
    public function setMoney($money = '')
    {
        $this->money = $money;
        return $this;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getSignatureId()
    {
        return $this->signatureId;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getTemplateParam()
    {
        return $this->templateParam;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getPageNum()
    {
        return $this->pageNum;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getPayPlanId()
    {
        return $this->payPlanId;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return mixed
     * @author Administrator
     */
    public function getMoney()
    {
        return $this->money;
    }
}
