<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return inertia(
            'Index/Index',
            [
                'message' => 'Hello world'
            ]
        );
    }
    public function show(){
        return inertia('Index/Show');
    }
}
