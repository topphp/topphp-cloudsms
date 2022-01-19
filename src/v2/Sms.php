<?php
declare(strict_types=1);

namespace Topphp\TopphpCloudsms\v2;

use DateTimeInterface;

class Sms
{
    private $apiUrl;
    private $tel;
    private $secret;
    private $templateId;
    private $signId;
    private $templateParams;
    private $targetTel;

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     * @return Sms
     */
    public function setApiUrl(string $apiUrl): self
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): self
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret): self
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param mixed $templateId
     */
    public function setTemplateId($templateId): self
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignId()
    {
        return $this->signId;
    }

    /**
     * @param mixed $signId
     */
    public function setSignId($signId): self
    {
        $this->signId = $signId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplateParams()
    {
        return $this->templateParams;
    }

    /**
     * @param  $templateParams
     * @return Sms
     */
    public function setTemplateParams($templateParams = []): self
    {
        $this->templateParams = $templateParams;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTargetTel()
    {
        return $this->targetTel;
    }

    /**
     * @param mixed $targetTel
     */
    public function setTargetTel($targetTel): self
    {
        $this->targetTel = $targetTel;
        return $this;
    }

    public function login($tel, $secret)
    {
        return $this->post("/sms/login", ["tel" => $tel, "secret" => $secret]);
    }

    public function sendSms()
    {
        return $this->post("/sms/send", [
            'tel'             => $this->getTargetTel(),
            'template_id'     => $this->getTemplateId(),
            'sign_id'         => $this->getSignId(),
            'template_params' => $this->getTemplateParams(),
        ]);
    }

    public function sendRecordList($params)
    {
        $options = [
            'page'     => $params['page'] ?? 1,
            'pageSize' => $params['pageSize'] ?? 10,
        ];
        if ($params['startTime']) {
            $startTime            = date(DateTimeInterface::ATOM, strtotime($params['startTime']));
            $options['startTime'] = $startTime;
        }
        if ($params['endTime']) {
            $endTime            = date(DateTimeInterface::ATOM, strtotime($params['endTime']));
            $options['endTime'] = $endTime;
        }
        if ($params['targetTel']) {
            $options['targetTel'] = $params['targetTel'];
        }
        if ($params['type']) {
            $options['type'] = $params['type'];
        }
        return $this->get("/sms/list", $options);
    }

    public function rechargeList($params)
    {
        $options = [
            'page'     => $params['page'] ?? 1,
            'pageSize' => $params['pageSize'] ?? 10,
        ];
        if ($params['state']) {
            $options['state'] = $params['state'];
        }
        return $this->get("/sms/recharge", $options);
    }

    public function hello($data = [])
    {
        return $this->get("/sms/hello", $data);
    }

    public function get($cmd, $data = [])
    {
        $options = [
            'http' => [
                'method'  => 'GET',
                'header'  => sprintf("Authorization: Bearer %s\r\n", md5($this->tel . $this->secret)) .
                    "Content-type: application/x-www-form-urlencoded\r\n" .
                    sprintf("tel: %s\r\n", $this->tel),
                'timeout' => 15 * 60 // 超时时间（单位:s）
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ];
        $context = stream_context_create($options);
        $res     = file_get_contents($this->apiUrl . $cmd . '?' . http_build_query($data), false, $context);
        return json_decode($res, true);
    }

    public function post($cmd, $data)
    {
        $data    = json_encode($data);
        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => sprintf("Authorization: Bearer %s\r\n", md5($this->tel . $this->secret)) .
                    "Content-type: application/json\r\n" .
                    sprintf("tel: %s\r\n", $this->tel),
                'content' => $data,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ];
        $context = stream_context_create($options);
        $res     = file_get_contents($this->apiUrl . $cmd, false, $context);
        return json_decode($res, true);
    }
}
