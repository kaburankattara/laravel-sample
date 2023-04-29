<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index()
    {
        $message = 'Hello, world!';
        return view('sample', compact('message'));
    }
}
