<?php

/**
 * 短信发送接口
 */
declare(strict_types=1);

namespace Topphp\TopphpCloudsms\parameterInjection;

use Topphp\TopphpCloudsms\des3\Des3;
use Topphp\TopphpCloudsms\des3\exception\InvalidArgumentException;

class Base
{
    protected $url;     #url地址
    protected $iv;      #加密
    protected $account; #账号
    protected $password;#密码
    protected $key;


    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getIv()
    {
        return $this->iv;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    } #key密钥


    /**
     * @param string $url
     * @return $this
     * @author Administrator
     */
    public function setUrl($url = '')
    {
        $this->url = $url;
        return $this;
    }


    /**
     * @param string $iv
     * @return $this
     * @author Administrator
     */
    public function setIv($iv = '')
    {
        $this->iv = $iv;
        return $this;
    }


    /**
     * @param string $account
     * @return $this
     * @author Administrator
     */
    public function setAccount($account = '')
    {
        $this->account = $account;
        return $this;
    }


    /**
     * @param string $key
     * @return $this
     * @author Administrator
     */
    public function setKey($key = '')
    {
        $this->key = $key;
        return $this;
    }


    /**
     * @param string $password
     * @return $this
     * @throws InvalidArgumentException
     * @author Administrator
     */
    public function setPassword($password = '')
    {
        /**
         * Des3加密
         * @param $password
         * @return string
         */
        $des            = new Des3($this->key, $this->iv);
        $this->password = $des->encrypt($password);
        return $this;
    }

    /**
     * @param $func
     * @param $jsonStr
     * @return false|mixed|string
     */
    public function sendPost($func, $jsonStr = [])
    {
        if (!$this->getUrl()) {
            return $this->msgAttr($code = 301, 'url地址必填');
        }
        if (isset($jsonStr['condition']['startTime']) && $jsonStr['condition']['startTime']) {
            $jsonStr['condition']['startTime'] = date(DATE_ISO8601, $jsonStr['condition']['startTime']);
        }
        if (isset($jsonStr['condition']['endTime']) && $jsonStr['condition']['endTime']) {
            $jsonStr['condition']['endTime'] = date(DATE_ISO8601, $jsonStr['condition']['endTime']);
        }

        if (isset($jsonStr['condition']['date']) && $jsonStr['condition']['date']) {
            $jsonStr['condition']['date'] = date(DATE_ISO8601, $jsonStr['condition']['date']);
        }
        $data['account']  = $this->getAccount();
        $data['password'] = $this->getPassword();
        $jsonStr          = array_merge(array_filter($jsonStr), $data);
        $ch               = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url . '/client/' . $func);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsonStr));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen(json_encode($jsonStr))
        ]);
        $response = curl_exec($ch);
        curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return json_decode($response, true);
    }

    public function msgAttr($code = 301, $msg = '')
    {
        $data['code'] = $code;
        $data['msg']  = $msg . '必填值';
        return $data;
    }
}
