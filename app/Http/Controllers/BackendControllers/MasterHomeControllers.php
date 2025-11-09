<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterHomeControllers extends Controller
{
    public function main(){
        return view('Backend/Pages/Home/Home');
    }
}
