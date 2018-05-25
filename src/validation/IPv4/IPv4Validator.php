<?php

namespace nkymh\validation\IPv4;

interface IPv4Validator
{
    /**
     * クラス名の取得
     * @brief getName
     * @test OK
     */
    public function getName();
    
    /**
     * 判定情報クリア
     * @brief clear
     * @test OK
     */
    public function clear();
    
    /**
     * IPアドレスの登録
     * @brief address
     * @test OK
     */
    public function address($value);
    
    /**
     * ネットマスクの登録
     * @brief netmask
     * @test OK
     */
    public function netmask($value);
    
    /**
     * ブロードキャストアドレスの取得
     * @brief getBroadCastAddre
     * @test OK
     */
    public function getBroadCastAddress();
    
    /**
     * IPアドレスの取得
     * @brief getAddress
     * @test OK
     */
    public function getAddress();
    
    /**
     * IPアドレスを32ビットデータとして取得
     * @brief getAddressValue
     * @test OK
     */
    public function getAddressValue();
    
    /**
     * ネットマスクの取得
     * @brief getNetmask
     * @test OK
     */
    public function getNetmask();
    
    /**
     * ネットマスクを32ビットデータとして比較
     * @brief getNetmaskValue
     * @test OK
     */
    public function getNetmaskValue();
    
    /**
     * 判定関数
     * @brief validate
     * @test OK
     */
    public function validate();
}