<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Services\CountryFilterService;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(){
        return view('filters.abstructFilter');
    }
    public function filter(Request $request, CountryFilterService $filterService){
//        $result = (new CountryFilterService($request, Country::query()))->get();
        $result = Country::query()->filter($filterService)->get();
        return $result;
    }
}
