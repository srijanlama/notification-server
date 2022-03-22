<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    function test(){
        dd(request()->all());
        return [1,3,4,5];
    }
    function postTest(){
        // dd(request()->all());
        $posted_data = request()->all();
        return gettype($posted_data);
        return 'post request';
    }
}
