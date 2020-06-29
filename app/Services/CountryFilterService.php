<?php


namespace App\Services;


class CountryFilterService extends FilterService
{

    public function name($value){
        if(!is_null($value)){
             $this->builder->where('Name','like', $value);
        }
    }
    public function population($value){
        if(!is_null($value)) {
            $this->builder->where('Population', '>', $value);
        }
    }
    public function indep($value){
        if($value==true){
            $this->builder->whereNotNull('IndepYear');
        }
    }
}
