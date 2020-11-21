<?php


namespace App\MultiStep;




use Illuminate\Http\Request;

class Steps
{
    protected $name;

    protected $step;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function step($name, $step)
    {
        $this->name = $name;
        $this->step = $step;
        return $this;
    }

    public function store($data)
    {
        $this->request->session()->put($this->key() . ".{$this->step}.data", $data);
        return $this;
    }

    public function complete()
    {
        $this->request->session()->put($this->key() . ".{$this->step}.complete", true);
        return $this;
    }

    public function notCompleted(...$steps)
    {
        foreach ($steps as $step){
            if(!$this->request->session()->get($this->key() .".{$step}.complete")){
                return true;
            }
        }
        return false;
    }

    public function data()
    {
        return collect($this->request->session()->get($this->key()))
            ->pluck('data')
           ->collapse();
    }

    protected function key()
    {
        return "multistep.{$this->name}";
    }

    public function clearAll()
    {
        $this->request->session()->forget($this->key());
        return $this;
    }

    public function __get($property)
    {
        return $this->request->session()->get("multistep.{$this->name}.{$this->step}.data.{$property}");
    }
}
