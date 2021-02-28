<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        if(DB::connection()->getDatabaseName())
        {
            echo "Connected sucessfully to database ".DB::connection()->getDatabaseName().".";
        }
    }
}
