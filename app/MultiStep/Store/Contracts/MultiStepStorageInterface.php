<?php


namespace App\MultiStep\Store\Contracts;


interface MultiStepStorageInterface
{
    public function put($key, $value);

    public function get($key);

    public function forget($key);
}
