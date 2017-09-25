<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;

use App\Services\Contracts\RedisServiceInterface;
use Redis;
use Carbon;

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
        $this->redis->set($tableName, $this->data);
    }

    public function getterRedis() {
        return $this->redis->get($tableName);
    }

    public function reloadData() {
        $timeReloadData = Carbon::now()->addMinute(5);
    }

}
