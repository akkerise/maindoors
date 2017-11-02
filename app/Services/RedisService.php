<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;

use App\Services\Contracts\RedisServiceInterface;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

/**
 * Description of RedisService
 *
 * @author akke
 */
class RedisService implements RedisServiceInterface {

    private $data;
    protected $redis;
    protected $tableName;

    public function __construct($data = null, $tableName = '') {
        $this->redis = Redis::connection();
        $this->data = $data;
        $this->tableName = strtolower($tableName);
    }

    public function setterRedis() {
        try{
            $this->redis->set($this->tableName, $this->data);
        } catch (\RedisException $ex) {
            dd($ex->getMessage());
        }
    }

    public function getterRedis() {
        return $this->redis->get($this->tableName);
    }

    public function reloadDataExpiresTime() {
        $this->redis->expire('Data expire in 5 minutes', 300);
    }

}
