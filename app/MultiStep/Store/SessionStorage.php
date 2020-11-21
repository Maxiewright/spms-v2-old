<?php


namespace App\MultiStep\Store;


use App\MultiStep\Store\Contracts\MultiStepStorageInterface;
use Illuminate\Http\Request;

class SessionStorage implements MultiStepStorageInterface
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function put($key, $value)
    {
        return $this->request->session()->put($key, $value);
    }

    public function get($key)
    {
        return $this->request->session()->get($key);
    }

    public function forget($key)
    {
        return $this->request->session()->forget($key);
    }
}
