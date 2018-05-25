<?php

namespace nkymh\validation\IPv4;

use nkymh\validation\IPv4\IPv4Validator;

class IPv4ConcreteValidator implements IPv4Validator
{
    private $status;
    private $address;
    private $addressValue;
    private $netmask;
    private $netmaskValue;
    
    function __construct()
    {
        $this->status = true;  // true=OK false=NG
        $this->address = '';
        $this->netmask = '';
        $this->addressValue = 0x00000000;
        $this->netmaskValue = 0x00000000;
    }
    
    /**
     * クラス名の取得
     * @brief getName
     * @test OK
     */
    public function getName()
    {
        return "IPv4 Validator";
    }
    
    /**
     * 判定情報クリア
     * @brief clear
     * @test OK
     */
    public function clear()
    {
        $this->status = True;
        
        return $this;
    }
    
    /**
     * IPv4アドレス書式確認
     * @brief formatCheckIPv4
     * @test OK
     */
    private function formatCheckIPv4($value)
    {
        if(preg_match('/^((0{0,2}[0-9]|0{0,1}[0-9]{2}|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}(0{0,2}[0-9]|0{0,1}[0-9]{2}|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', $value) === 1)
        {
            $ret =  true;
        }
        else
        {
            $ret = false;
            $this->status = false;
        }
        
        return $ret;
    }
    
    /**
     * IPアドレス→32ビットデータ変換
     * @brief addressToValue
     * @test OK
     */
    private function addressToValue($value)
    {
        $data = 0;
        
        foreach(explode('.', $value) as $dump)
        {
            $data = ($data << 8) + $dump;
        }
        
        return $data;
    }
    
    /**
     * 32ビットデータ→IPv4アドレス変換
     * @brief valueToAddress
     * @test OK
     */
    private function valueToAddress($value)
    {
        $data = '';
        
        $data = intval(($value & 0x000000FF));
        $data = intval(($value & 0x0000FF00) >>  8) . '.' . $data;
        $data = intval(($value & 0x00FF0000) >> 16) . '.' . $data;
        $data = intval(($value & 0xFF000000) >> 24) . '.' . $data;
        
        return $data;
    }

    /**
     * IPアドレスの登録
     * @brief address
     * @test OK
     */
    public function address($value)
    {
        if($this->formatCheckIPv4($value))
        {
            $this->address = $value;
            $this->addressValue = $this->addressToValue($value);
        }
        return $this;
    }
    
    /**
     * ネットマスクの登録
     * @brief netmask
     * @test OK
     */
    public function netmask($value)
    {
        if($this->formatCheckIPv4($value))
        {
            $this->netmask = $value;
            $this->netmaskValue = $this->addressToValue($value);
        }
        return $this;
    }
    
    /**
     * ブロードキャストアドレスの取得
     * @brief getBroadCastAddre
     * @test OK
     */
    public function getBroadCastAddress()
    {
        return $this->valueToAddress(($this->addressValue & $this->netmaskValue) + ($this->netmaskValue ^ 0xFFFFFFFF));
    }
    
    /**
     * IPアドレスの取得
     * @brief getAddress
     * @test OK
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * IPアドレスを32ビットデータとして取得
     * @brief getAddressValue
     * @test OK
     */
    public function getAddressValue()
    {
        return $this->addressValue;
    }
    
    /**
     * ネットマスクの取得
     * @brief getNetmask
     * @test OK
     */
    public function getNetmask()
    {
        return $this->netmask;
    }
    
    /**
     * ネットマスクを32ビットデータとして比較
     * @brief getNetmaskValue
     * @test OK
     */
    public function getNetmaskValue()
    {
        return $this->netmaskValue;
    }
    
    /**
     * 判定関数
     * @brief validate
     * @test OK
     */
    public function validate()
    {
        return $this->status;
    }

}