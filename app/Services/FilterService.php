<?php


namespace App\Services;
use Illuminate\Http\Request;

class FilterService
{
    protected $builder;
    protected $request;
    public function __construct(Request $request)
    {
//        $this->builder = $builder;
        $this->request = $request;

    }
    public function filters($request){
        return $request->all();
    }
    public function apply($builder){
        $this->builder = $builder;
        foreach ($this->filters($this->request) as $filter => $value){
            if(method_exists($this, $filter)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }
}
