<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services\Contracts;




/**
 *
 * @author akke
 */
interface RedisServiceInterface {

    public function setterRedis();

    public function getterRedis();
    
    public function reloadData();
}
