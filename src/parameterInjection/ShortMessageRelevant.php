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
     * @author Administrator
     * @param string $code
     * @return $this
     */
    public function setCode($code = '')
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $mobile
     * @return $this
     */
    public function setMobile($mobile = '')
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $signatureId
     * @return $this
     */
    public function setSignatureId($signatureId = '')
    {
        $this->signatureId = $signatureId;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $templateId
     * @return $this
     */
    public function setTemplateId($templateId = '')
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $templateParam
     * @return $this
     */
    public function setTemplateParam($templateParam = '')
    {
        $this->templateParam = $templateParam;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $pageNum
     * @return $this
     */
    public function setPageNum($pageNum = '')
    {
        $this->pageNum = $pageNum;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $pageSize
     * @return $this
     */
    public function setPageSize($pageSize = '')
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $startTime
     * @return $this
     */
    public function setStartTime($startTime = '')
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $endTime
     * @return $this
     */
    public function setEndTime($endTime = '')
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $type
     * @return $this
     */
    public function setType($type = '')
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone = '')
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $date
     * @return $this
     */
    public function setDate($date = '')
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $payType
     * @return $this
     */
    public function setPayType($payType = '')
    {
        $this->payType = $payType;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $payPlanId
     * @return $this
     */
    public function setPayPlanId($payPlanId = '')
    {
        $this->payPlanId = $payPlanId;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $count
     * @return $this
     */
    public function setCount($count = '')
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @author Administrator
     * @param string $money
     * @return $this
     */
    public function setMoney($money = '')
    {
        $this->money = $money;
        return $this;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getSignatureId()
    {
        return $this->signatureId;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getTemplateParam()
    {
        return $this->templateParam;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getPageNum()
    {
        return $this->pageNum;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getPayPlanId()
    {
        return $this->payPlanId;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @author Administrator
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }
 

}
